<?php

namespace App\Http\Controllers;

use Tavurn\Contracts\Http\Request;

class GreetingController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->get('name');

        return "Hello, {$name}!";
    }
}