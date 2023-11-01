<?php

return [

    /**
     * The default repository class.
     */
    'repository' => \Tavurn\Database\Repository::class,

    /**
     * The path to where your models are defined.
     */
    'models' => base_path('app/Models'),

    /**
     * Whether to enable dev mode in doctrine.
     */
    'dev' => true,

    'drivers' => [
        /**
         * The default database driver that will implicitly be used
         * for everything "database" if not told otherwise.
         */
        'default' => 'sqlite',

        'sqlite' => [
            'driver' => 'pdo_sqlite',
            'database' => database_path('database.sqlite'),
        ],

        'mysql' => [
            'driver' => 'pdo_mysql',
            'database' => 'database',
            'user' => 'root',
            'password' => null,
            'host' => 'localhost',
        ]
    ]

];
