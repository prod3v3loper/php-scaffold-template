<?php

/**
 * PHP Scaffolding by prod3v3loper
 * 
 * @see 
 */
abstract class GenGiX {

    /**
     * Error collector
     */
    public static $errors = array();

    public static function checkCLI() {
        return php_sapi_name() === 'cli' ? true : false;
    }

    /**
     * Output the errors
     * 
     */
    public static function getErrors() {

        foreach (self::$errors as $error) {
            echo $error . PHP_EOL;
        }
    }
}