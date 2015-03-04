<?php
/**
 * Imprint Tag Template Class
 * 
 * Displays Content on tag.php file.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */



/**
 * Imprint Tag Template
 * 
 * @since Imprint 1.0
 */
class Imprint_Tag_Template {

        /**
         * Constructor - Initialize the class.
         * 
         * @uses imprint_tag_template_hook Hook called on tag.php
         */
        public function __construct() {
            add_action( 'imprint_tag_template_hook', array($this, 'show_tag_meta_container'), 10 );
            add_action( 'imprint_tag_template_hook', 'imprint_run_the_loop', 20 );
        }
        
        /**
         * Shows the tag meta information
         * 
         * @since Imprint 1.0
         */
        public function show_tag_meta_container(){
            ?>        
            <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1><?php printf( __( 'Tag : %s', 'imprint' ), '<span>' . single_term_title( '', false ) . '</span>' ); ?></h1>
                         </div>
                         <div class="archive-description">
                              <?php
                                   $tag_description = tag_description();
                                   if ( ! empty( $tag_description ) )
                                   echo apply_filters( 'tag_archive_meta', '' . $tag_description . '' );
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
$Imprint_Tag_Template_Obj = new Imprint_Tag_Template;
