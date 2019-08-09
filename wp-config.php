<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */


define( 'WP_MEMORY_LIMIT', '256M' );


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Suman12@d');

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
#define('AUTH_KEY',         'put your unique phrase here');
#define('SECURE_AUTH_KEY',  'put your unique phrase here');
#define('LOGGED_IN_KEY',    'put your unique phrase here');
#define('NONCE_KEY',        'put your unique phrase here');
#define('AUTH_SALT',        'put your unique phrase here');
#define('SECURE_AUTH_SALT', 'put your unique phrase here');
#define('LOGGED_IN_SALT',   'put your unique phrase here');
#define('NONCE_SALT',       'put your unique phrase here');

define('AUTH_KEY',         '5uZTMbi5L~e{>*9H91ZucSXj){f<!RsZH=9B8-R0a+-J5+$O|wR@/o&c9DW.qmfO');
define('SECURE_AUTH_KEY',  'ckskvg:+3;!jOYKSBKgw%I1@rNt5kfIECknj$HS?R[{/@:K!$4$|%uASU&wno@9(');
define('LOGGED_IN_KEY',    'F+=v{EG}v$50sju0EM!.l4+?cHby` +m|@T.NFUI/`=piy+=<0A:4+%b@,(-OBeX');
define('NONCE_KEY',        'v#1P9Q;P?jc.m|ca!qkT.->N:AFL}x%8FVL_jY&+1|IO,z-[+ f-#L9c+NgY(6=>');
define('AUTH_SALT',        '_!FIyhTudy5{KhYm@W~(EGc,D+olKKr15GW+._K<&%#.G^CC7%Ks)7.}]>_?sy+|');
define('SECURE_AUTH_SALT', ',zrj.h@5xTn-{:>@q7sOl>[m8Kgy%]pQ[GMZYCUAoN$4PYc#i$9]3D+T^5O&YM2z');
define('LOGGED_IN_SALT',   'NudlJ3o2lHboBP`np%vh,K>$OxYitl:4)<O|5)7sIl%/H}N]#x&laA7`UrVmFDoj');
define('NONCE_SALT',       '!E)p~GJq|B_NP2ieqEGp-hpN2/H:sgr4AJDOeGiznRQyi]xthv)b -vBRxX^g lS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
//define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

if(is_admin()) {
add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
define( 'FS_CHMOD_DIR', 0751 );
}


