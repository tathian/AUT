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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'x<|r#/|%`o@zTsM(gXN=z4Y$EfgSIz9g;K!hshPl_Ydr(3K3a. lK8DC:#kKU3!V' );
define( 'SECURE_AUTH_KEY',  'yF{gBOU:yLi;j`$N.V,55v4ok@VMN{if6%h5|13zvI?+kgn.KxBDJ|Su@khic-?w' );
define( 'LOGGED_IN_KEY',    '=1h5x2MP<3Tx_*zEXH` yo$l C-J*aG*#g-_[Q1pqN`68P5FXGDwjK:?okJcPKqA' );
define( 'NONCE_KEY',        'rwi7KsqK8*XR/ @XFmYseSte`09:Cng[?1PFo+BaTq8E<J~w@_gq|vq4WU4L@0 <' );
define( 'AUTH_SALT',        'x-xx0IFZxo+U%,Nfw1dD^akDwWl/f(htM(.CHOxj;t3PQ_Bf@OIg]|k$9$^~^zk~' );
define( 'SECURE_AUTH_SALT', '>&kedUg*~?-aPy*U$;RTh(*vL,M>Dr:Pr2gJrN+L+7dIy{`LE#K=X`fWW]F.eS~K' );
define( 'LOGGED_IN_SALT',   'QE2^(3re8o>vFnlHmDM2)e}fPK9D7y~(,!U{KHPi5wK@T%9NP!9 FmJ<M;5v8~=y' );
define( 'NONCE_SALT',       '*hST`B_<6{QJ$ghQTGnvQ74X@$*[W_`T1qyd8/+s(RKMOQ}4e~]N6~@t]:Q~|97a' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
