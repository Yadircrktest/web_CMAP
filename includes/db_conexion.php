<?php
/* Conexión a la base de datos (PDO)
   - En Render usa DATABASE_URL (PostgreSQL del mismo proyecto, plan free).
   - En desarrollo local (XAMPP) usa MySQL/MariaDB por defecto, pero se puede
     sobrescribir con las variables de entorno DB_HOST, DB_NAME, DB_USER y DB_PASS. */

function conectarBD() {
  $url = getenv('DATABASE_URL');

  if ($url) {
    try {
      $p = parse_url($url);
      $dsn = sprintf(
        'pgsql:host=%s;port=%s;dbname=%s',
        $p['host'] ?? 'localhost',
        $p['port'] ?? '5432',
        isset($p['path']) ? trim($p['path'], '/') : ''
      );
      $pdo = new PDO($dsn, $p['user'] ?? '', $p['pass'] ?? '', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
      $pdo->exec("SET application_name TO 'cmap'");
      return $pdo;
    } catch (PDOException $e) {
      error_log('DB CMAP (pgsql): ' . $e->getMessage());
      return null;
    }
  }

  $host   = getenv('DB_HOST') ?: 'localhost';
  $nombre = getenv('DB_NAME') ?: 'trabajadores_activos_cmap';
  $usuario = getenv('DB_USER') ?: 'root';
  $clave   = getenv('DB_PASS') ?: '';

  try {
    $pdo = new PDO(
      "mysql:host=$host;dbname=$nombre;charset=utf8mb4",
      $usuario,
      $clave,
      [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]
    );
    return $pdo;
  } catch (PDOException $e) {
    error_log('DB CMAP (mysql): ' . $e->getMessage());
    return null;
  }
}

/* Devuelve el trabajador con su foto normalizada en bytes puros.
   En PostgreSQL la foto viaja como base64 (encode) para evitar decodificaciones
   según el bytea_output; aquí se normaliza a binario igual que en MySQL. */
function obtenerTrabajador($pdo, $cedula) {
  $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

  if ($driver === 'pgsql') {
    $stmt = $pdo->prepare(
      "SELECT cedula, nombre_completo, cargo, direccion, encode(foto, 'base64') AS foto_b64
       FROM trabajadores WHERE cedula = :cedula LIMIT 1"
    );
    $stmt->execute([':cedula' => $cedula]);
    $fila = $stmt->fetch();
    if ($fila) {
      $fila['foto'] = ($fila['foto_b64'] !== null && $fila['foto_b64'] !== '')
        ? base64_decode($fila['foto_b64'])
        : null;
    }
    return $fila;
  }

  $stmt = $pdo->prepare(
    "SELECT cedula, nombre_completo, cargo, direccion, foto
     FROM trabajadores WHERE cedula = :cedula LIMIT 1"
  );
  $stmt->execute([':cedula' => $cedula]);
  return $stmt->fetch();
}