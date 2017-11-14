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
define('REVISR_WORK_TREE', '/home1/talcubat/public_html/'); // Added by Revisr
define('REVISR_GIT_PATH', 'https://github.com/theluckyfox/temp.git'); // Added by Revisr
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home1/talcubat/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'talcubat_WPLQI');

/** MySQL database username */
define('DB_USER', 'talcubat_WPLQI');

/** MySQL database password */
define('DB_PASSWORD', 'aWAAgvhL5HLJ3lEVe');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY', '6e7b6090017e91e4e727830bfb610055b08e5cf87a54a6c37722b4ae2ffc5dc1');
define('SECURE_AUTH_KEY', '75b93e34d92e68df725f61f7a99de8fd5225596c61a88c4a2dd1c9c6ccb97ac4');
define('LOGGED_IN_KEY', 'ca8a9c0bfd5c9f68b4ea77585b5a4a0c0ca74f7f164753f47a0db734355f732e');
define('NONCE_KEY', 'e412815ae5fcdc67347f096dab82fba3eba1272ed25fc26996be2b3d5bfbef0d');
define('AUTH_SALT', 'b5ab0ab5c3f3c47058bf050cbfba9a1e971715ec62ca30403ea2084c585a85ee');
define('SECURE_AUTH_SALT', '6c5124804a605b28c59e82d26bee4208199ec23276d06a65ef80471f5fc39617');
define('LOGGED_IN_SALT', '15796176215b2157522e509295dde9755ea6b09c51d4c4cd63490c4cda61eac7');
define('NONCE_SALT', '4abb87cfaaaaad4d3f133b9ca13e83efe689dd3d2c17f13454df699532d017dc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '_LQI_';

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

define( 'WP_CRON_LOCK_TIMEOUT', 120   ); 
define( 'AUTOSAVE_INTERVAL',    300   );
define( 'WP_POST_REVISIONS',    5     );
define( 'EMPTY_TRASH_DAYS',     7     );
define( 'WP_AUTO_UPDATE_CORE',  true  );


