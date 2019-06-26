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

require_once "classes/class.GGXabstract.php";
require_once "classes/class.GGX.php";

GGX::info("Welcome to PHP Scaffold, create your scaffold in seconds to start.");

if( GGX::checkCLI() ) {

    $arr = [
        "Customer ? (" . basename(__DIR__) . ")",
        "Project year ? (" . date("Y") . ")",
        "Project name ? (newsletter)",
    ];

    GGX::questions($arr);
    GGX::create();
    GGX::xcopy();

} else {

    echo "\nNo PHP CLI\n";
}

GGX::getErrors();