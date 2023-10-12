<?php

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Tavurn\Contracts\Http\Middleware;
use Tavurn\Contracts\Http\Request;
use Tavurn\Foundation\Middleware\Stack;

class UselessMiddleware implements Middleware
{
    public function process(Request $request, Stack $next): ResponseInterface
    {
        $request = $request->withHeader('Something-Useless', 'Hello!');

        $response = $next($request);

        return $response->withoutHeader('This-Probably-Doesnt-Exist');
    }
}