<?php
/**
 * Theme Setup
 * 
 * @package Imprint
 * @subpackage Core
 * @category Setup
 * @since Imprint 1.0
 */

/**
 * Sets up theme defaults and registers support for various theme features
 * 
 * @since Imprint 1.0
 */
function imprint_setup() {
        
	/**
	 * Makes imprint Theme ready for translation.
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'imprint', get_template_directory() . '/languages' );
	
	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Enable custom background color and image support to imprint theme.
	 */
	add_theme_support( 'custom-background', array( 'default-color' => 'E7E7E7', 'default-image' => '' ) );
	
	 
	/**
	 * Add support for Post Thumbnails.
	 * Defines a custom name and size for Thumbnails to be used in the theme.
	 *
	 * Note: In order to use the default theme thumbnail, add_image_size() must be removed
	 * and 'imprintThumb' value must be removed from the_post_thumbnail in the loop file.
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'imprintThumb', 125, 100 );
        
        
        add_editor_style();
}
add_action( 'after_setup_theme', 'imprint_setup' );