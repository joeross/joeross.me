<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Radium
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'radium' ); ?></a>
	<header id="masthead" class="site-header" role="banner" style="background-image: url(<?php
if ( ( is_single() || is_page() ) && ( '' != get_theme_mod( 'featured_header' ) ) ) {
	if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id() ); }
	else { if (get_header_image() != '') { header_image(); }
			else { echo get_template_directory_uri() . '/images/header.jpg'; }}
}
else { if (get_header_image() != '') { header_image(); }
			else { echo get_template_directory_uri() . '/images/header.jpg'; }} 
?>); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
		<div class="overlay">
			<div class="inner-wrap">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php if ( get_theme_mod( 'logo' ) ) {
							echo '<img src="' . esc_url( get_theme_mod( 'logo' ) ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
						} else { ?>
							<?php bloginfo( 'name' ); ?>
						<?php } ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div><!-- .site-branding -->
				<button class="menu-toggle"></button>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<ul>
						<?php wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'primary' ) ); ?>
						<li class="header-search"><?php get_search_form(); ?></li>
					</ul>
				</nav><!-- #site-navigation -->
				<div class="clear"></div>
			</div>
		</div><!-- .overlay -->
	</header><!-- #masthead -->

	<div id="content" class="site-content inner-wrap">
