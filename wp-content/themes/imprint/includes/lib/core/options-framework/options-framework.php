<?php
/**
 * Description: A framework for building theme options.
 * Author: Devin Price
 * Author URI: http://www.wptheming.com
 * License: GPLv2
 * Version: 1.3
 * 
 * @package Imprint
 * @subpackage Core-Options
 * @category Options
 * @since Imprint 1.0
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/* Make sure we don't expose any info if called directly */

if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a little extension, don't mind me.";
	exit;
}

/* If the user can't edit theme options, no use running this plugin */

add_action('init', 'mudthemes_optionsframework_rolescheck' );

function mudthemes_optionsframework_rolescheck () {
	if ( current_user_can( 'edit_theme_options' ) ) {
		// If the user can edit theme options, let the fun begin!
		add_action( 'admin_menu', 'mudthemes_optionsframework_add_page');
		add_action( 'admin_init', 'mudthemes_optionsframework_init' );
		//add_action( 'admin_init', 'optionsframework_mlu_init' );
		add_action( 'wp_before_admin_bar_render', 'mudthemes_optionsframework_adminbar' );
	}
}

/* Loads the file for option sanitization */

add_action('init', 'mudthemes_optionsframework_load_sanitization' );

function mudthemes_optionsframework_load_sanitization() {
	require_once dirname( __FILE__ ) . '/options-sanitize.php';
}

/* 
 * Creates the settings in the database by looping through the array
 * we supplied in options.php.  This is a neat way to do it since
 * we won't have to save settings for headers, descriptions, or arguments.
 *
 * Read more about the Settings API in the WordPress codex:
 * http://codex.wordpress.org/Settings_API
 *
 */


function mudthemes_optionsframework_init() {

	// Include the required files
	require_once dirname( __FILE__ ) . '/options-interface.php';
	require_once dirname( __FILE__ ) . '/options-medialibrary-uploader.php';
	
        // Initialize Media Uploader : By mudthemes
        $options_framework_media_uploader = new Mudthemes_Options_Framework_Media_Uploader;
	$options_framework_media_uploader->init();

	// Loads the options array from the theme
	if ( $optionsfile = locate_template( array('options.php') ) ) {
		require_once($optionsfile);
	}
	else if (file_exists( dirname( __FILE__ ) . '/options.php' ) ) {
		require_once dirname( __FILE__ ) . '/options.php';
	}
	
	$optionsframework_settings = get_option('optionsframework' );
	
	// Updates the unique option id in the database if it has changed
	mudthemes_optionsframework_option_name();
	
	// Gets the unique id, returning a default if it isn't defined
	if ( isset($optionsframework_settings['id']) ) {
		$option_name = $optionsframework_settings['id'];
	}
	else {
		$option_name = 'optionsframework';
	}
	
	// If the option has no saved data, load the defaults
	if ( ! get_option($option_name) ) {
		mudthemes_optionsframework_setdefaults();
	}
	
	// Registers the settings fields and callback
	register_setting( 'optionsframework', $option_name, 'mudthemes_optionsframework_validate' );

	// Change the capability required to save the 'optionsframework' options group.
	add_filter( 'option_page_capability_optionsframework', 'mudthemes_optionsframework_page_capability' );
}

/**
 * Ensures that a user with the 'edit_theme_options' capability can actually set the options
 * See: http://core.trac.wordpress.org/ticket/14365
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */

function mudthemes_optionsframework_page_capability( $capability ) {
	return 'edit_theme_options';
}

/* 
 * Adds default options to the database if they aren't already present.
 * May update this later to load only on plugin activation, or theme
 * activation since most people won't be editing the options.php
 * on a regular basis.
 *
 * http://codex.wordpress.org/Function_Reference/add_option
 *
 */

