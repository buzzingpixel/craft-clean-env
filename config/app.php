<?php

declare(strict_types=1);

use App\CustomErrorHandler;

$config = [
    // 'modules' => [
    //     'app-module' => AppModule::class,
    // ],
    // 'bootstrap' => [
    //     'app-module',
    // ],
    'components' => [
        'errorHandler' => [
            'class' => CustomErrorHandler::class,
        ],
    ],
];

return $config;
