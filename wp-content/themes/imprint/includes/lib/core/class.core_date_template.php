<?php
/**
 * Date(Archive) Template Class
 * 
 * Displays Content on archive.php file.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */

/**
 * Displays Date Tenplate
 * 
 * @since Imprint 1.0
 */
class Imprint_Date_Template {

        /**
         * Constructor - Initialize the class.
         *
         * @uses imprint_run_the_loop()
         * @access public
         * @since Imprint 1.0
         */
        public function __construct(){
            add_action( 'imprint_date_template_hook', array($this, 'show_date_meta_container'), 10 );
            add_action( 'imprint_date_template_hook', 'imprint_run_the_loop', 20 );
        }
        
        
        /**
         * Shows the Date(Archive) meta information.
         * 
         * @access public
         * @since Imprint 1.0
         */
        public function show_date_meta_container() {
            ?>
                <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1><?php if ( is_day() ) : ?>
                                    <?php printf( __( 'Daily Archives: %s', 'imprint' ), '<span>' . get_the_date() . '</span>' ); ?>
                              <?php elseif ( is_month() ) : ?>
                                    <?php printf( __( 'Monthly Archives: %s', 'imprint' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'imprint' ) ) . '</span>' ); ?>
                              <?php elseif ( is_year() ) : ?>
                                    <?php printf( __( 'Yearly Archives: %s', 'imprint' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'imprint' ) ) . '</span>' ); ?>
                              <?php else : ?>
                                    <?php _e( 'Blog Archives', 'imprint' ); ?>
                              <?php endif; ?></h1>
                         </div>
                         <div class="archive-description">
                         	<p>
					<?php printf( __( 'Archive of posts published in the specified %s', 'imprint' ), imprint_date_text() ); 
					// Function imprint_date_text decides and returns the accurate 'text' to be displayed.
					?>
                                </p>
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
$Imprint_Date_Template_Obj = new Imprint_Date_Template;