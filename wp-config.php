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
define('DB_NAME', 'root');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         ',G@HVJn_/F4Tw,AM)3dp$G79(34kM7k+t ; cPt@y)}UF2TrBP:ZtIZS&zv:TTC&');
define('SECURE_AUTH_KEY',  'Dv<B/,pG{;x}rFp.!TP9fym9TV?M>F:F;7fUu}-3o&P1NvTl<<8h#gR>cY3}2/F~');
define('LOGGED_IN_KEY',    'SKsxaxphGy`}+cSMZi}UN3W=L}5I}LS`T+TGa<i|!F#qx;Ca0Z3hULUN}9g9*#R]');
define('NONCE_KEY',        'oD[jIxMtV<|9y)eGD1Znd>VIJkRjaELS@{|uoKquFNtU^n~c^+Q$4Lo(Q,~~i=?i');
define('AUTH_SALT',        'A3iwDn1%##(4qhGFkhk][yP+/<-<QWYZ{huOf0|z4$M^]AvF+KATZb/F=g[IQh,1');
define('SECURE_AUTH_SALT', 'Q[?LBx+X3[Ol~3vuihY.`/@<L<4emr-riC(H/)jU1^emM8H~ZV:2#@5iCRR|/^,9');
define('LOGGED_IN_SALT',   'tv~ryywn46)N0XRP#84,#.=:R__{d>K~]H-f:y? =`$)5E9z8sA2$T-:o4Hz|^s2');
define('NONCE_SALT',       '16[n^=k^iV[X;ki?048bPoE&3A*V,t:`WjhzhG~r-Q-Zy%76PG@H|++^ro)SXt_l');

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
