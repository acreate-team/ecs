<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CalendarSystemAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/views/site/css/calendar.system.css',
    ];
    public $js = [
    	'frontend/views/site/js/calendar.system.js',
    ];    
}
