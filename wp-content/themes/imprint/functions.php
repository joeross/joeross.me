<?php
/**
 * Imprint Theme functions and definitions
 * 
 * @package Imprint
 * @subpackage Setup
 * 
 * @since Imprint 1.0
 */

/**
 * Imprint theme assets/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_ASSETS' , get_template_directory_uri() . '/assets/' );


/**
 * Imprint theme assets/global/css/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_GLOBAL_CSS' , IMPRINT_ASSETS . 'global/css/' );


/**
 * Imprint theme assets/global/js/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_GLOBAL_JS' , IMPRINT_ASSETS . 'global/js/' );


/**
 * Imprint theme assets/global/images/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_GLOBAL_IMAGES' , IMPRINT_ASSETS . 'global/images/' );


/**
 * Imprint theme assets/global/css/push/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_GLOBAL_PUSH_CSS' , IMPRINT_ASSETS . 'global/css/push/' );


/**
 * Imprint theme assets/admin/css/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_ADMIN_CSS' , IMPRINT_ASSETS . 'admin/css/' );


/**
 * Imprint theme assets/admin/js/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_ADMIN_JS' , IMPRINT_ASSETS . 'admin/js/' );


/**
 * Imprint theme assets/admin/images/ directory URI
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_ADMIN_IMAGES' , IMPRINT_ASSETS . 'admin/images/' );


/**
 * Imprint theme includes/lib/core/ directory Path
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_LIB_CORE' , get_template_directory() . '/includes/lib/core/' );


/**
 * Imprint theme includes/lib/extend/ directory Path
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_LIB_EXTEND' , get_template_directory() . '/includes/lib/extend/' );


/**
 * Imprint theme includes/lib/extend/push directory Path
 * 
 * @since Imprint 1.0
 */
define('IMPRINT_LIB_EXTEND_PUSH' , get_template_directory() . '/includes/lib/extend/push/' );


/**
 * Imprint theme includes/lib/core/options-framework/ directory Path
 * 
 * @since Imprint 1.0
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/lib/core/options-framework/' );


/**
 * Imprint theme PRO constant
 * 
 * @since Imprint 1.0
 */
define( 'IMPRINT_PRO', FALSE );


/**
 * Imprint Theme Object
 * 
 * @since Imprint 1.0
 */
$imprint_theme = wp_get_theme();


/**
 * Name of the theme
 * 
 * @since Imprint 1.0
 */
$imprint_theme_name = preg_replace( "/\W/", "_", strtolower( $imprint_theme ) );


/**
 * Theme Version
 * 
 * @since Imprint 1.0
 */
$imprint_version = $imprint_theme->get( 'Version' );


require_once( get_template_directory() . "/includes/lib/init.php" );