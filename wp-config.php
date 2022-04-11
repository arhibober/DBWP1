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
define('DB_NAME', 'dbwp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '`Zq)2ex&:aJk[*=e6!4VfnC5ng8q&~|/$|Fw/ZuqYcGwB,@|(XST`8l-xg?Nctj@');
define('SECURE_AUTH_KEY',  'Ml;x^ bDZEv`?@tpv#2igmYrJ~s6ss_@^b:;JAK)K:pf`m02**)P,24Bn)Y[U&,s');
define('LOGGED_IN_KEY',    '!X3gC`oxbcK@|*sr;w=j]<i ypkXXUFt{A=- >ZL=OlB.4O pfjZ%?($!RoylX.4');
define('NONCE_KEY',        'EV&icT<*z}zHyjuCf);M [Arl;F=8UzmBjN|6SvOk<$(iC^=#[Lk=[eU6Bcjs.Q[');
define('AUTH_SALT',        'GoS8tnP~Cpx/NE}5I!%mBC_9yyAKxGfaI@8^sL&B1#RPN*G4=<%1!-a#].(}8k=6');
define('SECURE_AUTH_SALT', ':RMt{%:qj2sQ=@WttJ.9v^l*b`c~]^G>2) T{?5NY7UBODY+<9A8l[dF0y&$PB1^');
define('LOGGED_IN_SALT',   '}ve*{RC^wT?E7#,oH5%-=m!;40;+-LQ!~H8`_F}=F=>?biB_p|`2?1EWrA0DzG-f');
define('NONCE_SALT',       'kvKKs 3~n8]=D-F$[]2q@rUl*;VF}XFT:tH+kvDRWlN-VauX5X[l#i./Eo{lb2(V');

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
