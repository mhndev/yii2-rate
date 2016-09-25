<?php

return [

    \mhndev\yii2Rate\Controllers\RateController::class => [

        'corsFilter' => [
            'class' => \yii\filters\Cors::className(),

            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['OPTIONS', 'GET', 'POST' ,'PUT', 'DELETE', 'PATCH'],
               // 'Access-Control-Request-Headers' => ['X-Wsse'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 3600,
                'Access-Control-Expose-Headers' => [
                    'X-Pagination-Current-Page',
                    'X-Pagination-Per-Page',
                    'X-Pagination-Total-Count',
                    'X-Pagination-Current-Page',
                    'X-Pagination-Page-Count',],
                'Access-Control-Allow-Headers' => ['Content-Type', 'Access-Control-Allow-Headers', 'Authorization', 'X-Requested-With']
            ],
        ],


        'authenticator' => [
            'class' => yii\filters\auth\CompositeAuth::className(),
            'authMethods' => [
                yii\filters\auth\HttpBasicAuth::className(),
                yii\filters\auth\HttpBearerAuth::className(),
                yii\filters\auth\QueryParamAuth::className(),
            ],
            'except' => ['options']
        ],


        'access'=> [
                'class'=>yii\filters\AccessControl::class,
                //'only'=>['create'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'actions'=>['default-media', 'upload-and-attach-media'],
                        'roles' =>['admin']
                    ]
                ],
            'denyCallback' => function ($rule, $action) {
                throw new \yii\web\ForbiddenHttpException;
            }
        ],



    ],




];
