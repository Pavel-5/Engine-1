<h2>Отзывы</h2>

<form action=<?= (!is_null($editFeedback)) ? "/feedback/save/" : "/feedback/add/" ?> method="post">
	Оставьте отзыв: <br>
	<input type="text" name="id" value="<?= $editFeedback['id'] ?>" hidden>
	<input type="text" name="author" value="<?= $editFeedback['author'] ?>" placeholder="Ваше имя"><br>
	<input type="text" name="text" value="<?= $editFeedback['text'] ?>" placeholder="Ваш отзыв"><br>
	<input type="submit" value="<?= (!is_null($editFeedback)) ? 'Сохранить' : 'Добавить' ?>">
</form>

<?php foreach ($feedback as $value) : ?>
	<p>
		<b><?= $value['author'] ?></b>: <?= $value['text'] ?> <a href=<?= "/feedback/edit/?id=" . $value['id'] ?>>[edit]</a> <a href=<?= "/feedback/delete/?id=" . $value['id'] ?>>[X]</a>
	</p>
<?php endforeach; ?>