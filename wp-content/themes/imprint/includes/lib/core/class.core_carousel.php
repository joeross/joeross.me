<?php
/**
 * Carousel Class
 *
 * @package Imprint
 * @subpackage Core
 * @category Carousel
 * @since 1.0
 */


/**
 * Class used to manage carousel formats.
 * 
 * @internal This class will be extended and called via the subclass. Only the slideshow features will be extended by the subclass and all others are defined descriptionin this parent class instead.
 * @since 1.0
 * 
 * @abstract
 */

abstract class Imprint_Carousel {
    
        /**
         * Method shows featured image if enabled.
         * @since 1.0
         * 
         * @access protected
         */
        protected function _showFeatured() {
                $header_image = get_header_image();
                if ( $header_image ) :

                 echo '<div id="featured-container">';
                 echo '<img class="custom-header-image" src="' . get_header_image() . '"  alt="" />';
                 echo '</div>';

                endif;        
            }

            /**
             * Method is called when nothing is to be shown.
             * 
             * @return false // Just quit and show nothing but quietly add div structure.
             * @since 1.0
             * 
             * @access protected
             */
            protected function _showNone() {
                echo '<div id="featured-container" class="featured-none"></div>';
                return;        
            }
            
            /**
             * Abstract method used to display slideshow.
             * 
             * @internal This method is defined by the sub-class and will be different for different theme version.
             * @since 1.0
             * 
             * @access protected
             * @abstract
             */
            abstract protected function _showSlideshow();
}