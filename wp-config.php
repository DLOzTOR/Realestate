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
define( 'DB_NAME', 'real_estate' );

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
define( 'AUTH_KEY',         'sG-I5W6}rC$;c6g_{3oMCX7r3T&m#a2(X`OM#?P@OPvBp55#))JVVN1?`2&Gui3,' );
define( 'SECURE_AUTH_KEY',  'Lr}$E6hBEy!}>sGN1c<&f@C[+iZIhXc#0]|^B3v%!bdW&/UrbaKAYbXn{o#J~3Ze' );
define( 'LOGGED_IN_KEY',    '4h:s@7|Ocxu(2OC4S6O].ui]]8Z(Y+^,gnfKhBq~SPtD#1TMQV1 $C<T>xBp-8P:' );
define( 'NONCE_KEY',        '8kCCvOA9Rk|.IR?T;V[eLx-:Q!kfXd]i1r7l,XU@IvxLTGQ=1dtS%52sdEmZ/5QY' );
define( 'AUTH_SALT',        'MnMfh &x2c*!Ys[PU&o9]w<,d+&>Ug# Q,.?~siNS;o|?9&V8I:.rS_/fAipz(2d' );
define( 'SECURE_AUTH_SALT', 'P(e?nY?#0NMZ.J3[_(x_z^&J(}x20&,t|u^DURy;EsKDx*KhD*n%^;7X-Y]m3Hp7' );
define( 'LOGGED_IN_SALT',   '(f5Gq6Eh,adJD<*_AbJ]&Xz^`]o#7rW#_zhvEUF4ZT5&Y#3[]qi8vJ,M-d{>kbYH' );
define( 'NONCE_SALT',       '&ZG{7zDIOY/;Ml*bn;5^=cv|*geo%~4KsR>-X ?o_[eSvdJe5|L +5k+F;OkHB@V' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 're_';

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
