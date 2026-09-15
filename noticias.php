<?php
$activePage = 'noticias';
$tituloPagina = 'Noticias';
include 'includes/header.php';

/* ============================================================
   PUBLICACIONES DE INSTAGRAM DEL MUNICIPIO
   --------------------------------------------
   Sustituye cada valor por el código corto de la publicación.
   Para https://www.instagram.com/p/abcd1234XY/  ->  'abcd1234XY'
   ============================================================ */
$publicacionesInstagram = array(
  'PON_AQUI_CODIGO_1',
  'PON_AQUI_CODIGO_2',
  'PON_AQUI_CODIGO_3',
  'PON_AQUI_CODIGO_4',
  'PON_AQUI_CODIGO_5',
  'PON_AQUI_CODIGO_6',
  'PON_AQUI_CODIGO_7',
  'PON_AQUI_CODIGO_8',
  'PON_AQUI_CODIGO_9',
  'PON_AQUI_CODIGO_10'
);
?>

<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / Noticias</p>
      <h1>Noticias</h1>
      <p>Información y novedades de la gestión contralora del municipio.</p>
    </div>
  </section>

  <section class="seccion">
    <div class="contenedor">
      <div class="grid-noticias">

        <article class="tarjeta-noticia">
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              10 de septiembre de 2026
            </span>
            <h3><a href="#">Contraloría capacita a los consejos comunales en contraloría social y gobernanza participativa</a></h3>
            <p class="extracto">Jornadas de formación dirigidas al Poder Popular para fortalecer la participación ciudadana en la vigilancia de los recursos públicos.</p>
            <a class="leer-mas" href="#">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

        <article class="tarjeta-noticia">
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              3 de septiembre de 2026
            </span>
            <h3><a href="#">La OAC inicia programa de contraloría ambiental con seguimiento preventivo en la comunidad</a></h3>
            <p class="extracto">La Oficina de Atención al Ciudadano activa mecanismos de participación vecinal para proteger los espacios públicos del municipio.</p>
            <a class="leer-mas" href="#">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

        <article class="tarjeta-noticia">
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              28 de agosto de 2026
            </span>
            <h3><a href="#">Jornada de atención al ciudadano acerca la Contraloría a las comunidades del municipio</a></h3>
            <p class="extracto">Equipos de la OAC atienden denuncias y solicitudes directamente en las calles de Ambrosio Plaza.</p>
            <a class="leer-mas" href="#">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

        <article class="tarjeta-noticia">
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              20 de agosto de 2026
            </span>
            <h3><a href="#">La Contraloría y la Cámara Municipal firman convenio de cooperación para fortalecer el control fiscal</a></h3>
            <p class="extracto">El acuerdo busca impulsar la transparencia, la rendición de cuentas y la formación del personal municipal.</p>
            <a class="leer-mas" href="#">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

        <article class="tarjeta-noticia">
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              12 de agosto de 2026
            </span>
            <h3><a href="#">Taller de declaración jurada de patrimonio para funcionarios municipales</a></h3>
            <p class="extracto">Capacitación obligatoria para los funcionarios sujetos a la presentación de la declaración jurada de patrimonio.</p>
            <a class="leer-mas" href="#">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

        <article class="tarjeta-noticia">
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              5 de agosto de 2026
            </span>
            <h3><a href="#">Balance del primer semestre: 120 actuaciones de control realizadas por la Contraloría</a></h3>
            <p class="extracto">La gestión contralora refuerza la supervisión de los órganos y entes de la administración municipal.</p>
            <a class="leer-mas" href="#">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

      </div>

      <div class="centrar">
        <a class="btn btn-contorno-azul" href="#">Cargar más noticias</a>
      </div>
    </div>
  </section>

  <!-- Instagram del municipio -->
  <section class="seccion seccion-gris">
    <div class="contenedor">
      <div class="header-insta">
        <div>
          <h2 class="subseccion-titulo">Síguenos en Instagram</h2>
          <p>Publicaciones destacadas de <strong>@contraloriaplaza</strong>.</p>
        </div>
        <a class="btn btn-primario" href="https://www.instagram.com/contraloriaplaza" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><path d="M17.5 6.5h.01"/></svg>
          Seguir en Instagram
        </a>
      </div>

      <div class="grid-instagram">
        <?php foreach ($publicacionesInstagram as $codigo): ?>
        <figure class="insta-tarjeta">
          <div class="insta-cabecera">
            <span class="insta-avatar" aria-hidden="true">
              <span class="insta-avatar-interior">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><path d="M17.5 6.5h.01"/></svg>
              </span>
            </span>
            <span class="insta-usuario">
              <strong>@contraloriaplaza
                <svg class="insta-verificado" viewBox="0 0 24 24" aria-label="Cuenta verificada">
                  <defs><linearGradient id="igBadge" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#5851DB"/><stop offset="1" stop-color="#C13584"/></linearGradient></defs>
                  <circle cx="12" cy="12" r="11" fill="url(#igBadge)"/>
                  <path d="m7.5 12.5 3 3 6-7" stroke="#fff" stroke-width="2.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </strong>
              <small>Contraloría Municipal</small>
            </span>
            <svg class="insta-camara" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><path d="M17.5 6.5h.01"/></svg>
          </div>
          <div class="insta-marco">
            <iframe src="https://www.instagram.com/p/<?php echo $codigo; ?>/embed/" title="Publicación del municipio en Instagram" loading="lazy"></iframe>
          </div>
          <figcaption class="insta-pie">
            <a href="https://www.instagram.com/p/<?php echo $codigo; ?>" target="_blank" rel="noopener">
              Ver publicación en Instagram
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6"/><path d="m10 14 11-11"/></svg>
            </a>
          </figcaption>
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>