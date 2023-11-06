<?php

use Tavurn\Support\Facades\Route;
use Tavurn\Contracts\Http\Request;

Route::get('/[{name}]',
    static fn (Request $request) => template('welcome.php', [
        'name' => $request->getAttribute('name'),
    ])
);

Route::delete('/test',
    static fn (Request $request) => var_dump($request->getMethod()),
);
