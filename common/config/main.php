<?php

use yii\caching\MemCache;
use yii\redis\Connection as RedisConnection;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'cache' => [
//            'cache' => ApcCache::class,
//            'useApcu' => true,
            'class' => MemCache::class,
            'servers' => [
                [
                    'host' => 'memcache',
                    'port' => 11211,
                    'weight' => 100,
                ],
            ],
        ],
        'redis' => [
            'class' => RedisConnection::class,
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
            'password' => 'sOmE_sEcUrE_pAsS'
        ],
    ],
];
