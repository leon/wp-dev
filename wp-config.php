<?php
// Database
define('DB_HOST', $_SERVER['MYSQL_HOST'] ?? 'db');
define('DB_NAME', $_SERVER['MYSQL_DATABASE'] ?? 'wordpress');
define('DB_USER', $_SERVER['MYSQL_USER'] ?? 'wordpress');
define('DB_PASSWORD', $_SERVER['MYSQL_PASSWORD'] ?? 'wordpress');
define('DB_CHARSET', $_SERVER['MYSQL_CHARSET'] ?? 'utf8');
define('DB_COLLATE', $_SERVER['MYSQL_COLLATE'] ?? '');

// Table prefix
$table_prefix  = 'wp_';

// Change Content Directory
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_CONTENT_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/wp-content');

// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
define('AUTH_KEY',         'worpress-docker-dev');
define('SECURE_AUTH_KEY',  'worpress-docker-dev');
define('LOGGED_IN_KEY',    'worpress-docker-dev');
define('NONCE_KEY',        'worpress-docker-dev');
define('AUTH_SALT',        'worpress-docker-dev');
define('SECURE_AUTH_SALT', 'worpress-docker-dev');
define('LOGGED_IN_SALT',   'worpress-docker-dev');
define('NONCE_SALT',       'worpress-docker-dev');

// Disable all updates, since we handle this with composer
define('AUTOMATIC_UPDATER_DISABLED', true);
define('WP_AUTO_UPDATE_CORE', false);

// Direct upgrade
//define('FS_METHOD', 'direct');

// Bootstrap WordPress
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/wp/');
}
require_once(ABSPATH . 'wp-settings.php');
