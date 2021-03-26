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
define( 'DB_NAME', 'bd_wdpressImmob' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '?8G?fUdG0JMcp5i^nwn~R5qoP8q^m|O@>Ad-0F@D(O$~9^&)_G1qrT,rICS!Ko1c' );
define( 'SECURE_AUTH_KEY',  'OcK[wW!bQAZ:SAY:ZbHUn?B rvOG&v8=si7KE9v-M|#B2Q9nY[(YPQ aAh)[xzVc' );
define( 'LOGGED_IN_KEY',    '*Ar|<y`$mi5umVL!{N$An^ri.{zb2KjTrDctExUQaS&j=!+b<]Vc&&2[&Ml^U<@|' );
define( 'NONCE_KEY',        '@}_}ZI@yn.0=6 gPjtZa8|*HT+ )W>,|I}zC+?)[hFE3AwSKdkAcGz,!mIZdK`4=' );
define( 'AUTH_SALT',        'DSeOjK[}b33_z!;4[ZWej,yo?+i?/H2i7ZRu2.ZpZ9O^cEr)A[7-yO4|m(Yqs[ml' );
define( 'SECURE_AUTH_SALT', 'E&p~_&;[{LY)2V<4V@>3#)XjOgGZKmVIG5wO>,xfXbA%(OU%O.,D`E=5b`!~K)i ' );
define( 'LOGGED_IN_SALT',   '}aR3*Vd:5Ir**[~]rX<;*s=CmejT}NuM12fg,F/} /!huH2m6+uRM%u=#y&mS~H2' );
define( 'NONCE_SALT',       '--Mxg[ywZng9n;D67TTSZgVno<Lm.ovpf-;.mV&jo5B4[.(p9@`_5<tL~Om6OEsc' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'immob_';

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
