<?php
/**
 * The template for adding additional theme options in Customizer
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0 
 */

// Additional Color Scheme (added to Color Scheme section in Theme Customizer)
if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

	
	//Theme Options
	if( 4 <= get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'catchbase_theme_options', array(
		    'description'    => __( 'Basic theme Options', 'catchbase' ),
		    'capability'     => 'edit_theme_options',
		    'priority'       => 200,
		    'title'    		 => __( 'Theme Options', 'catchbase' ),
		) );
	}

	// Breadcrumb Option
	$wp_customize->add_section( 'catchbase_breadcumb_options', array(
		'description'	=> __( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'catchbase' ),
		'panel'			=> 'catchbase_theme_options',
		'title'    		=> __( 'Breadcrumb Options', 'catchbase' ),
		'priority' 		=> 201,
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[breadcumb_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_option'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchbase_breadcumb_options', array(
		'label'    => __( 'Check to enable Breadcrumb', 'catchbase' ),
		'section'  => 'catchbase_breadcumb_options',
		'settings' => 'catchbase_theme_options[breadcumb_option]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[breadcumb_onhomepage]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_onhomepage'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchbase_breadcumb_onhomepage', array(
		'label'    => __( 'Check to enable Breadcrumb on Homepage', 'catchbase' ),
		'section'  => 'catchbase_breadcumb_options',
		'settings' => 'catchbase_theme_options[breadcumb_onhomepage]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[breadcumb_seperator]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_seperator'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchbase_breadcumb_seperator', array(
			'input_attrs' => array(
	            'style' => 'width: 40px;'
            	),
            'label'    	=> __( 'Seperator between Breadcrumbs', 'catchbase' ),
			'section' 	=> 'catchbase_breadcumb_options',
			'settings' 	=> 'catchbase_theme_options[breadcumb_seperator]',
			'type'     	=> 'text'
		) 
	);
   	// Breadcrumb Option End
   	
   	// Custom CSS Option
	$wp_customize->add_section( 'catchbase_custom_css', array(
		'description'	=> __( 'Custom/Inline CSS', 'catchbase'),
		'panel'  		=> 'catchbase_theme_options',
		'priority' 		=> 203,
		'title'    		=> __( 'Custom CSS Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[custom_css]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['custom_css'],
		'sanitize_callback' => 'catchbase_sanitize_custom_css',
	) );

	$wp_customize->add_control( new Catchbase_Customize_Textarea_Control ( $wp_customize, 'catchbase_theme_options[custom_css]', array(
			'label'		=> __( 'Enter Custom CSS', 'catchbase' ),
	        'priority'	=> 1,
			'section'   => 'catchbase_custom_css',
	        'settings'  => 'catchbase_theme_options[custom_css]',
			'type'		=> 'textarea',
	) ) );
   	// Custom CSS End

   	// Excerpt Options
	$wp_customize->add_section( 'catchbase_excerpt_options', array(
		'panel'  	=> 'catchbase_theme_options',
		'priority' 	=> 204,
		'title'    	=> __( 'Excerpt Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[excerpt_length]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'catchbase_excerpt_length', array(
		'description' => __('Excerpt length. Default is 40 words', 'catchbase'),
		'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'width: 60px;'
            ),
        'label'    => __( 'Excerpt Length (words)', 'catchbase' ),
		'section'  => 'catchbase_excerpt_options',
		'settings' => 'catchbase_theme_options[excerpt_length]',
		'type'	   => 'number',
	)	);


	$wp_customize->add_setting( 'catchbase_theme_options[excerpt_more_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_more_text'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchbase_excerpt_more_text', array(
		'label'    => __( 'Read More Text', 'catchbase' ),
		'section'  => 'catchbase_excerpt_options',
		'settings' => 'catchbase_theme_options[excerpt_more_text]',
		'type'	   => 'text',
	) );
	// Excerpt Options End

	//Homepage / Frontpage Options
	$wp_customize->add_section( 'catchbase_homepage_options', array(
		'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catchbase' ),
		'panel'			=> 'catchbase_theme_options',
		'priority' 		=> 209,
		'title'   	 	=> __( 'Homepage / Frontpage Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[front_page_category]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['front_page_category'],
		'sanitize_callback'	=> 'catchbase_sanitize_category_list',
	) );

	$wp_customize->add_control( new Catchbase_Customize_Dropdown_Categories_Control( $wp_customize, 'catchbase_theme_options[front_page_category]', array(
        'label'   	=> __( 'Select Categories', 'catchbase' ),
        'name'	 	=> 'catchbase_theme_options[front_page_category]',
		'priority'	=> '6',
        'section'  	=> 'catchbase_homepage_options',
        'settings' 	=> 'catchbase_theme_options[front_page_category]',
        'type'     	=> 'dropdown-categories',
    ) ) );
	//Homepage / Frontpage Settings End
	
	// Icon Options
	$wp_customize->add_section( 'catchbase_icons', array(
		'description'	=> __( 'Remove Icon images to disable.', 'catchbase'),
		'panel'  => 'catchbase_theme_options',
		'priority' 		=> 210,
		'title'    		=> __( 'Icon Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[favicon]', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'catchbase_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchbase_theme_options[favicon]', array(
		'label'		=> __( 'Select/Add Favicon', 'catchbase' ),
		'section'    => 'catchbase_icons',
        'settings'   => 'catchbase_theme_options[favicon]',
	) ) );

	$wp_customize->add_setting( 'catchbase_theme_options[web_clip]', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'catchbase_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchbase_theme_options[web_clip]', array(
		'description'	=> __( 'Web Clip Icon for Apple devices. Recommended Size - Width 144px and Height 144px height, which will support High Resolution Devices like iPad Retina.', 'catchbase'),
		'label'		 	=> __( 'Select/Add Web Clip Icon', 'catchbase' ),
		'section'    	=> 'catchbase_icons',
        'settings'   	=> 'catchbase_theme_options[web_clip]',
	) ) );
	// Icon Options End

	// Layout Options
	$wp_customize->add_section( 'catchbase_layout', array(
		'capability'=> 'edit_theme_options',
		'panel'		=> 'catchbase_theme_options',
		'priority'	=> 211,
		'title'		=> __( 'Layout Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[theme_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['theme_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$layouts = catchbase_layouts();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[theme_layout]', array(
		'choices'	=> $choices,
		'label'		=> __( 'Default Layout', 'catchbase' ),
		'section'	=> 'catchbase_layout',
		'settings'   => 'catchbase_theme_options[theme_layout]',
		'type'		=> 'select',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['content_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$layouts = catchbase_get_archive_content_layout();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[content_layout]', array(
		'choices'   => $choices,
		'label'		=> __( 'Archive Content Layout', 'catchbase' ),
		'section'   => 'catchbase_layout',
		'settings'  => 'catchbase_theme_options[content_layout]',
		'type'      => 'select',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[single_post_image_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['single_post_image_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	
	$single_post_image_layouts = catchbase_single_post_image_layout_options();
	$choices = array();
	foreach ( $single_post_image_layouts as $single_post_image_layout ) {
		$choices[$single_post_image_layout['value']] = $single_post_image_layout['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[single_post_image_layout]', array(
			'label'		=> __( 'Single Page/Post Image Layout ', 'catchbase' ),
			'section'   => 'catchbase_layout',
	        'settings'  => 'catchbase_theme_options[single_post_image_layout]',
	        'type'	  	=> 'select',
			'choices'  	=> $choices,
	) );
   	// Layout Options End
	
	// Pagination Options
	$pagination_type	= $options['pagination_type'];

	$catchbase_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.<br/>Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'catchbase' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
	
	/**
	 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	 */
	if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
		if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
			$catchbase_navigation_description = sprintf( __( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'catchbase' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
		}
		else {
			$catchbase_navigation_description = '';
		}
	}
	/**
	* Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
	*/
	else if ( 'numeric' == $pagination_type ) {
		if ( !function_exists( 'wp_pagenavi' ) ) {
			$catchbase_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.', 'catchbase' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ) );
		}
		else {
			$catchbase_navigation_description = '';
		}
    }

	$wp_customize->add_section( 'catchbase_pagination_options', array(
		'description'	=> $catchbase_navigation_description,
		'panel'  		=> 'catchbase_theme_options',
		'priority'		=> 212,
		'title'    		=> __( 'Pagination Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[pagination_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['pagination_type'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$pagination_types = catchbase_get_pagination_types();
	$choices = array();
	foreach ( $pagination_types as $pagination_type ) {
		$choices[$pagination_type['value']] = $pagination_type['label'];
	}

	$wp_customize->add_control( 'catchbase_pagination_options', array(
		'choices'  => $choices,
		'label'    => __( 'Pagination type', 'catchbase' ),
		'section'  => 'catchbase_pagination_options',
		'settings' => 'catchbase_theme_options[pagination_type]',
		'type'	   => 'select',
	) );
	// Pagination Options End

	//Promotion Headline Options
    $wp_customize->add_section( 'catchbase_promotion_headline_options', array(
		'description'	=> __( 'To disable the fields, simply leave them empty.', 'catchbase' ),
		'panel'			=> 'catchbase_theme_options',
		'priority' 		=> 213,
		'title'   	 	=> __( 'Promotion Headline Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['promotion_headline_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$catchbase_featured_slider_content_options = catchbase_featured_slider_content_options();
	$choices = array();
	foreach ( $catchbase_featured_slider_content_options as $catchbase_featured_slider_content_option ) {
		$choices[$catchbase_featured_slider_content_option['value']] = $catchbase_featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_option]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Enable Promotion Headline on', 'catchbase' ),
		'priority'	=> '0.5',
		'section'  	=> 'catchbase_promotion_headline_options',
		'settings' 	=> 'catchbase_theme_options[promotion_headline_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline'],
		'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Catchbase_Customize_Textarea_Control( $wp_customize, 'catchbase_theme_options[promotion_headline]', array(
		'description'	=> __( 'Appropriate Words: 10', 'catchbase' ),
		'label'    	=> __( 'Promotion Headline Text', 'catchbase' ),
		'priority'	=> '1',
		'section' 	=> 'catchbase_promotion_headline_options',
		'settings'	=> 'catchbase_theme_options[promotion_headline]',
	) ) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_subheadline'],
		'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Catchbase_Customize_Textarea_Control( $wp_customize, 'catchbase_theme_options[promotion_subheadline]', array(
		'description'	=> __( 'Appropriate Words: 15', 'catchbase' ),
		'label'    	=> __( 'Promotion Subheadline Text', 'catchbase' ),
		'priority'	=> '2',
		'section' 	=> 'catchbase_promotion_headline_options',
		'settings'	=> 'catchbase_theme_options[promotion_subheadline]',
	) ) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_button]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_button'],
		'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_button]', array(
		'description'	=> __( 'Appropriate Words: 3', 'catchbase' ),
		'label'    	=> __( 'Promotion Headline Button Text ', 'catchbase' ),
		'priority'	=> '3',
		'section' 	=> 'catchbase_promotion_headline_options',
		'settings'	=> 'catchbase_theme_options[promotion_headline_button]',
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_url]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_url'],
		'sanitize_callback'	=> 'esc_url_raw'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_url]', array(
		'label'    	=> __( 'Promotion Headine Link', 'catchbase' ),
		'priority'	=> '4',
		'section' 	=> 'catchbase_promotion_headline_options',
		'settings'	=> 'catchbase_theme_options[promotion_headline_url]',
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_target]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_target'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_target]', array(
		'label'    	=> __( 'Check to Open Link in New Window/Tab', 'catchbase' ),
		'priority'	=> '5',
		'section'  	=> 'catchbase_promotion_headline_options',
		'settings' 	=> 'catchbase_theme_options[promotion_headline_target]',
		'type'     	=> 'checkbox',
	) );
	// Promotion Headline Options End

	// Search Options
	$wp_customize->add_section( 'catchbase_search_options', array(
		'description'=> __( 'Change default placeholder text in Search.', 'catchbase'),
		'panel'  => 'catchbase_theme_options',
		'priority' => 216,
		'title'    => __( 'Search Options', 'catchbase' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[search_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['search_text'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchbase_theme_options[search_text]', array(
		'label'		=> __( 'Default Display Text in Search', 'catchbase' ),
		'section'   => 'catchbase_search_options',
        'settings'  => 'catchbase_theme_options[search_text]',
		'type'		=> 'text',
	) );
	// Search Options End
//Theme Option End