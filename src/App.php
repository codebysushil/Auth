<?php

//declare(strict_types=1);

namespace App;

class App
{
    private string $app;

    public function __construct($name)
    {
        $this->app = $name;
    }

    public function getName()
    {
        return $this->app;
    }
}
