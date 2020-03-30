<?php

use yii\helpers\Url;

$date = new DateTime();

?>

<h1>Вы выбраны исполнителем на заказ №<?=$bid->id?></h1>
<p><b>Название заказа:</b> <?=$bid->name?></p>
<p><b>Описание заказа:</b> <?=$bid->description?></p>
<?php if($bid->brand_id): ?><u>Марка</u>: <?=$brandList[$bid->brand_id];?><br><?php endif; ?>
<?php if($bid->model_id): ?><u>Модель</u>: <?=$modelList[$bid->model_id]['name'];?><br><?php endif; ?>
<?php if($bid->year): ?><u>Год</u>: <?=$bid->year;?><br><?php endif; ?>
<?php if($bid->window_code): ?><u>Стекло</u>: <?=$windowCodeList[$bid->window_code];?><br><?php endif; ?>
<u>Тип кузова</u>: <?=$modelList[$bid->model_id]['body_type'];?><br>
<?php if($bid->client): ?><u>Имя заказчика</u>: <?=$bid->client;?><br><?php endif; ?>
<u>Телефон</u>: <?php if(!$bid->phone_view): ?><strong><span style="color: rgb(215, 11, 66);">скрыт оператором</span></strong><?php else: ?><?=$bid->phone;?><?php endif; ?>	
<br />

<h1>Предложение:</h1>
<?php if($offer->term): ?><b>Срок (в днях):</b> <?=Yii::$app->i18n->format('{n, plural, one{# день} few{# дня} other{# дней}}', ['n' => $offer->term], 'ru_RU')?><br /><?php endif; ?>
<?php if($offer->price): ?><b>Цена (в рублях):</b> <?=$offer->price?> руб.<br /><?php endif; ?>
<br />
<b>Отправлено:</b> <?=$date->format('d.m.Y')?> в <?=$date->format('H:i')?>