function mudthemes_optionsframework_setdefaults() {
	
	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	/* 
	 * Each theme will hopefully have a unique id, and all of its options saved
	 * as a separate option set.  We need to track all of these option sets so
	 * it can be easily deleted if someone wishes to remove the plugin and
	 * its associated data.  No need to clutter the database.  
	 *
	 */
	
	if ( isset($optionsframework_settings['knownoptions']) ) {
		$knownoptions =  $optionsframework_settings['knownoptions'];
		if ( !in_array($option_name, $knownoptions) ) {
			array_push( $knownoptions, $option_name );
			$optionsframework_settings['knownoptions'] = $knownoptions;
			update_option('optionsframework', $optionsframework_settings);
		}
	} else {
		$newoptionname = array($option_name);
		$optionsframework_settings['knownoptions'] = $newoptionname;
		update_option('optionsframework', $optionsframework_settings);
	}
	
	// Gets the default options data from the array in options.php
	$options = mudthemes_optionsframework_options();
	
	// If the options haven't been added to the database yet, they are added now
	$values = mudthemes_of_get_default_values();
	
	if ( isset($values) ) {
		add_option( $option_name, $values ); // Add option with default settings
	}
}

/* Add a subpage called "Theme Options" to the appearance menu. */

if ( !function_exists( 'mudthemes_optionsframework_add_page' ) ) {

	function mudthemes_optionsframework_add_page() {
		$of_page = add_theme_page(__('Imprint Theme - Settings', 'imprint'), __('Theme Options', 'imprint'), 'edit_theme_options', 'imprint-options','mudthemes_optionsframework_page');
		
		// Load the required CSS and javscript
		add_action('admin_enqueue_scripts', 'mudthemes_optionsframework_load_scripts');
		add_action( 'admin_print_styles-' . $of_page, 'mudthemes_optionsframework_load_styles' );
	}
	
}

/* Loads the CSS */

function mudthemes_optionsframework_load_styles() {
	wp_enqueue_style('mudthemes-panel', IMPRINT_ASSETS .'admin/css/mudthemes-panel.css');
}	

/* Loads the javascript */

function mudthemes_optionsframework_load_scripts($hook) {

	if ( 'appearance_page_imprint-options' != $hook )
        return;
	
	// Enqueued scripts
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('color-picker', IMPRINT_ASSETS .'admin/js/colorpicker.js', array('jquery'));
	wp_enqueue_script('mudpanel', IMPRINT_ASSETS .'admin/js/mudpanel.js', array('jquery', 'jquery-color'));
        wp_enqueue_script('smooth-scroll', IMPRINT_ASSETS .'admin/js/smooth-scroll.js', array(), 2.14, TRUE);
	
	// Inline scripts from options-interface.php
	add_action('admin_head', 'mudthemes_of_admin_head');
}

function mudthemes_of_admin_head() {

	// Hook to add custom scripts
	do_action( 'mudthemes_optionsframework_custom_scripts' );
}

/* 
 * Builds out the options panel.
 *
 * If we were using the Settings API as it was likely intended we would use
 * do_settings_sections here.  But as we don't want the settings wrapped in a table,
 * we'll call our own custom optionsframework_fields.  See options-interface.php
 * for specifics on how each individual field is generated.
 *
 * Nonces are provided using the settings_fields()
 *
 */

if ( !function_exists( 'mudthemes_optionsframework_page' ) ) {
	function mudthemes_optionsframework_page() {
?>

	<div id="mudsettings-main-wrapper" class="wrap mudwrap">
    	<div id="mudsettings-box-wrapper">

    		<div id="mudsettings-header">                
            	<?php of_mud_display_option_header(); ?>
  			</div><!-- #mudsettings-header -->
                        
            <div id="mudsettings-panel">
                <form action="options.php" method="post">
            	<div id="mudsettings-nav-wrapper">
                	<?php echo mudthemes_optionsframework_tabs(); ?>
                </div> 
                <div id="mudsettings-content-wrapper">
                	<div id="mudsettings-content">
                    	<?php of_mud_render_options_form(); ?>
                    </div>
                </div>
                </form>
            </div><!-- #mudsettings-panel -->

		</div><!-- #mudsettings-box-wrapper -->
    <div class="clear"></div>


            

	<?php do_action('mudthemes_optionsframework_after'); ?>
	</div><!-- #mudsettings-main-wrapper -->
	
<?php
	}
}

