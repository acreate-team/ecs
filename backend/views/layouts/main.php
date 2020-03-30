<?php

    use yii\helpers\Html;
    use yii\helpers\Url;

    if (Yii::$app->user->isGuest) {
        backend\assets\LoginAsset::register($this);
    } else {
        backend\assets\AppAsset::register($this);
    }

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?> <?php if($this->title): ?> - <?= Html::encode($this->title) ?><?php endif; ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div id="page">
        <div id="wrap">

            <?php if (Yii::$app->user->isGuest) : ?>
                <?= $content ?> 
            <?php else: ?>

            <div id="bar">

                <ul class="menu">
                    <li>
                        <a href="<?= Url::to(['../']) ?>" class="site" target="_blank">Главная</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/']) ?>" class="home
                            <?php if(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'): ?> active<?php endif; ?>
                            ">Версии</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/user']) ?>" class="users
                            <?php if(Yii::$app->controller->id == 'user'): ?> active<?php endif; ?>
                            ">Пользователи</a>
                    </li>                     
                    <li>
                        <a href="<?= Url::to(['/settings']) ?>" class="settings
                            <?php if(Yii::$app->controller->id == 'settings'): ?> active<?php endif; ?>
                            ">Настройки</a>
                    </li>                      
                    <li>
                        <a href="<?= Url::to(['/page']) ?>" class="pages
                            <?php if(Yii::$app->controller->id == 'page'): ?> active<?php endif; ?>
                            ">Календари</a>
                    </li>                                                                                                                                                  
                </ul>
                <div class="user">
                    <a href="<?= Url::to(['user/edit', 'id' => Yii::$app->user->identity->id]) ?>" class="edit">Редактировать профиль</a>
                    <div class="this">
                        <span class="name"><?= Yii::$app->user->identity->username ?></span>
                        <a href="<?= Url::to(['/logout']) ?>" class="logout hint--right" data-hint="Выйти" data-method="post"></a>
                    </div>
                </div>              
            </div>
            <div id="content">
                <?= $content ?>          
            </div>
        </div>
    </div>

    <?php endif; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
