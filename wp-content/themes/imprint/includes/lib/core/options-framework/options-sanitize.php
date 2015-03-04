<?php
/**
 * @package Imprint
 * @subpackage Core-Options
 * @category Options
 * @since Imprint 1.0 
 */

/* Text */

add_filter( 'mudthemes_of_sanitize_text', 'sanitize_text_field' );

/* Textarea */

function mudthemes_of_sanitize_textarea($input) {
	global $imprint_kses_js_tags;
	$output = wp_kses( $input, $imprint_kses_js_tags);
	return $output;
}

add_filter( 'mudthemes_of_sanitize_textarea', 'mudthemes_of_sanitize_textarea' );

/* Select */

add_filter( 'mudthemes_of_sanitize_select', 'mudthemes_of_sanitize_enum', 10, 2);

/* Radio */

add_filter( 'mudthemes_of_sanitize_radio', 'mudthemes_of_sanitize_enum', 10, 2);

/* Radio Icons */

add_filter( 'mudthemes_of_sanitize_radioicons', 'mudthemes_of_sanitize_radioicons', 10, 2);

/* Images */

add_filter( 'mudthemes_of_sanitize_images', 'mudthemes_of_sanitize_enum', 10, 2);

/* Checkbox */

function mudthemes_of_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}
add_filter( 'mudthemes_of_sanitize_checkbox', 'mudthemes_of_sanitize_checkbox' );

/* Multicheck */

function mudthemes_of_sanitize_multicheck( $input, $option ) {
	$output = '';
	if ( is_array( $input ) ) {
		foreach( $option['options'] as $key => $value ) {
			$output[$key] = "0";
		}
		foreach( $input as $key => $value ) {
			if ( array_key_exists( $key, $option['options'] ) && $value ) {
				$output[$key] = "1";
			}
		}
	}
	return $output;
}
add_filter( 'mudthemes_of_sanitize_multicheck', 'mudthemes_of_sanitize_multicheck', 10, 2 );

/* Color Picker */

add_filter( 'mudthemes_of_sanitize_color', 'mudthemes_of_sanitize_hex' );

/* Uploader */

function mudthemes_of_sanitize_upload( $input ) {
	$output = '';
	$filetype = wp_check_filetype($input);
	if ( $filetype["ext"] ) {
		$output = $input;
	}
	return $output;
}
add_filter( 'mudthemes_of_sanitize_upload', 'mudthemes_of_sanitize_upload' );

/* Editor */

function mudthemes_of_sanitize_editor($input) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$output = $input;
	}
	else {
		global $imprint_kses_tags;
		$output = wpautop(wp_kses( $input, $imprint_kses_tags));
	}
	return $output;
}
add_filter( 'mudthemes_of_sanitize_editor', 'mudthemes_of_sanitize_editor' );

/* Allowed Tags */

function mudthemes_of_sanitize_imprint_kses_tags($input) {
	global $imprint_kses_tags;
	$output = wpautop(wp_kses( $input, $imprint_kses_tags));
	return $output;
}

/* Allowed Post Tags */

function mudthemes_of_sanitize_allowedposttags($input) {
	global $allowedposttags;
	$output = wpautop(wp_kses( $input, $allowedposttags));
	return $output;
}

add_filter( 'mudthemes_of_sanitize_info', 'mudthemes_of_sanitize_allowedposttags' );


/* Check that the key value sent is valid */

function mudthemes_of_sanitize_enum( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option['options'] ) ) {
		$output = $input;
	}
	return $output;
}

/* Background */

