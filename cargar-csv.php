<?php
/* Cargador masivo de trabajadores desde un archivo CSV.
   Uso:
     https://TU_SITIO/cargar-csv.php?clave=TUDB_SETUP_KEY
   Prueba sin escribir nada en la BD (recomendado primero):
     https://TU_SITIO/cargar-csv.php?clave=TUDB_SETUP_KEY&simular=1

   Archivo esperado (por defecto): ./cargar_trabajadores.csv junto a este script.
   Se puede indicar otro archivo con: ?csv=otro_nombre.csv (solo nombre, debe estar
   en la misma carpeta de este script).

   Delimitador: se autodetecta (coma o punto y coma); se puede forzar con
   ?delim=;  ?delim=,  o  ?delim=tab.
   Codificación: se soporta UTF-8 (con o sin BOM) y ANSI/Windows-1252 (Excel).
   Se ignora la primera línea si está vacía o es solo separadores (null).

   Encabezado del CSV (5 columnas, en cualquier orden/idioma):
     cedula, nombre_completo, cargo, direccion, foto
   donde "foto" puede ser:
     - el nombre de un archivo de imagen dentro de ./assets/img/fotos_trabajadores/
       (ej: yadir.jpg, foto.png, img.webp), o
     - un data URI base64 (data:image/jpeg;base64,....), o
     - vacío (queda sin foto).
   Es idempotente: si la cédula ya existe, actualiza los datos y la foto.
   Requiere la variable de entorno DB_SETUP_KEY. */

require_once __DIR__ . '/includes/db_conexion.php';

$claveEsperada = getenv('DB_SETUP_KEY');
if ($claveEsperada === false || $claveEsperada === '' || !isset($_GET['clave']) || $_GET['clave'] !== $claveEsperada) {
  http_response_code(403);
  exit('Acceso denegado.');
}

$simular = isset($_GET['simular']) && $_GET['simular'] === '1';

$csvRel = isset($_GET['csv']) && $_GET['csv'] !== '' ? trim($_GET['csv']) : 'cargar_trabajadores.csv';
$csvRel = str_replace('\\', '/', $csvRel);
if (strpos($csvRel, '..') !== false || $csvRel[0] === '/' || preg_match('/^[A-Za-z]:/', $csvRel)) {
  http_response_code(400);
  exit('Ruta de CSV no permitida.');
}
$baseAbs = realpath(__DIR__);
$candidato = realpath($baseAbs . '/' . $csvRel);
if ($candidato === false || strpos($candidato, $baseAbs . DIRECTORY_SEPARATOR) !== 0) {
  http_response_code(404);
  exit("No se encontró el archivo CSV: {$csvRel}.\n");
}
$nombreCsv = basename($candidato);
$rutaCsv = $candidato;

if (!is_file($rutaCsv)) {
  http_response_code(404);
  exit("No se encontró el archivo CSV: {$nombreCsv} (colócalo junto a este script o usa ?csv=...).\n");
}

/* ---- Lectura y normalización del contenido ---- */
$contenido = file_get_contents($rutaCsv);
if ($contenido === false) {
  http_response_code(500);
  exit("No fue posible leer el archivo CSV.\n");
}
/* Quitar BOM UTF-8 */
$contenido = preg_replace('/^\xEF\xBB\xBF/', '', $contenido);
/* Convertir ANSI/Windows-1252 a UTF-8 si no es UTF-8 válido */
if (!mb_check_encoding($contenido, 'UTF-8')) {
  $contenido = mb_convert_encoding($contenido, 'UTF-8', 'Windows-1252');
}
/* Separar líneas y descartar las vacías o que solo contienen separadores (null) */
$lineas = preg_split('/\r\n|\r|\n/', $contenido);
$lineas = array_values(array_filter($lineas, function ($l) {
  return trim($l) !== '' && preg_match('/[^,;\t" ]/', $l) === 1;
}));
if (count($lineas) === 0) {
  http_response_code(400);
  exit("El archivo CSV está vacío.\n");
}

/* ---- Delimitador ---- */
if (isset($_GET['delim'])) {
  if ($_GET['delim'] === 'tab' || $_GET['delim'] === 'tabs') $delim = "\t";
  elseif (strlen($_GET['delim']) === 1) $delim = $_GET['delim'];
  else $delim = ',';
} else {
  $puntos = substr_count($lineas[0], ';');
  $comas  = substr_count($lineas[0], ',');
  $delim  = $puntos >= $comas ? ';' : ',';
  if (substr_count($lineas[0], "\t") > max($puntos, $comas)) $delim = "\t";
}

