<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define( 'DB_NAME', 'i6350020_wp1' );

/** MySQL database username */
define( 'DB_USER', 'i6350020_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'T.KmWRuVxikONKM6P8h22' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '91oezqZmrP9KRikAvu4E5mPLxyqm2FUuTcJP3hz8pLNq4iw3mKLSumeKL6DuHgiX');
define('SECURE_AUTH_KEY',  '7oHo9s5DcLLAY5vuCyvIyiUOSD2AvHf8xC6OcWyzGQtDhQdHf1FvZI6b78HInPj9');
define('LOGGED_IN_KEY',    '2WeTKRoUHNZWnHKOrhSP09dSJKHkRLWyb7ONVnDN6V06KaMzf8Zao1MCqPSJIcee');
define('NONCE_KEY',        '2BOCsWIOfoyZYMZkp2KpOa4C7fUUGXFbSkN2dQySUS9Fas35Sgru2UxIuSo8PH0l');
define('AUTH_SALT',        'bbkeNkNSjudSxnBkl0PrhG4Z22IKdud0jZs3WOYnxjCXaDriCsROf0AwApGTIyBW');
define('SECURE_AUTH_SALT', '7a85UHr0dPVCH0KL7Ikz3kqSFBho5h2o5CLToZWoJ75DcVYV0O1yXcD0jFIj4U3a');
define('LOGGED_IN_SALT',   'miss0t8BgjbhDAhNYlh8Gfp2wPEUgLrkBx5AhhliKakFAtkKDITQ6CfUirHVCHXH');
define('NONCE_SALT',       'KXlAqaCsC2lFFWjXuc5oJbZm5kX7dFrafpns1ewl8g2NR8Au3t6CzY5qCElYJrcP');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
