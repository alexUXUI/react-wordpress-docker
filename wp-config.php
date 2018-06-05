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
define('DB_NAME', 'mk_marketing');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'db:3306');
// define('DB_HOST', 'localhost');
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
define('AUTH_KEY',         'R~UHL;D}r~1l $`,bTiHr::ap~8*NsY3?=}yMMjQq,+80bSpkefl2o7-oO9Bn*=E');
define('SECURE_AUTH_KEY',  'pM[#~VCx#[|2l!xWe9_/oD{g[olZnVKmjx9&zDd<p!RQ%SmwT8FeyVvHOSu}<IJ]');
define('LOGGED_IN_KEY',    'D9EER(]!^OGe8m9Py^CkB(w?~,$d`@0*bnugM#>>!3auo0{jgO8A,22q+3&sI@Gf');
define('NONCE_KEY',        '0zP,^~*5IoJ54lwq,8_>EbTP>QCcsoO(Q$xa0}-1kHJO$.Oz3eYuE{qb7CDcKF#]');
define('AUTH_SALT',        '|kM82jv<g]zeBw%9sYx0NjzEd!W3o2JM$@!Uh2:T+t]Y]W8((7j6~?u)c650$E0r');
define('SECURE_AUTH_SALT', 'oFHw8+GABw!WZ(8%XUYQ+E,!6M`UoJokD7$c=Iu,p4*zkk72J5HRwm^)Q<Jp-2MC');
define('LOGGED_IN_SALT',   'k!WDO]T!~*pOJm-3~1iD?u}]!?)zb^eM#~ZIf*)J#TmZ953HI8.0I#3tU4|7#jfu');
define('NONCE_SALT',       'I]-BR72=3/}ChsG@E,(gidwC&2@D`1D3zvx~OUl:`Q0yDEN*0cjfm{wzHz:96KK#');

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
