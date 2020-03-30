<?php
return [
    'timeZone' => 'Europe/Moscow',
    'language'=>'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:j F, H:i',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Europe/Moscow',
            'locale' => 'ru-RU'
        ],    
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage'=>'ru-RU',
                ],            
                'daysago*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@sfedosimov/daysago/messages',
                    'sourceLanguage' => 'ru',
                ],
            ],
        ],         
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	    'authManager' => [
	        'class' => 'yii\rbac\DbManager',
	        'defaultRoles' => ['user', 'editor', 'admin']
	    ],                     
    ],
];
