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
define( 'DB_NAME', 'wczgz2020' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'jokijoki' );

/** MySQL hostname */
define( 'DB_HOST', '192.168.1.82' );

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
define( 'AUTH_KEY',         'DPvXNexVX0T.]SxL8op,HS{;a{`99Ze>z=T<@-w:Ygbc`S#5[,9*8BqR.}!99p9%' );
define( 'SECURE_AUTH_KEY',  'u<7nr/^><_p .Agb qot7FGCI]s-[[vDL_6{TSIQ#AX3j6f:l<DrF}6Kn4t`fst/' );
define( 'LOGGED_IN_KEY',    '?_^V^g3U9h(uuPsnsTlpXKCJ`N6S8Rh+)9R(%i-MG{^>k#/?ds9<f7FW5^hQTpJ)' );
define( 'NONCE_KEY',        'jV i&b,yd LV9D?u,Vpx$M,~C`C7cKeVe*J|{ANTvQ<U8,zSMSLV=0#Q?R.Y+X?8' );
define( 'AUTH_SALT',        'DZ)jxXb|)KM{vJD@1MN6HY@)1|i2.RA|=+;N!Ni+@wjxPak:w|]RBD^-5Ml*dqq>' );
define( 'SECURE_AUTH_SALT', ':fPiYzREq68n_PDX0`4P+`LjVD]pjq0}~W!1<D#!kx%z7!PYgo=Qmi?Z}QBWiz)L' );
define( 'LOGGED_IN_SALT',   'lu(;>-G|+Wqd%N82KaD4?C:C-`Md,YNA8hG_f(c&|nIy[ GU4RhJ)oL(82&AJVl=' );
define( 'NONCE_SALT',       '_kT!DFV5JnoCwVO!Xn+0qON^GpxQ:hw>mfP<,dL1I}x5C]F=@T3z_a:=F/(1T9Xk' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
