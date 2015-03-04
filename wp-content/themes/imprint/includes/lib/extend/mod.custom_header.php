<?php
/**
 * Custom header Image
 * 
 * @package Imprint
 * @subpackage Setup
 * 
 * @since Imprint 1.0
 */

if(!function_exists('imprint_custom_header')):
    function imprint_custom_header(){
            /**
             * Enable custom header image support.
             */
            $args = array(
                    'default-image'	=> IMPRINT_GLOBAL_IMAGES . 'core/manhattan.jpg',
                    'width'		=> 960,
                    'height'		=> 325,
                    'flex-height'	=> true,
                    'header-text'	=> false,
                    'uploads'		=> true,
            );

            add_theme_support( 'custom-header', $args );

            register_default_headers( array(
                    'manhattan' => array(
                            'url' => IMPRINT_GLOBAL_IMAGES . 'core/manhattan.jpg',
                            'thumbnail_url' => IMPRINT_GLOBAL_IMAGES . 'core/manhattan-thumbnail.jpg',
                            'description' => __( 'Manhattan from Top', 'imprint' )
                    ),
                    'imprint' => array(
                            'url' => IMPRINT_GLOBAL_IMAGES . 'core/header.png',
                            'thumbnail_url' => IMPRINT_GLOBAL_IMAGES . 'core/header-thumbnail.png',
                            'description' => __( 'Imprint with Instructions', 'imprint' )
                    ),
                    'bw-leaves' => array(
                            'url' => IMPRINT_GLOBAL_IMAGES . 'core/bw-leaves.png',
                            'thumbnail_url' => IMPRINT_GLOBAL_IMAGES . 'core/bw-leaves-thumbnail.png',
                            'description' => __( 'Black and White Leaves', 'imprint' )
                    ),                
                ));
    }
endif;

add_action( 'after_setup_theme', 'imprint_custom_header' );