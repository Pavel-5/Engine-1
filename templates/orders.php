<?php if ($auth) : ?>
	<?php if (!empty($orders)) : ?>
		<p><b>Всего заказов: <?= count($orders) ?></b></p>
		<?php foreach ($orders as $value) : ?>
			<div>
				<p>Имя: <?= $value['name'] ?></p>
				<p>Телефон: <?= $value['phone'] ?></p>
				<p>Сумма: <?= $value['sum'] ?></p>
				<p>Статус: <?= $value['status'] ?></p>
			</div>
			<hr>
		<?php endforeach; ?>
	<?php else : ?>
		<p>Заказов нет.</p>
	<?php endif; ?>
<?php else : ?>
	<p>Авторизуйтесь.</p>
<?php endif; ?>