<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="branding" role="banner">
    
      <div id="inner-header" class="clearfix">
      
		<div id="site-heading">
			<?php if ( get_theme_mod( 'hardpressed_logo' ) ) : ?>
            <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'hardpressed_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
            <?php else : ?>
            <div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>
        </div>
        
        <div id="social-media" class="clearfix">
            
        	<?php if ( get_theme_mod( 'hardpressed_facebook' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_facebook' ) ); ?>" class="social-fb" title="<?php echo esc_url( get_theme_mod( 'hardpressed_facebook' ) ); ?>"><?php _e('Facebook', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_twitter' ) ); ?>" class="social-tw" title="<?php echo esc_url( get_theme_mod( 'hardpressed_twitter' ) ); ?>"><?php _e('Twitter', 'hardpressed') ?></a>
            <?php endif; ?>
			
            <?php if ( get_theme_mod( 'hardpressed_google' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_google' ) ); ?>" class="social-gp" title="<?php echo esc_url( get_theme_mod( 'hardpressed_google' ) ); ?>"><?php _e('Google+', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_pinterest' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_pinterest' ) ); ?>" class="social-pi" title="<?php echo esc_url( get_theme_mod( 'hardpressed_pinterest' ) ); ?>"><?php _e('Pinterest', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_linkedin' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_linkedin' ) ); ?>" class="social-li" title="<?php echo esc_url( get_theme_mod( 'hardpressed_linkedin' ) ); ?>"><?php _e('Linkedin', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_youtube' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_youtube' ) ); ?>" class="social-yt" title="<?php echo esc_url( get_theme_mod( 'hardpressed_youtube' ) ); ?>"><?php _e('Youtube', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_tumblr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_tumblr' ) ); ?>" class="social-tu" title="<?php echo esc_url( get_theme_mod( 'hardpressed_tumblr' ) ); ?>"><?php _e('Tumblr', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_instagram' ) ); ?>" class="social-in" title="<?php echo esc_url( get_theme_mod( 'hardpressed_instagram' ) ); ?>"><?php _e('Instagram', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_flickr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_flickr' ) ); ?>" class="social-fl" title="<?php echo esc_url( get_theme_mod( 'hardpressed_flickr' ) ); ?>"><?php _e('Instagram', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_vimeo' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_vimeo' ) ); ?>" class="social-vi" title="<?php echo esc_url( get_theme_mod( 'hardpressed_vimeo' ) ); ?>"><?php _e('Vimeo', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_yelp' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_yelp' ) ); ?>" class="social-ye" title="<?php echo esc_url( get_theme_mod( 'hardpressed_yelp' ) ); ?>"><?php _e('Yelp', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_rss' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'hardpressed_rss' ) ); ?>" class="social-rs" title="<?php echo esc_url( get_theme_mod( 'hardpressed_rss' ) ); ?>"><?php _e('RSS', 'hardpressed') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'hardpressed_email' ) ) : ?>
            <a href="<?php _e('mailto:', 'harpdpressed'); echo sanitize_email( get_theme_mod( 'hardpressed_email' ) ); ?>" class="social-em" title="<?php _e('mailto:', 'harpdpressed'); echo sanitize_email( get_theme_mod( 'hardpressed_email' ) ); ?>"><?php _e('Email', 'hardpressed') ?></a>
            <?php endif; ?> 
            
         </div>
        
      </div>
      
	</header><!-- #branding -->
    
    <nav id="access" role="navigation">
        <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'hardpressed' ); ?></h1>
        <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'hardpressed' ); ?>"><?php _e( 'Skip to content', 'hardpressed' ); ?></a></div>
        <?php hardpressed_main_nav(); // Adjust using Menus in Wordpress Admin ?>
        
    </nav><!-- #access -->

	<div id="container">