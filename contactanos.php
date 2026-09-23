<?php
$activePage = 'contacto';
$tituloPagina = 'Contáctanos';
include 'includes/header.php';
?>

<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / Contáctanos</p>
      <h1>Contáctanos</h1>
      <p>Estamos a tu disposición. Escríbenos, llámanos o visítanos.</p>
    </div>
  </section>

  <section class="seccion">
    <div class="contenedor">
      <div class="grid-contacto">

        <div>
          <h3 style="font-family:var(--fuente-titulos); margin-bottom:16px;">Nuestra ubicación</h3>
          <div class="mapa-envuelve">
            <iframe
              src="https://www.google.com/maps?q=Contralor%C3%ADa+del+Municipio+Ambrosio+Plaza+Guarenas&z=16&hl=es&output=embed"
              title="Mapa – Contraloría del Municipio Ambrosio Plaza"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
            <a class="btn btn-contorno-azul" href="https://maps.app.goo.gl/58WaGXEpKRqzNcqN6" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
              Abrir en Google Maps
            </a>
          </div>
        </div>

        <div>
          <div class="bloque" style="margin-bottom:24px;">
            <h3>Datos de contacto</h3>
            <ul class="lista-contacto">
              <li>
                <span class="icono">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                </span>
                <div>
                  <strong>Oficina</strong>
                  <p>Urb. Manuel Martínez «Trapichito», Sector 2, Centro Comercial Nueva Guarenas, Piso 3, Oficina D-13, Guarenas, Edo. B. de Miranda</p>
                  <span class="nota">Plus code: F99W+8G · CP 1220</span>
                </div>
              </li>
              <li>
                <span class="icono">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </span>
                <div>
                  <strong>Teléfonos</strong>
                  <p><a href="tel:+582123651002">0212-365.10.02</a></p>
                </div>
              </li>
              <li>
                <span class="icono">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </span>
                <div>
                  <strong>Correo electrónico</strong>
                  <p><a href="mailto:contraloriamunicipioplaza@gmail.com">contraloriamunicipioplaza@gmail.com</a></p>
                </div>
              </li>
              <li>
                <span class="icono">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                </span>
                <div>
                  <strong>Horario de atención (hasta nuevo aviso)</strong>
                  <p>Lun, Mie y Vie · 8:00 am a 12:00 pm</p>
                </div>
              </li>
            </ul>
          </div>

      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>