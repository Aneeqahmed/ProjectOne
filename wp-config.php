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
define('DB_NAME', 'future2.0');

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
define('AUTH_KEY',         'L<f&R&cO48r_bX(|#f,4XGdYmR2~m6IC{p#@nYVdB#Aib}XWQMq=T+8RH@b}.&1Z');
define('SECURE_AUTH_KEY',  'v[%o?}wn:ZEYDie`#6~Wg,I@ZmatxG(C(M&T*2F1_*Vc`)0^gU[ LPkyHD{(6U^S');
define('LOGGED_IN_KEY',    'U[:faNze`[Pj:kiL@x2Az?lr2LqU`~/X_@Ja^Nq[OW_S|&_mj<q1eLNSezE4i/;K');
define('NONCE_KEY',        'u9aE%=OM$[RECT1Z,1}>H4F2oOH.%c_A__XD3o8UJ~n^/PX5zBz88c,pWgT$a*tf');
define('AUTH_SALT',        'ka38@N!w>ev`ZU}%HKCKz|ag8-4F,-{`;tm.PEEJG(F6&BlkNManvz$0;LU,K3rx');
define('SECURE_AUTH_SALT', '_^+/2bof-}k8m0?<Jl@@eB_^BIHw}E3{Sn<g:,EfG|*~P?-f+bY0~;$AWHd4_GWE');
define('LOGGED_IN_SALT',   '1TLp-_3vE<a~AlqMj@nQY41g I :[I/&F[QAP*{*Cv7<w a<3o!BZ1`#X`h<{t8@');
define('NONCE_SALT',       'q[6[y2QKw3O5#/Ee|Be{g/0Y~g5DRA/rb,2!HTd.C9n,s?V4S6vJXzPuE0J*a!ut');

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
