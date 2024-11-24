<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'nguoi_dungs',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'nguoi_dungs',
        ],
    ],


    'providers' => [
        'nguoi_dungs' => [
            'driver' => 'eloquent',
            'model' => App\Models\NguoiDung::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'nguoi_dungs' => [
            'provider' => 'nguoi_dungs',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
