<?php

function view(string $file): string
{
   echo $path = __dir__.'/resources/views/'.$file.'.php';
    if (file_exists($path)) {
        require_once $path;
    }
}
