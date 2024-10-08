<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Omj r+<?%.+Ah]n?/1YaPKDXc8Sg.za;l,ehT+:2{JE9eQq1UJU7t^(^<u0xps&N' );
define( 'SECURE_AUTH_KEY',   '*)+1KY,!ZLCwd.FnFUFEM%ZPB=lZ]Gokx-3-}-eRVYI3rxYw9Lcv +7G#$u%Od[%' );
define( 'LOGGED_IN_KEY',     'j$!UhfuK6e?G3LcpR.NBsG.b M~tZWdBqSM^7M0O:|n$^P[`X%#2Sw]-!Vjgk g5' );
define( 'NONCE_KEY',         '~Tu>p3kaQw#QG[~4X$?hJr2Yp-+<}|p;!YX:zqPPHlYDh:?0_`inRYE/Mx0Zgu53' );
define( 'AUTH_SALT',         'SJ(*STnXNTXqlOXDBL4zpe|?IcRBgOF%I{yyI:A8~g7WiWX={SY%hFSzEMBlo6+|' );
define( 'SECURE_AUTH_SALT',  'cj>!)7l @^80{=2c`?PiLT_&)P2h?om`Yu)z&-^rGyY;bDGuZ/naB~|l;gpOBAfE' );
define( 'LOGGED_IN_SALT',    'f}p)wGVr|l4?70JU=VJ!f,b/:yA}Mo=GQ.5oJ_| ?bC!ib3a<`]G~ds4S6jDy2pm' );
define( 'NONCE_SALT',        '9#/v^p&#vC`3D`0iT5(vxQlT1gx{|Gq42z8jbiff6#?g~j.$l}LDhSr@_?dl-f5X' );
define( 'WP_CACHE_KEY_SALT', '9:xlmhzI9@PX$1t?,pWltHU#y1l7AHo2}ramP=m1]@VU<`d-WF8I8/S,Atm8~{|`' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
