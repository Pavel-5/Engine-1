<div class="gallery">
	<?php foreach ($gallery as $value) : ?>
		<a rel="gallery" class="photo" href=<?= "/image/?id=" . $value['id'] ?>>
			<img src=<?= "/img/gallery_img/small/" . $value['title'] ?> width="150" height="100" />
		</a>
	<?php endforeach; ?>
</div>
Загрузить изображение
<form method="post" enctype="multipart/form-data">
	<input type="file" name="myfile">
	<input type="submit" name="load" value="Загрузить">
</form>
<?= $message ?>