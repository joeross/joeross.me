<?php
/**
 * plaino functions and definitions
 *
 * @package plaino
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'plaino_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function plaino_setup() {

	// This theme styles the visual editor to resemble the theme style.
	$font_url = 'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900,900italic|PT+Serif:400,700,400italic,700italic';
	add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
	

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on plaino, use a find and replace
	 * to change 'plaino' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'plaino', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('large-thumb', 1060, 650, true);
	add_image_size('index-thumb', 780, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'plaino' ),
		'social' => __( 'Social Menu', 'plaino' ),
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
	add_theme_support( 'post-formats', array('aside') );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'plaino_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif; // plaino_setup
add_action( 'after_setup_theme', 'plaino_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function plaino_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'plaino' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'plaino' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'plaino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function plaino_scripts() {
	
	wp_enqueue_style( 'plaino-style', get_stylesheet_uri() );	                
	
	if (is_page_template('page-templates/page-nosidebar.php')) {
	    wp_enqueue_style( 'plaino-layout-style' , get_template_directory_uri() . '/layouts/content-nosidebar.css');
	} else {
	    wp_enqueue_style( 'plaino-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}
	
	wp_enqueue_style('plaino-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Open+Sans:400italic,600italic,400,600');
	
	wp_enqueue_style('plaino-font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_script( 'plaino-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20141103', true );
	
	wp_enqueue_script( 'plaino-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('plaino-superfish'), '20141103', true );
	
	wp_enqueue_script( 'plaino-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20140404', true );

	wp_enqueue_script( 'plaino-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'plaino-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'plaino_scripts' );

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

/*customizer options*/
function plaino_theme_customizer( $wp_customize ) {
	/*new section*/
    $wp_customize->add_section( 'plaino_logo_section' , array(
    'title'       => __( 'Logo / Avatar', 'plaino' ),
    'priority'    => 30,
    'description' => __('Upload a logo or Avatar the  to replace the default site name in the header. The Tagline will still be visible. If you want to remove it, you can remove the text from Tagline field.', 'plaino' ),
	) );
	
	/*add section to customizer*/
	$wp_customize->add_setting( 'plaino_logo',
	array ( 'default' => '',
    'sanitize_callback' => 'esc_url_raw'));
	
	/*tell that field is image uploader*/	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'plaino_logo', array(
    'label'    => __( 'Logo / Avatar', 'plaino' ),
    'section'  => 'plaino_logo_section',
    'settings' => 'plaino_logo',
	) ) );

}
add_action('customize_register', 'plaino_theme_customizer');

/* remove [...] from excerpts*/
function plaino_new_excerpt_more( $more ) {
	return ' ...<a href="' . get_permalink() . '" title="' . __('Read in detail: ', 'plaino') . get_the_title() . '" rel="bookmark" class="read-more">read in detail<i class="fa fa-long-arrow-right"></i></a>';
}
add_filter('excerpt_more', 'plaino_new_excerpt_more');
