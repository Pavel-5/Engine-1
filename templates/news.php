<h2>Новости</h2>

<?php foreach ($news as $item) : ?>
	<div>
		<a href="/onenews/?id=<?= $item['id'] ?>"><b><?= $item['title'] ?></b></a>
	</div>

<?php endforeach; ?>