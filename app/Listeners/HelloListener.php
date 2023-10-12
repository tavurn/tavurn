<?php

namespace App\Listeners;

use App\Events\Hello;

class HelloListener
{
    public function handle(Hello $event): void
    {
        echo "Hello from HelloListener!" . PHP_EOL;
    }
}