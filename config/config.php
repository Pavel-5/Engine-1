<?php
define("ROOT", dirname(__DIR__));
define("IMG_BIG", $_SERVER['DOCUMENT_ROOT'] . '/img/gallery_img/big/');
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . '/img/gallery_img/small/');
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');
define('MODELS_DIR', '../model');

/* DB config */
define('HOST', 'localhost:3306');
define('USER', 'pavel');
define('PASS', '12345');
define('DB', 'gb1');

const CODES = [
	"ok" => 'Файл загружен',
	"auth" => "Авторизуйтесь",
	"error" => "Ошибка",
	"errorType" => "Ошибка типа файла",
	"errorSize" => "Ошибка размера файла. Размер файла должен быть меньше 5 МБ.",
	"errorExtension" => "Ошибка расширения файла"
];

include ROOT . "/engine/render.php";
include ROOT . "/engine/controller.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/auth.php";
include ROOT . "/engine/model_autoload.php";
