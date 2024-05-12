<?php
/**
 * Generated stub declarations for freemius.
 * @see https://freemius.com
 * @see https://github.com/mralaminahamed/phpstan-freemius-stubs
 */

// phpcs:disable Squiz.PHP.DiscouragedFunctions,NeutronStandard.Constants.DisallowDefine
// There are no core functions to read these constants.
\define('ABSPATH', './');
\define('WP_DEBUG', \true);
\define('WP_DEBUG_LOG', \true);
\define('WP_DEBUG_DISPLAY', \true);
\define('WP_PLUGIN_DIR', './');
\define('WPMU_PLUGIN_DIR', './');
\define('EMPTY_TRASH_DAYS', 30 * 86400);
\define('SCRIPT_DEBUG', \false);
\define('WP_LANG_DIR', './');
\define('WP_CONTENT_DIR', './');
// Constants for expressing human-readable intervals.
\define('MINUTE_IN_SECONDS', 60);
\define('HOUR_IN_SECONDS', 60 * \MINUTE_IN_SECONDS);
\define('DAY_IN_SECONDS', 24 * \HOUR_IN_SECONDS);
\define('WEEK_IN_SECONDS', 7 * \DAY_IN_SECONDS);
\define('MONTH_IN_SECONDS', 30 * \DAY_IN_SECONDS);
\define('YEAR_IN_SECONDS', 365 * \DAY_IN_SECONDS);
// Constants for expressing human-readable data sizes in their respective number of bytes.
\define('KB_IN_BYTES', 1024);
\define('MB_IN_BYTES', 1024 * \KB_IN_BYTES);
\define('GB_IN_BYTES', 1024 * \MB_IN_BYTES);
\define('TB_IN_BYTES', 1024 * \GB_IN_BYTES);
// wpdb method parameters.
\define('OBJECT', 'OBJECT');
\define('OBJECT_K', 'OBJECT_K');
\define('ARRAY_A', 'ARRAY_A');
\define('ARRAY_N', 'ARRAY_N');
// Constants from WP_Filesystem.
\define('FS_CONNECT_TIMEOUT', 30);
\define('FS_TIMEOUT', 30);
\define('FS_CHMOD_DIR', 0755);
\define('FS_CHMOD_FILE', 0644);
// Rewrite API Endpoint Masks.
\define('EP_NONE', 0);
\define('EP_PERMALINK', 1);
\define('EP_ATTACHMENT', 2);
\define('EP_DATE', 4);
\define('EP_YEAR', 8);
\define('EP_MONTH', 16);
\define('EP_DAY', 32);
\define('EP_ROOT', 64);
\define('EP_COMMENTS', 128);
\define('EP_SEARCH', 256);
\define('EP_CATEGORIES', 512);
\define('EP_TAGS', 1024);
\define('EP_AUTHORS', 2048);
\define('EP_PAGES', 4096);
\define('EP_ALL_ARCHIVES', \EP_DATE | \EP_YEAR | \EP_MONTH | \EP_DAY | \EP_CATEGORIES | \EP_TAGS | \EP_AUTHORS);
\define('EP_ALL', \EP_PERMALINK | \EP_ATTACHMENT | \EP_ROOT | \EP_COMMENTS | \EP_SEARCH | \EP_PAGES | \EP_ALL_ARCHIVES);
// Templating-related WordPress constants.
// phpcs:ignore WordPress.WP.DiscouragedConstants.STYLESHEETPATHDeclarationFound
\define('STYLESHEETPATH', '/app/wp-content/themes/child/');
// phpcs:ignore WordPress.WP.DiscouragedConstants.TEMPLATEPATHDeclarationFound
\define('TEMPLATEPATH', '/app/wp-content/themes/parent/');
\define('WP_DEFAULT_THEME', 'twentytwentythree');
// Freemius SDK constants.
\define('WP_FS__SDK_VERSION', '1.0.0');
\define('WP_FS__SLUG', 'freemius');
\define('WP_FS__DEV_MODE', \false);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY', \false);
\define('WP_FS__SIMULATE_NO_CURL', \false);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY_CLOUDFLARE', \false);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY_SQUID_ACL', \false);
\define('FS_SDK__SIMULATE_NO_CURL', \true);
\define('FS_SDK__SIMULATE_NO_API_CONNECTIVITY_CLOUDFLARE', \true);
\define('FS_SDK__SIMULATE_NO_API_CONNECTIVITY_SQUID_ACL', \true);
\define('WP_FS__SIMULATE_FREEMIUS_OFF', \false);
/**
 * @since  1.1.7.3
 * @author Vova Feldman (@svovaf)
 *
 * I'm not sure if shared servers periodically change IP, or the subdomain of the
 * admin dashboard. Also, I've seen sites that have strange loop of switching
 * between domains on a daily basis. Therefore, to eliminate the risk of
 * multiple unwanted connectivity test pings, temporary ignore domain or
 * server IP changes.
 */
