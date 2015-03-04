<?php
/**
 * Homepage Template Class
 * 
 * Displays Content on homepage.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */


    
/**
 * Displays Homepage Template
 * 
 * @since Imprint 1.0
 */
class Imprint_Homepage_Template {
    
        /**
         * Constructor - Initialize the class.
         * 
         * @uses imprint_index_template_hook()
         * @uses imprint_run_the_loop()
         * @access public
         * @since Imprint 1.0
         */
        public function __construct(){
            add_action( 'imprint_index_template_hook', 'imprint_run_the_loop', 20 );
        }
    }
    
/**
 * Object Instantiated
 * 
 * @see Imprint_Homepage_Template
 * @since Imprint 1.0
 */
$Imprint_Homepage_Template_Obj = new Imprint_Homepage_Template;