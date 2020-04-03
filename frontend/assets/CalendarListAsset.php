<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CalendarListAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/views/site/css/calendar.list.css',
        'frontend/views/site/css/jquery.fancybox.css',
    ];  
    public $js = [
    	'frontend/views/site/js/calendar.list.js',
    	'frontend/views/site/js/jquery.fancybox.js',
    ];   

}
