<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/views/site/css/styles.css',
    ];
    public $js = [
    	'frontend/views/site/js/app.js'
    ];
}
