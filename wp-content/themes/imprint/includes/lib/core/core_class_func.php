<?php
/**
 * Functions declared after loading classes.
 * 
 * @internal This file can only be called after classes have been loaded.
 * 
 * @package Imprint
 * @subpackage Core
 * @category Functions
 * @since Imprint 1.0
 */



    
/**
 * Returns CSS Classname for the container.
 * 
 * @uses Imprint_Layout::get_container_class() Gets the container classname
 * 
 * @return string CSS classname
 * @since Imprint 1.0
 */
function imprint_get_container_class() {
    return Imprint_Layout::get_container_class();
}

    
/**
 * Returns CSS Classname for the sidebar.
 * 
 * @uses Imprint_Layout::get_sidebar_class() Gets the sidebar classname
 * 
 * @return string CSS classname
 * @since Imprint 1.0
 */
function imprint_get_sidebar_class() {
    return Imprint_Layout::get_sidebar_class();
}


/**
 * Returns CSS Classname for Homepage
 * 
 * @uses Imprint_Layout::get_homepage_class() Gets the homepage classname
 * 
 * @return string CSS classname
 * @since Imprint 1.0
 * 
 * @todo Make it active (Current state N/A)
 */
function imprint_get_homepage_class() {
    return Imprint_Layout::get_homepage_class();
}


/**
 * Returns whether left sidebar is active or not.
 * 
 * @uses Imprint_Layout::is_sidebar() Gets the state of left sidebar (active or not)
 * 
 * @return bool true if sidebar is active | false is sidebar is inactive
 * @since Imprint 1.0
 */
function imprint_is_sidebar_left() {
    return Imprint_Layout::is_sidebar('left');
}


/**
 * Returns whether right sidebar is active or not.
 * 
 * @uses Imprint_Layout::is_sidebar() Gets the state of right sidebar (active or not)
 * 
 * @return bool true if sidebar is active | false is sidebar is inactive
 * @since Imprint 1.0
 */
function imprint_is_sidebar_right() {
    return Imprint_Layout::is_sidebar('right');
}


/**
 * Calls Footerbox
 * 
 * @uses Imprint_Footerbox::_call_footerbox() Gets the footerbox
 * 
 * @global mixed $imprint_options
 * @since Imprint 1.0
 */
function imprint_get_footerbox() {
    global $imprint_options;
      
    if(!$imprint_options['disable_footerbox']):
        Imprint_Footerbox::_call_footerbox();
    endif;
}