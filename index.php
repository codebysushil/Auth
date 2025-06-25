<?php

require_once(__DIR__."/vendor/autoload.php");

spl_autoload_register(function ($class) {
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("This page not found: $file");

    }
});

session_start();
session_regenerate_id(true);


