<?php

use yii\helpers\Url;

$date = new DateTime();

?>

<h1>Зарегистрировался <?=$user->username?></h1>
<b>Имя:</b> <?=$user->name?><br />
<b>Почта:</b> <?=$user->email?><br />
<b>Телефон:</b> <?=$user->phone?><br />
<b>Отправлено:</b> <?=$date->format('d.m.Y')?> в <?=$date->format('H:i')?><br /><br />
<a href="<?=Url::base('http')?>/user/activate?key=<?=$user->auth_key?>">Активировать аккаунт</a>