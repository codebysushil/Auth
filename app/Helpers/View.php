<?php

function view(string $file): string
{
    echo $path = __DIR__.'/resources/views/'.$file.'.php';
    if (file_exists($path)) {
        require_once $path;
    }
}
