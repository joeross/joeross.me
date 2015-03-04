<?php
/*
 * Template for displaying search queries.
 * 
 * @package Imprint
 * @since Imprint 1.0
 * @todo Make get_sidebar() to sidebar('left') & sidebar('right'), if testing doesn't goes well.
 */

get_header();
?>


      <div id="content-container" class="<?php echo imprint_get_container_class(); ?>" >
           <div id="archive-container" class="archive-search archive-content">

              <?php if( have_posts() ) : ?>
               
               <?php imprint_content_container_first_hook(); ?>

                    <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1><?php printf( __( ' Search Result for: %s', 'imprint' ), '<span>' . get_search_query() . '</span>' ) ?></h1>
                         </div>
                         
                    </div><!-- Archive Meta Container ends -->

                    <?php
						// Here starts the loop
                          while( have_posts() ): the_post();
                          get_template_part( 'loop', 'search' );
                          endwhile;
                    ?>
                                        
                        <?php
                        imprint_archive_template_hook();
                        imprint_content_container_last_hook();
                        ?>
                    
                    <?php imprint_archive_nav(); // Calls the 'Previous' and 'Next' Post Links. ?>

              <?php else : ?>

                    <?php imprint_archive_empty(); // Function dedicated for handling empty queries. ?>

              <?php endif;?>


           </div><!-- Archive Container ends here -->
      </div><!-- Content Container ends here -->
<?php
get_sidebar();
get_footer();
?>