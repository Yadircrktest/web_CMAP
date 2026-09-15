<?php
$activePage = 'faq';
$tituloPagina = 'Preguntas Frecuentes';
include 'includes/header.php';
?>

<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / Preguntas Frecuentes</p>
      <h1>Preguntas Frecuentes</h1>
      <p>Respuestas a las dudas más comunes sobre la Contraloría Municipal y sus trámites.</p>
    </div>
  </section>

  <section class="seccion">
    <div class="contenedor" style="max-width:840px;">
      <div class="acordeon" id="acordeonPreguntas">

        <div class="acordeon-item abierto">
          <button class="acordeon-titulo" type="button" aria-expanded="true">
            ¿Qué es la Contraloría Municipal?
            <span class="icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </button>
          <div class="acordeon-contenido" style="max-height:200px;">
            <div class="acordeon-contenido-inner">
              La Contraloría Municipal es el órgano de control fiscal del municipio responsable de
              vigilar y fiscalizar el uso de los recursos públicos. Su labor busca garantizar una
              gestión transparente, honesta y eficiente por parte de las autoridades municipales.
            </div>
          </div>
        </div>

        <div class="acordeon-item">
          <button class="acordeon-titulo" type="button" aria-expanded="false">
            ¿Cómo puedo presentar una denuncia?
            <span class="icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </button>
          <div class="acordeon-contenido">
            <div class="acordeon-contenido-inner">
              Puedes presentar tu denuncia de forma presencial en la Oficina de Atención al
              Ciudadano (OAC), por teléfono, o por escrito al correo
              <a href="mailto:oac@contraloriaambrosioplaza.gob.ve">oac@contraloriaambrosioplaza.gob.ve</a>.
              Consulta la sección <a href="oac.php#como-denunciar">¿Cómo denunciar?</a> para más detalles.
            </div>
          </div>
        </div>

        <div class="acordeon-item">
          <button class="acordeon-titulo" type="button" aria-expanded="false">
            ¿Mi denuncia es confidencial?
            <span class="icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </button>
          <div class="acordeon-contenido">
            <div class="acordeon-contenido-inner">
              Sí. Todas las denuncias son tratadas con estricta confidencialidad y con la debida
              reserva, de conformidad con la normativa vigente. Si lo prefieres, también puedes
              presentar una denuncia anónima.
            </div>
          </div>
        </div>

        <div class="acordeon-item">
          <button class="acordeon-titulo" type="button" aria-expanded="false">
            ¿Cuáles son los horarios de atención al público?
            <span class="icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </button>
          <div class="acordeon-contenido">
            <div class="acordeon-contenido-inner">
              La atención al público es de lunes a viernes, de 8:00 am a 3:00 pm, en nuestras
              oficinas ubicadas en la sede municipal. En época de asueto podrían aplicarse horarios
              especiales.
            </div>
          </div>
        </div>

        <div class="acordeon-item">
          <button class="acordeon-titulo" type="button" aria-expanded="false">
            ¿Dónde puedo consultar los informes de gestión?
            <span class="icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </button>
          <div class="acordeon-contenido">
            <div class="acordeon-contenido-inner">
              Los informes de gestión, la ejecución presupuestaria y las actuaciones fiscales están
              disponibles en la sección <a href="informes.php">Informes</a> de este sitio web.
            </div>
          </div>
        </div>

        <div class="acordeon-item">
          <button class="acordeon-titulo" type="button" aria-expanded="false">
            ¿Qué requisitos se necesitan para solicitar información a la Contraloría?
            <span class="icono">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </button>
          <div class="acordeon-contenido">
            <div class="acordeon-contenido-inner">
              Para solicitar información puedes escribirnos a
              <a href="mailto:contacto@contraloriaambrosioplaza.gob.ve">contacto@contraloriaambrosioplaza.gob.ve</a>
              identificando tu nombre, cédula de identidad y el objeto de tu solicitud. Las
              solicitudes deben ajustarse a lo dispuesto en la Ley sobre el Derecho de Petición
              y a las normas de acceso a la información pública.
            </div>
          </div>
        </div>

      </div>

      <div class="centrar">
        <a class="btn btn-primario" href="contactanos.php">¿Tienes otra pregunta? Contáctanos</a>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>