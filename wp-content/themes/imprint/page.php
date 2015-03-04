<?php
/*
 * Template for displaying single pages.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */

get_header();
?>

      <div id="content-container" class="<?php echo imprint_get_container_class(); ?>" >
           <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <?php if( have_posts() ) : while( have_posts() ): the_post(); ?>
               
               <?php imprint_content_container_first_hook(); ?>

                    <div class="post-title">
                          <h1><?php the_title(); ?></h1>
                    </div>


                    <div class="post-content">
                         <?php the_content(); ?>
                         <?php wp_link_pages(array('before' => '<div class="post-nav-link"><span>' . __('Pages:', 'imprint') . '</span>', 'after' => '</div>')); ?>
                    </div>

                    <div class="post-below-content">
                         <?php edit_post_link( __( 'Edit', 'imprint' ), '<div class="edit-link">', '</div>' ); ?>
                    </div>


              <?php endwhile; ?>

              <?php comments_template( '', true ); ?>

              <?php endif;?>


           </div><!-- Post Container ends here -->
      </div><!-- Content Container ends here -->
<?php
get_sidebar();
get_footer();
?>