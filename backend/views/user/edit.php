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

        <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($roleList, 'id', 'name')) ?>

        <div class="form-group submit">
            <?= Html::submitButton('Сохранить', ['class' => 'save']) ?>
            <a href="<?php echo Url::toRoute(['index']); ?>" class="back">Отмена</a>
        </div>

    <?php ActiveForm::end(); ?>
</div>