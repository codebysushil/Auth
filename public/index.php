<?php

// define('APP_ROOT', __DIR__);

require_once __DIR__.'/../vendor/autoload.php';
// 'require_once(__DIR__."/../bootstrap/");

spl_autoload_register(function ($class) {
    $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class.'.php');
    $classPath = './../app/'.$classFile;

    if (file_exists($classPath)) {
        require_once $classPath;
    }
});

session_start();
