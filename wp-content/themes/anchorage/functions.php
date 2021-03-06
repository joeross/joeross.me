<?php

/**
 * anchorage manifest.
 *
 * require_once()'s other files for theme functionality.  This file is just a 
 * manifest:  It contains no function definitions, only calls to other files.
 *
 * @package WordPress
 * @subpackage anchorage
 * @since anchorage 1.0
 */

/**
 * Enqueue scripts, establish theme-wide values, setup widgets,
 * call theme-supports.
 */
require_once( get_template_directory() . '/inc/setup.php' );

/**
 * Body classes, posts classes, wp_title, etc.
 */
require_once( get_template_directory() . '/inc/misc-filters.php' );

/**
 * jQuery snippets for minor UX improvements.
 */
require_once( get_template_directory() . '/inc/footer-scripts.php' );

/**
 * Custom template tags used in theme template files.
 */
require_once( get_template_directory() . '/inc/template-tags.php' );

/**
 * Helper functions to do things like make arrows or build file paths.
 */
require_once( get_template_directory() . '/inc/helper-functions.php' );


/**
 * Custom template tags related to displaying the post comment area.
 * @todo Refactor so that there are no layout #selectors in the template tags.
 */
require_once( get_template_directory() . '/inc/comment-template-tags.php' );

/**
 * Theme modification API.
 * @todo Overriding sass generated styles from php seems to be too cumbersome.
 */
require_once( get_template_directory() . '/inc/customization.php' );