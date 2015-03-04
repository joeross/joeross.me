<?php
/*
 * Template for displaying single posts.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */

get_header();
?>
      <div id="content-container" class="<?php echo imprint_get_container_class(); ?>" >
           <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <?php 
              if( have_posts() ) :
                imprint_content_container_first_hook();
                while( have_posts() ): the_post();
                    if(function_exists('imprint_push_loop_functions')):
                        imprint_push_loop_functions();
                    endif;

                    imprint_post_template_hook();
                endwhile;
                imprint_content_container_last_hook();
              endif;?>


           </div><!-- Post Container ends here -->
      </div><!-- Content Container ends here -->
<?php
get_sidebar();
get_footer();
?>