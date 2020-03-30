<?php

    use yii\helpers\Html;

    $this->title = $name;

?>
<div class="page">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

</div>
