<?php

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\ArrayHelper;

?>

<div id="login-form">
	<div class="logo"></div>

	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'логин'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'пароль'])->label(false) ?>

    <?= $form->field($model, 'rememberMe')->checkbox()->label('запомнить меня') ?>

    <div class="form-group">
        <?= Html::submitButton('войти', ['name' => 'login-button']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>