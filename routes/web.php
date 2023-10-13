<?php

use Tavurn\Support\Facades\Route;
use Tavurn\Contracts\Http\Request;
use App\Http\Controllers\GreetingController;
use App\Exceptions\RenderedException;
use App\Events\Hello;

Route::get('/', function () {
    event(new Hello());

    return 'Hello!';
});

Route::get('/greet', function (Request $request) {
    $name = $request->query('name', 'Anonymous');

    return "Hello, {$name}!";
});

Route::get('/greet/{name}', GreetingController::class);

Route::get('/exception', function () {
    throw new RenderedException;
});
