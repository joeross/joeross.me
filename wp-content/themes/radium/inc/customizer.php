<?php
/**
 * Radium Theme Customizer
 *
 * @package Radium
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
// Sanitizing body font
function radium_sanitize_bodyfont( $input_bodyfont ) {
    $valid_bodyfont = array(
		'Roboto'             => 'Roboto',
        'Source Sans Pro'    => 'Source Sans Pro',
		'Open Sans'          => 'Open Sans',
		'Lato'               => 'Lato',
		'Merriweather Sans'  => 'Merriweather Sans',
		'Ubuntu'             => 'Ubuntu',
		'Vollkorn'           => 'Vollkorn',
		'Alegreya'           => 'Alegreya',
		'Lora'               => 'Lora',
		'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
		'Droid Serif'        => 'Droid Serif',
		'Noto Serif'         => 'Noto Serif',
		'Gentium Book Basic' => 'Gentium Book Basic'
    );
 
    if ( array_key_exists( $input_bodyfont, $valid_bodyfont ) ) {
        return $input_bodyfont;
    } else {
        return 'Lato';
    }
}

// Sanitizing headings font
function radium_sanitize_headingsfont( $input_headingsfont ) {
    $valid_headingsfont = array(
		'Roboto'             => 'Roboto',
        'Source Sans Pro'    => 'Source Sans Pro',
		'Open Sans'          => 'Open Sans',
		'Lato'               => 'Lato',
		'Merriweather Sans'  => 'Merriweather Sans',
		'Ubuntu'             => 'Ubuntu',
		'Vollkorn'           => 'Vollkorn',
		'Alegreya'           => 'Alegreya',
		'Lora'               => 'Lora',
		'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
		'Droid Serif'        => 'Droid Serif',
		'Noto Serif'         => 'Noto Serif',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Roboto Condensed'   => 'Roboto Condensed',
		'Varela Round'       => 'Varela Round',
		'Montserrat'         => 'Montserrat',
		'Sanchez'            => 'Sanchez',
		'Patua One'          => 'Patua One',		
		'Bitter'             => 'Bitter',
		'Libre Baskerville'  => 'Libre Baskerville'
    );
 
    if ( array_key_exists( $input_headingsfont, $valid_headingsfont ) ) {
        return $input_headingsfont;
    } else {
        return 'Roboto Condensed';
    }
}

// Sanitizing Overlay options
function radium_sanitize_overlay( $input_overlay ) {
    $valid_overlay = array(
		'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAADklEQVQIHWNgYGBoACMABIoBAUIssgcAAAAASUVORK5CYII='                 => 'Pattern1-default',
		'iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAYAAACddGYaAAAAD0lEQVQIW2NkQABjRmQOAAM+AGkQsDBSAAAAAElFTkSuQmCC'                 => 'Pattern2',
		'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAEUlEQVQIHWNggIBiEGUFxJUABisBJ85jLc8AAAAASUVORK5CYII='             => 'Pattern3',
		'iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAGklEQVQIW2P4//8/AxI2RuGAaBQOTADOAWEAjAwwnWPnCWYAAAAASUVORK5CYII=' => 'Pattern4',
		'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=='                 => 'None'
    );
 
    if ( array_key_exists( $input_overlay, $valid_overlay ) ) {
        return $input_overlay;
    } else {
        return 'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAADklEQVQIHWNgYGBoACMABIoBAUIssgcAAAAASUVORK5CYII=';
    }
}

// Sanitizing checkboxes
function radium_sanitize_checkbox( $input_checkbox ) {
    if ( $input_checkbox == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// Sanitizing uploads
function radium_sanitize_image( $input_image ) {
	$output = '';
	$filetype = wp_check_filetype($input_image);
	if ( $filetype["ext"] ) {
	$output = $input_image;
	}
	return $output;
}

function radium_customize_register( $wp_customize ) {

	// Register Theme section
	$wp_customize->add_section(
		'typography',
		array(
			'title'    => __( 'Typography', 'radium' ),
			'priority' => 40,
		)
	);
	
	// Register Theme section
	$wp_customize->add_section(
		'post_options',
		array(
			'title'    => __( 'Post Options', 'radium' ),
			'priority' => 50,
		)
	);
	
	// Link Color
	$wp_customize->add_setting( 'links_color', array(
		'default'           => '#00C8C8',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
	) );     
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'links_color',
		array(
			'label'      => __( 'Links & Accent Color', 'radium' ),
			'section'    => 'colors',
			'settings'   => 'links_color',
			'priority'   => 10,
		) 
	) );
	
	// Logo
	$wp_customize->add_setting( 'logo', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'radium_sanitize_image',
		'transport'         => 'refresh'
	) );     
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'logo',
		array(
			'label'      => __( 'Upload your custom logo.', 'radium' ),
			'section'    => 'title_tagline',
			'settings'   => 'logo',
			'context'    => 'logo',
			'priority'   => 30,
		)
	) );
	
// Typography 
	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => 'Lato',
			'sanitize_callback' => 'radium_sanitize_bodyfont',
		)
	);
	$wp_customize->add_setting(
		'headings_font',
		array(
			'default'           => 'Roboto Condensed',
			'sanitize_callback' => 'radium_sanitize_headingsfont',
		)
	);
	$wp_customize->add_setting(
		'bold_titles',
		array(
			'default'           => '1',
			'sanitize_callback' => 'radium_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'body_font',
		array(
			'label'      => __( 'Body Font', 'radium' ),
			'section'    => 'typography',
			'settings'   => 'body_font',
			'type'       => 'select',
			'choices'    => array(
				'Roboto'             => 'Roboto',
				'Source Sans Pro'    => 'Source Sans Pro',
				'Open Sans'          => 'Open Sans',
				'Lato'               => 'Lato',
				'Merriweather Sans'  => 'Merriweather Sans',
				'Ubuntu'             => 'Ubuntu',
				'Vollkorn'           => 'Vollkorn',
				'Alegreya'           => 'Alegreya',
				'Lora'               => 'Lora',
				'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
				'Droid Serif'        => 'Droid Serif',
				'Noto Serif'         => 'Noto Serif',
				'Gentium Book Basic' => 'Gentium Book Basic'
			),
			'priority'   => 40
		) 
	);
	$wp_customize->add_control(
		'headings_font',
		array(
			'label'      => __( 'Headings Font', 'radium' ),
			'section'    => 'typography',
			'settings'   => 'headings_font',
			'type'       => 'select',
			'choices'    => array(
				'Roboto'             => 'Roboto',
				'Source Sans Pro'    => 'Source Sans Pro',
				'Open Sans'          => 'Open Sans',
				'Lato'               => 'Lato',
				'Merriweather Sans'  => 'Merriweather Sans',
				'Ubuntu'             => 'Ubuntu',
				'Vollkorn'           => 'Vollkorn',
				'Alegreya'           => 'Alegreya',
				'Lora'               => 'Lora',
				'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
				'Droid Serif'        => 'Droid Serif',
				'Noto Serif'         => 'Noto Serif',
				'Gentium Book Basic' => 'Gentium Book Basic',
				'Roboto Condensed'   => 'Roboto Condensed',
				'Varela Round'       => 'Varela Round',
				'Montserrat'         => 'Montserrat',
				'Sanchez'            => 'Sanchez',
				'Patua One'          => 'Patua One',		
				'Bitter'             => 'Bitter',
				'Libre Baskerville'  => 'Libre Baskerville'
			),
			'priority'   => 50
		) 
	);
	$wp_customize->add_control(
    'bold_titles',
    array(
        'type'     => 'checkbox',
        'label'    => __( 'Bold Entry Titles', 'radium' ),
        'section'  => 'typography',
		'priority' => 60
    )
);

// Overlay options
	$wp_customize->add_setting(
		'overlay_options',
		array(
			'default'           => 'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAADklEQVQIHWNgYGBoACMABIoBAUIssgcAAAAASUVORK5CYII=',
			'sanitize_callback' => 'radium_sanitize_overlay',
		)
	);
	
	$wp_customize->add_control(
		'overlay_options',
		array(
			'label'      => __( 'Overlay pattern options', 'radium' ),
			'section'    => 'header_image',
			'settings'   => 'overlay_options',
			'type'       => 'select',
			'choices'    => array(
				'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAADklEQVQIHWNgYGBoACMABIoBAUIssgcAAAAASUVORK5CYII='                 => 'Pattern1-default',
				'iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAYAAACddGYaAAAAD0lEQVQIW2NkQABjRmQOAAM+AGkQsDBSAAAAAElFTkSuQmCC'                 => 'Pattern2',
				'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAEUlEQVQIHWNggIBiEGUFxJUABisBJ85jLc8AAAAASUVORK5CYII='             => 'Pattern3',
				'iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAGklEQVQIW2P4//8/AxI2RuGAaBQOTADOAWEAjAwwnWPnCWYAAAAASUVORK5CYII=' => 'Pattern4',
				'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=='                 => 'None'
			),
			'priority'   => 70
		) 
	);
	
	

// Post Options
	$wp_customize->add_setting(
		'featured_header',
		array(
			'sanitize_callback' => 'radium_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'post_sidebar',
		array(
			'sanitize_callback' => 'radium_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
    'featured_header',
    array(
        'type'     => 'checkbox',
        'label'    => __( 'Use the featured image as header background image.', 'radium' ),
        'section'  => 'post_options',
		'priority' => 70
    )
	);

	$wp_customize->add_control(
    'post_sidebar',
    array(
        'type'     => 'checkbox',
        'label'    => __( 'Show sidebar on single posts and pages.', 'radium' ),
        'section'  => 'post_options',
		'priority' => 80
    )
	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
}
add_action( 'customize_register', 'radium_customize_register' );


/**
 * Outputting the custom css from the theme customizer.
 */
 
