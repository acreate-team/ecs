<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class BannerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
    	'frontend/views/site/js/banner.js'
    ];
}
