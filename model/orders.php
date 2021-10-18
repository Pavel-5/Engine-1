<?php

function getOrders()
{
	if (isAdmin()) {
		$sql = "SELECT o.id, o.name, o.phone, u.login AS user, o.status FROM orders o JOIN users u ON u.id = o.user_id";
		return getAssocResult($sql);
	}
}

function getUserOrders($user_id)
{
	$sql = "SELECT name, phone, sum, status FROM orders WHERE user_id = $user_id";
	return getAssocResult($sql);
}

function getOneOrder($id)
{
	if (isAdmin()) {
		$sql = "SELECT o.id, o.name, o.phone, u.login AS user, o.session_id, o.sum, o.status FROM orders o JOIN users u ON u.id = o.user_id WHERE o.id = $id";
		return getOneResult($sql);
	}
}

function addOrder($name, $phone, $user, $session)
{
	$sql = "INSERT INTO `orders` (`name`, `phone`, `user_id`, `session_id`, `sum`) VALUES ('{$name}','{$phone}', '{$user}', '{$session}', (SELECT SUM(g.price) FROM basket b JOIN goods g ON b.goods_id = g.id WHERE b.session_id = '{$session}'))";
	return executeSql($sql);
}

function deleteOrder($id)
{
	if (isAdmin()) {
		$sql = "DELETE FROM orders WHERE id = $id";
		return executeSql($sql);
	}
}

function changeOrderStatus($id, $status)
{
	if (isAdmin()) {
		$sql = "UPDATE orders SET status = '$status' WHERE id = $id";
		return executeSql($sql);
	}
}
