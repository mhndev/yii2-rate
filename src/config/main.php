<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'rate',
    'basePath' => dirname(__DIR__),
    'params' => $params,

    'rateClass' => \mhndev\yii2Rate\Models\Rate::class,


    'userClass' => \app\modules\user\models\User::class,
];


return $config;
