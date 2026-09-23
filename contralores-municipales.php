<?php
$activePage = 'institucion';
$tituloPagina = 'Contralores (as) Municipales';
include 'includes/header.php';

$contralores = array(
  array('nombre' => 'Felipe Hurtado Peña',        'periodo' => '2026 – Actual',      'foto' => 'pena.png'),
  array('nombre' => 'Xiomara Hung Fong',          'periodo' => '2017 – 2026',        'foto' => 'Xiomara-Hung.png'),
  array('nombre' => 'Asdrúbal Peinado',           'periodo' => '2010 – 2017',        'foto' => 'Asdrúbal-Peinado.png'),
  array('nombre' => 'Rubén Paredes',              'periodo' => '2009 – 2010',        'foto' => 'Ruben-Paredes.png'),
  array('nombre' => 'Jesús Tovar',                'periodo' => '2008 – 2009',        'foto' => 'Jesús-Tovar.png'),
  array('nombre' => 'William Balza',              'periodo' => '2002 – 2008',        'foto' => 'cuadro.png'),
  array('nombre' => 'Arquímedes Sánchez',         'periodo' => '2000 – 2002',        'foto' => 'Arquimides-Sanchez.png'),
  array('nombre' => 'Francisco Tachón',           'periodo' => '2000 – 2000',        'foto' => 'Francisco-Tachón.png'),
  array('nombre' => 'Luis Salazar',               'periodo' => '2000 – 2000',        'foto' => 'Luis-Salazar.png'),
  array('nombre' => 'Sinforozo Fajardo',          'periodo' => '1995 – 2000',        'foto' => 'cuadro.png'),
  array('nombre' => 'Renee Carballo',             'periodo' => '1990 – 1995',        'foto' => 'cuadro.png'),
  array('nombre' => 'Alberto Rosales',            'periodo' => '1989 – 1990',        'foto' => 'Alberto-Rosales.png'),
  array('nombre' => 'José Luis García',           'periodo' => '1987 – 1989',        'foto' => 'cuadro.png'),
  array('nombre' => 'David Silva',                'periodo' => '1979 – 1984',        'foto' => 'cuadro.png'),
  array('nombre' => 'Dagoberto Vahamonte',        'periodo' => '1975 – 1979',        'foto' => 'Dagoberto-Vahamonte.png')
);
?>
<main id="contenido">
  <section class="encabezado-pagina">
    <div class="contenedor">
      <p class="migaja"><a href="index.php">Inicio</a> / <a href="institucion.php">Institución</a> / Contralores (as) Municipales</p>
      <h1>Contralores (as) Municipales</h1>
      <p>Quienes han ejercido la titularidad de la Contraloría del Municipio Ambrosio Plaza a lo largo de su historia.</p>
    </div>
  </section>

  <section class="seccion subseccion" id="contralores">
    <div class="contenedor">
      <h2 class="subseccion-titulo">Contraloras y Contralores del Municipio Ambrosio Plaza</h2>
      <p style="margin-bottom:24px;">Relación histórica de las contraloras y contralores municipales, con el período de su gestión.</p>

      <div class="carrusel-contralores" id="carruselContralores">
        <div class="carrusel-visor">
          <div class="carrusel-pista">
            <?php foreach ($contralores as $c): ?>
            <article class="tarjeta-noticia carrusel-item">
              <div class="media-foto">
                <img src="assets/img/contralores/<?php echo htmlspecialchars($c['foto']); ?>" alt="Foto del o la contralor(a) municipal <?php echo htmlspecialchars($c['nombre']); ?>" loading="lazy">
              </div>
              <div class="noticia-cuerpo">
                <span class="noticia-fecha">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>
                  <?php echo htmlspecialchars($c['periodo']); ?>
                </span>
                <h3><?php echo htmlspecialchars($c['nombre']); ?></h3>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
        </div>
        <button class="carrusel-flecha carrusel-prev" id="carruselAnterior" type="button" aria-label="Anterior">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <button class="carrusel-flecha carrusel-next" id="carruselSiguiente" type="button" aria-label="Siguiente">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
        <div class="carrusel-puntos" id="carruselPuntos" aria-label="Seleccionar página del carrusel"></div>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>