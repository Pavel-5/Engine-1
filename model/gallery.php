<?php
function getGallery($path)
{
	return getAssocResult("SELECT id, title FROM images ORDER BY views DESC");
}

function loadImage()
{
	$pathBig = IMG_BIG . $_FILES['image']['name'];
	$pathSmall = IMG_SMALL . $_FILES['image']['name'];

	// Проверка файла

	// - на тип
	$imageType = $_FILES['myfile']['type'];

	if ($imageType != 'image/png' && $imageType != 'image/gif' && $imageType != 'image/jpeg') {
		$message =  "errorType";
		header("Location: /gallery/?message=$message");
		die();
	}

	// - на размер
	if ($_FILES['myfile']['size'] > 5 * 1024 * 1024) {
		$message =  "errorSize";
		header("Location: /gallery/?message=$message");
		die();
	}

	// - на расширение
	$blackList = [".php", ".phtml", ".php3", ".php4"];
	foreach ($blackList as $item) {
		if (preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
			$message =  "errorExtension";
			header("Location: /gallery/?message=$message");
			die();
		}
	}

	if (move_uploaded_file($_FILES['myfile']['tmp_name'], $pathBig . $_FILES['myfile']['name'])) {

		$filename = mysqli_real_escape_string(getDb(), $_FILES['myfile']['name']);
		$number = executeSql("INSERT INTO images (title, views) VALUES ('$filename', DEFAULT)");
		var_dump($number);
		die();

		$image = new SimpleImage();
		$image->load($pathBig . $_FILES['myfile']['name']);
		$image->resizeToWidth(150);
		$image->save($pathSmall . $_FILES['myfile']['name']);
		$message =  "ok";
		header("Location: /gallery/?message=$message");
		die();
	} else {
		$message = "error";
		header("Location: /gallery/?message=$message");
		die();
	}
}
