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
define('DB_NAME', 'db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'db:3306');

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
define('AUTH_KEY',         '<7W~6Y#mg*B$@7()Gyd/z6SN$%Am@G*hVAj@nmZgXeCht9`]xK NE&H(c,k>Ukp9');
define('SECURE_AUTH_KEY',  'Q*Aan@Fr},KXi^K|2uY?etJEmIztO]%(7oY^Tm4WfkJ&nbNRwbaAvnX<[Z(sIa8Y');
define('LOGGED_IN_KEY',    '(6-3!^ctyoCVbHDy%9F1#>OxEy3T<k(MQ^FPP,~*.&@0_ohE](>csU#M,W-X&r2c');
define('NONCE_KEY',        '}zA4Us8Ft&PE,8`sH2#j)Qc*y0B* %Q[Z`d#jFesLJ!XtjyxN1(o9@B%nw>`WJ=#');
define('AUTH_SALT',        ',j:hf@^YeLC^t(V]0&:+.HoPtL_O6(M7i;ML&xWxx_&Lr=hROt`[|GjS[vE0r=Au');
define('SECURE_AUTH_SALT', 'dzSiL(dY#V@P68a1T@!}F.9C93vsNstwakc3STb+Sc/]{vY0/m+#Si]QcCS0DbgN');
define('LOGGED_IN_SALT',   'pgSupQvb{_6!1w1+uokoXMuj7>j1gm]Iau/sI;m1$)]3@Tia)/#0GqEv(hRtjuFf');
define('NONCE_SALT',       'gz?Uk6y92.4gFNu^KgSfOWPj7d^kMF,;i>NuA2vrNZ8?;N7W^CtF,6V::sEZ=DE9');

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
