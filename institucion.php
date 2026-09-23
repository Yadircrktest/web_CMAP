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
            Promover la eficiencia, eficacia y efectividad de la Gestión Pública del Municipio
            Ambrosio Plaza del Estado Bolivariano de Miranda, a través de actuaciones fiscales,
            como lo son: auditorías, asesorías, dictámenes, estudios organizativos, estadísticos
            y financieros, análisis e investigaciones de cualquier naturaleza, e incentivar la
            participación ciudadana, con el propósito de ejercer el control del Patrimonio
            Municipal, a fin de promover su correcta y transparente administración, la rendición
            de cuentas, así como el eficiente manejo de los recursos.
          </p>
        </div>
        <div class="bloque">
          <h3>Visión</h3>
          <p>
            Constituirse en el Órgano de Control Fiscal Municipal modelo y de referencia estadal
            y nacional, en la fiscalización, vigilancia y control de los recursos públicos,
            actuando bajo los principios de ética, honestidad y transparencia, teniendo como
            norte la legalidad y solvencia moral en el ejercicio de las funciones conferidas
            por Ley.
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
          La Contraloría del Municipio Ambrosio Plaza fue creada el 26 de noviembre de 1975 como
          Contraloría General del Concejo Municipal del Distrito Plaza del Estado Miranda, según
          su Ordenanza de creación, la cual fue publicada en la Gaceta Municipal extraordinaria de
          fecha 26/11/1975, y modificada según publicación en la Gaceta Municipal N° 98-045 de
          fecha 23/06/1998.
        </p>
        <p>
          Nace con la finalidad de promover la eficiencia, eficacia y efectividad de la gestión
          pública de los órganos y entes sujetos a su control en el Municipio Ambrosio Plaza del
          Estado Bolivariano de Miranda, procurando una sana gestión administrativa sujeta al
          cumplimiento de las disposiciones constitucionales, legales y sublegales; colaborando
          con la lucha contra la corrupción e impunidad y, con ello, mejorar la calidad de vida
          de los habitantes del Municipio.
        </p>
      </div>
    </div>
  </section>

  <!-- Estructura Organizativa -->
  <section class="seccion subseccion" id="estructura">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Estructura Organizativa</h2>
      <div class="marco-imagen">
        <img src="assets/img/estructura_organizativa.jpg" alt="Estructura organizativa de la Contraloría del Municipio Ambrosio Plaza">
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>