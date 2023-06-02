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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rest-api' );

/** Database username */
define( 'DB_USER', 'adminR' );

/** Database password */
define( 'DB_PASSWORD', 'restapiadmin' );

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
define( 'AUTH_KEY',         '4{m3<2kU.r}*5,vL|lYphH+Hv}#d8O(0h[5^Z.S,nHw0$Zr&lWPY7vnM[=bN=R/z' );
define( 'SECURE_AUTH_KEY',  'P.H5DN%A-8K*8<b0&>a[02qPb0WPi:<z09J,uSxSbbMHbjN8 8%s}E5Yo~|32h]p' );
define( 'LOGGED_IN_KEY',    'g2H%{x+M#!;*EsB</[G8d;k)TCE4Hw;-0H0P5|%Gt8>vdd{4[7X<Dvh6{Z5NTC!p' );
define( 'NONCE_KEY',        ';3$?^I|=CCgy@Eq1{T]D$KC3)rhJ$We3kG5(={E4?3]>ql.`bxR*t,~D$G>8x8m;' );
define( 'AUTH_SALT',        'v.QNI`7uhK(yK<]e%$$6)ncYCHRncKz`)>yej=?@5**f?V>^i5}n.CupR}}JA(HD' );
define( 'SECURE_AUTH_SALT', 'TJ3CsCssT8/`ZepR4ATWt,iQRDZW,llc$Ri h Fv~GS-bnOb^^b=|H>Y}a=k-<dt' );
define( 'LOGGED_IN_SALT',   ' 4$IqT/L5G_4DQL&fB5EcxV!*o]8SUv.uWh=OC]8f!Wk>RFB+Y-`,3BD7W3hj!0p' );
define( 'NONCE_SALT',       'r%h5P(@:2:NGR#%cY2[VRM7$(%u:Dd.(J,dbL&%a6Z~vE`>Nx+0PGEva$/C]0Udj' );

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

define('JWT_AUTH_SECRET_KEY', 'FVVTHUJUENYE');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
