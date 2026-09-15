<?php
$activePage = 'institucion';
$tituloPagina = 'Institución';
include 'includes/header.php';
?>

<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / Institución</p>
      <h1>Institución</h1>
      <p>Conoce la misión, la visión, la historia y la estructura organizativa de la Contraloría Municipal de Ambrosio Plaza.</p>
    </div>
  </section>

  <!-- Misión y Visión -->
  <section class="seccion subseccion" id="mision">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Misión y Visión</h2>
      <div class="dos-columnas">
        <div class="bloque">
          <h3>Misión</h3>
          <p>
            Ejercer el control, la vigilancia y la fiscalización de los recursos públicos del
            Municipio Ambrosio Plaza, con transparencia, oportunidad y eficiencia, contribuyendo
            al mejoramiento de la gestión municipal y al buen uso del patrimonio colectivo.
          </p>
        </div>
        <div class="bloque">
          <h3>Visión</h3>
          <p>
            Ser un órgano de control fiscal moderno, confiable y cercano a la comunidad,
            reconocido por su independencia, ética y compromiso social, que impulse una
            cultura de transparencia y rendición de cuentas en la administración pública municipal.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Reseña Histórica -->
  <section class="seccion seccion-gris subseccion" id="resena">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Reseña Histórica</h2>
      <div class="bloque">
        <p>
          La Contraloría Municipal de Ambrosio Plaza ejerce sus funciones en el marco de lo
          establecido en la Constitución de la República Bolivariana de Venezuela, la Ley
          Orgánica de la Contraloría General de la República y el Sistema Nacional de Control Fiscal.
        </p>
        <p>
          Como órgano de control fiscal del municipio, su creación responde a la necesidad de
          garantizar que los recursos públicos provenientes de la recaudación municipal y de las
          transferencias del Poder Nacional y Estadal sean administrados con honestidad, eficiencia
          y transparencia.
        </p>
        <p>
          A lo largo de los años, la Contraloría ha acompañado al municipio en la modernización de
          sus procesos administrativos, fortaleciendo la cultura de rendición de cuentas y la
          participación de la ciudadanía en la vigilancia de la gestión pública.
        </p>
      </div>
    </div>
  </section>

  <!-- Estructura Organizativa -->
  <section class="seccion subseccion" id="estructura">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Estructura Organizativa</h2>
      <div class="organigrama">
        <div class="caja-org">
          Contraloría Municipal<br>
          <small>Contralor(a) Municipal</small>
        </div>
        <div class="rama"></div>
        <div class="nivel">
          <div class="caja">
            <strong>Despacho del Contralor</strong>
            <small>Dirección general</small>
          </div>
          <div class="caja">
            <strong>Dirección de Control Fiscal</strong>
            <small>Actuaciones y fiscalización</small>
          </div>
          <div class="caja">
            <strong>Dirección de Control Administrativo y Financiero</strong>
            <small>Gestión interna</small>
          </div>
        </div>
        <div class="nivel">
          <div class="caja">
            <strong>Oficina de Atención al Ciudadano (OAC)</strong>
            <small>Denuncias y participación</small>
          </div>
          <div class="caja">
            <strong>Dirección de Consultoría Jurídica</strong>
            <small>Asesoría legal</small>
          </div>
          <div class="caja">
            <strong>Dirección de Recursos Humanos</strong>
            <small>Talento humano</small>
          </div>
        </div>
        <div class="nivel">
          <div class="caja">
            <strong>Dirección de Tecnología de la Información</strong>
            <small>Sistemas e infraestructura</small>
          </div>
          <div class="caja">
            <strong>Dirección de Comunicación y Relaciones Públicas</strong>
            <small>Información institucional</small>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>