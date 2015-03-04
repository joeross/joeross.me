<?php
/**
 * Imprint Layout Class
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */

/**
 * Class is responsible for modifying layout of Imprint Theme
 * 
 * @since Imprint 1.0
 */
class Imprint_Layout {
        
        /**
         * Viewport Layout Type
         * 
         * @var string Viewport type from Database Options
         * @since Imprint 1.0
         * @access public
         * @static
         */
        static $viewport_layout;
        
        
        /**
         * Public interface to register sidebars.
         * 
         * @internal Method calls other methods to register their individual sidebars.
         * @access public
         * @since Imprint 1.0
         * @static
         */
        public static function sidebars(){
            self::_sidebars_main();
            self::_sidebars_top();
            self::_sidebars_footerbox();
        }
        

        /**
         * Method is used to register sidebar into wordpress
         * 
         * @param string $sidebar Sidebar Array to be registered
         * @since Imprint 1.0
         * @access private
         * @static
         */
        private static function _sidebars_register($sidebar){
            if($sidebar):
                foreach( $sidebar as $sidebar ):
                    register_sidebar( array(
                                    'name' => $sidebar['name'],
                                    'id' => $sidebar['id'],
                                    'description' => $sidebar['description'],
                                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                                    'after_widget' => '</div>',
                                    'before_title' => '<h4 class="widget-title">',
                                    'after_title' => '</h4>',
                                    ));
		endforeach;
	endif;
            
        }

        /**
         * Method Register's Main Sidebars. Gets the options from Database
         * and then decides whether to register any sidebar or not.
         * 
         * @uses self::_is_sidebar_rightorleft() Gets the Sidebar Float (either left or right)
         * @uses self::_sidebars_sanitize Get sanitized sidebar
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _sidebars_main(){
            global $imprint_options;
           
            $layout = self::_sidebars_sanitize($imprint_options['viewport_layout']) ;
            
                switch($layout):
                 
                    case('no_sidebar'):
                        $sidebar = array();
                        break;

                    default:
                        $sidebar = array(
                                        array(
                                            'name' => 'Primary Sidebar',
                                            'id' => 'primary_sidebar',
                                            'description' => 'Primary Sidebar displayed on the '. self::_is_sidebar_rightorleft($layout) .'.'
                                            ));
                    break;

                endswitch;
                
                self::_sidebars_register($sidebar);
        }

        /**
         * Method Registers Footerbox Sidebars.
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _sidebars_footerbox(){
            
            global $imprint_options;

            $footer_box_columns = $imprint_options['footer_box_columns'];
            $sidebar = array();

            switch( $footer_box_columns ):
                case('four'):
                    $sidebar = array(
                        array(
                            'name' => 'Footerbox Sidebar #4',
                            'id' => 'footerbox_4',
                            'description' => 'Footer Box #4'
                            ));
                    default:
                        array_unshift( $sidebar,
                            array(
                                'name' => 'Footerbox Sidebar #3',
                                'id' => 'footerbox_3',
                                'description' => 'Footer Box #3'
                                ));

                        array_unshift( $sidebar,
                            array(
                                'name' => 'Footerbox Sidebar #2',
                                'id' => 'footerbox_2',
                                'description' => 'Footer Box #2'
                                ));

                        array_unshift( $sidebar,
                            array(
                                'name' => 'Footerbox Sidebar #1',
                                'id' => 'footerbox_1',
                                'description' => 'Footer Box #1'
                                ));
            endswitch;

            self::_sidebars_register($sidebar);
        }
        
        /**
         * Method Registers Top Sidebar
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _sidebars_top(){
            $sidebar = array(
                            array(
                                'name' => 'Top Sidebar',
                                'id' => 'sidebar_top',
                                'description' => 'This Sidebar is displayed on the top.'
                                ));
        self::_sidebars_register($sidebar);	
        }
        
        /**
         * Method is used to return float position of current sidebar.
         * 
         * @param string $layout Viewport Layout (Sanitized using _sidebar_sanitize())
         * @return string 'right' or 'left' (sidebar)
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _is_sidebar_rightorleft($layout) {
            if($layout === 'left_sidebar'):
                return 'left';
            elseif($layout === 'right_sidebar'):
                return 'right';
            endif;
        }

        /**
         * Method returns sanitized sidebar name. It returns human
         * understandable format of viewport layout registered.
         * (Although it is unneccassary but still used).
         * 
         * @param string $layout DB Options
         * @return string|boolean Sanitized sidebar value or FALSE(never used)
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         * 
         * @todo To be Depreciated.
         */
        private static function _sidebars_sanitize($layout){
            switch($layout):
                case('left_viewport_content'):
                    return 'right_sidebar';

                case('right_viewport_content'):
                    return 'left_sidebar';

                case('only_viewport_content'):
                    return 'no_sidebar';

                default:
                    return FALSE;

            endswitch;
         }

         
        /**
         * Method used to get the classname of the container.
         * 
         * @param string $option Name of the container whose class is required.
         * @return string CSS classname
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _get_class($option) {
            global $imprint_options;

            self::$viewport_layout = $imprint_options['viewport_layout'];

            switch(self::$viewport_layout):
                
                case('left_viewport_content'):
                    return ($option === 'container')?'container-left':'sidebar-right';
                    
                case('right_viewport_content'):
                    return ($option === 'container')?'container-right':'sidebar-left';
                    
                case('only_viewport_content'):
                    return ($option === 'container')?'container-only':'sidebar-none';
                    
                default:
                    return 'container-left';
            endswitch;
            
        }
        
        /**
         * Method checks the supplied parameter (which is sidebar name)
         * with the current selected viewport layout and returns either 
         * true|false to determine that the asked for sidebar is active or not.
         * 
         * @param string $sidebar The sidebar name (such as left or right)
         * @return bool True is sidebar is active and False is sidebar is inactive.
         * 
         * @access public
         * @since Imprint 1.0
         * @static
         */
        public static function is_sidebar( $sidebar ) {
            global $imprint_options;
            self::$viewport_layout = $imprint_options['viewport_layout'];
            
            $meta_layout_type = get_post_meta(get_post()->ID, '_imprint_post_layout_type', true);
            
            if(isset($meta_layout_type) && $meta_layout_type == 'fullscreen'){return;}
            
            switch(self::$viewport_layout):
                
                case('left_viewport_content'):
                    return ($sidebar === 'left')? false: true;
                    
                case('right_viewport_content'):
                    return ($sidebar === 'left')? true: false;
                    
                case('only_viewport_content'):
                    return ($sidebar === 'left')? false: false;
                    
                default:
                    return ($sidebar === 'left')? true: false;
            endswitch;

        }

        /**
         * Method returns the classname of Contenet Container
         * 
         * @uses self::_get_class() Get the CSS classname
         * @return string Classname of Content Container
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        public static function get_container_class(){
            if(function_exists('imprint_push_container_class') && imprint_push_container_class() && is_single()){
                return imprint_push_container_class();
            } else{
            return self::_get_class('container');
            }
        }
        

        /**
         * Method returns the classname of Sidebar
         * 
         * @uses self::_get_class() Get the CSS classname
         * @return string Classname of Sidebar
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        public static function get_sidebar_class(){
            if(function_exists('imprint_push_sidebar_class') && imprint_push_sidebar_class() && is_single()){
                return imprint_push_sidebar_class();
            } else{
            return self::_get_class('sidebar');
            }
        }           
}

add_action( 'widgets_init', 'Imprint_Layout::sidebars' );