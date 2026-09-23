<?php
/* Instalador/actualizador de la base de datos.
   Uso (una sola vez, tanto en Render como en local):
     https://TU_SITIO/instalar-bd.php?clave=TUDB_SETUP_KEY
   Requiere la variable de entorno DB_SETUP_KEY en el servidor.
   Es idempotente: crea la tabla si no existe y reinserta/actualiza los
   trabajadores con la foto leída desde assets/img/fotos_trabajadores/.
   NOTA: suprimir este archivo del repositorio una vez ejecutado. */

require_once __DIR__ . '/includes/db_conexion.php';

$claveEsperada = getenv('DB_SETUP_KEY');
if ($claveEsperada === false || $claveEsperada === '' || !isset($_GET['clave']) || $_GET['clave'] !== $claveEsperada) {
  http_response_code(403);
  exit('Acceso denegado.');
}

$pdo = conectarBD();
if ($pdo === null) {
  http_response_code(500);
  exit('No fue posible conectar a la base de datos. Revisa DATABASE_URL (Render) o DB_* (local).');
}

$driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
header('Content-Type: text/plain; charset=utf-8');

/* 1) Tabla */
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

/* 2) Carga de trabajadores (cedula, nombre, cargo, direccion, archivo foto) */
$trabajadores = [
  [
    'cedula'   => '31.887.945',
    'nombre'   => 'Yadir Antonio Maldonado Nadales',
    'cargo'    => 'Analista 2',
    'direccion'=> 'Unidad de Telemática',
    'archivo'  => 'yadir.jpg',
  ],
  [
    'cedula'   => '26.386.962',
    'nombre'   => 'Israfel Rodrigo Rosario Diaz',
    'cargo'    => 'Asistente Administrativo',
    'direccion'=> 'Unidad de Telemática',
    'archivo'  => 'rodrigo.jpg',
  ],
];

$rutaFotos = __DIR__ . '/assets/img/fotos_trabajadores/';

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

foreach ($trabajadores as $t) {
  $ruta = $rutaFotos . $t['archivo'];
  $foto = is_file($ruta) ? file_get_contents($ruta) : null;

  $stmt->bindValue(1, $t['cedula']);
  $stmt->bindValue(2, $t['nombre']);
  $stmt->bindValue(3, $t['cargo']);
  $stmt->bindValue(4, $t['direccion']);
  $stmt->bindValue(5, $foto === null ? null : $foto, PDO::PARAM_LOB);
  $stmt->execute();

  echo "OK: " . $t['cedula'] . ' — ' . $t['nombre']
     . ($foto === null ? ' (SIN FOTO: no se encontró ' . $t['archivo'] . ')' : ' (foto: ' . strlen($foto) . ' bytes)')
     . "\n";
}

echo "Listo. Puedes eliminar este archivo (instalar-bd.php).\n";