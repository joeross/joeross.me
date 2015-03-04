<?php
/**
 * Loads at the end after loading the entire library.
 * Commonly used for initializing extended classes.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Setup
 * @since Imprint 1.0 
 */

/**
 * Initializes Imprint_Carousel_Ext extended class.
 * 
 * @uses Imprint_Carousel_Ext Carousel Subclass
 * @since Imprint 1.0
 */
function imprint_carousel_call() {
        $Imprint_Carousel_Obj = new Imprint_Carousel_Ext();
}

/**
 * Add imprint_pagination function to imprint_archive_template_hook.
 * This function is responsible for display pagination below posts.
 * 
 * @since Imprint 1.0
 */
add_action( 'imprint_archive_template_hook', 'imprint_pagination' );

add_filter('imprint_options', 'imprint_theme_options');