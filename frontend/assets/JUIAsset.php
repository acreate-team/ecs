<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class JUIAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/views/site/css/jquery-ui.min.css',
        'frontend/views/site/css/jquery-ui.structure.min.css',
    ];
    public $js = [
    	'frontend/views/site/js/jquery-ui.min.js'
    ];
}