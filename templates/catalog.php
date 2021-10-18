<h2>Каталог</h2>
<?= $message ?>
<form action="/basket/add" method="post">
	<div class="listGoods">
		<?php foreach ($catalog as $good) : ?>
			<div class="cardGood">
				<a href=<?= "/good/?id=" . $good['id'] ?> class="linkGood">
					<h2><?= $good['title'] ?></h2>
					<img src=<?= "/img/goods_img/" . $good['image'] ?> height="200"><br>
					Цена: <?= $good['price'] ?>
				</a><br>
				<button name="good_id" value="<?= $good['id'] ?>">Купить</button>
			</div>
		<?php endforeach; ?>
	</div>
</form>