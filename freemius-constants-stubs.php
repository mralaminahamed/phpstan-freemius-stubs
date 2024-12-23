<?php
/**
 * Generated stub declarations for freemius.
 * @see https://freemius.com
 * @see https://github.com/mralaminahamed/phpstan-freemius-stubs
 */

\define('WP_FS__SLUG', 'freemius');
\define('WP_FS__DEV_MODE', \false);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY', \false);
\define('WP_FS__SIMULATE_NO_CURL', \false);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY_CLOUDFLARE', \false);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY_SQUID_ACL', \false);
\define('FS_SDK__SIMULATE_NO_CURL', \true);
\define('FS_SDK__SIMULATE_NO_API_CONNECTIVITY_CLOUDFLARE', \true);
\define('FS_SDK__SIMULATE_NO_API_CONNECTIVITY_SQUID_ACL', \true);
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
/**
 * Directories
 */
\define('WP_FS__DIR', \dirname(__FILE__));
\define('WP_FS__DIR_INCLUDES', \WP_FS__DIR . '/includes');
\define('WP_FS__DIR_TEMPLATES', \WP_FS__DIR . '/templates');
\define('WP_FS__DIR_ASSETS', \WP_FS__DIR . '/assets');
\define('WP_FS__DIR_CSS', \WP_FS__DIR_ASSETS . '/css');
\define('WP_FS__DIR_JS', \WP_FS__DIR_ASSETS . '/js');
\define('WP_FS__DIR_IMG', \WP_FS__DIR_ASSETS . '/img');
\define('WP_FS__DIR_SDK', \WP_FS__DIR_INCLUDES . '/sdk');
/**
 * Domain / URL / Address
 */
\define('WP_FS__DOMAIN_PRODUCTION', 'wp.freemius.com');
\define('WP_FS__ADDRESS_PRODUCTION', 'https://' . \WP_FS__DOMAIN_PRODUCTION);
\define('WP_FS__DOMAIN_LOCALHOST', 'wp.freemius');
\define('WP_FS__ADDRESS_LOCALHOST', 'http://' . \WP_FS__DOMAIN_LOCALHOST . ':8080');
\define('WP_FS__TESTING_DOMAIN', 'fswp');
\define('WP_FS__API_ADDRESS_LOCALHOST', 'http://api.freemius:8080');
\define('WP_FS__API_SANDBOX_ADDRESS_LOCALHOST', 'http://sandbox-api.freemius:8080');
\define('WP_FS__IS_HTTP_REQUEST', isset($_SERVER['HTTP_HOST']));
\define('WP_FS__REMOTE_ADDR', \fs_get_ip());
// By default, run with Freemius production servers.
\define('WP_FS__IS_PRODUCTION_MODE', \true);
\define('WP_FS__ADDRESS', \WP_FS__IS_PRODUCTION_MODE ? \WP_FS__ADDRESS_PRODUCTION : \WP_FS__ADDRESS_LOCALHOST);
\define('WP_FS__IS_LOCALHOST', \WP_FS__LOCALHOST_IP === \WP_FS__REMOTE_ADDR);
\define('WP_FS__IS_LOCALHOST_FOR_SERVER', !\WP_FS__IS_HTTP_REQUEST || \false !== \strpos($_SERVER['HTTP_HOST'], 'localhost'));
\define('FS_API__ADDRESS', \WP_FS__API_ADDRESS_LOCALHOST);
\define('FS_API__SANDBOX_ADDRESS', \WP_FS__API_SANDBOX_ADDRESS_LOCALHOST);
\define('WP_FS___OPTION_PREFIX', 'fs' . (\WP_FS__IS_PRODUCTION_MODE ? '' : '_dbg') . '_');
\define('WP_FS__ACCOUNTS_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'accounts');
\define('WP_FS__API_CACHE_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'api_cache');
\define('WP_FS__OPTIONS_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'options');
\define('WP_FS__IS_HTTPS', \WP_FS__IS_HTTP_REQUEST && isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' === \strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) || isset($_SERVER['HTTPS']) && 'on' == $_SERVER['HTTPS'] || isset($_SERVER['SERVER_PORT']) && 443 == $_SERVER['SERVER_PORT']);
\define('WP_FS__IS_POST_REQUEST', \WP_FS__IS_HTTP_REQUEST && \strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
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
/**
 * Times in seconds
 */
\define('WP_FS__TIME_5_MIN_IN_SEC', 300);
\define('WP_FS__TIME_10_MIN_IN_SEC', 600);
//	define( 'WP_FS__TIME_15_MIN_IN_SEC', 900 );
\define('WP_FS__TIME_24_HOURS_IN_SEC', 86400);
\define('WP_FS__DEBUG_SDK', \is_numeric($debug_mode) ? 0 < $debug_mode : \WP_FS__DEV_MODE);
\define('WP_FS__ECHO_DEBUG_SDK', \WP_FS__DEV_MODE && !empty($_GET['fs_dbg_echo']));
\define('WP_FS__LOG_DATETIME_FORMAT', 'Y-n-d H:i:s');
\define('FS_API__LOGGER_ON', \WP_FS__DEBUG_SDK);
\define('WP_FS__SCRIPT_START_TIME', \time());
\define('WP_FS__DEFAULT_PRIORITY', 10);
\define('WP_FS__LOWEST_PRIORITY', 999999999);
\define('WP_FS__SECURITY_PARAMS_PREFIX', 's_');
\define('FS_SDK__USER_AGENT', 'fs-php-' . \Freemius_Api_Base::VERSION);
\define('FS_SDK__HAS_CURL', !\FS_SDK__SIMULATE_NO_CURL && \function_exists('curl_version'));
\define('FS_API__PROTOCOL', \version_compare($curl_version['version'], '7.37', '>=') ? 'https' : 'http');
/**
 * Copyright 2014 Freemius, Inc.
 *
 * Licensed under the GPL v2 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://choosealicense.com/licenses/gpl-v2/
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
\define('FS_API__VERSION', '1');
\define('FS_SDK__PATH', \dirname(__FILE__));
\define('FS_SDK__EXCEPTIONS_PATH', \FS_SDK__PATH . '/Exceptions/');