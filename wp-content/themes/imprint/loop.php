<?php
/*
 * Template for displaying the loop.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */
?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <div class="archive-title">
         <?php imprint_archive_title_hook(); ?>
     </div>
     <div class="archive-meta">
         <?php imprint_archive_meta_hook(); ?>
     </div>
     <div class="archive-excerpt">
         <?php imprint_archive_excerpt_hook(); ?>
     </div>
    
</div>