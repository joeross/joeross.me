<?php
/**
 * Footerbox Class
 * 
 * @package Imprint
 * @subpackage Core
 * @since Imprint 1.0
 */



/**
 * Class is used to implement footerbox functionality
 * into the theme.
 * 
 * @since Imprint 1.0
 */
class Imprint_Footerbox {
    
    
        /**
         * Theme Options
         * 
         * @var array Hold Theme Options
         * @access private
         * @static
         * 
         */
        private static $db_option;
        
        
        /**
         * Primary Method that calls the Footerbox.
         * 
         * @since Imprint 1.0
         * @access public
         * @static
         */
        public static function _call_footerbox(){
            self::_set_db_option();

            if(self::_is_footerbox_active()):
                self::_display_footerbox();
            endif;

        }
        
        
        /**
         * Method sets the class variable value to the value stored in options database.
         * 
         * @access private
         * @static
         * 
         * @since Imprint 1.0
         */
        private static function _set_db_option(){
            global $imprint_options;
            
            self::$db_option = $imprint_options['footer_box_columns'];
        }
        
        
        /**
         * Method checks whether any sidebar in the footerbox is active or not.
         * 
         * @internal Checks the first three sidebar when the db_option value is 'three' and check all four sidebars when the db_option value is 'four'.
         * @uses self::$db_option The value in options database.
         * @return bool 'false' if no sidebar is active & 'true' by default.
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _is_footerbox_active(){
            $return_me = true;
                if(self::$db_option == 'three'):
                    if ( ! is_active_sidebar( 'footerbox_1'  ) && ! is_active_sidebar( 'footerbox_2'  ) && ! is_active_sidebar( 'footerbox_3'  )):
                        return false;
                    endif;
                endif;

                if (self::$db_option == 'four'):
                    if ( ! is_active_sidebar( 'footerbox_1'  ) && ! is_active_sidebar( 'footerbox_2'  ) && ! is_active_sidebar( 'footerbox_3'  ) && ! is_active_sidebar( 'footerbox_4'  )):
                        return false;
                    endif;
                endif;
            return $return_me;
        }
        
        /**
         * Method is used to display footerbox HTML.
         * 
         * @uses self::$db_option checks whether db_option value is three or four.
         * @internal First three sidebars are displayed whether the options is either 'three' or 'four'. But the fourth sidebar is displayed only if the option value is 'four'.
         * 
         * @access private
         * @since Imprint 1.0
         * @static
         */
        private static function _display_footerbox(){
            if(self::$db_option == 'three' || self::$db_option == 'four'):
                    ?>

                    <div id="sidebar-box">
                        <?php if ( is_active_sidebar( 'footerbox_1'  ) ) : ?>
                        <div id="footerbox_1" class="sidebar <?php echo self::_get_footerbox_class(); ?>">
                                <?php dynamic_sidebar( 'footerbox_1'  ); ?>
                            </div><!-- #footerbox_1 ends -->
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footerbox_2'  ) ) : ?>
                            <div id="footerbox_2" class="sidebar <?php echo self::_get_footerbox_class(); ?>">
                                 <?php dynamic_sidebar( 'footerbox_2'  ); ?>
                            </div><!-- #footerbox_2 ends -->
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footerbox_3'  ) ) : ?>
                            <div id="footerbox_3" class="sidebar <?php echo self::_get_footerbox_class(); ?>">
                                 <?php dynamic_sidebar( 'footerbox_3'  ); ?>
                            </div><!-- #footerbox_3 ends -->
                        <?php endif;

                        
                if (self::$db_option == 'four'):
                    ?>
                        
                    <?php if ( is_active_sidebar( 'footerbox_4'  ) ) : ?>
                        <div id="footerbox_4" class="sidebar <?php echo self::_get_footerbox_class(); ?>">
                            <?php dynamic_sidebar( 'footerbox_4'  ); ?>
                        </div><!-- #footerbox_4 ends -->
                    <?php endif;
                endif;
                ?></div><!-- #sidebar=box ends --><?php
                
            endif;

        }
        
        /**
         * Method returns footerbox sidebar class.
         * 
         * @uses self::$db_option checks whether db_option value is three or four.
         * @access private
         * @since Imprint 1.0
         * 
         * @return string Footerbox sidebar class.
         * @static
         */
        private static function _get_footerbox_class(){
            if(self::$db_option == 'three'):
                return 'footerbox_col_three';
            elseif(self::$db_option == 'four'):
                return 'footerbox_col_four';
            endif;
        }
}