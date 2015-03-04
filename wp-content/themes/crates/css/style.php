<?php
	$accentcolor = get_option('accentcolor');
?>
<style type="text/css">


<?php if(get_option( 'accentcolor' )) { ?>

blockquote {

    border-left: 2px solid <?php echo get_option( 'accentcolor')?> !important ;
}
.footer a, article a, #post a, header a, footer a  {
	color:<?php echo get_option( 'accentcolor')?> ;
} 
select {
	border-left: 3px solid <?php echo get_option( 'accentcolor')?> !important ;
}
input#submit {
	background: <?php echo get_option( 'accentcolor')?> !important ;
}

p.thetags a:hover {
	border: 1px solid <?php echo get_option( 'accentcolor')?> !important ;
	box-shadow: inset 0 -65px 0 <?php echo get_option( 'accentcolor')?> !important ;
}
.blogpostinfo h2 a:hover {
	color:<?php echo get_option( 'accentcolor')?> !important;
}
li.comment ul.children li {
	border-left: 2px solid <?php echo get_option( 'accentcolor')?> !important ;
}
.comment-text .author {
	color:<?php echo get_option( 'accentcolor')?> !important ;
}
.widget li {
	border-left: 3px solid <?php echo get_option( 'accentcolor')?> !important ;
}
.wp-pagenavi span.current {
background: <?php echo get_option( 'accentcolor')?> !important ;
}

.post h2 a:hover {
	color:<?php echo get_option( 'accentcolor')?> !important; 
} 




a.home-icon-a {
	background-position:0 !important;
}
a.nav-toggle:hover {
	background-position:0 !important;
}
a.search-icon:hover {
	background-position: 0 !important;
}

<?php } ?>






<?php if(get_option( 'logotextcolor' )) { ?>

.logo a {
	color:<?php echo get_option( 'logotextcolor')?> !important;
}

<?php } ?>






<?php if(get_option( 'titlecolor' )) { ?>

.blogpage h1, .blogpage h2, .blogpage h3, .blogpage h4, .blogpage h5, .blogpage h6 {
	color:<?php echo get_option( 'titlecolor')?> !important;
}

.post h2 a {
	color:<?php echo get_option( 'titlecolor')?> !important;
}

.blogpostinfo h2 a {
	color:<?php echo get_option( 'titlecolor')?> !important;
}

<?php } ?>







<?php if(get_option( 'textcolor' )) { ?>
body {
	color:<?php echo get_option( 'textcolor')?> !important;
}

<?php } ?>






    <?php echo get_theme_mod('customcss'); ?>
</style>
