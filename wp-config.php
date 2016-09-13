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
define('AUTH_KEY',         'c#u F*;g.rkjQKb^G*~y*;`yQ[`c5Beu4_^Eoe,cRE5 )eYJ=.Luac.WjvkbF1#/');
define('SECURE_AUTH_KEY',  'CpQjN]]qT4Y`edHx0_X-~@z3GJZdEh576JfR9%_$L8Kc^Wur;H[~4]Zg+4@Jsd3p');
define('LOGGED_IN_KEY',    '.Wu^-r@;j8S !xA-EMx88{)X`l,8nwCs/n#>_[/ (?7*pl5M; V2oaA@+)CDqNHF');
define('NONCE_KEY',        'd|i]/&aaM(jRv^*_DGwx|c[]Kl)|s@Ze-g=UF2T_/gF8Dn6D491%nU/#eq|[r=GR');
define('AUTH_SALT',        'n^eAepj~dh@iJ4jqt{i9+6_O3fE{c;sp}g{v7)GskU`8.&5Hq?7FYjix(&BD >;h');
define('SECURE_AUTH_SALT', 'm?K^)%q_3d*V a-&.z8}E^N.b[/P#ZnVq^G]r@yYm>l2,CDC1JV>{B>Zb67/(l2$');
define('LOGGED_IN_SALT',   'S8moj#!bWU`k^2^[Lb__3Za3bv?J_e]R}KT?z*iX@ Z)J~qJdP>2cNVbV@Zqu:k@');
define('NONCE_SALT',       'A_|sRNqMmjjl<$cYwWIlOf:CSdrg!G]mq2XZp)G4~RaY:&)0]SiV H[[ux(0|!ke');

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
