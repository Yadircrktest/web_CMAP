<?php
/* Conexión a la base de datos (PDO / MySQL)
   Valores por defecto para desarrollo local (XAMPP).
   En el servidor se pueden sobrescribir con variables de entorno:
   DB_HOST, DB_NAME, DB_USER y DB_PASS. */

function conectarBD() {
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
    error_log('DB CMAP: ' . $e->getMessage());
    return null;
  }
}