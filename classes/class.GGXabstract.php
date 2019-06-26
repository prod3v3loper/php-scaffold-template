<?php

/**
 * PHP Scaffolding by prod3v3loper
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2019, Samet Tarim
 * @link        https://www.prod3v3loper.com
 * @package     melabuai
 * @subpackage  mvc
 * @version     1.0
 * @since       1.0
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