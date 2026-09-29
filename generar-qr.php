<?php
/* Generador de códigos QR para el carnet de cada trabajador.
   Cada QR apunta a su página de carnet:
     https://SITIO/carnet.php?cedula=XXXX
   Los PNG se guardan en ./qr/carnet_<cedula>.png
   Uso:
     https://TU_SITIO/generar-qr.php?clave=TUDB_SETUP_KEY
   Opciones:
     ?base=URL           dominio base (por defecto: https://web-cmap-2.onrender.com)
     ?tamano=300         píxeles del QR (por defecto 256)
     ?fuerza=1           vuelve a descargar aunque el archivo ya exista */

require_once __DIR__ . '/includes/db_conexion.php';

$claveEsperada = getenv('DB_SETUP_KEY');
if ($claveEsperada === false || $claveEsperada === '' || !isset($_GET['clave']) || $_GET['clave'] !== $claveEsperada) {
  http_response_code(403);
  exit('Acceso denegado.');
}

$base     = isset($_GET['base']) && $_GET['base'] !== '' ? rtrim(trim($_GET['base']), '/') : 'https://web-cmap-2.onrender.com';
$tamano   = isset($_GET['tamano']) ? max(128, (int)$_GET['tamano']) : 256;
$fuerza   = isset($_GET['fuerza']) && $_GET['fuerza'] === '1';

$pdo = conectarBD();
if ($pdo === null) {
  http_response_code(500);
  exit('No fue posible conectar a la base de datos.');
}

header('Content-Type: text/plain; charset=utf-8');

$dirQr = __DIR__ . '/qr';
if (!is_dir($dirQr)) mkdir($dirQr, 0755, true);

$filas = $pdo->query("SELECT cedula, nombre_completo FROM trabajadores ORDER BY cedula")->fetchAll();

/* Nombre de archivo a partir del primer nombre; si se repite se agrega el apellido */
function slug($s) {
  $s = mb_strtolower(trim($s), 'UTF-8');
  $s = strtr($s, ['á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ü' => 'u', 'ñ' => 'n']);
  $s = preg_replace('/[^a-z0-9]+/', ' ', $s);
  return trim($s);
}

$usados = [];
$nombresArchivo = [];
foreach ($filas as $f) {
  $palabras = explode(' ', slug($f['nombre_completo']));
  $candidato = $palabras[0];
  if (isset($usados[$candidato])) {
    $candidato = $palabras[0] . '_' . ($palabras[1] ?? '');
    while (isset($usados[$candidato])) $candidato .= '_' . preg_replace('/\D/', '', $f['cedula']);
  }
  $usados[$candidato] = true;
  $nombresArchivo[$f['cedula']] = $candidato;
}

$total = 0;
$ok = 0;
$err = 0;

foreach ($filas as $fila) {
  $cedula = $fila['cedula'];
  $nombre = $fila['nombre_completo'];
  $total++;

  $urlCarnet = $base . '/carnet.php?cedula=' . rawurlencode($cedula);
  $archivo = $dirQr . '/carnet_' . $nombresArchivo[$cedula] . '.png';

  if (!$fuerza && is_file($archivo) && filesize($archivo) > 0) {
    echo "ya existe: " . basename($archivo) . " ($cedula)\n";
    $ok++;
    continue;
  }

  $api = 'https://api.qrserver.com/v1/create-qr-code/?size=' . $tamano . 'x' . $tamano . '&data=' . urlencode($urlCarnet);
  $png = false;
  if (function_exists('curl_init')) {
    $ch = curl_init($api);
    curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CONNECTTIMEOUT => 15,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_USERAGENT => 'CMAP-QR/1.0',
    ]);
    $png = curl_exec($ch);
    $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($http !== 200) $png = false;
  } else {
    $png = @file_get_contents($api);
  }

  if ($png === false || $png === '' || strpos((string)$png, "\x89PNG") !== 0) {
    $err++;
    echo "ERROR: no se pudo generar el QR de $cedula ($nombre)\n";
    continue;
  }

  file_put_contents($archivo, $png);
  $ok++;
  echo "OK: " . basename($archivo) . " -> $urlCarnet ($nombre)\n";
}

echo "\nResumen: $ok de $total QRs listos en /qr/ (errores: {$err}).\n";