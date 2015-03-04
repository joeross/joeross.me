jQuery(document).ready(function($) {

	function navMenu() {

		var sidebarToggle = $('#sidebar-toggle');
		var menuToggle = $('#menu-toggle');
		var socialLinksToggle = $('#social-links-toggle');
		var searchToggle = $('#search-toggle');

		var socialLinksNav = $('#social-links-toggle-nav');
		var sidebarNav = $('#sidebar-toggle-nav');
		var searchNav = $('#search-toggle-nav');
		var menuNav = $('#menu-toggle-nav');

		function myToggleClass( $myvar ) {
			if ( $myvar.hasClass( 'active' ) ) {
				$myvar.removeClass( 'active' );
			} else {
				$myvar.addClass('active');
			}
		}

		// Display/hide sidebar
		sidebarToggle.on('click', function() {
			sidebarNav.slideToggle();
			myToggleClass($(this));

			socialLinksNav.hide();
			menuNav.hide();
			searchNav.hide();

			searchToggle.removeClass('active');
			menuToggle.removeClass('active');
			socialLinksToggle.removeClass('active');
			
			$('#sidebar-toggle-nav').resize();
		});
		// Display/hide social links
		socialLinksToggle.on('click', function() {
			socialLinksNav.slideToggle();
			myToggleClass($(this));

			menuNav.hide();
			searchNav.hide();
			sidebarNav.hide();

			searchToggle.removeClass('active');
			menuToggle.removeClass('active');
			sidebarToggle.removeClass('active');
		});
		// Display/hide menu
		menuToggle.on('click', function() {
			menuNav.slideToggle();
			myToggleClass($(this));

			searchNav.hide();
			sidebarNav.hide();
			socialLinksNav.hide();

			searchToggle.removeClass('active');
			sidebarToggle.removeClass('active');
			socialLinksToggle.removeClass('active');
		});
		// Display/hide search
		searchToggle.on('click', function() {
			searchNav.slideToggle();
			myToggleClass($(this));

			sidebarNav.hide();
			socialLinksNav.hide();
			menuNav.hide();

			sidebarToggle.removeClass('active');
			menuToggle.removeClass('active');
			socialLinksToggle.removeClass('active');
		});
	}
	$(window).on('load', navMenu);
} );