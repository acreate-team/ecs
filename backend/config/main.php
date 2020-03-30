<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-backend',
    'name'=> 'Админцентр',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log', 'gii', 'debug'],
    'homeUrl' => '/admin',
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '192.168.1.*', '192.168.1.101']
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '192.168.1.*', '192.168.1.101']
        ],
        'settings-dev' => [
            'class' => 'pheme\settings\Module',
            'sourceLanguage' => 'ru-RU',
        ],                   
    ],
    'components' => [  
        'request' => [
            'baseUrl'=>'/admin',
            'csrfParam' => '_csrf-backend'
        ],
        'settings' => [
            'class' => 'pheme\settings\components\Settings'
        ],     
        'frontendCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => Yii::getAlias('@frontend') . '/runtime/cache'
        ],      
        'daysago' => [
            'class' => 'sfedosimov\daysago\DaysAgo'
        ],              
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern' => 'logout',
                    'route' => 'site/logout',
                ], 
            ]               
        ],                   
        'user' => [
            'identityClass' => 'common\models\User',
            'on afterLogin' => ['common\models\User', 'afterLogin'],
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ]          
    ],
    
    'params' => $params,
];
