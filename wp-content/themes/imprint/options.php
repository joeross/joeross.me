<?php
/**
 * This file loads all the options related to Theme Options settings page.
 * 
 * @package Imprint
 * @subpackage Core-Options
 * @category Options
 * @since Imprint 1.0 
 */

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function mudthemes_optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
        
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function mudthemes_optionsframework_options() {
    
	$options = array();
        
        $options = apply_filters('imprint_options', $options);
	
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('mudthemes_optionsframework_custom_scripts', 'mudthemes_optionsframework_custom_scripts');

function mudthemes_optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

function mudthemes_optionsframework_font_array(){
    global $imprint_fonts;

    foreach ($imprint_fonts as $value):
        if(($value) && is_array($value)):

            $return_array_key = $value['name'] . ', ' . $value['family'];
            $return_array_value = $value['displayname'] . ', (' . $value['family'] . ')';
            $return_array[$return_array_key] = $return_array_value;
            
        endif;
    endforeach;

    return $return_array;
    
}

function mudthemes_optionsframework_font_scut(){
    global $imprint_fonts;

    foreach ($imprint_fonts as $value):
        if(($value) && is_array($value)):

            $return_array_key = $value['shortname'];
            $return_array_value = $value['displayname'];
            $return_array[$return_array_key] = $return_array_value;
            
        endif;
    endforeach;

    return $return_array;
    
}