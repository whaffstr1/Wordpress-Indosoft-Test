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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'c)dhq0g&#p[x?lJg;{g^,pz>]f;dzfc4*;=ZhkF`Y3~b4N]`d.tKAil5j./FqiZ{' );
define( 'SECURE_AUTH_KEY',  'xeBdXTUV_3BSgy{N,n5C_B!Y9LABlO>DJV776l0sHpxu6e9NqZ%X;p9oR=rKF:O5' );
define( 'LOGGED_IN_KEY',    '%BR8iBhMarHq7~s^Rc<+zgZXr@#l(]eAwoM 5nE6fv2~TA-+)}HS.<]vJQH@U%@.' );
define( 'NONCE_KEY',        'vV0w@1Y14oJmq!}*Waif=</KP:opRlFow`/|?rp1*0Jiq@fZZ+s&_b^H6T?Y>e Z' );
define( 'AUTH_SALT',        'D+sZvAb^5}C!}2D[w`;Z1]cs[*h5I .,r1Y`Vl4lt JJC[kqI[u2;Wgxh^ef!+=l' );
define( 'SECURE_AUTH_SALT', 'VuCIJiI4}}4G!7Bi7e-4Gj$`{i96(KiBY6aL%<+Ql.{`B9!1V3{Ju9w}+QW[0W[W' );
define( 'LOGGED_IN_SALT',   '!$4K{v4?9mX3*ApF];:OSAX*?LhR5[;6N|](W`)7$SDumDp+cFihBnLp6caG{?W5' );
define( 'NONCE_SALT',       '!B;[<,UpHp?tS3gAwImFm$;YvB+x~uy?.wCfP2E%m u4e.<tk0Zr,Yh-*P=b0Ewd' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
