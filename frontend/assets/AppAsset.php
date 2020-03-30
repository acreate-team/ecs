<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/views/site/css/_init.css',
    ];
    public $js = [
    	'frontend/views/site/js/app.js',
    	'frontend/views/site/js/context_menu.js'
    ];
}
