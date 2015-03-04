<?php
/**
 * Imprint_Carousel Extended via Imprint_Carousel_Ext
 * 
 * @package Imprint
 * @subpackage Extend
 * @category Template
 * @since Imprint 1.0 
 */

if( !class_exists('Imprint_Carousel_Ext') ):
    
    class Imprint_Carousel_Ext extends Imprint_Carousel {


        /**
         * Extended class calls specific carousel display method when required.
         * 
         * @internal _showSlideshow() abstact method is defined, all other methods are defined in the parent class.
         * @since Imprint 1.0
         */
        function __construct() {

                global $imprint_options;
                
                if($this->_checkLocation()):

                    $carousel = $imprint_options['carousel'];
                    switch($carousel):
                            case('featured'):
                            $this->_showFeatured();
                            break;

                            case('slideshow'):
                            $this->_showSlideshow();
                            break;

                            case('none'):
                            $this->_showNone();
                            break;

                    endswitch;

                endif;
        }


        private function _checkLocation() {
            global $imprint_options;
            
            $location = $imprint_options['carousel_location'];
            
            switch ($location):
                
                case('everywhere'):
                    return true;
                    break;
                
                case('both'):
                    if(is_single() || is_page()){
                        return true;                        
                    } else {
                        return false;
                    }
                    break;
                    
                case('pages'):
                    if(is_page()){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                    
                case('posts'):
                    if(is_single()){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                    
                case('homepage'):
                    if(is_front_page() || is_home()){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                    
                default:
                    return false;
            endswitch;
            
        }
        /**
         * Abstract module used to display slideshow.
         * It gets all the slides URL from the database and then echos the output.
         * 
         * @internal This module must be different for premium and free theme versions.
         * @since 1.0
         */
        protected function _showSlideshow() {

            global $imprint_options;

            ?>
            <?php
            for ($i = 1; $i <= 2; $i++):
                $slides[$i] = $imprint_options['slide_' . $i];
            endfor;

            $error = array_filter($slides); // Check if array is empty.

            if (!empty($error)):
                ?>
                <div id = "featured-container" class = "slider">
                    <div class = "flexslider">
                        <ul class = "slides">
                            <?php
                            if(is_array($slides)):
                                foreach ($slides as $slides):
                                    if(!empty($slides)): 
                                        ?>
                                        <li>
                                            <img src="<?php echo $slides; ?>" />
                                        </li>
                                            <?php
                                    endif;
                                endforeach;
                            endif;
                            ?>
                        </ul>
                  </div>
                </div>
            <?php
            endif;                   
            }
    }
endif;