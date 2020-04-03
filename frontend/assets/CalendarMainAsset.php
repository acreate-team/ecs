<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CalendarMainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/views/site/css/calendar.main.css',
    ];  
    public $js = [
    ];
}
