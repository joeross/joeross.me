<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/joeross/public_html/blog.joeross.me/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'joeross_wp967');

/** MySQL database username */
define('DB_USER', 'joeross_wp967');

/** MySQL database password */
define('DB_PASSWORD', '3S22(PQ!5Q');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y66g1tiyrghibvtgkbvotb42ht7uygzxztflqxk24kmozp7i7f98dfxbdubgi2fj');
define('SECURE_AUTH_KEY',  'vfvezvhnewajjed7rjg291bsfbwy7bbnglcnnqvnkew5f337thoadw1y6v5nm4h0');
define('LOGGED_IN_KEY',    'dzcingidt3izhdu9g6axceo9lgkjx6o9vajbo0igygpkhvd1mczcov3jrvgsacyu');
define('NONCE_KEY',        'ogq5tuht6yyvrc5kzprjkvqlsvh7ibnlnalwskhypqpaqxcjdzl9amiowhioctjs');
define('AUTH_SALT',        'gb8dp7w7wq1elemrwwpjfor7cpouasg5jdy63y68tbfdwmsuqphae3dnctqlf0vq');
define('SECURE_AUTH_SALT', 'ds71xsvow73gj2yqrwdjwvsucr9jzqtaiivwsfrymf6eszkj8ccfrmjzafowklqq');
define('LOGGED_IN_SALT',   'bwkegotybgsbevl14vdgmoerhzhjedrovhykzfgro3awgsrytowrmkojvab6aupu');
define('NONCE_SALT',       'muyzsvkydd71lqdc4gpk4srqx6aimeaxlvmn8zs2a8ua9517mv7sw2qdoxoxnbqn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
