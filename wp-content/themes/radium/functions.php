<?php
/**
 * radium functions and definitions
 *
 * @package Radium
 */

if ( ! function_exists( 'radium_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function radium_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 736; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on radium, use a find and replace
	 * to change 'radium' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'radium', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'radium' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'radium_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_editor_style( 'radium-editor-style.css' );
}
endif; // radium_setup
add_action( 'after_setup_theme', 'radium_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function radium_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'radium' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
		
	/**
	 * Footer widgets
	 */
	register_sidebar( array(
		'name' => __( 'Footer Widget One', 'radium' ),
		'id' => 'sidebar-5',
		'description' => __( 'Found at the bottom of every page.', 'radium' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Two', 'radium' ),
		'id' => 'sidebar-6',
		'description' => __( 'Found at the bottom of every page.', 'radium' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Three', 'radium' ),
		'id' => 'sidebar-7',
		'description' => __( 'Found at the bottom of every page.', 'radium' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'radium_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function radium_scripts() {

	wp_enqueue_style( 'radium-style', get_stylesheet_uri() );
	
	// Google Fonts
	if ( radium_google_fonts_url() ) {
		wp_register_style( 'radium-fonts', radium_google_fonts_url() );
		wp_enqueue_style( 'radium-fonts' );
	}
	
	wp_enqueue_style( 'radium-font-awesome', get_template_directory_uri() . '/inc/fontawesome/font-awesome.min.css', array(), '4.3.0' );
	
	wp_enqueue_script( 'radium-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'radium-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'radium_scripts' );

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

add_filter( 'the_content', 'radium_aside_hyperlink', 9 ); 

function radium_aside_hyperlink( $content ) {

	if ( has_post_format( 'aside' ) && !is_singular() )
		$content .= ' <a class="permalink-icon" href="' . get_permalink() . '"><i class="fa fa-link"></i></a>';

	return $content;
}