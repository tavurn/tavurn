<?php

namespace App\Http;

use Tavurn\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected array $middleware = [
        \Tavurn\Foundation\Middleware\EnsureValidUri::class,
    ];
}