function mudthemes_of_sanitize_background( $input ) {
	$output = wp_parse_args( $input, array(
		'color' => '',
		'image'  => '',
		'repeat'  => 'repeat',
		'position' => 'top center',
		'attachment' => 'scroll'
	) );

	$output['color'] = apply_filters( 'mudthemes_of_sanitize_hex', $input['color'] );
	$output['image'] = apply_filters( 'mudthemes_of_sanitize_upload', $input['image'] );
	$output['repeat'] = apply_filters( 'mudthemes_of_background_repeat', $input['repeat'] );
	$output['position'] = apply_filters( 'mudthemes_of_background_position', $input['position'] );
	$output['attachment'] = apply_filters( 'mudthemes_of_background_attachment', $input['attachment'] );

	return $output;
}
add_filter( 'mudthemes_of_sanitize_background', 'mudthemes_of_sanitize_background' );

function mudthemes_of_sanitize_background_repeat( $value ) {
	$recognized = mudthemes_of_recognized_background_repeat();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'mudthemes_of_default_background_repeat', current( $recognized ) );
}
add_filter( 'mudthemes_of_background_repeat', 'mudthemes_of_sanitize_background_repeat' );

function mudthemes_of_sanitize_background_position( $value ) {
	$recognized = mudthemes_of_recognized_background_position();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'mudthemes_of_default_background_position', current( $recognized ) );
}
add_filter( 'mudthemes_of_background_position', 'mudthemes_of_sanitize_background_position' );

function mudthemes_of_sanitize_background_attachment( $value ) {
	$recognized = mudthemes_of_recognized_background_attachment();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'mudthemes_of_default_background_attachment', current( $recognized ) );
}
add_filter( 'mudthemes_of_background_attachment', 'mudthemes_of_sanitize_background_attachment' );


/* Typography */

function mudthemes_of_sanitize_typography( $input, $option ) {

	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'color' => ''
	) );

	if ( isset( $option['options']['faces'] ) && isset( $input['face'] ) ) {
		if ( !( array_key_exists( $input['face'], $option['options']['faces'] ) ) ) {
			$output['face'] = '';
		}
	}
	else {
		$output['face']  = apply_filters( 'mudthemes_of_font_face', $output['face'] );
	}

	$output['size']  = apply_filters( 'mudthemes_of_font_size', $output['size'] );
	$output['style'] = apply_filters( 'mudthemes_of_font_style', $output['style'] );
	$output['color'] = apply_filters( 'mudthemes_of_color', $output['color'] );
	return $output;
}
add_filter( 'mudthemes_of_sanitize_typography', 'mudthemes_of_sanitize_typography', 10, 2 );

function mudthemes_of_sanitize_font_size( $value ) {
	$recognized = mudthemes_of_recognized_font_sizes();
	$value_check = preg_replace('/px/','', $value);
	if ( in_array( (int) $value_check, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'mudthemes_of_default_font_size', $recognized );
}
add_filter( 'mudthemes_of_font_size', 'mudthemes_of_sanitize_font_size' );


function mudthemes_of_sanitize_font_style( $value ) {
	$recognized = mudthemes_of_recognized_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'mudthemes_of_default_font_style', current( $recognized ) );
}
add_filter( 'mudthemes_of_font_style', 'mudthemes_of_sanitize_font_style' );


function mudthemes_of_sanitize_font_face( $value ) {
	$recognized = mudthemes_of_recognized_font_faces();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'mudthemes_of_default_font_face', current( $recognized ) );
}
add_filter( 'mudthemes_of_font_face', 'mudthemes_of_sanitize_font_face' );

/**
 * Get recognized background repeat settings
 *
 * @return   array
 *
 */
function mudthemes_of_recognized_background_repeat() {
	$default = array(
                'repeat-mud' => __('repeat', 'imprint'),
		'no-repeat' => __('No Repeat', 'imprint'),
		'repeat-x'  => __('Repeat Horizontally', 'imprint'),
		'repeat-y'  => __('Repeat Vertically', 'imprint'),
		'repeat'    => __('Repeat All', 'imprint'),
		);
	return apply_filters( 'mudthemes_of_recognized_background_repeat', $default );
}

/**
 * Get recognized background positions
 *
 * @return   array
 *
 */
