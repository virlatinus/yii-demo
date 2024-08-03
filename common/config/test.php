<?php

use common\models\User;
use yii\web\User as YiiUser;

return [
    'id' => 'app-common-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => YiiUser::class,
            'identityClass' => User::class,
        ],
    ],
];
