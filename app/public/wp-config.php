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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '85eld/f4XwhUYMbVO/877rnX+ggzHX9+TnVkpXxmKpJrDXHd1kHqQwswVzRHY0Cap3hCaU8PSphCy8Wu+n85Cw==');
define('SECURE_AUTH_KEY',  'fjutNoOLnURv8vpGU6WGQS6U3rjvjQ04heqHnQ9ajuSZpZ4ZdjBe07iP3Hh8Hz7mm9PwEXbcrQV6XjGpD+/qOg==');
define('LOGGED_IN_KEY',    '1hMgY2NdlcAejcD76OCk2rMJSKno8kp88X5YTK/C9ivIt5pakAsYKID5Ojdb6uuJgqJaenjuo7GbhF93jUHnYw==');
define('NONCE_KEY',        'PayNaG3StDuVBUek/aWnFnZMU/QbuflOKsqnxSYy5utNL0xuFDYKyEI+X4ZrC5TMF20NrF4P5VBT18FluohYpw==');
define('AUTH_SALT',        'qbNuXJJgJeB+vQ6teGexzj5sZn/J3bWH++rt50sII5zk2/Hl6cUq2oYr3PERUOgeP1JgTYb1qCNYBXAD5rK+Sg==');
define('SECURE_AUTH_SALT', 'ZmXy7SfuhMTdRP0TFnnhNvK+Zm0qoaoQsCIKVQwvdtszHTMIMAJkfjOhXBogenqlPoeM1zi1IZ39EXroI9vXnQ==');
define('LOGGED_IN_SALT',   'tyMosu6rTmuA3M9aYYGZssJoOHkR1BKSQgzV2jdasP5NWDeCdzQd7wzclLs2rWzlXQV9Om389mzf+uRZ8cULLQ==');
define('NONCE_SALT',       'Sg0qc3agFh1MApaxa3iZEumbSzXEiFyWYMIc6xJl0GQ/JYnhXQ0gelFxZxXNbGZyhJNKe0rfIkGO2iXw/CBAiQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
