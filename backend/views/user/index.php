<?php

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;

?>

<ul class="breadcrumb">
	<li class="add"><a href="<?php echo Url::toRoute(['add']); ?>">Добавить пользователя</a></li>
	<li class="active"><?= $title ?></li>
</ul>

<table class="table">
	<thead>
		<tr>
			<td width="60"></td>
			<td><?= $sort->link('username') ?></td>
			<td><?= $sort->link('email') ?></td>
			<td><?= $sort->link('status') ?></td>
			<td><?= $sort->link('created_at') ?></td>
			<td><?= $sort->link('last_request_time') ?></td>		
		</tr>
	</thead>
	<tbody>
		<?php foreach ($items as $item): ?>
		<tr>
			<td>
				<a href="<?php echo Url::toRoute(['delete', 'id' => $item['id']]); ?>" class="delete hint--top" data-hint="Удалить"></a>
				<a href="<?php echo Url::toRoute(['edit', 'id' => $item['id']]); ?>" class="edit hint--top" data-hint="Редактировать"></a>
			</td>			
			<td><?= Html::encode($item->username); ?></td>
			<td><?= Html::encode($item->email); ?></td>
			<td>
				<?php if($item->role == 1): ?>
					Пользователь
				<?php elseif($item->role == 5): ?>
					Редактор
				<?php elseif($item->role == 10): ?>
					Администратор
				<?php endif; ?>
			</td>
			<td><?= Yii::$app->daysago->make(date('d.m.Y H:i', $item->created_at)) ?></td>
			<td><?php if($item->last_request_time) : ?><?= Yii::$app->daysago->make(date('d.m.Y H:i', $item->last_request_time)) ?><?php endif; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= LinkPager::widget(["pagination" => $pagination]); ?>