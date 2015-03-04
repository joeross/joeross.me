<?php
/*
Plugin Name: Move Posts from Uncategorized Category
Plugin URI: http://thisismyurl.com/downloads/move-posts-from-uncategorized/
Description: This plugin automatically scans for posts in the Uncategorized category of your WordPress blog, and removes them from the category.
Author: Christopher Ross
Tags: category, wp-admin, uncategorized, category management
Author URI: http://thisismyurl.com/
Version: 15.01
*/


/**
 * Move Posts from Uncategorized Category file
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/move-posts-from-uncategorized/
 *
 * @package 	Move Posts from Uncategorized Category
 * @copyright	Copyright (c) 2013, Chrsitopher Ross
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Move Posts from Uncategorized Category 1.0
 */


/* if the plugin is called directly, die */
if ( ! defined( 'WPINC' ) )
	die;
	
	
define( 'THISISMYURL_WPMUC_NAME', 'Move Posts from Uncategorized Category' );
define( 'THISISMYURL_WPMUC_SHORTNAME', 'Move Posts' );

define( 'THISISMYURL_WPMUC_FILENAME', plugin_basename( __FILE__ ) );
define( 'THISISMYURL_WPMUC_FILEPATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'THISISMYURL_WPMUC_FILEPATHURL', plugin_dir_url( __FILE__ ) );

define( 'THISISMYURL_WPMUC_NAMESPACE', basename( THISISMYURL_WPMUC_FILENAME, '.php' ) );
define( 'THISISMYURL_WPMUC_TEXTDOMAIN', str_replace( '-', '_', THISISMYURL_WPMUC_NAMESPACE ) );

define( 'THISISMYURL_WPMUC_VERSION', '15.01' );

include_once( 'thisismyurl-common.php' );



/**
 * Creates the class required for WPMUC Search for WordPress
 *
 * @author     Christopher Ross <info@thisismyurl.com>
 * @version    Release: @15.01@
 * @see        wp_enqueue_scripts()
 * @since      Class available since Release 15.01
 *
 */
if( ! class_exists( 'thissimyurl_MoveUncategorized' ) ) {
class thissimyurl_MoveUncategorized extends thisismyurl_Common_WPMUC {

	/**
	  * Standard Constructor
	  *
	  * @access public
	  * @static
	  * @uses http://codex.wordpress.org/Function_Reference/add_action
	  * @since Method available since Release 15.01
	  *
	  */
	public function run() {
		add_filter( 'admin_head', array( $this, 'thisismyurl_move_uncategorized' ) );
	}
	
	
	/**
	  * thisismyurl_move_uncategorized
	  *
	  * @access public
	  * @static
	  * @since Method available since Release 15.01
	  *
	  */
	function thisismyurl_move_uncategorized() {

	  // fetch the category called uncategorized
	  $uncategorized_category = get_category_by_slug( 'uncategorized' );
	
	  // only execute our code if uncategorized still exists
	  if ( $uncategorized_category ) {
	
		// fetch all the posts that are in the uncategorized category
		$uncategorized_posts = get_posts( 'numberposts=-1&category=' . $uncategorized_category->term_id );
	
		// loop through all the posts
		foreach ( $uncategorized_posts as $uncategorized_post ) {
	
		  // get all the categories for the current post
		  $current_post_categories = wp_get_post_categories( $uncategorized_post->ID );
	
		  // only execute code for posts in more than one category
		  if ( count( $current_post_categories ) > 1 ) {
	
			// get the current uncategorized index
			$current_uncategorized_index = array_search( $uncategorized_category->term_id, $current_post_categories );
	
			// remove the uncategorized category from the list of categories
			if ( ! empty ( $current_uncategorized_index ) )
			  unset( $current_post_categories[$current_uncategorized_index] );
	
			// if there is still a category set, update the post value and assign categories
			if ( count( $current_post_categories ) > 0 ) {
	
			  // build a list of categories to put this post back into
			  foreach ( $current_post_categories as $current_post_category ) {
				$category_details = get_category( $current_post_category );
				$current_post_categories_titles[] = $category_details->name;
			  }
	
			  wp_set_object_terms( $uncategorized_post->ID, $current_post_categories_titles, 'category');
			}
	
		  }
		}
	
	  }
	
	}
	
}
}

$thissimyurl_MoveUncategorized = new thissimyurl_MoveUncategorized;

$thissimyurl_MoveUncategorized->run();