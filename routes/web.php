<?php

use Tavurn\Support\Facades\Route;
use Tavurn\Contracts\Http\Request;

Route::get('/', function (Request $request) {
    return 'Welcome!';
});