/* ---- Parseo a memoria ---- */
$manejo = fopen('php://memory', 'r+');
fwrite($manejo, implode("\n", $lineas));
rewind($manejo);

$primera = fgetcsv($manejo, 0, $delim);
if ($primera === false || !is_array($primera) || count($primera) < 2) {
  fclose($manejo);
  http_response_code(400);
  exit("El CSV no tiene cabecera válida (delimitador detectado: '{$delim}').\n");
}

/* Normalizador de encabezados: quita tildes y pasa a minúsculas */
function normalizarClave($s) {
  $s = trim($s);
  $s = mb_strtolower($s, 'UTF-8');
  $mapa = ['á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n', 'ü' => 'u'];
  return strtr($s, $mapa);
}

$pos = [];
foreach ($primera as $i => $nombre) {
  $k = normalizarClave($nombre);
  if (in_array($k, ['cedula', 'ced'], true)) $pos['cedula'] = $i;
  elseif (in_array($k, ['nombre_completo', 'nombre'], true)) $pos['nombre'] = $i;
  elseif ($k === 'cargo') $pos['cargo'] = $i;
  elseif (in_array($k, ['direccion', 'direccion_laboral', 'ubicacion'], true)) $pos['direccion'] = $i;
  elseif ($k === 'foto') $pos['foto'] = $i;
}

$requeridas = ['cedula', 'nombre', 'cargo', 'direccion'];
if (count(array_intersect($requeridas, array_keys($pos))) !== count($requeridas)) {
  fclose($manejo);
  http_response_code(400);
  $faltantes = implode(', ', array_diff($requeridas, array_keys($pos)));
  exit("Faltan columnas obligatorias en el CSV: {$faltantes}.\n");
}

/* Leer todas las filas a memoria */
$rutaFotos = __DIR__ . '/assets/img/fotos_trabajadores/';

function leerFoto($valor) {
  global $rutaFotos;
  $valor = trim($valor);
  if ($valor === '') return null;
  if (stripos($valor, 'data:') === 0) {
    $coma = strpos($valor, ',');
    if ($coma === false) return null;
    $bin = base64_decode(substr($valor, $coma + 1), true);
    return $bin === false || $bin === '' ? null : $bin;
  }
  $ruta = $rutaFotos . basename($valor);
  return is_file($ruta) ? file_get_contents($ruta) : null;
}

$filas = [];
$validas = 0;
$sinFotoArchivo = [];
$sinFotoEnCarpeta = [];
while (($cols = fgetcsv($manejo, 0, $delim)) !== false) {
  if (!is_array($cols) || count($cols) < 2) continue;
  $cedula    = trim($cols[$pos['cedula']] ?? '');
  $nombre    = trim($cols[$pos['nombre']] ?? '');
  $cargo     = trim($cols[$pos['cargo']] ?? '');
  $direccion = trim($cols[$pos['direccion']] ?? '');
  $fotoRaw   = trim($cols[$pos['foto']] ?? '');
  if ($cedula === '' || $nombre === '') continue;
  $filas[] = [$cedula, $nombre, $cargo, $direccion, $fotoRaw];
}
fclose($manejo);

$total = count($filas);
if ($total === 0) {
  http_response_code(400);
  exit("El CSV tiene cabecera válida pero no contiene filas con cédula y nombre.\n");
}

