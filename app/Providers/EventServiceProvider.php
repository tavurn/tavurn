<?php

namespace App\Providers;

use App\Events\Hello;
use App\Listeners\HelloListener;
use App\Listeners\LogRequest;
use Tavurn\Http\RequestHandled;
use Tavurn\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected array $listeners = [
        RequestHandled::class => [
            LogRequest::class,
        ],
        Hello::class => [
            HelloListener::class,
        ],
    ];
}
