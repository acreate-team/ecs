<?php

    use yii\helpers\Html;
    use frontend\assets\AppAsset;

    $controller = Yii::$app->controller->id;
    $route = $controller.'.'.Yii::$app->controller->action->id;

    AppAsset::register($this);
    $this->registerJsFile('/frontend/views/site/js/jquery.js', ['position' => $this::POS_HEAD]);

    $settings = Yii::$app->settings;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?=$settings->get('app.title')?><?php if($this->title) : ?> - <?= Html::encode($this->title) ?><?php endif; ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">    
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div id="wrapper">
        <div id="header">
            <div class="container">
                <div class="logo-place">
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <?php if($route != 'site.index') : ?><a href="/" class="logo"><?php else: ?><div class="logo"><?php endif; ?>
                    <?php elseif(Yii::$app->user->identity->role == 10): ?>
                        <a href="/admin" class="logo">
                    <?php endif; ?>
                        <span class="emblem"></span>
                        <span class="text">
                            <strong>ЕКС</strong>
                            <p>единая календарная система</p>
                        </span>

                    <?php if (Yii::$app->user->isGuest) : ?>
                        <?php if($route != 'site.index') : ?></a><?php else: ?></div><?php endif; ?>
                    <?php elseif(Yii::$app->user->identity->role == 10): ?>
                        </a>
                    <?php endif; ?>
                </div>
                <a href="/" class="banner">
                    <div class="top"></div>
                    <div class="middle">
                        <div class="middle-wrap">
                            <p>календарь = датировка, режим, регламент жизни</p>
                            <p>календарь = система отсчета, счета, расчета времени</p>
                            <p>календарь = измерение, проекция, координаты времени</p>                              
                        </div>                      
                    </div>
                    <div class="bottom">
                        <span></span>
                    </div>
                </a>
                <div class="links">
                    <div class="right">
                        <a href="/" class="gmr">
                            <span class="icon"></span>
                            <span class="text">ГМР</span>
                        </a>                        
                        <a href="/" class="gms">
                            <span class="icon"></span>
                            <span class="text">ГМС</span>
                        </a>                    
                    </div>
                    <div class="clear"></div>   
                </div>                  
            </div>
        </div>

        <a href="/" class="banner min">
            <div class="top"></div>
            <div class="middle">
                <div class="middle-wrap">
                    <p>календарь = датировка, режим, регламент жизни</p>
                    <p>календарь = система отсчета, счета, расчета времени</p>
                    <p>календарь = измерение, проекция, координаты времени</p>                              
                </div>                      
            </div>
            <div class="bottom">
                <span></span>
            </div>
        </a>

        <?=$content?>

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="/" class="copyright"></a>
                        <a href="/" class="software"></a>
                        <div class="clear"></div>
                    </div>
                    <div class="sep"></div>
                    <div class="col">
                        <a href="/" class="logo"></a>
                    </div>
                    <div class="sep"></div>
                    <div class="col">
                        <a href="/" class="stats"></a>
                        <?php if (Yii::$app->user->isGuest) : ?>
                        	<a href="/login" class="auth"></a>
                        <?php else: ?>
                        	<a href="/logout" class="auth active"></a>
                        <?php endif; ?>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>          
    </div>

    <div class="imagePreload" style="display: none">
        <img src="/frontend/views/site/images/logout.png">
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>