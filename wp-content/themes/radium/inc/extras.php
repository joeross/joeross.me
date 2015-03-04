<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Radium
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function radium_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'radium_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function radium_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'radium_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function radium_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'radium' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'radium_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function radium_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'radium_setup_author' );
/* Google fonts URL */
function radium_google_fonts_url() {

	// The default Roboto font
	wp_register_style('radium-roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,700', array(), false, 'all');
	wp_enqueue_style('radium-roboto-condensed');
	wp_register_style('radium-lato', '//fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic', array(), false, 'all');
    wp_enqueue_style('radium-lato');
	
	$radium_font_families = array();

	// Check if body font is not Lato
	if ( 'Lato' != get_theme_mod( 'body_font', 'Lato' ) ) {
		$radium_font_families[] = get_theme_mod( 'body_font' ) . ':400,300,400italic,700,700italic';
	} 
	// Check if heading font is not Roboto and it is different from the body font
	if ( 'Roboto Condensed' != get_theme_mod( 'headings_font', 'Roboto Condensed' ) && get_theme_mod( 'body_font' ) != get_theme_mod( 'headings_font' ) ) {
		$radium_font_families[] = get_theme_mod( 'headings_font' ) . ':700,400,400italic';
	} 

	if ( ! empty( $radium_font_families ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $radium_font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

		return $fonts_url;
	}

	return false;
}