\define('WP_FS__PING_API_ON_IP_OR_HOST_CHANGES', \false);
// VVV default public network IP.
\define('WP_FS__VVV_DEFAULT_PUBLIC_IP', '192.168.50.4');
\define('WP_FS__SKIP_EMAIL_ACTIVATION', \false);
\define('WP_FS__DIR', \dirname(__FILE__));
\define('WP_FS__DIR_INCLUDES', \WP_FS__DIR . '/includes');
\define('WP_FS__DIR_TEMPLATES', \WP_FS__DIR . '/templates');
\define('WP_FS__DIR_ASSETS', \WP_FS__DIR . '/assets');
\define('WP_FS__DIR_CSS', \WP_FS__DIR_ASSETS . '/css');
\define('WP_FS__DIR_JS', \WP_FS__DIR_ASSETS . '/js');
\define('WP_FS__DIR_IMG', \WP_FS__DIR_ASSETS . '/img');
\define('WP_FS__DIR_SDK', \WP_FS__DIR_INCLUDES . '/sdk');
#endregion
/**
 * Domain / URL / Address
 */
\define('WP_FS__ROOT_DOMAIN_PRODUCTION', 'freemius.com');
\define('WP_FS__DOMAIN_PRODUCTION', 'wp.freemius.com');
\define('WP_FS__ADDRESS_PRODUCTION', 'https://' . \WP_FS__DOMAIN_PRODUCTION);
\define('WP_FS__DOMAIN_LOCALHOST', 'wp.freemius');
\define('WP_FS__ADDRESS_LOCALHOST', 'http://' . \WP_FS__DOMAIN_LOCALHOST . ':8080');
\define('WP_FS__TESTING_DOMAIN', 'fswp');
\define('WP_FS__IS_HTTP_REQUEST', isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_METHOD']));
\define('WP_FS__IS_HTTPS', \WP_FS__IS_HTTP_REQUEST && isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' === \strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) || isset($_SERVER['HTTPS']) && 'on' == $_SERVER['HTTPS'] || isset($_SERVER['SERVER_PORT']) && 443 == $_SERVER['SERVER_PORT']);
\define('WP_FS__IS_POST_REQUEST', \WP_FS__IS_HTTP_REQUEST && \strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
\define('WP_FS__REMOTE_ADDR', \fs_get_ip());
\define('WP_FS__IS_LOCALHOST_FOR_SERVER', !\WP_FS__IS_HTTP_REQUEST || \false !== \strpos($_SERVER['HTTP_HOST'], 'localhost'));
// By default, run with Freemius production servers.
\define('WP_FS__IS_PRODUCTION_MODE', \true);
\define('WP_FS__ADDRESS', \WP_FS__IS_PRODUCTION_MODE ? \WP_FS__ADDRESS_PRODUCTION : \WP_FS__ADDRESS_LOCALHOST);
\define('WP_FS__API_ADDRESS_LOCALHOST', 'http://api.freemius-local.com:8080');
\define('WP_FS__API_SANDBOX_ADDRESS_LOCALHOST', 'http://sandbox-api.freemius:8080');
\define('FS_CHECKOUT__ADDRESS_PRODUCTION', 'https://checkout.freemius.com');
\define('FS_CHECKOUT__ADDRESS_LOCALHOST', 'http://checkout.freemius-local.com:8080');
\define('FS_CHECKOUT__ADDRESS', \WP_FS__IS_PRODUCTION_MODE ? \FS_CHECKOUT__ADDRESS_PRODUCTION : \FS_CHECKOUT__ADDRESS_LOCALHOST);
#endregion
\define('WP_FS___OPTION_PREFIX', 'fs' . (\WP_FS__IS_PRODUCTION_MODE ? '' : '_dbg') . '_');
\define('WP_FS__ACCOUNTS_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'accounts');
\define('WP_FS__API_CACHE_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'api_cache');
\define('WP_FS__GDPR_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'gdpr');
\define('WP_FS__OPTIONS_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'options');
/**
 * Module types
 *
 * @since 1.2.2
 */
\define('WP_FS__MODULE_TYPE_PLUGIN', 'plugin');
\define('WP_FS__MODULE_TYPE_THEME', 'theme');
/**
 * Billing Frequencies
 */
\define('WP_FS__PERIOD_ANNUALLY', 'annual');
\define('WP_FS__PERIOD_MONTHLY', 'monthly');
\define('WP_FS__PERIOD_LIFETIME', 'lifetime');
/**
 * Plans
 */
\define('WP_FS__PLAN_DEFAULT_PAID', \false);
\define('WP_FS__PLAN_FREE', 'free');
\define('WP_FS__PLAN_TRIAL', 'trial');
\define('WP_FS__TIME_5_MIN_IN_SEC', 300);
\define('WP_FS__TIME_10_MIN_IN_SEC', 600);
\define('WP_FS__TIME_12_HOURS_IN_SEC', 43200);
\define('WP_FS__TIME_24_HOURS_IN_SEC', \WP_FS__TIME_12_HOURS_IN_SEC * 2);
\define('WP_FS__TIME_WEEK_IN_SEC', 7 * \WP_FS__TIME_24_HOURS_IN_SEC);
\define('WP_FS__DEBUG_SDK', \is_numeric($debug_mode) ? 0 < $debug_mode : \WP_FS__DEV_MODE);
\define('WP_FS__ECHO_DEBUG_SDK', \WP_FS__DEV_MODE && !empty($_GET['fs_dbg_echo']));
\define('WP_FS__LOG_DATETIME_FORMAT', 'Y-m-d H:i:s');
\define('FS_API__LOGGER_ON', \WP_FS__DEBUG_SDK);
\define('WP_FS__SCRIPT_START_TIME', \time());
\define('WP_FS__DEFAULT_PRIORITY', 10);
\define('WP_FS__LOWEST_PRIORITY', 999999999);
\define('WP_FS__IS_NETWORK_ADMIN', \is_multisite() && (\is_network_admin() || (\defined('DOING_AJAX') && \DOING_AJAX && (isset($_REQUEST['_fs_network_admin']) && 'true' === $_REQUEST['_fs_network_admin']) || \defined('WP_UNINSTALL_PLUGIN'))));
\define('WP_FS__IS_BLOG_ADMIN', \is_blog_admin() || \defined('DOING_AJAX') && \DOING_AJAX && isset($_REQUEST['_fs_blog_admin']));
// Set to true to show network level settings even if delegated to site admins.
\define('WP_FS__SHOW_NETWORK_EVEN_WHEN_DELEGATED', \false);
\define('WP_FS__DEMO_MODE', \false);
\define('FS_SDK__SSLVERIFY', \false);
\define('WP_FS__SECURITY_PARAMS_PREFIX', 's_');
\define('FS_API__VERSION', '1');
\define('FS_SDK__PATH', \dirname(__FILE__));
\define('FS_SDK__EXCEPTIONS_PATH', \FS_SDK__PATH . '/Exceptions/');
\define('FS_SDK__USER_AGENT', 'fs-php-' . \Freemius_Api_Base::VERSION);
\define('FS_API__PROTOCOL', \version_compare($curl_version['version'], '7.37', '>=') ? 'https' : 'http');
\define('FS_API__ADDRESS', '://api.freemius.com');
\define('FS_API__SANDBOX_ADDRESS', '://sandbox-api.freemius.com');