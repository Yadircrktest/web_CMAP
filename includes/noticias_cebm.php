<?php
/* ============================================================
   Noticias de la Contraloría del estado Bolivariano de Miranda
   Fuente: feed RSS oficial https://www.cebm.gob.ve/feed/
   Se consulta el feed, se extraen las últimas noticias
   (fecha, título, enlace e imagen) y se guardan en caché.
   Depende de formatoFechaES() definido en noticias_cgr.php.
   ============================================================ */

function noticiasCEBM($max = 5) {
  $cache = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'noticias_cebm_cache.json';
  $ttl   = 3600; // 1 hora

  $datos = null;
  if (is_file($cache)) {
    $decodificado = json_decode((string)@file_get_contents($cache), true);
    if (is_array($decodificado) && isset($decodificado['fecha'], $decodificado['items'])) {
      $datos = $decodificado;
      if (time() - (int)$decodificado['fecha'] >= $ttl) $datos['caducado'] = true;
    }
  }

  if (!is_array($datos) || !empty($datos['caducado'])) {
    $xml = @file_get_contents('https://www.cebm.gob.ve/feed/');
    if ($xml !== false) {
      $doc = new DOMDocument();
      if (@$doc->loadXML($xml)) {
        $x = new DOMXPath($doc);
        $x->registerNamespace('content', 'http://purl.org/rss/1.0/modules/content/');
        $nuevos = array();
        foreach ($x->query('//item') as $it) {
          if (count($nuevos) >= $max) break;

          $nodo = $it->getElementsByTagName('title')->item(0);
          $titulo = $nodo ? trim($nodo->textContent) : '';
          $nodo = $it->getElementsByTagName('link')->item(0);
          $link = $nodo ? trim($nodo->textContent) : '';
          $nodo = $it->getElementsByTagName('pubDate')->item(0);
          $fechaPub = $nodo ? trim($nodo->textContent) : '';

          $img = '';
          $estEncoded = $x->query('content:encoded', $it);
          $html = $estEncoded->length ? $estEncoded->item(0)->textContent : '';
          if (preg_match('#<img[^>]+src=["\']([^"\']+)["\']#i', $html, $m)) $img = $m[1];
          if ($img === '') {
            $nodo = $it->getElementsByTagName('description')->item(0);
            $desc = $nodo ? $nodo->textContent : '';
            if (preg_match('#<img[^>]+src=["\']([^"\']+)["\']#i', $desc, $m)) $img = $m[1];
          }

          $nuevos[] = array(
            'fecha' => $fechaPub !== '' ? date('Y-m-d', strtotime($fechaPub)) : '',
            'titulo' => $titulo,
            'url'   => $link,
            'img'   => $img
          );
        }
        if (!empty($nuevos)) {
          $datos = array('fecha' => time(), 'items' => $nuevos);
          @file_put_contents($cache, json_encode($datos));
        }
      }
    }
  }

  if (!is_array($datos) || empty($datos['items'])) return array();
  return array_slice($datos['items'], 0, $max);
}