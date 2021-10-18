<?php if (!empty($basket)) : ?>
	<div>
		<h2>Оформить заказ</h2>
		<form action="/basket/addorder/" method="post">
			<input type="text" name="name" placeholder="Имя">
			<input type="text" name="phone" placeholder="Телефон">
			<input type="submit" value="Оформить заказ">
		</form>
	</div>
	<h2>Корзина</h2>
	<?php foreach ($basket as $value) : ?>
		<div>
			<h3><?= $value['title'] ?></h3>
			<p>Цена: <?= $value['price'] ?></p>
			<p>Количество: <?= $value['quantity'] ?></p>
			<a href="<?= '/basket/delete/?id=' . $value['goods_id'] ?>">Удалить</a>
		</div>
		<hr>
	<?php endforeach; ?>
	ИТОГО: <?= $sum['sum'] ?>
<?php else : ?>
	<p>Корзина пустая.</p>
<?php endif; ?>