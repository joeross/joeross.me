/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(document).ready(function(){
	jQuery('.menu-toggle').click(function(){
		if ( jQuery( '.main-navigation' ).hasClass('toggled') ) {
			jQuery('.main-navigation').removeClass('toggled');
		}
		else {
			jQuery('.main-navigation').addClass('toggled');
		}
	});
});