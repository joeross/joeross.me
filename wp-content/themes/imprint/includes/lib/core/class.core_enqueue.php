<?php
/**
 * Enqueue Class
 * 
 * Enqueues required scripts and styles into the theme.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Enqueue
 * @since Imprint 1.0
 */


/**
 * Enqueues the required CSS and Javascript files.
 * 
 * @since 1.0
 */
class Imprint_Enqueue {

    
        /**
         * Constructor - Initialize the class.
         * Hooks into 'wp_enqueue_scripts'
         * 
         * @access public
         * @since Imprint 1.0
         */
        public function __construct() {
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scipts' ), 10);
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_style_css' ), 90);
        add_action('wp_head', array($this, 'ie_scripts'));
        }

        
        
        
        /**
         * Enqueues all the required CSS and JS files into the theme
         * 
         * @access public
         * @since Imprint 1.0
         */
        public function enqueue_scipts() {
            
            global $imprint_options;

            $this->_enqueue_fonts();

            wp_enqueue_style( 'style-init', get_template_directory_uri() . '/style-init.css', array() );
            wp_enqueue_style( 'imprint-font-awesome', IMPRINT_ADMIN_CSS . 'font-awesome.4.1.0.min.css', array(), '4.1.0' );
            wp_enqueue_style( 'imprint-shortcodes-css', IMPRINT_GLOBAL_CSS . 'addon/shortcodes.css', array(), '1.0' );
            $this->enqueue_structure();
            wp_enqueue_style( 'layout', IMPRINT_GLOBAL_CSS . 'core/layout.css', array() );
            wp_enqueue_style( 'flexslider-css', IMPRINT_GLOBAL_CSS . 'addon/flexslider.css', array(), '2.2.0' );
            wp_enqueue_style( 'superfish', get_template_directory_uri() . '/assets/global/css/addon/superfish.css', array(), '1.4.8' );
            $this->_enqueue_skin();
            
            
            wp_enqueue_script( 'flexslider-js', IMPRINT_GLOBAL_JS . 'jquery.flexslider-min.js', 'jquery', '2.2.0', TRUE );
            wp_enqueue_script( 'flexslider-js-call', IMPRINT_GLOBAL_JS . 'flexslider-call.js', 'flexslider-js', '2.2.0', TRUE );
            wp_localize_script('flexslider-js-call', 'imprint_slide_vars', array(
                'slideshowSpeed' => $imprint_options['slide_speed'],
                'animationSpeed' => $imprint_options['slide_ani_speed'],
                'directionNav' => (bool) $imprint_options['disable_slide_nav'] ? '' : 'true',
                'smoothHeight' => (bool) $imprint_options['disable_smooth_height'] ? '' : 'true',
                'animation' => $imprint_options['slide_animation_type'],
                'direction' => $imprint_options['slide_dir'],
                ));
            wp_enqueue_script('superfish', get_template_directory_uri() . '/assets/global/js/superfish.js', array( 'jquery' ), '1.4.8', TRUE);
            wp_enqueue_script('imprint_js', get_template_directory_uri() . '/assets/global/js/custom.js', 'jquery', '1.0', TRUE);
            wp_enqueue_script('mud-resp-nav', get_template_directory_uri() . '/assets/global/js/mud-responsive-nav.js', 'jquery', '1.0', TRUE);
            
            
            $this->_comment_reply();

        }

        
        /**
         * Enqueues default style.css
         * 
         * @access public
         * @since Imprint 1.0
         */
        function enqueue_style_css(){
            wp_enqueue_style( 'default-style', get_stylesheet_uri() , array() );
        }
                
        
        /**
         * Enqueues Imprint Structure/Layout CSS Files
         * 
         * @global array $imprint_options
         * @access public
         * @since Imprint 1.0
         */      
        function enqueue_structure(){
            global $imprint_options;
            
            if($imprint_options['layout-type'] == 'boxed-fix'):
                wp_enqueue_style( 'structure', IMPRINT_GLOBAL_CSS . 'core/structure-boxed.css', array() );
                wp_enqueue_style( 'fixed', IMPRINT_GLOBAL_CSS . 'core/fixed.css', array() );
            endif;

            if($imprint_options['layout-type'] == 'boxed-res'):
                wp_enqueue_style('structure', IMPRINT_GLOBAL_CSS . 'core/structure-boxed.css', array());
                wp_enqueue_style('responsive', IMPRINT_GLOBAL_CSS . 'core/responsive.css', array());
            endif;
            
            if($imprint_options['layout-type'] == 'full-res'):
                wp_enqueue_style( 'structure', IMPRINT_GLOBAL_PUSH_CSS . 'structure-full-width.css', array() );
                wp_enqueue_style( 'responsive', IMPRINT_GLOBAL_CSS . 'core/responsive.css', array() );
            endif;
        }
        
        
        
        /**
         * Enqueue comment-reply script
         * 
         * @access public
         * @since Imprint 1.0
         */
        private function _comment_reply() {
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
                    wp_enqueue_script( 'comment-reply' );
            endif;
        }



