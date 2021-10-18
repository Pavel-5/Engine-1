<?php if ($isAdmin) : ?>
	<p>Пользователь: <?= $order['user'] ?></p>
	<p>Имя: <?= $order['name'] ?></p>
	<p>Телефон: <?= $order['phone'] ?></p>
	<div>Статус:
		<?php if ($action === "changeOrderStatus") : ?>
			<form action="/orderDescription/saveOrderStatus/?id=<?= $order['id'] ?>" method="post">
				<select name="status">
					<option value="Новый">Новый</option>
					<option value="Подтвержден">Подтвержден</option>
					<option value="Собран">Собран</option>
					<option value="Передан в доставку">Передан в доставку</option>
					<option value="Доставлен">Доставлен</option>
				</select>
				<input type="submit" value="Сохранить">
			</form>
		<?php else : ?>
			<?= $order['status'] ?>
			<a href="/orderDescription/changeOrderStatus/?id=<?= $order['id'] ?>">[Изменить]</a>
		<?php endif; ?>
	</div>
	<p>Сумма: <?= $order['sum'] ?></p>
	<p>Всего товаров: <?= count($goods) ?></p>
	<hr>
	<?php if (!empty($goods)) : ?>
		<?php foreach ($goods as $value) : ?>
			<div>
				<h3><?= $value['title'] ?></h3>
				<p>Количество: <?= $value['quantity'] ?></p>
			</div>
			<hr>
		<?php endforeach; ?>
	<?php else : ?>
		<p>Товаров нет.</p>
	<?php endif; ?>
<?php endif; ?>