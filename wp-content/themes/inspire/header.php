<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php $inspire_settings = get_option('inspire-options'); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '-', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if(!empty($inspire_settings['favicon'])): ?><link rel="shortcut icon" href="<?php echo esc_url($inspire_settings['favicon']); ?>" /><?php endif; ?>
<?php wp_head(); ?>
</head>
<body="<?php body_class(); ?>">
<div id="wrapper">
<div id="header">
	<div class="logo"><a href="<?php echo home_url(); ?>">
	<?php
	$logo = $inspire_settings['logo'];
	 if (!empty($logo)) { ?>
	<img src="<?php echo esc_url($inspire_settings['logo']); ?>"> 
	<?php } ?>	
	</a></div>
<div id="search-box">
 <?php get_search_form(); ?> 
 </div> <!--end searchbox-->

<div id="topmenu">
<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
</div><!--end top menu -->
</div> <!--end header-->
<div id="navigation">

<nav>
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>
</nav>

</div><!--end navigation-->
