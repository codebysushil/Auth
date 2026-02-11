<?php

declare(strict_types=1);

namespace App\Controllers;

abstract class Controller
{
    abstract public function index(): string;
}
