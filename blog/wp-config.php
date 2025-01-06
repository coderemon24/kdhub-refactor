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
define( 'DB_NAME', 'kaizendi_wp84' );

/** Database username */
define( 'DB_USER', 'kaizendi_wp84' );

/** Database password */
define( 'DB_PASSWORD', '37vpC9S)[J' );

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
define( 'AUTH_KEY',         '3py3vornfbd1fqkqvpwhzvcfuioxse6vhvzksybudeigrhxzzhri0zcliuekfkyn' );
define( 'SECURE_AUTH_KEY',  'tcidygzzigeqisobngh0rnihruki6q61izj5tbyz3bczvspo02powwyl0sjhcgc9' );
define( 'LOGGED_IN_KEY',    'lrsekwkhb2qlc05g2py3dxmimz56aoyxbqz3aiu6hpkhe4mfsmpgeprzr0hcl1k2' );
define( 'NONCE_KEY',        'kd9nilevlogikedehnigsecnsfvx0nju3rid9qkxfkkzevaaztgywr1ge6l5ch7s' );
define( 'AUTH_SALT',        '84vuimnictscnasfhnqixd71fzxramocbbmhdkudtewsi7rtxmbjheo4xodwyfbb' );
define( 'SECURE_AUTH_SALT', '08gxacxcc2lqj8knwiaqj4z3tn2va53mzstil9s0g6t8uaj5hzzvkbpv20puu7lh' );
define( 'LOGGED_IN_SALT',   'jo1sxqmkunirr2mkixd03rgrghwlo2kkyhyurf5dazcfihzuuig9od9i9crz83xv' );
define( 'NONCE_SALT',       '1tpn64x0lfoi63dkn8mavlrodstowhruwk63svluhds8ttfvdgtsivjhvhrpqjbi' );

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
$table_prefix = 'wp1m_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
