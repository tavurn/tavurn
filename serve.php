<?php

require __DIR__ . '/vendor/autoload.php';

$server = new \OpenSwoole\Http\Server('127.0.0.1', 8080);

$server->set([
    'worker_num' => 4,
]);

$app = new \Tavurn\Foundation\Application(
    $server,
    __DIR__,
);

$app->singleton(
    \Tavurn\Contracts\Exceptions\Handler::class,
    \Tavurn\Exceptions\Handler::class,
);

$app->singleton(
    \Tavurn\Contracts\Http\Kernel::class,
    \App\Http\Kernel::class,
);

$app->start();