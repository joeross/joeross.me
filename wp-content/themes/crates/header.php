<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0"/>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<div id="modal">



<?php if (get_theme_mod( 'headeravatar' ) OR get_theme_mod( 'name' ) OR
get_theme_mod( 'twitterurl' ) OR get_theme_mod( 'instagramurl' ) OR get_theme_mod( 'facebookurl' )) { ?>
	<section>
    <div class="profile">

	<?php if(get_theme_mod( 'headeravatar' )) { ?>
    <div class="profileimg"><img alt="" height="55" width="55" src="<?php echo get_theme_mod( 'headeravatar'); ?>"/></div>
	<?php } ?>

    <div class="profileinfo">
	<?php if(get_theme_mod( 'name' )) { ?>
    <h1><?php echo get_theme_mod( 'name'); ?></h1>
	<?php } ?>

    <span>
 		<?php if(get_theme_mod( 'twitterurl' )) { ?>
 		<a href="<?php echo get_theme_mod( 'twitterurl'); ?>">
    	<img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png"/>
    	</a>
    	<?php } ?>

 		<?php if(get_theme_mod( 'instagramurl' )) { ?>
 		<a href="<?php echo get_theme_mod( 'instagramurl'); ?>">
    	<img alt="Instagram" src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png"/>
    	</a>
    	<?php } ?>

 		<?php if(get_theme_mod( 'facebookurl' )) { ?>
 		<a href="<?php echo get_theme_mod( 'facebookurl'); ?>">
    	<img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png"/>
    	</a>
    	<?php } ?>
    </span>
    </div>

    <div class="clear"></div>
    </div>
    <div class="clear"></div>
	</section>
<?php } ?>





	<section>
    <?php wp_nav_menu(array( 'items_wrap' => '<h2>Menu</h2><ul>%3$s</ul>', 'theme_location' => 'main-nav', 'fallback_cb' => 'wp_page_menu')); ?>
	</section>

	<?php dynamic_sidebar( 'header-sidebar' ); ?>


</div>




<form id="site-search" method="get" action="<?php  echo home_url(); ?>/">
	<input type="text" name="s" class="searchbar" placeholder="Type then press enter..." />
	<input type="hidden" class="searchsubmit" value="Search" />
</form>
<div id="header" class="animated fadeInDown">

	<div class="logo">

	<?php if (get_theme_mod('headerlogo')) { ?>
		<a href="<?php echo home_url();?>">
		<img alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_mod( 'headerlogo'); ?>"/></a>
	<?php } else { ?> 
		<a href="<?php  echo home_url();?>"><?php bloginfo('name'); ?></a> 
	<?php } ?>


    	<?php if(is_front_page() ) { ?><a href="<?php echo home_url();?>" class="home-icon-a">Home</a><?php } else { ?> <a href="<?php echo home_url();?>" class="home-icon">Home</a> <?php } ?>
    	<a href="#modal" class="nav-toggle pageslide">Menu</a>
    	<a class="search-icon">Search</a>
		<div class="clear"></div>
	</div>

	<?php if ( get_header_image() ) : ?>
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<?php endif; ?>

	<?php if (get_theme_mod('headerdescription')) { ?>
    <div class="desc">
    	<p><?php echo get_theme_mod( 'headerdescription'); ?></p>
    </div>
	<?php } ?>
</div>




