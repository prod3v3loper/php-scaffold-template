<?php

/**
 * This file generates for us our necessary URL and ROOT so that we can integrate and 
 * retrieve files without having to enter the URL again and again. 
 * Everything is created automatically here.
 */

// Get project root
define('PROJECT_DOCUMENT_ROOT', __DIR__);

// Server Document root
$DOCUMENT_ROOT = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
$project = str_replace($DOCUMENT_ROOT, '', str_replace("\\", "/", __DIR__));
define('DOCUMENT_ROOT', str_replace('/your/path/or/webspace/root/to/this/folder/', '', PROJECT_DOCUMENT_ROOT));

// Protocol for the domain
$HTTPS = filter_input(INPUT_SERVER, 'HTTPS');
if (!$HTTPS OR $HTTPS == 'off') {
    $protocol = 'http://';
} else {
    $protocol = 'https://';
}

// Create HTTP root
$HTTP_HOST = filter_input(INPUT_SERVER, 'HTTP_HOST');
define('PROJECT_HTTP_ROOT', $protocol . $HTTP_HOST . $project);
