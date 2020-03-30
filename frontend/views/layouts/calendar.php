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
        <?=$content?>      
    </div>

    <nav id="context-menu" class="context-menu">
        <ul class="context-menu__items">
            <li class="context-menu__item">
                <a href="/calendar/gs-grigorianskaya" class="context-menu__link">календарь активный</a>
            </li>
            <li class="context-menu__item">
                <a href="/calendar/gs-sheteanskaya" class="context-menu__link">календарь альтернативный</a>
            </li>
            <li class="context-menu__item">
                <a href="/calendar/gs-moiseanskaya" class="context-menu__link">календарь потребный</a>
            </li>
        </ul>
    </nav>    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>