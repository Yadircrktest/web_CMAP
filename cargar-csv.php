<?php
/* Cargador masivo de trabajadores desde un archivo CSV.
   Uso:
     https://TU_SITIO/cargar-csv.php?clave=TUDB_SETUP_KEY
   Archivo esperado (por defecto): ./cargar_trabajadores.csv junto a este script.
   Se puede indicar otro archivo con: ?csv=otro_nombre.csv (solo nombre, debe estar
   en la misma carpeta). Delimitador por defecto: coma. Opciones: ?delim=<;> o ?delim=tab.

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

$nombreCsv = isset($_GET['csv']) && $_GET['csv'] !== ''
  ? basename($_GET['csv'])
  : 'cargar_trabajadores.csv';
$rutaCsv = __DIR__ . '/' . $nombreCsv;

$delim = ',';
if (isset($_GET['delim'])) {
  if ($_GET['delim'] === 'tab' || $_GET['delim'] === 'tabs') {
    $delim = "\t";
  } elseif (strlen($_GET['delim']) === 1) {
    $delim = $_GET['delim'];
  }
}

if (!is_file($rutaCsv)) {
  http_response_code(404);
  exit("No se encontró el archivo CSV: {$nombreCsv} (colócalo junto a este script).\n");
}

$pdo = conectarBD();
if ($pdo === null) {
  http_response_code(500);
  exit('No fue posible conectar a la base de datos. Revisa DATABASE_URL (Render) o DB_* (local).');
}

$driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
header('Content-Type: text/plain; charset=utf-8');

/* 1) Tabla (igual que instalar-bd.php) */
if ($driver === 'pgsql') {
  $pdo->exec(
    "CREATE TABLE IF NOT EXISTS trabajadores (
       cedula VARCHAR(20) NOT NULL PRIMARY KEY,
       nombre_completo VARCHAR(120) NOT NULL,
       cargo VARCHAR(60) NOT NULL,
       direccion VARCHAR(120) NOT NULL,
       foto BYTEA
     )"
  );
} else {
  $pdo->exec(
    "CREATE TABLE IF NOT EXISTS trabajadores (
       cedula VARCHAR(20) NOT NULL PRIMARY KEY,
       nombre_completo VARCHAR(120) NOT NULL,
       cargo VARCHAR(60) NOT NULL,
       direccion VARCHAR(120) NOT NULL,
       foto LONGBLOB NULL
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
  );
}
echo "Tabla 'trabajadores' lista (driver: $driver).\n";

/* 2) Normalizador de encabezados: quita tildes, espacios, BOM y pasa a minúsculas */
function normalizarClave($s) {
  $s = preg_replace('/^\xEF\xBB\xBF/', '', trim($s));
  $s = mb_strtolower($s, 'UTF-8');
  $mapa = [
    'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
    'ñ' => 'n', 'ü' => 'u',
  ];
  return strtr($s, $mapa);
}

$manejo = fopen($rutaCsv, 'rb');
if ($manejo === false) {
  http_response_code(500);
  exit("No fue posible abrir el archivo CSV.\n");
}

$primera = fgetcsv($manejo, 0, $delim);
if ($primera === false || !is_array($primera) || count($primera) < 2) {
  fclose($manejo);
  http_response_code(400);
  exit("El archivo CSV está vacío o no tiene cabecera válida (delimitador '{$delim}').\n");
}

/* Mapear columnas del CSV -> columnas de la BD */
$pos = [];
foreach ($primera as $i => $nombre) {
  $k = normalizarClave($nombre);
  if (in_array($k, ['cedula', 'ced'], true)) $pos['cedula'] = $i;
  elseif (in_array($k, ['nombre_completo', 'nombre'], true)) $pos['nombre'] = $i;
  elseif ($k === 'cargo') $pos['cargo'] = $i;
  elseif (in_array($k, ['direccion', 'direccion_laboral', 'ubicacion'], true)) $pos['direccion'] = $i;
  elseif ($k === 'foto') $pos['foto'] = $i;
  elseif (trim($nombre) !== '') {
    $pos['logueado'][] = trim($nombre);
  }
}

$requeridas = ['cedula', 'nombre', 'cargo', 'direccion'];
if (count(array_intersect($requeridas, array_keys($pos))) !== count($requeridas)) {
  fclose($manejo);
  http_response_code(400);
  $faltantes = implode(', ', array_diff($requeridas, array_keys($pos)));
  exit("Faltan columnas obligatorias en el CSV: {$faltantes}.\n");
}

/* Upsert según driver */
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

$rutaFotos = __DIR__ . '/assets/img/fotos_trabajadores/';
$ok = 0; $err = 0; $fila = 1; // la fila 1 es la cabecera

function leerFoto($valor, $rutaFotos) {
  $valor = trim($valor);
  if ($valor === '') return null;

  /* Caso A: data URI base64 */
  if (stripos($valor, 'data:') === 0) {
    $coma = strpos($valor, ',');
    if ($coma === false) return null;
    $bin = base64_decode(substr($valor, $coma + 1), true);
    return $bin === false || $bin === '' ? null : $bin;
  }

  /* Caso B: nombre de archivo en assets/img/fotos_trabajadores/ */
  $ruta = $rutaFotos . basename($valor);
  if (!is_file($ruta)) return null;
  return file_get_contents($ruta);
}

while (($cols = fgetcsv($manejo, 0, $delim)) !== false) {
  $fila++;
  if (count($cols) < 2) continue; // línea vacía

  $cedula   = isset($pos['cedula']) ? trim($cols[$pos['cedula']] ?? '') : '';
  $nombre   = isset($pos['nombre']) ? trim($cols[$pos['nombre']] ?? '') : '';
  $cargo    = isset($pos['cargo']) ? trim($cols[$pos['cargo']] ?? '') : '';
  $direccion= isset($pos['direccion']) ? trim($cols[$pos['direccion']] ?? '') : '';
  $fotoRaw  = isset($pos['foto']) ? trim($cols[$pos['foto']] ?? '') : '';

  if ($cedula === '' || $nombre === '') {
    $err++;
    echo "FILA {$fila}: SKIP (cédula o nombre vacíos).\n";
    continue;
  }

  $foto = leerFoto($fotoRaw, $rutaFotos);

  $stmt->bindValue(1, $cedula);
  $stmt->bindValue(2, $nombre);
  $stmt->bindValue(3, $cargo);
  $stmt->bindValue(4, $direccion);
  $stmt->bindValue(5, $foto === null ? null : $foto, PDO::PARAM_LOB);
  try {
    $stmt->execute();
    $ok++;
    $resumenFoto = $foto === null
      ? 'SIN FOTO'
      : ('foto: ' . strlen($foto) . ' bytes' . ($fotoRaw !== '' && stripos($fotoRaw, 'data:') !== 0 ? " ({$fotoRaw})" : ''));
    echo "OK: {$cedula} — {$nombre} | {$cargo} | {$direccion} | {$resumenFoto}\n";
  } catch (PDOException $e) {
    $err++;
    echo "FILA {$fila}: ERROR ({$cedula} — {$nombre}): " . $e->getMessage() . "\n";
    error_log('Cargar CSV CMAP: ' . $e->getMessage());
  }
}
fclose($manejo);

echo "\nResumen: {$ok} registros insertados/actualizados, {$err} errores. ($nombreCsv, filas procesadas: " . ($fila - 1) . ")\n";
echo "Si lo ves bien, puedes eliminar este archivo (cargar-csv.php) y el CSV.\n";