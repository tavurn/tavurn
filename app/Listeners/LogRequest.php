<?php

namespace App\Listeners;

use Tavurn\Http\RequestHandled;

class LogRequest
{
    public function handle(RequestHandled $event): void
    {
        echo "Handled request on route {$event->request->getUri()->getPath()}\n";
    }
}
