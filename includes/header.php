<?php
/* Variables opcionales definidas en cada página antes de incluir este archivo: */
$activePage   = isset($activePage) ? $activePage : '';
$tituloPagina = isset($tituloPagina) ? $tituloPagina : '';
$inicio       = $activePage === 'inicio';
$institucion  = $activePage === 'institucion';
$informes     = $activePage === 'informes';
$oac          = $activePage === 'oac';
$noticias     = $activePage === 'noticias';
$faq          = $activePage === 'faq';
$contacto     = $activePage === 'contacto';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $tituloPagina !== '' ? htmlspecialchars($tituloPagina) . ' · ' : ''; ?>Contraloría Municipal de Ambrosio Plaza</title>
  <meta name="description" content="Sitio oficial de la Contraloría Municipal de Ambrosio Plaza. Transparencia y control fiscal al servicio del ciudadano.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <a class="saltar-contenido" href="#contenido">Saltar al contenido</a>

  <!-- Cabecera y navegación -->
  <header class="cabecera">
    <div class="contenedor cabecera-inner">
      <div class="marca">
        <a class="marca-enlace" href="index.php" aria-label="Ir al inicio">
          <span class="marca-logo">
            <img src="assets/img/logo_edificio.png" alt="Espacio reservado para el logo institucional">
          </span>
          <span class="marca-texto">
            <strong>Contraloría Municipal</strong>
            <small>Municipio Ambrosio Plaza</small>
          </span>
        </a>
      </div>

      <button class="nav-toggle" id="navToggle" type="button" aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="navMenu">
        <span></span><span></span><span></span>
      </button>

      <nav class="nav-menu" id="navMenu" aria-label="Navegación principal">
        <ul class="nav-lista">
          <li class="nav-item<?php echo $inicio ? ' activo' : ''; ?>">
            <a href="index.php">Inicio</a>
          </li>
          <li class="nav-item nav-item-desplegable<?php echo $institucion ? ' activo' : ''; ?>">
            <a href="institucion.php">Institución
              <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </a>
            <ul class="submenu">
              <li><a href="institucion.php#mision">Misión y Visión</a></li>
              <li><a href="institucion.php#resena">Reseña Histórica</a></li>
              <li><a href="institucion.php#estructura">Estructura Organizativa</a></li>
            </ul>
          </li>
          <li class="nav-item nav-item-desplegable<?php echo $informes ? ' activo' : ''; ?>">
            <a href="informes.php">Informes
              <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </a>
            <ul class="submenu">
              <li><a href="informes.php#gestion">Informes de Gestión</a></li>
              <li><a href="informes.php#presupuestaria">Ejecución Presupuestaria</a></li>
              <li><a href="informes.php#actuaciones">Actuaciones Fiscales</a></li>
            </ul>
          </li>
          <li class="nav-item nav-item-desplegable<?php echo $oac ? ' activo' : ''; ?>">
            <a href="oac.php">OAC
              <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </a>
            <ul class="submenu">
              <li><a href="oac.php#que-es">¿Qué es la OAC?</a></li>
              <li><a href="oac.php#como-denunciar">¿Cómo denunciar?</a></li>
              <li><a href="oac.php#contacto-oac">Contacto OAC</a></li>
            </ul>
          </li>
          <li class="nav-item<?php echo $noticias ? ' activo' : ''; ?>">
            <a href="noticias.php">Noticias</a>
          </li>
          <li class="nav-item<?php echo $faq ? ' activo' : ''; ?>">
            <a href="preguntas-frecuentes.php">Preguntas Frecuentes</a>
          </li>
          <li class="nav-item<?php echo $contacto ? ' activo' : ''; ?>">
            <a href="contactanos.php">Contáctanos</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>