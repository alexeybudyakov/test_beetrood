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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'beetrood');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'MmWMu{%z#~tV|s-H5Xe8HA[J:ewK>yXjn${.q705Rs.0Vx&_^+iQ%/@^qgA3?[(U');
define('SECURE_AUTH_KEY',  'hRCdf2rk-e+9d)u7lQve[8.~2wm0aDss_MT4R ULF?1J6{2}i3Ck476dQRT6mxD&');
define('LOGGED_IN_KEY',    'plA$f]!2`uva^l+vmOI:I@,XGek]XH{b1`@+Nd!&#<Suj+h<j+E1iw96_}5C,/|:');
define('NONCE_KEY',        'R]MT^eq#&x/q9JNS|=[+{C[D e`{;U0&fzrZ+btP*_sW*N8*^%)2>L=6V //ThL~');
define('AUTH_SALT',        '(Rkww9WQXHUgE@.Pt|^K7T;0d^r6s=/ufL=Wg. #ay3eLZ.nxNIKQ^,=4;)r={ %');
define('SECURE_AUTH_SALT', '5lQYGaIxDLGN~yMJ2+MXEy%nF;z`jTA~rk G!sQeQS9}W.02~Z9Xem b:]*-TB<(');
define('LOGGED_IN_SALT',   'zD{/^$gZ;JRc~to[iH=-8t!9Yz;(O:d+aPaP^l0hGv|@0TM8r1%tK~hk$5B=3P`_');
define('NONCE_SALT',       'KtOf`+^kNMUvPOvc^PtS[y2#J`x0`S)m#Z0(.}5MEEV>1HEk(mUWz&i(T.$F mhC');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
