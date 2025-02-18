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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'higorteste' );

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
define( 'AUTH_KEY',         'Y4Uh_vL+gwlhl({}8j,W(NNWqHbqaul)$pbvp|Jb$HZJHo7ZN2.@ZY@TKG-[^`G_' );
define( 'SECURE_AUTH_KEY',  'OPs4WJS/4O%J+9/VC&zd57VMrU]MFDA]o`aP;4;$:w!{p`N>1Lu/D$O>0QK39,e,' );
define( 'LOGGED_IN_KEY',    '&Um&BFm|8XO4pa5qLU;GZ88o]5+h?3x!EJJzLs[}c,s<.pr]Zl;q,3DZzmn*nT1W' );
define( 'NONCE_KEY',        'TVY{5FwQ2{I(b&PWO<z2=sBA${!dg96gl0J9<CF;~?%fgo?RavJ|b8UkT0F7(7q)' );
define( 'AUTH_SALT',        '#h zy1k%0H:F!}il,m$i]@TT`]X4&h?Ms(&Jl$o*6EDM(46%Z]:Wd:q3W#.1jbAa' );
define( 'SECURE_AUTH_SALT', 'cH-tNd@DBg<EJ&9/f~ KEbU|+OAgsJ4<?~Rs>6#}?z{w9ZZpS% v^8ozf9BEj,S;' );
define( 'LOGGED_IN_SALT',   '4N2(1:bQm2%%-)@-Dp)-N-!<oKRd6Ruc]!`U%wFi@<x[,W`:N3^_~/2yK2,C^`U8' );
define( 'NONCE_SALT',       '9I`9#M*m9~WHV*N,Jx~X^qVWeA{r[3yn%$?1e5`1rpC!~TV^iBP+L+B}?2TzTd G' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false); // Impede a exibição dos erros na tela
@ini_set('log_errors', 1);
@ini_set('display_errors', 0);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
