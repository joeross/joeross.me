<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo (WPLANG != null) ? WPLANG : "en_En"; ?>/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
$f = $_SERVER;
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$width = intval(get_theme_mod('gf_comment_use_facebook_width', 470));
if ($width == 0) {
    $width = 470;
}
?>
<div class="fb-comments" data-href="<?php echo $url; ?>" data-width="<?php echo $width ?>"></div>