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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^uHCOiz:-`IJH+>TMd#XpmGrICUGo6M94;x3<K!a}YgRi8+x=!&t^EFSNb,@D-:Q' );
define( 'SECURE_AUTH_KEY',  '2/E=;B`Y}+.IWw;XRJwCTl|(?fT9S(B6i!v,JBxyR2;Y7lw,y$;-?&4mW&[u2+8F' );
define( 'LOGGED_IN_KEY',    'n2S58ulB y+A4e+c4ty}LEPr8]yJL?V;)+OpZ(!5m})xV;_wa*u6sn}*X{+/v@Th' );
define( 'NONCE_KEY',        'xrbl2G`Zp3=H}`{~ojsYQqps|u$UB,k/0F3EGcUB$}xVa_}kdb9?|k%OMV2wiWll' );
define( 'AUTH_SALT',        'A~vGlq9vH?_cQ*4sJ$&~DD!<2p8-p|FRi;{2).ctp-dW;_obEp{Cf&S`57.MPem,' );
define( 'SECURE_AUTH_SALT', 'R2xRXJ1pqcp}JBNDbV8XvdUdbE5c-_(0]R D~UL6JK@<]$vgS7DXZZ48D0z6b}@5' );
define( 'LOGGED_IN_SALT',   'Q;iCL)gzqMr.Sy`R`~q)pW]kMx[dKMTYz|xu)QlKio&+qv{g)p35#]ku**ugafhH' );
define( 'NONCE_SALT',       'l z`{D$`/sLu*&Zl?++><>A;H 9d<FTwLW$?K2]D1UIqQk%hhtvU-SFL?+~tX1K6' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