/**
 * Validate Options.
 *
 * This runs after the submit/reset button has been clicked and
 * validates the inputs.
 *
 * @uses $_POST['reset'] to restore default options
 */
function mudthemes_optionsframework_validate( $input ) {
        global $imprint_options;
	/*
	 * Restore Defaults.
	 *
	 * In the event that the user clicked the "Restore Defaults"
	 * button, the options defined in the theme's options.php
	 * file will be added to the option for the active theme.
	 */
         
	if ( isset( $_POST['reset'] ) ) {
		add_settings_error( 'imprint-options', 'restore_defaults', __( '<i class="mdf mdf-undo"></i> Options reset', 'imprint' ), 'updated fade' );
		return mudthemes_of_get_default_values();
        } else {
            
            

	
	/*
	 * Update Settings
	 *
	 * This used to check for $_POST['update'], but has been updated
	 * to be compatible with the theme customizer introduced in WordPress 3.4
	 */

		$clean = array();
		$options = mudthemes_optionsframework_options();
		foreach ( $options as $option ) {

			if ( ! isset( $option['id'] ) ) {
				continue;
			}

			if ( ! isset( $option['type'] ) ) {
				continue;
			}

			$id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );
                        
                        if ( isset($input['skin_color']) && ($input['skin_color'] != $imprint_options['skin_color']) ) {
                            $input = imprint_options_on_skin_change($input);
                        }

			// Set checkbox to false if it wasn't sent in the $_POST
			if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
				$input[$id] = false;
			}

			// Set each item in the multicheck to false if it wasn't sent in the $_POST
			if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
				foreach ( $option['options'] as $key => $value ) {
					$input[$id][$key] = false;
				}
			}

			// For a value to be submitted to database it must pass through a sanitization filter
			if ( has_filter( 'mudthemes_of_sanitize_' . $option['type'] ) ) {
				$clean[$id] = apply_filters( 'mudthemes_of_sanitize_' . $option['type'], $input[$id], $option );
			}
		}

		add_settings_error( 'imprint-options', 'save_options', __( '<i class="mdf mdf-check"></i> Options saved', 'imprint' ), 'updated fade' );
		return $clean;
	}

}

/**
 * Format Configuration Array.
 *
 * Get an array of all default values as set in
 * options.php. The 'id','std' and 'type' keys need
 * to be defined in the configuration array. In the
 * event that these keys are not present the option
 * will not be included in this function's output.
 *
 * @return    array     Rey-keyed options configuration array.
 *
 * @access    private
 */
 
function mudthemes_of_get_default_values() {
	$output = array();
	$config = mudthemes_optionsframework_options();
	foreach ( (array) $config as $option ) {
		if ( ! isset( $option['id'] ) ) {
			continue;
		}
		if ( ! isset( $option['std'] ) ) {
			continue;
		}
		if ( ! isset( $option['type'] ) ) {
			continue;
		}
		if ( has_filter( 'mudthemes_of_sanitize_' . $option['type'] ) ) {
			$output[$option['id']] = apply_filters( 'mudthemes_of_sanitize_' . $option['type'], $option['std'], $option );
		}
	}
	return $output;
}

/**
 * Add Theme Options menu item to Admin Bar.
 */

function mudthemes_optionsframework_adminbar() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
			'parent' => 'appearance',
			'id' => 'mudthemes_of_theme_options',
			'title' => __( 'Theme Options', 'imprint' ),
			'href' => admin_url( 'themes.php?page=imprint-options' )
		));
}

