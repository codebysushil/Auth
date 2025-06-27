<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
//use App\App;

final class ExampleTest extends TestCase
{
    private $app;

   /*
    public function setUp(): void
    {
        $this->app = new App("sushil");
       // $this->app->getName();
    }
    */

    public function testTwoNumbersAreSame(): void
    {
        $this->assertSame(1, 1);
    }

    /*
    public function testSetName()
    {
        $this->assertSame('sushil', $this->app->getName());
    }
     */
}