        /**
          * Enqueues Google Web-Fonts into the theme.
          * 
          * @access private
          * @since Imprint 1.0
          */
         private function _enqueue_fonts(){
             $required_font = $this->_get_required_fonts();
         }
        
         
         
         /**
          * Method extracts only those values from DB Options (array) which fullfill 1 conditions:
          * i) They are defined in $imprint_fontface_options(array)
          * 
          * The extracted values are then passed on to Imprint_Enqueue::_check_fonts Method.
          * 
          * @global array $imprint_options
          * @global array $imprint_fontface_options
          * @access private
          * @since Imprint 1.0
          */
         private function _get_required_fonts(){
             global $imprint_options, $imprint_fontface_options;

             $options = $imprint_options;
             
             foreach ($options as $key=>$val):

                 if(FALSE !== array_search($key, $imprint_fontface_options)):
                     $this->_check_fonts($val);
                 endif;
                 
            endforeach;
         }

         
         
         /**
          * Compares font string received as a parameter with the global fonts array of
          * the theme. If it matches and is a Google Web-Font then the value is passed
          * on to Imprint::Enqueue::_link_fonts Method.
          * 
          * @global array $imprint_fonts Contain all the theme fonts.
          * @param string $font
          * @access private
          * @since Imprint 1.0
          */
         private function _check_fonts($font) {
             
            global $imprint_fonts;
            
            foreach ($imprint_fonts as $val) {
                $font_string = $val['shortname'];
                $font_type = $val['type'];

                if(($font_type == 'google-webfonts') && ($font == $font_string )):
                    $font_array = array('name'=>$val['name'],'variant'=>$val['variant']);
                    $this->_link_fonts($font_array);
                endif;
            }
         }
         
         
         
         /**
          * Method fetches the individual font array received and enueues it.
          * @access private
          * @since Imprint 1.0
          * 
          * @param array $fonts
          */
         private function _link_fonts($fonts){
             $name = str_replace(' ', '+', $fonts['name']);
             $variant = (!empty($fonts['variant']) ? ':' . $fonts['variant'] : '');

             wp_enqueue_style( 'google-webfonts' . $name , 'http:////fonts.googleapis.com/css?family=' . $name . $variant, false, null, 'all');
         }
         
         
         
         /**
          * Method enqueues skin based on db-options input.
          * Important: By default enqueues white.css even if no options array exists.
          * 
          * @access private
          * @since Imprint 1.0
          * 
          * @global array $imprint_options
          */
         private function _enqueue_skin() {
             global $imprint_options;
             
             // Switch theme only when $imprint_options (array) exists and it contains 'skin_color' as a key. Or enqueue white.css by default.
             if(is_array($imprint_options) && array_key_exists('skin_color', $imprint_options)):
                 
                    switch ($imprint_options['skin_color']):
                       case 'sandalwood':
                           wp_enqueue_style( 'skin-sandalwood', IMPRINT_GLOBAL_CSS . 'skins/sandalwood.css', array() );
                           break;                       
                       case 'natural-green':
                           wp_enqueue_style( 'skin-natural-green', IMPRINT_GLOBAL_CSS . 'skins/natural-green.css', array() );
                           break;                       
                       case 'bright-maroon':
                           wp_enqueue_style( 'skin-bright-maroon', IMPRINT_GLOBAL_CSS . 'skins/bright-maroon.css', array() );
                           break;                       
                       case 'ocean-blue':
                           wp_enqueue_style( 'skin-ocean-blue', IMPRINT_GLOBAL_CSS . 'skins/ocean-blue.css', array() );
                           break;                       
                       case 'pretty-purple':
                           wp_enqueue_style( 'skin-pretty-purple', IMPRINT_GLOBAL_CSS . 'skins/pretty-purple.css', array() );
                           break;                       
                       case 'casual-white':
                           wp_enqueue_style( 'skin-casual-white', IMPRINT_GLOBAL_CSS . 'skins/casual-white.css', array() );
                           break;                       
                       default:
                           wp_enqueue_style( 'skin-classic-white', IMPRINT_GLOBAL_CSS . 'skins/classic-white.css', array() );
                           break;
                    endswitch;
                 
             else:
                 wp_enqueue_style( 'skin-classic-white', IMPRINT_GLOBAL_CSS . 'skins/classic-white.css', array() );
             endif;
         }
         
         
         
         /**
          * Method outputs scripts related only to Internet Explorer and is called in
          * the header section of Theme.
          * 
          * @access public
          * @since Imprint 1.0
          */
         function ie_scripts(){
             echo "\n";
             echo "<!--[if lt IE 9]><script type='text/javascript' src='" . IMPRINT_GLOBAL_JS . "respond.js?ver=1.0'></script><![endif]-->";
             echo "\n";
        }
        
}
$Imprint_Enqueue_Obj = new Imprint_Enqueue();