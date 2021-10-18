<div class="cardGood">
	<h2><?= $good['title'] ?></h2>
	<img src=<?= "/img/goods_img/" . $good['image'] ?> height="200">
	<p><?= $good['description'] ?></p>
	<p>Цена: <?= $good['price'] ?></p>
	<button>Купить</button>
</div>