<?php
/* ============================================================
   Posts de Instagram de la cuenta oficial @contraloriaplaza
   Fuente: Instagram Graph API (oficial de Meta)
   Variables de entorno:
     IG_ACCESS_TOKEN : token de larga duración de la cuenta.
     IG_USER_ID      : id numérico de la cuenta (opcional; si
                       no se define se resuelve con /me y se
                       guarda dentro del caché).
   Sin token configurado la función retorna array vacío y las
   páginas muestran los códigos manuales de siempre.
   Resultado en caché para no sobrecargar la API.
   ============================================================ */

function postsInstagram($max = 10) {
  $token = getenv('IG_ACCESS_TOKEN');
  if ($token === false || $token === '') return array();

  $cache = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'instagram_cache.json';
  $ttl   = 1800; // 30 minutos

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
    $usuario = getenv('IG_USER_ID');
    if ($usuario === false || $usuario === '') {
      $usuario = is_array($datos) && isset($datos['uid']) ? $datos['uid'] : '';
    }
    if ($usuario === '') {
      $resp = @file_get_contents('https://graph.instagram.com/me?fields=id&access_token=' . urlencode($token));
      $dec  = json_decode((string)$resp, true);
      if (is_array($dec) && isset($dec['id'])) $usuario = $dec['id'];
    }

    $nuevos = array();
    if ($usuario !== '') {
      $url = 'https://graph.instagram.com/' . urlencode($usuario)
           . '/media?fields=caption,media_url,permalink,thumbnail_url,timestamp&limit=' . max($max, 10)
           . '&access_token=' . urlencode($token);
      $json = @file_get_contents($url);
      $dec  = json_decode((string)$json, true);
      if (is_array($dec) && !empty($dec['data'])) {
        foreach ($dec['data'] as $m) {
          if (!isset($m['permalink'])) continue;
          $permalink = rtrim($m['permalink'], '/');
          $codigo = preg_match('#/(?:p|reel)/([^/]+)$#', $permalink, $m2) ? $m2[1] : '';
          if ($codigo === '') continue;
          $nuevos[] = array(
            'permalink' => $permalink . '/',
            'shortcode' => $codigo,
            'caption'   => isset($m['caption']) ? $m['caption'] : '',
            'img'       => isset($m['thumbnail_url']) ? $m['thumbnail_url'] : (isset($m['media_url']) ? $m['media_url'] : ''),
            'fecha'     => isset($m['timestamp']) ? substr($m['timestamp'], 0, 10) : ''
          );
          if (count($nuevos) >= $max) break;
        }
      }
    }

    $actuales = is_array($datos) ? $datos['items'] : array();
    if (!empty($nuevos) && count($nuevos) >= count($actuales)) {
      $datos = array('fecha' => time(), 'uid' => $usuario, 'items' => $nuevos);
      @file_put_contents($cache, json_encode($datos));
    } elseif (is_array($datos)) {
      /* La API falló o respondió con menos posts: conserva el caché. */
      $datos['fecha'] = time();
      unset($datos['caducado']);
      @file_put_contents($cache, json_encode($datos));
    }
  }

  if (!is_array($datos) || empty($datos['items'])) return array();
  return array_slice($datos['items'], 0, $max);
}