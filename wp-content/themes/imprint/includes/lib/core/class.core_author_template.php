<?php
/**
 * Author Template Class
 * 
 * Displays Content on author.php file.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */
    
/**
 * Displays Author Template
 * 
 * @since Imprint 1.0
 */
class Imprint_Author_Template {

    
        /**
         * Constructor - Initialize the class.
         * 
         * @uses imprint_run_the_loop()
         * @access public
         * @since Imprint 1.0
         */
        public function __construct(){
            add_action( 'imprint_author_template_hook', array( $this, 'show_author_meta_container' ), 10);
            add_action( 'imprint_author_template_hook', 'imprint_run_the_loop', 20 );
        }
        
        
        /**
         * Shows the author meta information.
         * 
         * @access public
         * @since Imprint 1.0
         */
        public function show_author_meta_container() {
            
            the_post();
            
            ?>
                    <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1 class="page-title author"><?php printf( __( 'Author : %s', 'imprint' ), "<span>" . get_the_author() . "</span>" ); ?></h1>
                         </div>
                         <div class="archive-description">
                              <?php
                                   if ( get_the_author_meta( 'description' ) ) :
                                   	printf( __( '%s', 'imprint' ), "<p>" . get_the_author_meta( 'description' ) . "</p>" );
                                   endif;
                              ?>
                         </div>


                    </div><!-- Archive Meta Container ends -->
            <?php
            
            rewind_posts();

        }
    
}
    
      
/**
 * Object Instantiated
 * 
 * @since Imprint 1.0
 */
$Imprint_Author_Template_Obj = new Imprint_Author_Template;