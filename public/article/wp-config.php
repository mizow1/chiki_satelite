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
define( 'DB_NAME', 'LAA1573382-chikifcmk' );

/** Database username */
define( 'DB_USER', 'LAA1573382' );

/** Database password */
define( 'DB_PASSWORD', 'gBiDXzMMew' );

/** Database hostname */
define( 'DB_HOST', 'mysql321.phy.lolipop.lan' );

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
define( 'AUTH_KEY',         'Nq$aNu5jrn>8*=;]c aU5uu~<(i/9 *mqUbH_wX2_{X|I_ >ovBZb+IWHJc3Oa6_' );
define( 'SECURE_AUTH_KEY',  '#4`p>y?Fq,zL>X:TJ01%XhCh@kss~6vvg<I7e2y_eR6NYpWkx7IaodKAm;rxR#8n' );
define( 'LOGGED_IN_KEY',    '((Z]@st7:4o;<?OmAwO~n`O0+qN<+s[uhzI3$yQQa:@o:=?$(rJ_eY-bd%Cn|E>g' );
define( 'NONCE_KEY',        '$/(GOfCUX/^._`H1,/)O|B(ys)lWWp!?T$N4rxOEVO.aW4VIyvuJ8a{Z]x/D-^Tl' );
define( 'AUTH_SALT',        ')si$3F6=ErL#[mOr8Qq(p*Hu1?|pF5L=<6:)m++.C<Z78:y!u8a.(RM]fhGBqXsA' );
define( 'SECURE_AUTH_SALT', '&q5+9HE[#K&,qYk$V4K00`+B#8qLd>Z:FuKv92:N]b;bG}Brb*[HLJZNev/J+lbC' );
define( 'LOGGED_IN_SALT',   'YVp_T8cyK^e_LByh{]1kpFR&S;gEE+-i8nJ|`*G6%x#6>f@sk vrR$skKX1u5|g{' );
define( 'NONCE_SALT',       's{EzP/WJiSVTHD;eY+j_?~JBo-4&+GXTU8Eg9 clSsJK_!89&OY5.YYT,-0l..nU' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fcmk_chiki_';

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
