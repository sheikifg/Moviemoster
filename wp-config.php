<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'moviemoster_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Q(qQ=w&i6&<p[=ok$QCnfzsDHi2xQ{oSA-`%7H(sK$2-XX~<_AkKF#lE@(JJ|o?&' );
define( 'SECURE_AUTH_KEY',  'aS=be*QP^mTzHFo:%i|Ag:Z|tsz x}lhgVp!-s1,#9&x5`{gF|4|@o`k%>{K>FI$' );
define( 'LOGGED_IN_KEY',    '1K6SvCNW}%$ESH+Wa22<]T8N}#E`Xu(jwkPaD}_vd2tNBUUU<L{Rj^ko %/RtKDE' );
define( 'NONCE_KEY',        '$~F]rCrTHY9tR^}esLCQGD~PeS*#2y3q>H,u=dUy|^@+4Aq bUWT?=r<mTeqWidr' );
define( 'AUTH_SALT',        '@SO+]RPqasT]zQ64M(wZY[*$+onw8Rc|06PP:/i#.$`N|)N1}g4{hcigReXz+hA5' );
define( 'SECURE_AUTH_SALT', 'Nf.YV)T07r7SkRA^CuV^: 0a~Ny#FWY+RIv#AZ8{:k`:+-4)z vLEGca{L/cf4[B' );
define( 'LOGGED_IN_SALT',   'bE!YS/^;DkBUA-3HWIM#*b^0z)kSXxb@^TX>3]Xs)F)Fn8rHytf3`lhB^8!7j3E9' );
define( 'NONCE_SALT',       'mh)9UVHqy5.nEEWulOW_OJuv,N)sm6~*cc[FmZLJA-*E(/eTeDv0L{(-}ji^,B/w' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
