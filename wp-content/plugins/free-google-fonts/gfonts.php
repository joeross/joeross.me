<?php

/*
  Plugin Name: Google Fonts For WordPress
  Plugin URI: http://powerposts.net/
  Description: Easy add fonts from Google Fonts to your TinyMCE and WordPress!
  Author: Lukas Pawlik
  Version: 2.0.4.1
  Author URI: http://powerposts.net/
 */

if ( is_admin() ) {
	$o = WP_PLUGIN_DIR;
	if ( file_exists( $o . '/kaplugins-powerposts/powerposts.php' ) ) {
		require_once 'includes/plugin.php';
		deactivate_plugins( __FILE__ );
		activate_plugin( $o . '/kaplugins-powerposts/powerposts.php' );

		return;
	}
}

require_once 'engine/GFonts.Engine.php';
require_once 'engine/GFonts.DB.php';
require_once 'engine/GFonts.UI.php';
require_once 'engine/GFonts.UI.Tabs.php';
require_once 'engine/GFonts.Lang.php';
require_once 'engine/K8.UI.Table.php';
require_once 'engine/K8.IDataSource.php';
require_once 'engine/K8.BaseDataSource.php';
require_once 'engine/GFonts.Presets.DataSource.php';
require_once 'engine/GFonts.Polls.DataSource.php';
require_once 'engine/GFonts.PollsAnswers.DataSource.php';
require_once 'engine/GFonts.ThemeLayouts.DataSource.php';
require_once 'utils/SocialGenerator.php';
require_once 'class/PollWidget.php';
require_once 'class/PollOutput.php';

define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GFONTS_ABS_PATH', dirname( __FILE__ ) );
$gfe = new GFontsEngine();
$gfe->Run( __FILE__ );