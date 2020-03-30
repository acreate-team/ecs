<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\ArrayHelper;

?>
<ul class="breadcrumb">
    <li class="active"><?= $title ?></li>
</ul>

<div class="form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>

        <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($roleList, 'id', 'name')) ?>

        <div class="form-group submit">
            <?= Html::submitButton('Добавить', ['class' => 'save']) ?>
            <a href="<?php echo Url::toRoute(['index']); ?>" class="back">Назад</a>
        </div>

    <?php ActiveForm::end(); ?>
</div>