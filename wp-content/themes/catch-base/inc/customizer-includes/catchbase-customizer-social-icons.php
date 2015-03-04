<?php
/**
 * The template for Social Links in Customizer
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

	// Social Icons
	if( 4 <= get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'catchbase_social_links', array(
		    'capability'     => 'edit_theme_options',
		    'description'	=> __( 'Note: Enter the url for correponding social networking website', 'catchbase' ),
		    'priority'       => 600,
			'title'    		 => __( 'Social Links', 'catchbase' ),
		) );
	}
	
	$wp_customize->add_section( 'catchbase_social_links', array(
		'panel'			=> 'catchbase_social_links',
		'priority' 		=> 1,
		'title'   	 	=> __( 'Social Links', 'catchbase' ),
	) );

	$catchbase_social_icons 	=	catchbase_get_social_icons_list();	
	
	$i 	=	1;

	foreach ( $catchbase_social_icons as $option ){
		$lower_case_option	=	str_replace( ' ', '_', strtolower( $option ) );
			
		if( $option == 'Email' ){
			$wp_customize->add_setting( 'catchbase_theme_options['. $lower_case_option .'_link]', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'sanitize_email',
				) );
		}
		else {
			$wp_customize->add_setting( 'catchbase_theme_options['. $lower_case_option .'_link]', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw',
				) );
		}

		$wp_customize->add_control( 'catchbase_'. $lower_case_option .'_link', array(
			'label'    => $option,
			'priority' => $i + '2',
			'section'  => 'catchbase_social_links',
			'settings' => 'catchbase_theme_options['. $lower_case_option .'_link]',
			'type'	   => 'url',
		) );
	
		$i++;
	}
	// Social Icons End