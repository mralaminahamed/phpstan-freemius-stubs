<?php
/**
 * Generated stub declarations for freemius.
 * @see https://freemius.com
 * @see https://github.com/mralaminahamed/phpstan-freemius-stubs
 */

\define('WP_FS__SLUG', 'freemius');
\define('WP_FS__DEV_MODE', \false);
/**
 * API Connectivity Simulation
 */
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY', \false && \WP_FS__DEV_MODE);
\define('WP_FS__SIMULATE_NO_CURL', \false && \WP_FS__DEV_MODE);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY_CLOUDFLARE', \false && \WP_FS__DEV_MODE);
\define('WP_FS__SIMULATE_NO_API_CONNECTIVITY_SQUID_ACL', \false && \WP_FS__DEV_MODE);
\define('FS_SDK__SIMULATE_NO_CURL', \true);
\define('FS_SDK__SIMULATE_NO_API_CONNECTIVITY_CLOUDFLARE', \true);
\define('FS_SDK__SIMULATE_NO_API_CONNECTIVITY_SQUID_ACL', \true);
// VVV default public network IP.
\define('WP_FS__VVV_DEFAULT_PUBLIC_IP', '192.168.50.4');
/**
 * If true and running with secret key, the opt-in process
 * will skip the email activation process which is invoked
 * when the email of the context user already exist in Freemius
 * database (as a security precaution, to prevent sharing user
 * secret with unauthorized entity).
 *
 * IMPORTANT:
 *      AS A SECURITY PRECAUTION, WE VALIDATE THE TIMESTAMP OF THE OPT-IN REQUEST.
 *      THEREFORE, MAKE SURE THAT WHEN USING THIS PARAMETER,YOUR TESTING ENVIRONMENT'S
 *      CLOCK IS SYNCED.
 */
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
\define('WP_FS__TESTING_DOMAIN', 'fswp:8080');
\define('WP_FS__DOMAIN_PRODUCTION', 'wp.freemius.com');
\define('WP_FS__DOMAIN_LOCALHOST', 'wp.freemius');
\define('WP_FS__ADDRESS_LOCALHOST', 'http://' . \WP_FS__DOMAIN_LOCALHOST . ':8080');
\define('WP_FS__ADDRESS_PRODUCTION', 'https://' . \WP_FS__DOMAIN_PRODUCTION);
\define('WP_FS__IS_PRODUCTION_MODE', !\defined('WP_FS__DEV_MODE') || !\WP_FS__DEV_MODE || \WP_FS__TESTING_DOMAIN !== $_SERVER['HTTP_HOST']);
\define('WP_FS__ADDRESS', \WP_FS__IS_PRODUCTION_MODE ? \WP_FS__ADDRESS_PRODUCTION : \WP_FS__ADDRESS_LOCALHOST);
\define('WP_FS__IS_LOCALHOST', \WP_FS__LOCALHOST_IP == $_SERVER['REMOTE_ADDR']);
\define('WP_FS__IS_LOCALHOST_FOR_SERVER', \false !== \strpos($_SERVER['HTTP_HOST'], 'localhost'));
\define('FS_API__ADDRESS', 'http://api.freemius:8080');
\define('FS_API__SANDBOX_ADDRESS', 'http://sandbox-api.freemius:8080');
\define('WP_FS___OPTION_PREFIX', 'fs' . (\WP_FS__IS_PRODUCTION_MODE ? '' : '_dbg') . '_');
\define('WP_FS__ACCOUNTS_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'accounts');
\define('WP_FS__API_CACHE_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'api_cache');
\define('WP_FS__OPTIONS_OPTION_NAME', \WP_FS___OPTION_PREFIX . 'options');
\define('WP_FS__IS_HTTPS', isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' === \strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) || isset($_SERVER['HTTPS']) && 'on' == $_SERVER['HTTPS'] || isset($_SERVER['SERVER_PORT']) && 443 == $_SERVER['SERVER_PORT']);
\define('WP_FS__IS_POST_REQUEST', \strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
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
//	define( 'WP_FS__TIME_5_MIN_IN_SEC', 300 );
\define('WP_FS__TIME_10_MIN_IN_SEC', 600);
//	define( 'WP_FS__TIME_15_MIN_IN_SEC', 900 );
\define('WP_FS__TIME_24_HOURS_IN_SEC', 86400);
/**
 * Debugging
 */
\define('WP_FS__DEBUG_SDK', !empty($_GET['fs_dbg']));
\define('WP_FS__ECHO_DEBUG_SDK', !empty($_GET['fs_dbg_echo']));
\define('WP_FS__LOG_DATETIME_FORMAT', 'Y-n-d H:i:s');
\define('WP_FS__SCRIPT_START_TIME', \time());
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
\define('WP_TPA__SLUG', 'test-plugin-addon');
\define('WP_TP__SLUG', 'test-plugin');