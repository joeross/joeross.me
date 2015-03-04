<?php
/**
 * Calls the Options Framework
 * 
 * @package Imprint
 * @subpackage Core-Options
 * @category Options
 * @since Imprint 1.0
 */

define('IMPRINT_PRO_URL', 'http://www.mudthemes.com/showcase/imprint-pro/');
define('IMPRINT_DOCS_URL', 'http://www.mudthemes.com/support/docs/imprint-guide/');
define('IMPRINT_SUPPORT_URL', 'http://www.mudthemes.com/support/');
define('IMPRINT_CONTACT_URL', 'http://www.mudthemes.com/contact/');
define('IMPRINT_CHECK_VERSION_URL', 'http://www.mudthemes.com/check-updates/?mthname='.$imprint_theme_name.'&mthver='.preg_replace("/\W/", "", $imprint_version));

require_once(IMPRINT_LIB_CORE . 'options-framework/options-framework.php');
require_once ( IMPRINT_LIB_CORE . 'options-framework/options-styler.php');