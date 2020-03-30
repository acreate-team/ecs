<?php

    use yii\helpers\Html;

    $this->title = $name;

?>

<div id="content" class="error">
	<div class="container">
		<h1 class="title"><?= Html::encode($this->title) ?></h1>
		<p><?= nl2br(Html::encode($message)) ?></p>		
	</div>
</div>