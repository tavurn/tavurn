<?php

use Tavurn\Support\Facades\Route;
use Tavurn\Contracts\Http\Request;

Route::get('/[{name}]',
    static fn (Request $request) => template('welcome.php', [
        'name' => $request->get('name'),
    ])
);
