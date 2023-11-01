<?php

return [

    'routing' => [
        'parser' => \FastRoute\RouteParser\Std::class,

        'generator' => \FastRoute\DataGenerator\CharCountBased::class,

        'dispatcher' => \Tavurn\Routing\Dispatcher\CharCountBasedDispatcher::class,
    ],

    'providers' => [
        \App\Providers\EventServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
        \App\Providers\AppServiceProvider::class,
    ],

];