/* ---- Conecta a la BD solo si se va a escribir ---- */
if (!$simular) {
  $pdo = conectarBD();
  if ($pdo === null) {
    http_response_code(500);
    exit('No fue posible conectar a la base de datos. Revisa DATABASE_URL (Render) o DB_* (local).');
  }
  $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
  header('Content-Type: text/plain; charset=utf-8');

  if ($driver === 'pgsql') {
    $pdo->exec(
      "CREATE TABLE IF NOT EXISTS trabajadores (
         cedula VARCHAR(20) NOT NULL PRIMARY KEY,
         nombre_completo VARCHAR(120) NOT NULL,
         cargo VARCHAR(150) NOT NULL,
         direccion VARCHAR(120) NOT NULL,
         foto BYTEA
       )"
    );
  } else {
    $pdo->exec(
      "CREATE TABLE IF NOT EXISTS trabajadores (
         cedula VARCHAR(20) NOT NULL PRIMARY KEY,
         nombre_completo VARCHAR(120) NOT NULL,
         cargo VARCHAR(150) NOT NULL,
         direccion VARCHAR(120) NOT NULL,
         foto LONGBLOB NULL
       ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );
  }

  /* Ensancha cargo si la instalación previa la dejó en VARCHAR(60) */
  try {
    $ancho = $pdo->query(
      $driver === 'pgsql'
        ? "SELECT character_maximum_length FROM information_schema.columns WHERE table_name = 'trabajadores' AND column_name = 'cargo'"
        : "SELECT character_maximum_length FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'trabajadores' AND column_name = 'cargo'"
    )->fetchColumn();
    if ((int)$ancho < 150) {
      $pdo->exec(
        $driver === 'pgsql'
          ? "ALTER TABLE trabajadores ALTER COLUMN cargo TYPE VARCHAR(150)"
          : "ALTER TABLE trabajadores MODIFY COLUMN cargo VARCHAR(150) NOT NULL"
      );
      echo "Columna cargo ampliada a VARCHAR(150).\n";
    }
  } catch (PDOException $e) {
    echo "Aviso: no se pudo verificar/ampliar la columna cargo ({$e->getMessage()}).\n";
  }
  echo "Tabla 'trabajadores' lista (driver: $driver).\n";

  if ($driver === 'pgsql') {
    $sql = "INSERT INTO trabajadores (cedula, nombre_completo, cargo, direccion, foto)
            VALUES (?, ?, ?, ?, ?)
            ON CONFLICT (cedula) DO UPDATE SET
              nombre_completo = EXCLUDED.nombre_completo,
              cargo = EXCLUDED.cargo,
              direccion = EXCLUDED.direccion,
              foto = EXCLUDED.foto";
  } else {
    $sql = "INSERT INTO trabajadores (cedula, nombre_completo, cargo, direccion, foto)
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
              nombre_completo = VALUES(nombre_completo),
              cargo = VALUES(cargo),
              direccion = VALUES(direccion),
              foto = VALUES(foto)";
  }
  $stmt = $pdo->prepare($sql);
}

echo "Archivo: {$nombreCsv} | delimitador: " . ($delim === "\t" ? 'tab' : "'{$delim}'") . " | filas con datos: {$total}\n\n";

$ok = 0;
$errores = 0;
foreach ($filas as $idx => $f) {
  list($cedula, $nombre, $cargo, $direccion, $fotoRaw) = $f;
  $nro = $idx + 1;
  $foto = leerFoto($fotoRaw);
  $resumenFoto = $foto === null
    ? 'SIN FOTO'
    : 'foto: ' . strlen($foto) . ' bytes' . ($fotoRaw !== '' && stripos($fotoRaw, 'data:') !== 0 ? " ({$fotoRaw})" : '');
  if ($foto === null && $fotoRaw !== '') $sinFotoEnCarpeta[] = "{$cedula} -> {$fotoRaw}";

  if ($simular) {
    echo "[simular] {$cedula} | {$nombre} | {$cargo} | {$direccion} | {$resumenFoto}\n";
    if ($foto === null && $fotoRaw !== '') $sinFotoArchivo[] = "{$cedula} -> {$fotoRaw}";
    $ok++;
    continue;
  }

  $stmt->bindValue(1, $cedula);
  $stmt->bindValue(2, $nombre);
  $stmt->bindValue(3, $cargo);
  $stmt->bindValue(4, $direccion);
  $stmt->bindValue(5, $foto === null ? null : $foto, PDO::PARAM_LOB);
  try {
    $stmt->execute();
    $ok++;
    echo "OK: {$cedula} | {$nombre} | {$cargo} | {$direccion} | {$resumenFoto}\n";
  } catch (PDOException $e) {
    $errores++;
    echo "ERROR ({$cedula} — {$nombre}): " . $e->getMessage() . "\n";
    error_log('Cargar CSV CMAP: ' . $e->getMessage());
  }
}

if (!empty($sinFotoArchivo)) {
  echo "\nFotos referenciadas en el CSV que NO están en assets/img/fotos_trabajadores/:\n  " . implode("\n  ", $sinFotoArchivo) . "\n";
}

echo "\nResumen: {$ok} registros " . ($simular ? 'simulados' : 'insertados/actualizados') . ", {$errores} errores.\n";
if ($simular) {
  echo "Modo simulación: no se escribió nada en la base de datos. Quita &simular=1 para cargar de verdad.\n";
} else {
  echo "Si lo ves bien, puedes eliminar este archivo (cargar-csv.php) y el CSV.\n";
}