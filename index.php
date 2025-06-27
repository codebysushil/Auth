<?php
define('ROOT_PATH', __DIR__);

require_once(__DIR__."/vendor/autoload.php");

spl_autoload_register(function ($class) {
    $file = ROOT_PATH . '/'. str_replace("\\", '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        $msg = throw new Exception("This page not found: $file");
error_log($msg, 3, 'Exception.txt');

    }
});

session_start();
session_regenerate_id(true);

use App\Config\Config;

$config = new Config();
$pdo = $config->getConnection(__DIR__);

