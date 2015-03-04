<?php
/**
 * Menu related functions
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 * 
 * @todo Class based in upcoming revision
 */



/**
 * Adds supports for Theme menu.
 * Imprint uses wp_nav_menu() in a single location to diaplay one single menu.
 * 
 * @since Imprint 1.0
 */
function imprint_menu_register() {
	register_nav_menus ( array(
					'primary' => 'Primary Menu',
					'bottom_menu' => 'Bottom Menu'
					));
}




/**
 * Defines menu values and call the menu itself.
 * The menu is registered using register_nav_menu function in the theme setup.
 * 
 * @since Imprint 1.0
 */
 function imprint_menu_call($menu_type) {
	switch($menu_type):

		case('primary'):
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container_id' => 'menu',
					'menu_class' => 'sf-menu',
					'menu_id' => 'imprint_primary_menu',
					'fallback_cb' => 'imprint_menu_fallback' // Fallback function in case no menu exists.
					));
				break;

		case('top_menu'):
				wp_nav_menu( array(
					'theme_location' => 'top_menu',
					'container_id' => 'top_menu',
					'menu_class' => 'sf-menu',
					'menu_id' => 'imprint_top_menu',
					));
				break;
		
		case('bottom_menu'):
				wp_nav_menu( array(
					'theme_location' => 'bottom_menu',
					'container_id' => 'bottom_menu',
					'menu_class' => 'sf-menu',
					'menu_id' => 'imprint_bottom_menu',
					));
				break;

	endswitch;
	
	
}





/**
 * Displays a custom menu in case either no menu is selected or
 * menu does not contains any items or wp_nav_menu() is unavailable.
 * 
 * @since Imprint 1.0
 */
function imprint_menu_fallback() {
?>
	<div id="menu">
    	<ul class="sf-menu" id="imprint_primary_menu">
			<?php
            	wp_list_pages( 'title_li=&sort_column=menu_order&depth=3');
            ?>
        </ul>
    </div>
<?php
}





/**
 * This function toggles the menu either above or below featured
 * image. The toggle setting can be configured in the Options Panel.
 * 
 * @since Imprint 1.0
 */
 
function imprint_menu_primary_toggle() {
        global $imprint_options;
        
        if(!$imprint_options['disable_pri_menu']):
        
            $of_menu_toggle = $imprint_options['menu_toggle'];

            if( $of_menu_toggle == 'above' ):
                    imprint_menu_primary_toggle_above();
            else:
                    imprint_menu_primary_toggle_below();
            endif;
            
        endif;
}




/**
 * Displays Top Menu
 * 
 * @since Imprint 1.0
 */
function imprint_menu_top_show() {
    ?>
    <?php if(has_nav_menu( 'top_menu' )): ?>
        <div id="top_menu_container">
            <?php imprint_menu_call('top_menu'); ?>
        </div>
    <?php endif; ?>
    <?php
}





/**
 * Displays Bottom Menu
 * 
 * @since Imprint 1.0
 */
function imprint_menu_bottom_show() {
    global $imprint_options;
    ?>
    <?php if(has_nav_menu( 'bottom_menu' ) && !$imprint_options['disable_bott_menu'] ): ?>
        <div id="bottom_menu_container">
            <?php imprint_menu_call('bottom_menu'); ?>
        </div>
    <?php endif; ?>
    <?php
}





/**
 * This function is called when the menu is displayed 
 * above featured image.
 * 
 * @since Imprint 1.0
 */
function imprint_menu_primary_toggle_above() {
?>
     <div id="menu-container">
          <div class="mudrn-tab"><a href="#">Menu</a></div>
          <?php imprint_menu_call('primary'); ?>
     </div>
     
     <?php imprint_carousel_call(); ?>

<?php
}




/**
 * This function is called when the menu is displayed 
 * below featured image.
 * 
 * @since Imprint 1.0
 */
function imprint_menu_primary_toggle_below() {
?>
     <?php imprint_carousel_call(); ?>

     <div id="menu-container">
          <div class="mudrn-tab"><a href="#">Menu</a></div>
          <?php imprint_menu_call('primary'); ?>
     </div>
<?php

}





/**
 * This function is called to display menu.
 * 
 * @since Imprint 1.0
 */
function imprint_menu_show ($menu_type) {
	switch($menu_type):
		case('primary'):
			imprint_menu_primary_toggle();
		break;
		case('top_menu'):
			imprint_menu_top_show();
		break;
		case('bottom_menu'):
			imprint_menu_bottom_show();
		break;
	endswitch;
}


add_action( 'after_setup_theme', 'imprint_menu_register' );