<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
    'components' => [ 
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@frontend/mail',
            'useFileTransport' => false,            
        ],  
        'request' => [
            'baseUrl'=>'',
            'csrfParam' => '_csrf-frontend',
        ],    
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,   
            'rules' => [
                [
                    'pattern' => '/page/<id>',
                    'route' => 'site/page',
                    'defaults' => ['id' => ''],
                ],
                [
                    'pattern' => '/calendar/<url>/yga=<yga>',
                    'route' => 'calendar/view',
                    'defaults' => ['url' => '', 'yga' => ''],
                ],                
                [
                    'pattern' => '/calendar/<url>',
                    'route' => 'calendar/view',
                    'defaults' => ['url' => ''],
                ],                
                [
                    'pattern' => '/systems',
                    'route' => 'calendar/systems'
                ],                
                [
                    'pattern' => '/system/ks-<url>/history',
                    'route' => 'calendar/system-history',
                    'defaults' => ['url' => ''],
                ], 
                [
                    'pattern' => '/system/ks-<url>/structure',
                    'route' => 'calendar/system-structure',
                    'defaults' => ['url' => ''],
                ], 
                [
                    'pattern' => '/system/ks-<url>/actual',
                    'route' => 'calendar/system-actual',
                    'defaults' => ['url' => ''],
                ],                
                [
                    'pattern' => '/system/ks-<url>',
                    'route' => 'calendar/system',
                    'defaults' => ['url' => ''],
                ],                                                                
                [
                    'pattern' => '/list',
                    'route' => 'calendar/list'
                ],
                [
                    'pattern' => '/list/profile',
                    'route' => 'calendar/list-profile'
                ],                
                [
                    'pattern' => '/list/alphabet',
                    'route' => 'calendar/list-alphabet'
                ],  
                [
                    'pattern' => '/list/numeric',
                    'route' => 'calendar/list-numeric'
                ], 
                [
                    'pattern' => '/list/profile/guest',
                    'route' => 'user/login-list'
                ],
                [
                    'pattern' => '/login',
                    'route' => 'user/login'
                ],                
                [
                    'pattern' => '/logout',
                    'route' => 'user/logout'
                ],                                                                
            ]                        
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced',
        ],
        'settings' => [
            'class' => 'pheme\settings\components\Settings'
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
