<?php
/**
 * Template for displaying author archive page.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */

get_header();
?>

      <div id="content-container" class="<?php echo imprint_get_container_class(); ?>" >
           <div id="archive-container" class="archive-author archive-content">

                <?php
                
                    if ( have_posts() ) :
                        imprint_content_container_first_hook();
                        imprint_author_template_hook();
                        imprint_archive_template_hook();
                        imprint_content_container_last_hook();

                    else :

                        imprint_404_content_hook();
                    
                    endif;
                    
                    ?>

           </div><!-- Archive Container ends here -->
      </div><!-- Content Container ends here -->
<?php
get_sidebar();
get_footer();
?>