<?php if ($isAdmin) : ?>
	<?php if (!empty($orders)) : ?>
		<p><b>Всего заказов: <?= count($orders) ?></b></p>
		<?php foreach ($orders as $value) : ?>
			<div>
				<p>Пользователь: <?= $value['user'] ?></p>
				<p>Имя: <?= $value['name'] ?></p>
				<p>Телефон: <?= $value['phone'] ?></p>
				<p>Статус: <?= $value['status'] ?></p>
				<br>
				<a href="<?= '/orderDescription/?id=' . $value['id'] ?>">Подробнее</a>
				<a href="<?= '/admin/deleteOrder/?id=' . $value['id'] ?>">Удалить</a>
			</div>
			<hr>
		<?php endforeach; ?>
	<?php else : ?>
		<p>Заказов нет.</p>
	<?php endif; ?>
<?php endif; ?>