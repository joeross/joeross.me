<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package semplicemente
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		<?php 
			global $semplicemente_theme_options;
			$se_options = get_option( 'semplicemente_theme_options', $semplicemente_theme_options );
		?>

		<div class="site-social">
			<div class="socialLine">
			
				<?php if ( $se_options['facebookurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['facebookurl']); ?>" title="Facebook" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-facebook"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['twitterurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['twitterurl']); ?>" title="Twitter" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-twitter"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['googleplusurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['googleplusurl']); ?>" title="Google Plus" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-google-plus"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['linkedinurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['linkedinurl']); ?>" title="Linkedin" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-linkedin"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['instagramurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['instagramurl']); ?>" title="Instagram" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-instagram"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['youtubeurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['youtubeurl']); ?>" title="YouTube" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-youtube"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['pinteresturl'] ) : ?>
					<a href="<?php echo esc_url($se_options['pinteresturl']); ?>" title="Pinterest" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-pinterest"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['tumblrurl'] ) : ?>
					<a href="<?php echo esc_url($se_options['tumblrurl']); ?>" title="Tumblr" target="_blank" rel="nofollow"><i class="fa spaceLeftDouble fa-tumblr"></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><i class="fa spaceLeftDouble fa-rss"></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hidesearch'] ) : ?>
					<a href="#" class="top-search"><i class="fa spaceLeftDouble fa-search"></i></a>
				<?php endif; ?>
				
			</div>
				<?php if ( ! $se_options['hidesearch'] ) : ?>
				<div class="topSearchForm">
						<?php get_search_form(); ?>
				</div>
				<?php endif; ?>
		</div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'semplicemente' ); ?><i class="fa fa-align-justify"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
