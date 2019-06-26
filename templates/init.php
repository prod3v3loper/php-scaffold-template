<?php

/**
 * Debugging
 * Overwrite ini settings debug
 */
define("DEBUG", true);

if (DEBUG) {
    ini_set('html_errors', 1);
    ini_set('error_reporting', -1); // E_ALL
    ini_set('display_errors', 1); // On
    error_reporting(-1); // Report all
}

// To detect the root path and build urls and roots
require_once 'paths.php';

/**
 * Set our DB configs
 * 
 * @global type $GLOBALS['config']
 * @name $config
 */
$GLOBALS["config"] = array(
    // MySQL data
    "mysql" => array(
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "",
        "user" => "",
        "pass" => "",
        "opt" => array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
    )
    // Add more here for other...
);

/**
 *  Or, using an anonymous function as of PHP 5.3.0
 * 
 * @see https://www.php.net/manual/de/function.spl-autoload-register.php
 */
spl_autoload_register(function ($class) {
    if (file_exists('Model/' . $class . '.class.php')) {
        require_once 'Model/' . $class . '.class.php';
    }
});

spl_autoload_register(function ($class) {
    if (file_exists('View/' . $class . '.class.php')) {
        require_once 'View/' . $class . '.class.php';
    }
});

spl_autoload_register(function ($class) {
    if (file_exists('Controller/' . $class . '.class.php')) {
        require_once 'Controller/' . $class . '.class.php';
    }
});

spl_autoload_register(function ($class) {
    if (file_exists('core/classes/' . $class . '.class.php')) {
        require_once 'core/classes/' . $class . '.class.php';
    }
});
