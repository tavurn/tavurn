<?php

namespace App\Providers;

use App\Exceptions\RenderedException;
use Tavurn\Support\Facades\Exception;
use Tavurn\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function booting(): void
    {
        Exception::handle(RenderedException::class, function ($e) {
            $name = $e::class;

            echo "Oh no!! We encountered a {$name}!" . PHP_EOL;
        });
    }
}
