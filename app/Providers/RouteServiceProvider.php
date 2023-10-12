<?php

namespace App\Providers;

use Tavurn\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function booting(): void
    {
        require base_path('routes/web.php');
    }
}