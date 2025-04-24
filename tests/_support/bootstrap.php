<?php

ini_set('error_reporting', E_ALL);

// Définir les chemins de base
$basePath = realpath(__DIR__ . '/../../') . DIRECTORY_SEPARATOR;

define('FCPATH', $basePath . 'public' . DIRECTORY_SEPARATOR);
if (!defined('ROOTPATH')) {
    define('ROOTPATH', $basePath);
}

// Define helper function in global namespace
if (!function_exists('helper')) {
    function helper($name) {
        return \CodeIgniter\Config\Services::filesystem()->loadHelper($name);
    }
}

// Charger les fonctions globales de CodeIgniter
require_once $basePath . 'vendor/codeigniter4/framework/system/Common.php';

// Charger le bootstrap de test de CodeIgniter
require $basePath . 'vendor/codeigniter4/framework/system/Test/bootstrap.php';

// Initialiser l'autoloader
$autoloader = \CodeIgniter\Config\Services::autoloader();
$autoloader->initialize(new \Config\Autoload(), new \Config\Modules());

// Charger TestResponse si nécessaire
require_once $basePath . 'vendor/codeigniter4/framework/system/Test/TestResponse.php';