if ( ! function_exists( 'of_get_option' ) ) {

	/**
	 * Get Option.
	 *
	 * Helper function to return the theme option value.
	 * If no value has been saved, it returns $default.
	 * Needed because options are saved as serialized strings.
	 */
	 
	function mudthemes_of_get_option( $name, $default = false ) {
		$config = get_option( 'optionsframework' );

		if ( ! isset( $config['id'] ) ) {
			return $default;
		}

		$options = get_option( $config['id'] );

		if ( isset( $options[$name] ) ) {
			return $options[$name];
		}

		return $default;
	}
}

/***********************************
	Mudthemes definded functions
***********************************/
/**
 * Render Theme Options
 */
function of_mud_render_options_form() {
?>
						<?php of_mud_scroll_top() ?>
						<?php settings_fields('optionsframework'); ?>
						<?php mudthemes_optionsframework_fields(); /* Settings */ ?>
                                                <?php of_mud_submit_botton_bottom() ?>

<?php
}

function of_mud_display_option_header() {
    global $imprint_version;
?>                      <div class="mud-header-menu">
                            <a href="<?php echo IMPRINT_DOCS_URL ?>" target="_blank" title="Documentation"><i class="mdf mdf-edit"></i><span>Documentation</span></a>
                            <a href="<?php echo IMPRINT_SUPPORT_URL ?>" target="_blank" title="Support"><i class="mdf mdf-user"></i><span>Support</span></a>
                            <a href="<?php echo IMPRINT_CONTACT_URL ?>" target="_blank" title="Contact"><i class="mdf mdf-envelope"></i><span>Contact us</span></a>
                        </div>
                        <div class="mud-admin-logo">
                            <?php echo '<img src="' . IMPRINT_ADMIN_IMAGES . 'logo.png">'; ?>
                            <span class="mud-admin-version"><?php echo 'version ' .$imprint_version ?> | Settings <i class="mdf mdf-tas"></i></span>
                        </div>
    			<div class="upgrade-box"><p><?php if(!IMPRINT_PRO): _e('<i class="mdf mdf-quote-left"></i> Upgrade to Imprint Pro Version <i class="mdf mdf-quote-right"></i> and get 5 premium skins with 500+ Google Fonts, full-width layout, extra color options and much more.', 'imprint'); ?> <a href="<?php echo IMPRINT_PRO_URL ?>" target="_blank" title="Download Imprint Pro"><span>Download Imprint Pro</span></a> <span class="span-header-download"> <i class="mdf mdf-check"></i></span></p><?php else: _e(sprintf('ImprintPro theme is active - we recommend that you must refer to documentation before getting started. Also see if any new update is available: <a href="%s" target="_blank">Check Here</a>', IMPRINT_CHECK_VERSION_URL ), 'imprint'); endif ?></div>


<?php
}

function of_mud_scroll_top(){
    
    		$status =  get_settings_errors('imprint-options');
                if(!empty($status)):
                    foreach ($status as $key => $value) {
                        echo '<div class="mud-admin-status '. $value['code'] .'">';
                        echo $value['message'];
                        echo '</div>';
                        break;
                    }
                endif;
		
                
    $output = '';
    $output = '<div class="mud-scroll-div"><a title="Scroll Down "class="scroll" href="#optionsframework-submit" data-speed="2000" data-easing="easeInQuad" data-url="false"><i class="mdf mdf-download"></i></a></div>';
    echo $output;
    
}

function of_mud_submit_botton_bottom(){
    
    $jstext = esc_js(__('Click OK to reset. Any theme settings will be lost!', 'imprint'));
    
    $output = '';
    
    $output .= '<div id="optionsframework-submit">';
    $output .= '<input type="submit" class="button-primary" name="update" value="' . esc_attr("Save Options", "optionsframework") . '" />';
    $output .= '<input type="submit" class="reset-button button-secondary" name="reset" value="' . esc_attr("Restore Defaults", "optionsframework") . '" onclick="return confirm( \'' . $jstext . '\' );" />';


    $output .= '<div class="clear"></div>';
    $output .= '</div><!-- #optionsframework-submit -->';
    echo $output;
}
?>