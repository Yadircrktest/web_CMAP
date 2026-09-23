<?php
$activePage = 'inicio';
$tituloPagina = 'Inicio';
include 'includes/header.php';
?>

<main id="contenido">

  <!-- Hero institucional -->
  <section class="hero">
    <div class="contenedor hero-inner">
      <span class="hero-eyebrow">República Bolivariana de Venezuela · Poder Público Municipal</span>
      <h1>Contraloría Municipal de Ambrosio Plaza</h1>
      <p class="hero-lema">
        Máximo órgano de control fiscal del Municipio Ambrosio Plaza, al servicio de
        una gestión pública transparente, honesta y eficiente.
      </p>
      <div class="hero-acciones">
        <a class="btn btn-blanco" href="institucion.php">
          Conoce la Institución
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a class="btn btn-contorno-blanco" href="contactanos.php">Contáctanos</a>
      </div>
    </div>
  </section>

  <!-- Accesos rápidos -->
  <section class="seccion">
    <div class="contenedor">
      <div class="titulo-seccion">
        <h2>Servicios y Secciones</h2>
        <p>Accede a los principales servicios y contenidos de la Contraloría Municipal.</p>
        <span class="linea"></span>
      </div>

      <div class="grid-accesos">

        <a class="tarjeta-acceso" href="institucion.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v16"/><path d="M16 9h3a2 2 0 0 1 2 2v10"/><path d="M9 7h2"/><path d="M9 11h2"/><path d="M9 15h2"/></svg>
          </span>
          <h3>Institución</h3>
          <p>Misión y visión, reseña histórica y estructura organizativa de la Contraloría.</p>
          <span class="enlace-mas">Ver más
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </span>
        </a>

        <a class="tarjeta-acceso" href="informes.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg>
          </span>
          <h3>Informes</h3>
          <p>Informes de gestión, ejecución presupuestaria y actuaciones fiscales.</p>
          <span class="enlace-mas">Ver más
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </span>
        </a>

        <a class="tarjeta-acceso" href="oac.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </span>
          <h3>OAC</h3>
          <p>Oficina de Atención al Ciudadano. Presenta tus denuncias y solicitudes.</p>
          <span class="enlace-mas">Ver más
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </span>
        </a>

        <a class="tarjeta-acceso" href="noticias.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8z"/></svg>
          </span>
          <h3>Noticias</h3>
          <p>Mantente informado sobre las actividades y la gestión de la Contraloría.</p>
          <span class="enlace-mas">Ver más
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </span>
        </a>

        <a class="tarjeta-acceso" href="contactanos.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          </span>
          <h3>Contáctanos</h3>
          <p>Escríbenos, llámanos o visítanos. Estamos para atenderte.</p>
          <span class="enlace-mas">Ver más
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </span>
        </a>

      </div>
    </div>
  </section>

  <!-- Noticias recientes -->
  <section class="seccion seccion-gris">
    <div class="contenedor">
      <div class="titulo-seccion">
        <h2>Noticias Recientes</h2>
        <p>Lo más reciente de la gestión contralora del municipio.</p>
        <span class="linea"></span>
      </div>

      <div class="grid-noticias">
        <?php require_once 'includes/noticias_cgr.php'; ?>
        <?php require_once 'includes/noticias_cebm.php'; ?>
        <?php $noticiaDestacada = noticiasCGR(1); ?>
        <?php if (!empty($noticiaDestacada)): ?>
        <?php $noticia = $noticiaDestacada[0]; ?>
        <article class="tarjeta-noticia">
          <?php if (!empty($noticia['img'])): ?>
          <div class="media-foto"><img src="<?php echo htmlspecialchars($noticia['img']); ?>" alt="<?php echo htmlspecialchars($noticia['titulo']); ?>" loading="lazy"></div>
          <?php else: ?>
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <?php endif; ?>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              <?php echo formatoFechaES($noticia['fecha']); ?>
            </span>
            <h3><a href="<?php echo htmlspecialchars($noticia['url']); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($noticia['titulo']); ?></a></h3>
            <p class="extracto">Noticia publicada por la Contraloría General de la República.</p>
            <a class="leer-mas" href="<?php echo htmlspecialchars($noticia['url']); ?>" target="_blank" rel="noopener">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>
        <?php else: ?>
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
            <h3><a href="noticias.php">Contraloría capacita a los consejos comunales en contraloría social y gobernanza participativa</a></h3>
            <p class="extracto">Jornadas de formación dirigidas al Poder Popular para fortalecer la participación ciudadana en la vigilancia de los recursos públicos.</p>
            <a class="leer-mas" href="noticias.php">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>
        <?php endif; ?>

        <?php $noticiaEstadal = noticiasCEBM(1); ?>
        <?php if (!empty($noticiaEstadal)): ?>
        <?php $noticia = $noticiaEstadal[0]; ?>
        <article class="tarjeta-noticia">
          <?php if (!empty($noticia['img'])): ?>
          <div class="media-foto"><img src="<?php echo htmlspecialchars($noticia['img']); ?>" alt="<?php echo htmlspecialchars($noticia['titulo']); ?>" loading="lazy"></div>
          <?php else: ?>
          <div class="media-placeholder">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
              Imagen de la noticia
            </span>
          </div>
          <?php endif; ?>
          <div class="noticia-cuerpo">
            <span class="noticia-fecha">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
              <?php echo formatoFechaES($noticia['fecha']); ?>
            </span>
            <h3><a href="<?php echo htmlspecialchars($noticia['url']); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($noticia['titulo']); ?></a></h3>
            <p class="extracto">Noticia publicada por la Contraloría del estado Bolivariano de Miranda.</p>
            <a class="leer-mas" href="<?php echo htmlspecialchars($noticia['url']); ?>" target="_blank" rel="noopener">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>
        <?php else: ?>
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
            <h3><a href="noticias.php">La OAC inicia programa de contraloría ambiental con seguimiento preventivo en la comunidad</a></h3>
            <p class="extracto">La Oficina de Atención al Ciudadano activa mecanismos de participación vecinal para proteger los espacios públicos del municipio.</p>
            <a class="leer-mas" href="noticias.php">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>
        <?php endif; ?>

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
            <h3><a href="noticias.php">Jornada de atención al ciudadano acerca la Contraloría a las comunidades del municipio</a></h3>
            <p class="extracto">Equipos de la OAC atienden denuncias y solicitudes directamente en las calles de Ambrosio Plaza.</p>
            <a class="leer-mas" href="noticias.php">Leer más
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
          </div>
        </article>

      </div>

      <div class="centrar">
        <a class="btn btn-contorno-azul" href="noticias.php">Ver todas las noticias</a>
      </div>
    </div>
  </section>

  <!-- Información de interés -->
  <section class="seccion">
    <div class="contenedor">
      <div class="titulo-seccion">
        <h2>Información de interés</h2>
        <p>Herramientas y normativas para la transparencia y el control fiscal.</p>
        <span class="linea"></span>
      </div>

      <div class="grid-enlaces">
        <a class="tarjeta-enlace" href="institucion.php#mision">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </span>
          <div>
            <h4>Base Normativa</h4>
            <p>Leyes, normas y reglamentos del Sistema Nacional de Control Fiscal.</p>
          </div>
        </a>

        <a class="tarjeta-enlace" href="oac.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          </span>
          <div>
            <h4>Denuncias</h4>
            <p>Presenta tu denuncia o solicitud ante la Oficina de Atención al Ciudadano.</p>
          </div>
        </a>

        <a class="tarjeta-enlace" href="informes.php">
          <span class="icono">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg>
          </span>
          <div>
            <h4>Informes de Gestión</h4>
            <p>Consulta los informes y la ejecución presupuestaria de la Contraloría.</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Instagram del municipio -->
  <section class="seccion seccion-gris">
    <div class="contenedor">
      <div class="header-insta">
        <div>
          <h2 class="subseccion-titulo">Síguenos en Instagram</h2>
          <p>Conoce la actualidad de la Contraloría en <strong>@contraloriaplaza</strong>.</p>
        </div>
        <a class="btn btn-primario" href="https://www.instagram.com/contraloriaplaza" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><path d="M17.5 6.5h.01"/></svg>
          Seguir en Instagram
        </a>
      </div>

      <div class="grid-instagram">
        <?php require_once 'includes/noticias_instagram.php'; ?>
        <?php
        $publicacionesInstagram = postsInstagram(3);
        if (empty($publicacionesInstagram)) {
          $publicacionesInstagram = array(
            array('permalink' => 'https://www.instagram.com/p/PON_AQUI_CODIGO_1', 'shortcode' => 'PON_AQUI_CODIGO_1'),
            array('permalink' => 'https://www.instagram.com/p/PON_AQUI_CODIGO_2', 'shortcode' => 'PON_AQUI_CODIGO_2'),
            array('permalink' => 'https://www.instagram.com/p/PON_AQUI_CODIGO_3', 'shortcode' => 'PON_AQUI_CODIGO_3'),
          );
        }
        foreach ($publicacionesInstagram as $publicacion): ?>
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
            <iframe src="https://www.instagram.com/p/<?php echo htmlspecialchars($publicacion['shortcode']); ?>/embed/" title="Publicación del municipio en Instagram" loading="lazy"></iframe>
          </div>
          <figcaption class="insta-pie">
            <a href="<?php echo htmlspecialchars($publicacion['permalink']); ?>" target="_blank" rel="noopener">
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