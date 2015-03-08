<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0 
 */

if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Returns the default options for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_get_default_theme_options() {
	
	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> get_template_directory_uri() . '/images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,
		
		//Layout
		'theme_layout' 										=> 'three-columns',
		'content_layout'									=> 'excerpt-featured-image',
		'single_post_image_layout'							=> 'disabled',
		
		//Header Image
		'enable_featured_header_image'						=> 'disabled',
		'featured_image_size'								=> 'full',
		'featured_header_image_url'							=> '',
		'featured_header_image_alt'							=> '',
		'featured_header_image_base'						=> 0,

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Excerpt Options
		'excerpt_length'									=> '40',
		'excerpt_more_text'									=> __( 'Read More ...', 'catchbase' ),
		
		//Homepage / Frontpage Settings
		'front_page_category'								=> array(),
		
		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'homepage',
		'promotion_headline'								=> __( 'Catch Base is a Premium Responsive WordPress Theme', 'catchbase' ),
		'promotion_subheadline'								=> __( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'catchbase' ),
		'promotion_headline_button'							=> __( 'Reviews', 'catchbase' ),
		'promotion_headline_url'							=> esc_url( 'http://wordpress.org/support/view/theme-reviews/catch-base' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> __( 'Search...', 'catchbase' ),

		//Basic Color Options
		'color_scheme' 										=> 'light',	
		
		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-four',
		//move_posts_home replaced with featured_content_position from version 1.1
		'move_posts_home'									=> 0,
		'featured_content_position'							=> 0,
		'featured_content_headline'							=> '',
		'featured_content_subheadline'						=> '',
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_number'							=> '4',

		//Featured Slider Options
		'featured_slider_option'							=> 'homepage',
		'featured_slide_transition_effect'					=> 'fadeout',
		'featured_slide_transition_delay'					=> '4',
		'featured_slide_transition_length'					=> '1',
		'featured_slider_type'								=> 'demo-featured-slider',
		'featured_slide_number'								=> '4',
		
		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'catchbase_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of color schemes registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_color_schemes() {
	$color_scheme_options = array(
		'light' => array(
			'value' 				=> 'light',
			'label' 				=> __( 'Light', 'catchbase' ),
		),
		'dark' => array(
			'value' 				=> 'dark',
			'label' 				=> __( 'Dark', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catchbase' ),
		),
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catchbase' ),
		),
		'three-columns'	=> array(
			'value' => 'three-columns',
			'label' => __( 'Three Columns ( Secondary Sidebar, Content, Primary Sidebar )', 'catchbase' ),
		),
		'no-sidebar'	=> array(
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catchbase' ),
		),
	);
	return apply_filters( 'catchbase_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-featured-image' => array(
			'value' => 'excerpt-featured-image',
			'label' => __( 'Show Excerpt', 'catchbase' ),
		),		
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Catchbase 1.0
 */
function catchbase_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'catchbase' ),
		),
		'exclude-home' 		=> array(
			'value'	=> 'exclude-home',
			'label' => __( 'Excluding Homepage', 'catchbase' ),
		),
		'exclude-home-page-post' 	=> array(
			'value' => 'exclude-home-page-post',
			'label' => __( 'Excluding Homepage, Page/Post Featured Image', 'catchbase' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'catchbase' ),
		),
		'entire-site-page-post' 	=> array(
			'value' => 'entire-site-page-post',
			'label' => __( 'Entire Site, Page/Post Featured Image', 'catchbase' ),
		),
		'pages-posts' 	=> array(
			'value' => 'pages-posts',
			'label' => __( 'Pages and Posts', 'catchbase' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Catchbase 1.0
 */
function catchbase_featured_image_size_options() {
	$featured_image_size_options = array(
		'full' 		=> array(
			'value'	=> 'full',
			'label' => __( 'Full Image', 'catchbase' ),
		),
		'large' 	=> array(
			'value' => 'large',
			'label' => __( 'Large Image', 'catchbase' ),
		),
		'slider'		=> array(
			'value' => 'slider',
			'label' => __( 'Slider Image', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'catchbase' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'catchbase' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of feature content types registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => array(
			'value' => 'demo-featured-content',
			'label' => __( 'Demo Featured Content', 'catchbase' ),
		),
		'featured-page-content' => array(
			'value' => 'featured-page-content',
			'label' => __( 'Featured Page Content', 'catchbase' ),
		)
	);

	return apply_filters( 'catchbase_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' 		=> array(
			'value'	=> 'layout-three',
			'label' => __( '3 columns', 'catchbase' ),
		),
		'layout-four' 	=> array(
			'value' => 'layout-four',
			'label' => __( '4 columns', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_featured_content_layout_options', $featured_content_layout_option );
}


/**
 * Returns an array of feature slider types registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => array(
			'value' => 'demo-featured-slider',
			'label' => __( 'Demo Featured Slider', 'catchbase' ),
		),
		'featured-page-slider' => array(
			'value' => 'featured-page-slider',
			'label' => __( 'Featured Page Slider', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Catchbase 1.0
 */
function catchbase_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> array(
			'value'	=> 'fade',
			'label' => __( 'Fade', 'catchbase' ),
		),
		'fadeout' 	=> array(
			'value'	=> 'fadeout',
			'label' => __( 'Fade Out', 'catchbase' ),
		),
		'none' 		=> array(
			'value' => 'none',
			'label' => __( 'None', 'catchbase' ),
		),
		'scrollHorz'=> array(
			'value' => 'scrollHorz',
			'label' => __( 'Scroll Horizontal', 'catchbase' ),
		),
		'scrollVert'=> array(
			'value' => 'scrollVert',
			'label' => __( 'Scroll Vertical', 'catchbase' ),
		),
		'flipHorz'	=> array(
			'value' => 'flipHorz',
			'label' => __( 'Flip Horizontal', 'catchbase' ),
		),
		'flipVert'	=> array(
			'value' => 'flipVert',
			'label' => __( 'Flip Vertical', 'catchbase' ),
		),
		'tileSlide'	=> array(
			'value' => 'tileSlide',
			'label' => __( 'Tile Slide', 'catchbase' ),
		),
		'tileBlind'	=> array(
			'value' => 'tileBlind',
			'label' => __( 'Tile Blind', 'catchbase' ),
		),
		'shuffle'	=> array(
			'value' => 'shuffle',
			'label' => __( 'Suffle', 'catchbase' ),
		)
	);

	return apply_filters( 'catchbase_featured_slide_transition_effects', $featured_slide_transition_effects );
}


/**
 * Returns an array of color schemes registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'catchbase' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'catchbase' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'catchbase' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'catchbase' ),
		),
	);

	return apply_filters( 'catchbase_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Catchbase 1.0
 */
function catchbase_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'large' => array(
			'value' => 'large',
			'label' => __( 'Large', 'catchbase' ),
		),
		'medium' => array(
			'value' => 'medium',
			'label' => __( 'Medium', 'catchbase' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full size', 'catchbase' ),
		),
		'slider-image-size' => array(
			'value' => 'slider-image-size',
			'label' => __( 'Slider Image Size', 'catchbase' ),
		),		
		'disabled' => array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catchbase' ),
		),
	);
	return apply_filters( 'catchbase_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Catchbase 1.0
*/
function catchbase_get_social_icons_list() {
	$catchbase_social_icons_list =	array( 
											__( 'Facebook', 'catchbase' ), 
											__( 'Twitter', 'catchbase' ), 
											__( 'Googleplus', 'catchbase' ),
											__( 'Email', 'catchbase' ),
											__( 'Feed', 'catchbase' ),	
											__( 'WordPress', 'catchbase' ), 
											__( 'GitHub', 'catchbase' ), 
											__( 'LinkedIn', 'catchbase' ), 
											__( 'Pinterest', 'catchbase' ), 
											__( 'Flickr', 'catchbase' ), 
											__( 'Vimeo', 'catchbase' ), 
											__( 'YouTube', 'catchbase' ), 
											__( 'Tumblr', 'catchbase' ), 
											__( 'Instagram', 'catchbase' ), 
											__( 'PollDaddy', 'catchbase' ),
											__( 'CodePen', 'catchbase' ), 
											__( 'Path', 'catchbase' ), 
											__( 'Dribbble', 'catchbase' ), 
											__( 'Skype', 'catchbase' ), 
											__( 'Digg', 'catchbase' ), 
											__( 'Reddit', 'catchbase' ), 
											__( 'StumbleUpon', 'catchbase' ), 
											__( 'Pocket', 'catchbase' ), 
											__( 'DropBox', 'catchbase' ),
											__( 'Foursquare', 'catchbase' ),											
											__( 'Spotify', 'catchbase' ),
											__( 'Twitch', 'catchbase' ),
										);

	return apply_filters( 'catchbase_social_icons_list', $catchbase_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'catchbase' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catchbase' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catchbase' ),
		),
		'three-columns'	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'three-columns',
			'label' => __( 'Three Columns ( Secondary Sidebar, Content, Primary Sidebar )', 'catchbase' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catchbase' ),
		),
	);
	return apply_filters( 'catchbase_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'catchbase-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catchbase' ),
		),
		'enable' => array(
			'id'		=> 'catchbase-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'catchbase' ),
		),	
		'disable' => array(
			'id'		=> 'catchbase-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'catchbase' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'catchbase-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catchbase' ),
		),							   
		'featured' => array(
			'id'		=> 'catchbase-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'catchbase' )
		),
		'full' => array(
			'id' => 'catchbase-featured-image',
			'value' => 'full',
			'label' => __( 'Full Image', 'catchbase' )
		),
		'slider' => array(
			'id' => 'catchbase-featured-image',
			'value' => 'slider',
			'label' => __( 'Slider Image', 'catchbase' )
		),
		'disable' => array(
			'id' => 'catchbase-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'catchbase' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns catchbase_contents registered for catchbase.
 *
 * @since Catchbase 1.0
 */
function catchbase_get_content() {
	$theme_data = wp_get_theme();

	$catchbase_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', '1: Year, 2: Site Title with home URL', 'catchbase' ), date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

	$catchbase_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'catchbase' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'catchbase_get_content', $catchbase_content );
}