<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styles.css',
        'css/ui.structure.css',
        'css/hint.css',
        'css/animate.css',
        'css/lightbox.css',
        'css/formstyler.css'
    ];
    public $js = [
        'js/jquery.js',
        'js/jquery-ui.js',
        'js/jquery.formstyler.js',
        'js/jquery.switchable.js',
        'js/jquery.confirm.js',
        'js/lightbox.js',
        'js/scripts.js'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
