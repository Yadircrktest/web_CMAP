<?php
require_once 'includes/db_conexion.php';
$activePage = 'inicio';
$tituloPagina = 'Carnet Institucional';
$cedula = isset($_GET['cedula']) ? trim($_GET['cedula']) : '';

function mimeDeFoto($bin) {
  if ($bin !== null && substr(bin2hex(substr($bin, 0, 3)), 0, 4) === 'ffd8') return 'image/jpeg';
  return 'image/png';
}

include 'includes/header.php';
?>

<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / Carnet Institucional</p>
      <h1>Carnet Institucional</h1>
      <p>Identificación del personal de la Contraloría del Municipio Ambrosio Plaza.</p>
    </div>
  </section>

  <section class="seccion subseccion">
    <div class="contenedor pagina-carnet">

      <?php if ($cedula !== '' && !preg_match('/^[0-9.\-\s]{4,20}$/', $cedula)): ?>
        <p class="aviso-formulario error">El número de cédula ingresado no es válido.</p>

      <?php elseif ($cedula !== ''): ?>
        <?php
          $pdo = conectarBD();
          if ($pdo === null) {
            echo '<p class="aviso-formulario error">No fue posible conectar a la base de datos. Inténtalo más tarde.</p>';
          } else {
            $stmt = $pdo->prepare('SELECT cedula, nombre_completo, cargo, direccion, foto FROM trabajadores WHERE cedula = :cedula LIMIT 1');
            $stmt->execute([':cedula' => $cedula]);
            $trabajador = $stmt->fetch();
          }
        ?>

        <?php if ($pdo !== null && $trabajador === false): ?>
          <p class="aviso-formulario error">No se encontró un carnet con la cédula <strong><?php echo htmlspecialchars($cedula); ?></strong>.</p>

        <?php elseif ($pdo !== null): ?>
          <?php
            $nombre  = $trabajador['nombre_completo'];
            $cargo   = $trabajador['cargo'];
            $dir     = $trabajador['direccion'];
            $foto    = $trabajador['foto'];
            $mime    = mimeDeFoto($foto);
          ?>

          <div class="carnet-tarjeta">
            <div class="carnet-cabecera">
              <img src="assets/img/logo_edificio.png" alt="Logo de la Contraloría Municipal de Ambrosio Plaza">
              <div class="carnet-titulos">
                <span class="carnet-org">Contraloría General de la República Bolivariana de Venezuela</span>
                <strong>Contraloría del Municipio Ambrosio Plaza</strong>
              </div>
            </div>

            <div class="carnet-cuerpo">
              <div class="carnet-foto">
                <?php if ($foto): ?>
                  <img src="data:<?php echo $mime; ?>;base64,<?php echo base64_encode($foto); ?>" alt="Foto de <?php echo htmlspecialchars($nombre); ?>">
                <?php else: ?>
                  <div class="carnet-foto-vacia">Sin foto</div>
                <?php endif; ?>
              </div>

              <div class="carnet-datos">
                <div class="carnet-dato">
                  <span class="carnet-etiqueta">Cédula</span>
                  <span class="carnet-valor"><?php echo htmlspecialchars($cedula); ?></span>
                </div>
                <div class="carnet-dato">
                  <span class="carnet-etiqueta">Nombre</span>
                  <span class="carnet-valor"><?php echo htmlspecialchars($nombre); ?></span>
                </div>
                <div class="carnet-dato">
                  <span class="carnet-etiqueta">Cargo</span>
                  <span class="carnet-valor"><?php echo htmlspecialchars($cargo); ?></span>
                </div>
                <div class="carnet-dato">
                  <span class="carnet-etiqueta">Dirección</span>
                  <span class="carnet-valor"><?php echo htmlspecialchars($dir); ?></span>
                </div>
              </div>
            </div>

            <div class="carnet-importante">
              <strong>Importante</strong>
              <p>
                <strong><?php echo htmlspecialchars($nombre); ?></strong> forma parte de la institución
                Contraloría del Municipio Ambrosio Plaza, actualmente se desempeña en la
                <strong>Contraloría del Municipio Ambrosio Plaza</strong>. Se agradece a todas las
                autoridades militares, policiales, civiles y funcionarios de los distintos niveles de
                gobierno (nacional, estadal y municipal) que presten toda la ayuda y colaboración que
                puedan brindar al titular de este carnet.
              </p>
            </div>
          </div>
        <?php endif; ?>

      <?php else: ?>
        <div class="carnet-buscar">
          <h3>Buscar carnet</h3>
          <p>Ingresa el número de cédula del trabajador para ver su identificación.</p>
          <form method="get" action="carnet.php" class="carnet-form">
            <input type="text" name="cedula" placeholder="Ej.: 31.887.945" required>
            <button type="submit" class="btn btn-primario">Ver carnet</button>
          </form>
        </div>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>