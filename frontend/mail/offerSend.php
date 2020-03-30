<?php

use yii\helpers\Url;

$date = new DateTime();

?>

<h1>Новое предложение на заказ №<?=$bid->id?></h1>
<p><b>Название заказа:</b> <?=$bid->name?></p>
<p><b>Описание заказа:</b> <?=$bid->description?></p>
<a href="<?=Url::base('http')?>/admin/bids/view?id=<?=$bid->id?>">Перейти к заказу</a>
<br />


<h1>Исполнитель:</h1>
<?php if($user->username): ?><b>Логин:</b> <a href="<?=Url::base('http')?>/admin/user/view?id=<?=$user->id?>"><?=$user->username?></a><br /><?php endif; ?>
<?php if($user->name): ?><b>Имя:</b> <?=$user->name?><br /><?php endif; ?>
<?php if($user->email): ?><b>Почта:</b> <a href="mailto:<?=$user->email?>"><?=$user->email?></a><br /><?php endif; ?>
<?php if($user->phone): ?><b>Телефон:</b> <?=$user->phone?><br /><?php endif; ?>
<br />


<h1>Предложение:</h1>
<?php if($offer->term): ?><b>Срок (в днях):</b> <?=Yii::$app->i18n->format('{n, plural, one{# день} few{# дня} other{# дней}}', ['n' => $offer->term], 'ru_RU')?><br /><?php endif; ?>
<?php if($offer->price): ?><b>Цена (в рублях):</b> <?=$offer->price?> руб.<br /><?php endif; ?>
<br />
<b>Отправлено:</b> <?=$date->format('d.m.Y')?> в <?=$date->format('H:i')?>