function radium_custom_css() {
	//Body and headings type
	if ( 'Lato' != get_theme_mod( 'body_font', 'Lato' ) ) { ?>
	<style id="radium-body-font" type="text/css">
		body,
		button,
		input,
		select,
		textarea,
		.site-description {
			font-family: <?php echo esc_attr( get_theme_mod( 'body_font' ) ); ?>;
		}
	</style>
	<?php }
	
	if ( 'Roboto Condensed' != get_theme_mod( 'headings_font', 'Roboto Condensed' ) ) { ?>
	<style id="radium-headings-font" type="text/css">
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: <?php echo esc_attr( get_theme_mod( 'headings_font' ) ); ?>;
		}
	</style>
	<?php }
	// Bold entry titles
	if ( '1' != get_theme_mod( 'bold_titles', '1' ) ) { ?>
	<style id="radium-bold-titles" type="text/css">
		.entry-title a,
		.entry-title,
		.page-title {
			font-weight: normal;
		}
	</style>
	<?php }
	//Links color
	if ( '#00C8C8' != get_theme_mod( 'links_color', '#00C8C8' ) ) { ?>
	<style id="radium-links-color" type="text/css">
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		a.more-link {
			border: 3px solid <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
			color: <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;			
		}
		
		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover,
		.cat-links a:hover,
		.tags-links a:hover,
		.more-link:hover,
		.sticky-post,
		.page-links a {
			background: <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		textarea:focus {
			border-color: <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		a {
			border-bottom: 1px solid <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		a:hover,
		a:focus,
		a:active,
		.main-navigation ul ul .current_page_item > a,
		.main-navigation ul ul .current-menu-item > a,
		a.permalink-icon,
		.site-info a:hover {
			color: <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		@media screen and (min-width: 1000px) {
			.main-navigation ul ul a:hover,
			.main-navigation .menu-item-has-children .current-menu-item  > a,
			.main-navigation ul ul li.menu-item-has-children > a:hover:after {
				color: <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
			}
			
			.header-search .search-field:focus {
				border-bottom: 3px solid <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
			}
		}
		
		.cat-links a,
		.tags-links a {
			border: 2px solid <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
			color: <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		.nav-links a,
		.comment-reply-link {
			border-bottom: 2px solid <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		.bypostauthor .comment-body {
			border-left: 6px solid <?php echo esc_attr( get_theme_mod( 'links_color' ) ); ?>;
		}
		
		@media screen and (min-width: 1000px) {
			.main-navigation a:hover,
			.site-title a:hover {
				color: #fff;
			}
		}	
	</style>
	<?php }
	// Custom logo
	if ( '' != get_theme_mod( 'logo' ) ) { ?>
	<style id="custom-logo" type="text/css">
		.site-title a {
			border: none;
		}
	</style>
	<?php }

	//Overlay options
	if ( 'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAADklEQVQIHWNgYGBoACMABIoBAUIssgcAAAAASUVORK5CYII=' != get_theme_mod( 'overlay_options', 'iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAADklEQVQIHWNgYGBoACMABIoBAUIssgcAAAAASUVORK5CYII=' ) ) { ?>
	<style id="radium-overlay-pattern" type="text/css">
		.overlay {
			background: rgba(0,0,0,0.2) url(data:image/png;base64,<?php echo esc_attr( get_theme_mod( 'overlay_options' ) ); ?>) repeat;
		}
	</style>
	<?php }
}

add_action( 'wp_head', 'radium_custom_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function radium_customize_preview_js() {
	wp_enqueue_script( 'radium_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'radium_customize_preview_js' );