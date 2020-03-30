<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;

?>
<ul class="breadcrumb">
    <li class="active"><?= $title ?></li>
</ul>

<div class="form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
        
        <?= $form->field($model, 'description')->textInput() ?>

        <?= $form->field($model, 'keywords')->textInput() ?>

        <?= $form->field($model, 'email')->textInput() ?>

        <div style="height: 70px"></div>

        <div class="form-group submit">
            <?= Html::submitButton('Сохранить', ['class' => 'save']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>