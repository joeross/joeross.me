<?php
/**
 * semplicemente functions and dynamic template
 *
 * @package semplicemente
 */

 /**
 * Register All Colors
 */
function semplicemente_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
	'slug'=>'color_primary', 
	'default' => '#888888',
	'label' => __('Primary Color ', 'semplicemente')
	);
	
	$colors[] = array(
	'slug'=>'color_link', 
	'default' => '#404040',
	'label' => __('Link Color ', 'semplicemente')
	);
	
	$colors[] = array(
	'slug'=>'color_secondary', 
	'default' => '#36c1c8',
	'label' => __('Secondary Color ', 'semplicemente')
	);
	
	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'colors',
			'settings' => $color['slug'])
		)
	);
	}
	
}
add_action( 'customize_register', 'semplicemente_color_primary_register' );

/**
 * Add Custom CSS to Header 
 */
function semplicemente_custom_css_styles() { 
	$color_primary = get_option('color_primary');
	$color_link = get_option('color_link');
	$color_secondary = get_option('color_secondary');
?>

<style type="text/css">
	<?php if (!empty($color_primary)) : ?>
	body,
	button,
	input,
	select,
	textarea {
		color: <?php echo $color_primary; ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($color_link)) : ?>
	h1, h2, h3, h4, h5, h6, a {
		color: <?php echo $color_link; ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($color_secondary)) : ?>
	a:hover, a:focus, a:active, .entry-meta i, .top-search.active {
		color: <?php echo $color_secondary; ?>;
	}
	.widget-title h3 {
		border-bottom: 1px solid <?php echo $color_secondary; ?>;
	}
	.sticky {
		border: 3px solid <?php echo $color_secondary; ?>;
	}
	
	blockquote {
		border-left: 5px solid <?php echo $color_secondary; ?>;
		border-right: 2px solid <?php echo $color_secondary; ?>;
	}
	
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.dataBottom a, 
	.readMoreLink {
		border: 1px solid <?php echo $color_secondary; ?>;
	}
	
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	.readMoreLink:hover, 
	.dataBottom a:hover, 
	.sticky:before,
	button:focus,
	input[type="button"]:focus,
	input[type="reset"]:focus,
	input[type="submit"]:focus,
	button:active,
	input[type="button"]:active,
	input[type="reset"]:active,
	input[type="submit"]:active,
	.menu-toggle,
	.main-navigation.toggled .nav-menu,
	.main-navigation.toggled .nav-menu ul	{
		background: <?php echo $color_secondary; ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'semplicemente_custom_css_styles');
