<?php
/* ============================================================
   Noticias de la CGR (https://www.cgr.gob.ve/)
   Consulta la portada, extrae las últimas noticias (fecha,
   título, enlace e imagen) y guarda el resultado en caché
   para no sobrecargar el sitio de la CGR.
   El caché siempre guarda hasta 10 notas aunque la página
   pida menos (el index pide 1 y la página de noticias 5).
   ============================================================ */

function noticiasCGR($max = 5) {
  $cache  = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'noticias_cgr_cache.json';
  $ttl    = 1800; // 30 minutos

  $datos = null;
  if (is_file($cache)) {
    $decodificado = json_decode((string)@file_get_contents($cache), true);
    if (is_array($decodificado) && isset($decodificado['fecha'], $decodificado['items'])) {
      $datos = $decodificado;
      if (time() - (int)$decodificado['fecha'] >= $ttl) $datos['caducado'] = true;
    }
  }

  $requiereRefresco = !is_array($datos) || !empty($datos['caducado']);

  if ($requiereRefresco) {
    $limite = max($max, 10);
    $nuevos = array();

    $html = @file_get_contents('https://www.cgr.gob.ve/');
    if ($html !== false
        && preg_match_all('#<a href="(https://www\.cgr\.gob\.ve/noticias/noticia/\d+)"[^>]*>\s*([^<]*?)\s*&nbsp;\.&nbsp;\s*"(.*?)"\s*</a>#s', $html, $coincidencias, PREG_SET_ORDER)) {
      preg_match_all('#<img src="([^"]*noticias/imgNot_[^"]+\.jpg)"#s', $html, $imagenes);
      foreach ($coincidencias as $i => $n) {
        $img = isset($imagenes[1][$i]) ? 'https://www.cgr.gob.ve' . $imagenes[1][$i] : '';
        $nuevos[] = array(
          'fecha'  => trim($n[2]),
          'titulo' => trim($n[3]),
          'url'    => $n[1],
          'img'    => $img
        );
        if (count($nuevos) >= $limite) break;
      }
    }

    $actuales = is_array($datos) ? $datos['items'] : array();
    if (!empty($nuevos) && count($nuevos) >= count($actuales)) {
      $datos = array('fecha' => time(), 'items' => $nuevos);
      @file_put_contents($cache, json_encode($datos));
    } elseif (is_array($datos)) {
      /* La fuente respondió con menos noticias o falló: conserva el
         caché existente (más completo) y refresca el sello de tiempo. */
      $datos['fecha'] = time();
      unset($datos['caducado']);
      @file_put_contents($cache, json_encode($datos));
    }
  }

  if (!is_array($datos) || empty($datos['items'])) return array();
  return array_slice($datos['items'], 0, $max);
}

function formatoFechaES($fecha) {
  $partes = explode('-', (string)$fecha);
  if (count($partes) !== 3) return $fecha;
  $meses = array(1 => 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
                 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
  $dia = (int)$partes[2];
  $mes = (int)$partes[1];
  $anio = $partes[0];
  return $dia . ' de ' . ($meses[$mes] ?? $partes[1]) . ' de ' . $anio;
}