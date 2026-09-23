<?php
/* ==================================================================
   WIDGET DE INSTAGRAM (opcional, sin API Graph)
   ------------------------------------------------------------------
   Si prefieres un widget de terceros (Elfsight Instagram Feed,
   LightWidget, Walls.io...), genera tu widget con el usuario
   @contraloriaplaza y pega el código que te entregue el servicio
   ABAJO, entre las marcas HTML, reemplazando el comentario.

   Se mostrará automáticamente cuando NO haya token IG_ACCESS_TOKEN
   configurado. Si dejas la zona vacía se usa el respaldo manual.
   ------------------------------------------------------------------ */

ob_start();
?>
<!-- Elfsight Instagram Feed | Untitled Instagram Feed -->
<script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-cb542f4e-89fc-4e2e-97b0-85e23256cfec" data-elfsight-app-lazy></div>
<?php
$widget_instagram_html = trim(ob_get_clean());
if (strpos($widget_instagram_html, 'PEGA AQUI EL CODIGO') !== false) {
  $widget_instagram_html = '';
}