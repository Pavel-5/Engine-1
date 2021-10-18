<?php

function getUser()
{
	return $_SESSION['login'];
}

function isAuth()
{
	//TODO оптимизируйте алгритм, проверьте сессию прежде чем использовать куку

	if (isset($_COOKIE["hash"]) && !isset($_SESSION['login'])) {
		$hash = $_COOKIE["hash"];
		$result = getOneResult("SELECT * FROM users WHERE hash='{$hash}'");

		if ($result) {
			$user = $result['login'];
			if (!empty($user)) {
				$_SESSION['login'] = $user;
			}
		}
	}

	return isset($_SESSION['login']);
}

function auth($login, $pass)
{
	$login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
	$result = getOneResult("SELECT * FROM users WHERE login = '{$login}'");

	if ($result) {
		if ($pass == $result['pass']) {
			//Авторизация
			$_SESSION['login'] = $login;
			$_SESSION['id'] = $result['id'];
			return true;
		}
	}

	return false;
}

function setHashCookie($id)
{
	$hash = uniqid(rand(), true);
	executeSql("UPDATE users SET hash = '{$hash}' WHERE id = {$id}");
	setcookie("hash", $hash, time() + 3600, "/");
}

function isAdmin()
{
	return $_SESSION['login'] == 'admin';
}
