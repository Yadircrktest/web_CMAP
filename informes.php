<?php
$activePage = 'informes';
$tituloPagina = 'Informes';
include 'includes/header.php';
?>

<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / Informes</p>
      <h1>Informes</h1>
      <p>Consulta los informes de gestión, la ejecución presupuestaria y las actuaciones fiscales de la Contraloría Municipal.</p>
    </div>
  </section>

  <!-- Informes de Gestión -->
  <section class="seccion subseccion" id="gestion">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Informes de Gestión</h2>
      <p style="margin-bottom:24px;">Balance anual de la gestión contralora: objetivos alcanzados, actuaciones realizadas y resultados obtenidos.</p>
      <ul class="lista-documentos">
        <li>
          <div class="doc-info">
            <span class="doc-icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg>
            </span>
            <div>
              <strong>Informe de Gestión 2025</strong>
              <small>Contraloría Municipal de Ambrosio Plaza</small>
            </div>
          </div>
          <a class="doc-etiqueta" href="#" aria-label="Descargar Informe de Gestión 2025">Descargar PDF</a>
        </li>
        <li>
          <div class="doc-info">
            <span class="doc-icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg>
            </span>
            <div>
              <strong>Informe de Gestión 2024</strong>
              <small>Contraloría Municipal de Ambrosio Plaza</small>
            </div>
          </div>
          <a class="doc-etiqueta" href="#" aria-label="Descargar Informe de Gestión 2024">Descargar PDF</a>
        </li>
        <li>
          <div class="doc-info">
            <span class="doc-icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg>
            </span>
            <div>
              <strong>Informe de Gestión 2023</strong>
              <small>Contraloría Municipal de Ambrosio Plaza</small>
            </div>
          </div>
          <a class="doc-etiqueta" href="#" aria-label="Descargar Informe de Gestión 2023">Descargar PDF</a>
        </li>
      </ul>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>