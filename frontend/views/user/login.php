<?php

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

?>

<div class="login_form">
	<h1>Войти в профиль</h1>

	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Логин'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Войти', ['name' => 'login-button']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>