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
define('DB_NAME', 'jpwebseo_Haikyu');

/** MySQL database username */
define('DB_USER', 'jpwebseo_tienle');

/** MySQL database password */
define('DB_PASSWORD', 'tienle123');

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
define('AUTH_KEY',         '|bfY=?JzFW_YK>Jlo(QH`a@(0~;{V>K9:E$ljb0y+$WU/~G19ggF65M*%z}*O~Z{');
define('SECURE_AUTH_KEY',  '/ rh~$:Ey=8fEwFH}Zv<O@CM3X*uzK[,cyhoGy6&5IY1on74w}7>v-=ez vm#p1m');
define('LOGGED_IN_KEY',    '`=G%Ca)j7>6R$?YOQ>&|-~_QkFvT9pa*em$I|Ym%tyI:a Qhtj]Tf9%:#h0OMreo');
define('NONCE_KEY',        '/2I:|&,z@f}=Q+ChH!#@ELx]4aK*ulz{e9 7u6>(K<tT4}a|C=fE9itt|(bp#6wC');
define('AUTH_SALT',        'l[~P=N%CJylcNG-vHz`kQ#jEbF{}6[NzN6}1:9lVqIVA!NHE[Z6@,sKm/GlF#^tz');
define('SECURE_AUTH_SALT', '5wq6H7+|.OZ%?_@>KCcNDEA0ywFm{Zj`RMhS<>GtVHDX&;8i}_zR!C1>_q#}6|qS');
define('LOGGED_IN_SALT',   '2x1Vi@l!<I[yh~(gPCG(G1s]5?TrqDX6S0R!}be,kT3,W)}R;5d3>5,b8tAF,63c');
define('NONCE_SALT',       'd^_wx iT%0]dF/W[@iBQgp2:sl?LDJ>#p@w$~>N[/TrUvAJ+%gA!c9x-SQ0`|Wts');

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
