<?php
namespace App;
// Turn on all errors and log them (no output on screen)
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/logs/error_log.txt');

// Ensure the logs directory exists
if (!is_dir(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0777, true);
}

// Custom error handler
function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    $errorTypes = [
        E_ERROR             => 'Error',
        E_WARNING           => 'Warning',
        E_PARSE             => 'Parse Error',
        E_NOTICE            => 'Notice',
        E_CORE_ERROR        => 'Core Error',
        E_CORE_WARNING      => 'Core Warning',
        E_COMPILE_ERROR     => 'Compile Error',
        E_COMPILE_WARNING   => 'Compile Warning',
        E_USER_ERROR        => 'User Error',
        E_USER_WARNING      => 'User Warning',
        E_USER_NOTICE       => 'User Notice',
        E_STRICT            => 'Strict',
        E_RECOVERABLE_ERROR => 'Recoverable Error',
        E_DEPRECATED        => 'Deprecated',
        E_USER_DEPRECATED   => 'User Deprecated',
    ];

    $type = $errorTypes[$errNo] ?? 'Unknown Error';
    $timestamp = date('Y-m-d H:i:s');
    $message = "[$timestamp] $type: $errStr in $errFile on line $errLine" . PHP_EOL;

    error_log($message, 3, __DIR__ . '/logs/error_log.txt');
    return true; // Prevent PHP internal handler
}

// Custom exception handler
function exceptionHandler(Throwable $exception)
{
    $timestamp = date('Y-m-d H:i:s');
    $message = "[$timestamp] Uncaught Exception: " . $exception->getMessage() .
               " in " . $exception->getFile() .
               " on line " . $exception->getLine() . PHP_EOL .
               $exception->getTraceAsString() . PHP_EOL;

    error_log($message, 3, __DIR__ . '/logs/error_log.txt');
}

set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');