function mudthemes_of_recognized_background_position() {
	$default = array(
                'top-left-mud' => __('top left', 'imprint'),
		'top left'      => __('Top Left', 'imprint'),
		'top center'    => __('Top Center', 'imprint'),
		'top right'     => __('Top Right', 'imprint'),
		'center left'   => __('Middle Left', 'imprint'),
		'center center' => __('Middle Center', 'imprint'),
		'center right'  => __('Middle Right', 'imprint'),
		'bottom left'   => __('Bottom Left', 'imprint'),
		'bottom center' => __('Bottom Center', 'imprint'),
		'bottom right'  => __('Bottom Right', 'imprint')
		);
	return apply_filters( 'mudthemes_of_recognized_background_position', $default );
}

/**
 * Get recognized background attachment
 *
 * @return   array
 *
 */
function mudthemes_of_recognized_background_attachment() {
	$default = array(
                'scroll-mud' => __('fixed', 'imprint'),
		'scroll' => __('Scroll Normally', 'imprint'),
		'fixed'  => __('Fixed in Place', 'imprint')
		);
	return apply_filters( 'mudthemes_of_recognized_background_attachment', $default );
}

/**
 * Sanitize a color represented in hexidecimal notation.
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @param    string    The value that this function should return if it cannot be recognized as a color.
 * @return   string
 *
 */

function mudthemes_of_sanitize_hex( $hex, $default = '' ) {
	if ( mudthemes_of_validate_hex( $hex ) ) {
		return $hex;
	}
	return $default;
}

/**
 * Get recognized font sizes.
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return   array
 */

function mudthemes_of_recognized_font_sizes() {
	$sizes = range( 9, 71 );
	$sizes = apply_filters( 'mudthemes_of_recognized_font_sizes', $sizes );
	$sizes = array_map( 'absint', $sizes );
	return $sizes;
}

/**
 * Get recognized font faces.
 *
 * Returns an array of all recognized font faces.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
function mudthemes_of_recognized_font_faces() {
	$default = array(
		'arial'     => 'Arial',
		'verdana'   => 'Verdana, Geneva',
		'trebuchet' => 'Trebuchet',
		'georgia'   => 'Georgia',
		'times'     => 'Times New Roman',
		'tahoma'    => 'Tahoma, Geneva',
		'palatino'  => 'Palatino',
		'helvetica' => 'Helvetica*'
		);
	return apply_filters( 'mudthemes_of_recognized_font_faces', $default );
}

/**
 * Get recognized font styles.
 *
 * Returns an array of all recognized font styles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
function mudthemes_of_recognized_font_styles() {
	$default = array(
		'normal'      => __('Normal', 'imprint'),
		'italic'      => __('Italic', 'imprint'),
		'bold'        => __('Bold', 'imprint'),
		'bold italic' => __('Bold Italic', 'imprint')
		);
	return apply_filters( 'mudthemes_of_recognized_font_styles', $default );
}

/**
 * Is a given string a color formatted in hexidecimal notation?
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @return   bool
 *
 */

function mudthemes_of_validate_hex( $hex ) {
	$hex = trim( $hex );
	/* Strip recognized prefixes. */
	if ( 0 === strpos( $hex, '#' ) ) {
		$hex = substr( $hex, 1 );
	}
	elseif ( 0 === strpos( $hex, '%23' ) ) {
		$hex = substr( $hex, 3 );
	}
	/* Regex match. */
	if ( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
		return false;
	}
	else {
		return true;
	}
}

/**
 * Checks whether the default value/stored value for a single option 
 * is also inside the $option['options'] array.
 * 
 * $option['options'] array contains all the icons.
 * 
 * @param string $input Contains either the default (std) value or the value saved in the database. Example: music, lock, download, dashboard
 * @param array $option Contains the individual array for an option. For example contains just a single '$options[] = array();' from push.options.php
 * @return string
 */
function mudthemes_of_sanitize_radioicons($input, $option){
    if(in_array($input, $option['options'])){
        return $input;
    } else{
        return '';
    }
}