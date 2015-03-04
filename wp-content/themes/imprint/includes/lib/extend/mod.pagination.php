<?php
/**
 * Pagination Module
 * 
 * @package Imprint
 * @subpackage Extend
 * @category Template
 * @since Imprint 1.0 
 */

/**
 * Pagination Module
 * 
 * @uses imprint_archive_template_hook() Hooked into it.
 * @global array $wp_query
 * @since Imprint 1.0
 */

if( !function_exists('imprint_pagination')):
    
    function imprint_pagination() {
    
        global $wp_query; // Call the Global $wp_query object.
	
	// If the total number of archive pages is more than one.
	if ( $wp_query->max_num_pages > 1 ):
        ?>
	<div class="archive-nav">
            <div class="nav-previous"><?php next_posts_link( __( 'Older posts <span class="meta-nav">&rarr;</span>', 'generous' ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts', 'generous' ) ); ?></div>
        </div>
        <?php
        endif;

    }
    
endif;