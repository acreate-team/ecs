<?php

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use yii\widgets\Breadcrumbs;

?>

<ul class="breadcrumb">
	<li class="add"><a href="<?php echo Url::toRoute(['add']); ?>">Добавить календарь</a></li>
	<li class="active"><?= $title ?></li>
</ul>

<table class="table">
	<thead>
		<tr>
			<td width="59"></td>
			<td><?= $sort->link('numeric_calendar') ?></td>
			<td class="uppercase"><?= $sort->link('name_calendar') ?></td>
			<td style="border-right: 2px #bec0c3 solid"><?= $sort->link('name') ?></td>
			<td><?= $sort->link('url') ?></td>
			<td><?= $sort->link('date_create') ?></td>
			<td><?= $sort->link('date_update') ?></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($items as $item): ?>
		<tr>
			<td>								
				<a href="<?php echo Url::toRoute(['delete', 'id' => $item['id']]); ?>" class="delete hint--top" data-hint="Удалить"></a>
				<a href="<?php echo Url::toRoute(['edit', 'id' => $item['id']]); ?>" class="edit hint--top" data-hint="Редактировать"></a>
			</td>			
			<td><?= sprintf("%03d", $item->numeric_calendar) ?></td>
			<td><?= Html::encode($item->name_calendar); ?></td>
			<td style="border-right: 2px #bec0c3 solid"><?= Html::encode($item->name); ?></td>
			<td><a href="/system/ks-<?= Html::encode($item->url); ?>">/system/ks-<?= Html::encode($item->url); ?></a></td>
			<td><?= Yii::$app->daysago->make(date('d.m.Y H:i', $item->date_create)) ?></td>
			<td><?= Yii::$app->daysago->make(date('d.m.Y H:i', $item->date_update)) ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= LinkPager::widget(["pagination" => $pagination]); ?>
