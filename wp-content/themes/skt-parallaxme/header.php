
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT Parallaxme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" type="image/x-icon" href="<?php echo esc_url( of_get_option('favicon', false) ); ?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="home">
<div id="wrap_all">
<div class="show-bg <?php echo ( is_home() || is_front_page() ) ? 'home_header' : ''; ?>">
    <div class="container">
        <header class="header cf">
            <div class="logo"><a href="<?php echo esc_url(home_url('/'));?>#home">
					<?php if( true == of_get_option('logo') ) { ?>
                        <img src="<?php echo esc_url( of_get_option('logo', true) ); ?>" />
                    <?php } else { ?>
                        <h1><?php bloginfo( 'name' ); ?></h1>
                    <?php } ?>
				</a>
            </div><!-- ./logo-->
            <div class="mobile_nav"><a href="#">Go To...</a></div>
            <nav class="main cf">
                <?php 
				$navMenu = wp_nav_menu( array('theme_location'  => '', 'container' => '', 'container_class' => '', 'items_wrap' => '<ul>%3$s</ul>', 'echo' => false ) );
				 if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) :
					echo str_replace(array('<div class="menu">','</div>'), '', $navMenu);
				else : 
					if( of_get_option('numsection', true) > 0 ) { 
						$menu_list = '';
						$numSections = esc_attr( of_get_option('numsection', true) );
						for( $s=1; $s<=$numSections; $s++ ){ 
							$menutitle	= ( of_get_option('menutitle'.$s, true) != '' ) ? esc_html( of_get_option('menutitle'.$s, true) ) : '';
							$menu_list .= ( $menutitle != '' ) ? '<li><a href="'.esc_url(home_url('/')).'#section'.$s.'">'.strtoupper($menutitle).'</a></li>' : '';
						}
					}
					echo skt_parallaxme_str_lreplace('</ul>', $menu_list.'</ul>', str_replace(array('<div class="menu">','</div>'), '', $navMenu) );
				endif;
				?>
            </nav>
        </header>
    </div><!-- ./container -->
</div><!-- ./show -->

<?php if ( (of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page() ) { ?>
<section>
    <div class="feature">
        <div class="slider-text">
            <div id="slidecaption"></div>
        </div>   
        <div class="control-nav">
            <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
            <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
            <ul id="slide-list"></ul>
            <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
        </div>
    </div><!-- ./feature -->
</section>
<?php } ?>

<div id="content_part">