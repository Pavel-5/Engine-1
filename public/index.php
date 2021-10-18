<?php

session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

$urlArray = explode('/', $_SERVER['REQUEST_URI']);

$action = $urlArray[2];
if ($urlArray[1] == "") {
	$page = 'index';
} else {
	$page = $urlArray[1];
}

$params = prepareVariables($page, $action);

echo render($page, $params);
