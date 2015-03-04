<?php
/**
 * Madre functions and definitions
 *
 * @package Sorbet
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 646; /* pixels */
}

if ( ! function_exists( 'sorbet_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sorbet_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Madre, use a find and replace
	 * to change 'sorbet' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sorbet', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Style the Tiny MCE editor
	add_editor_style();

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'index-thumb', 770, 999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'sorbet' ),
		'secondary' => __( 'Footer Menu', 'sorbet' ),
		'social'    => __( 'Social Links Menu', 'sorbet' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sorbet_custom_background_args', array(
		'default-color' => 'f0f1f3',
		'default-image' => '',
	) ) );

	/**
	 * Add support for Eventbrite.
	 * See: https://wordpress.org/plugins/eventbrite-api/
	 */
	add_theme_support( 'eventbrite' );
}
endif; // sorbet_setup
add_action( 'after_setup_theme', 'sorbet_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sorbet_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sorbet' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Column 1', 'sorbet' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Column 2', 'sorbet' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Column 3', 'sorbet' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sorbet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sorbet_scripts() {
	wp_enqueue_style( 'sorbet-style', get_stylesheet_uri() );

	wp_enqueue_style( 'sorbet-source-sans-pro' );
	wp_enqueue_style( 'sorbet-pt-serif' );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	wp_enqueue_script( 'sorbet-menus', get_template_directory_uri() . '/js/menus.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'sorbet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sorbet_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Google Fonts
 */
function sorbet_google_fonts() {

	$protocol = is_ssl() ? 'https' : 'http';

	/*	translators: If there are characters in your language that are not supported
		by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'sorbet' ) ) {

		wp_register_style( 'sorbet-source-sans-pro', "$protocol://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic&subset=latin,latin-ext" );

	}

	/*	translators: If there are characters in your language that are not supported
		by PT Serif, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'sorbet' ) ) {

		wp_register_style( 'sorbet-pt-serif', "$protocol://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic&subset=latin,latin-ext" );

	}

}
add_action( 'init', 'sorbet_google_fonts' );

/**
 * Enqueue Google Fonts for custom headers
 */
function sorbet_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'sorbet-source-sans-pro' );
	wp_enqueue_style( 'sorbet-pt-serif' );

}
add_action( 'admin_enqueue_scripts', 'sorbet_admin_scripts' );

/**
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string
 */
function sorbet_mce_css( $mce_css ) {

	$protocol = is_ssl() ? 'https' : 'http';

	$font = "$protocol://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic&subset=latin,latin-ext|PT+Serif:400,700,400italic,700italic&subset=latin,latin-ext";

	if ( empty( $font ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$font = str_replace( ',', '%2C', $font );
	$font = esc_url_raw( str_replace( '|', '%7C', $font ) );

	return $mce_css . $font;
}
add_filter( 'mce_css', 'sorbet_mce_css' );

/**
 * Remove the separator from Eventbrite events meta.
 */
add_filter( 'eventbrite_meta_separator', '__return_false' );
