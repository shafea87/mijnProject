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
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '{l,}EAoRwn4-2*^{q{DpI8et_4/MgV*;}VGiBjS(hfV&#ovVE4>q_B8+1m(qF?%a' );
define( 'SECURE_AUTH_KEY',  'W.C]yV)1H(cY/~0ZW9nP]0ex&=GLVh*j._66597)u+o_P_@E]u>@&sT3VidGjvC^' );
define( 'LOGGED_IN_KEY',    '@oN~XeY1?a1u,@ n^vN%SDII!$VY[b{)Rl,SR)Cm<PgroYAbV|F5lac/>X2?rPb{' );
define( 'NONCE_KEY',        'NGnmU*HO|r~dI0Y_O9D|VN!6Fi*{=_w(h#hZF+BXfq)S-Nb?D=J+CiQrE?(]H&#k' );
define( 'AUTH_SALT',        'a2{;9:%tN_JWlLmPz+e.udK+buPdkS,,/tfJ.fy|<ER2wIZ33A(t|K.F{%>#bAa*' );
define( 'SECURE_AUTH_SALT', '}U.T+8f_o?$!TOvn*UE>QGWGukoSw)@X)SE$UROswCzSA]0^/nw=0XAyl7f:]7Kc' );
define( 'LOGGED_IN_SALT',   '4$#Q?eZ>=B2LT>YVO9a3t)Q1v06r~7N6QP6|j4 H<KZ.8jb/L:t%roK~}.aMgVSw' );
define( 'NONCE_SALT',       '+T ~RhtTPy8EpA]o[h:$m/_cN`t/Bn`QSifRN8a14v&<8hi.GQkhf%~jSI}70YB6' );

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
