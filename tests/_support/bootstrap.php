<?php

ini_set('error_reporting', E_ALL);

$basePath = realpath(__DIR__ . '/../../') . DIRECTORY_SEPARATOR;

define('FCPATH', $basePath . 'public' . DIRECTORY_SEPARATOR);
// Only define ROOTPATH if not already defined
if (!defined('ROOTPATH')) {
    define('ROOTPATH', $basePath);
}

require $basePath . 'vendor/codeigniter4/framework/system/Test/bootstrap.php';

// Load the helper function
helper('test');