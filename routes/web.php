<?php

use Tavurn\Support\Facades\Route;
use Psr\Http\Message\ServerRequestInterface as Request;

Route::get('/[{name}]',
    static fn (Request $request) => template('welcome.php', [
        'name' => $request->getAttribute('name'),
    ])
);
