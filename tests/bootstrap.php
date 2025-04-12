<?php
/**
 * Bootstrap file for PHPUnit tests
 */

// Include composer autoloader
$autoloader = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloader)) {
    require_once $autoloader;
}

// Include stubs
require_once dirname(__DIR__) . '/freemius-constants-stubs.stub';
require_once dirname(__DIR__) . '/freemius-stubs.stub';

// Set up testing environment
define('FREEMIUS_STUBS_TESTING', true); 