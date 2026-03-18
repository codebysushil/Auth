<?php

function view(string $file): string
{
    if (file_exists($file)) {
        require_once $file;
    }
}
