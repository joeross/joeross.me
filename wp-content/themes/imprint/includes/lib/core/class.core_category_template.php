<?php
/**
 * Category Template Class
 * 
 * Displays Content on category.php file.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */

/**
 * Displays Cateogory Template
 * 
 * @since Imprint 1.0
 */
class Imprint_Category_Template {

        /**
         * Constructor - Initialize the class.
         * @uses imprint_run_the_loop()
         * 
         * @access public
         * @since Imprint 1.0
         */
        public function __construct(){
            
            add_action( 'imprint_category_template_hook', array($this, 'show_category_meta_container'), 10 );
            add_action( 'imprint_category_template_hook', 'imprint_run_the_loop', 20 );
        }

        
        /**
         * Shows the category meta information
         * 
         * @access public
         * @since Imprint 1.0
         */
        public function show_category_meta_container() {
            ?>        
            <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1><?php printf( __( 'Category : %s', 'imprint' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
                         </div>
                         <div class="archive-description">
                              <?php
                                   $category_description = category_description();
                                   if ( ! empty( $category_description ) )
                                   echo apply_filters( 'category_archive_meta', '<span>' . $category_description . '</span>' );
                              ?>
                         </div>

            </div><!-- Archive Meta Container ends -->
            <?php
        }
    
}
    
    
/**
 * Object Instantiated
 * 
 * @since Imprint 1.0
 */
$Imprint_Category_Template_Obj = new Imprint_Category_Template;
