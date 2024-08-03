<?php

use yii\redis\Session as RedisSession;
use common\models\User;
use yii\log\FileTarget;
use yii\web\UrlManager;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'class' => RedisSession::class,
            'keyPrefix' => 'be',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require Yii::getAlias('@common/config/rules/backend-rules.php'),
        ],
        'urlManagerFrontend' => [
            // usage: echo Yii::$app->urlManagerFrontend->createAbsoluteUrl(...);
            'class' => UrlManager::class,        // class is required on custom named url managers!
            'hostInfo' => Yii::getAlias('@frontendDomain'),    // the full base domain name to use for the links
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'rules' => [],
            'rules' => require Yii::getAlias('@common/config/rules/frontend-rules.php'),
        ],
    ],
    'params' => $params,
];
