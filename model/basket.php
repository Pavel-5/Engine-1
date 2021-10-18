<?php

function getBasket($session)
{
	$sql = "SELECT basket.goods_id, COUNT(*) AS quantity, goods.title, goods.price FROM basket JOIN goods ON goods.id = basket.goods_id WHERE `session_id` = '{$session}' GROUP BY goods_id";
	return getAssocResult($sql);
}

function getSumBasket($session)
{
	return getOneResult("SELECT SUM(price) AS sum FROM basket JOIN goods ON goods.id = basket.goods_id WHERE `session_id` = '{$session}'");
}

function getQuantityBasket($session)
{
	return getOneResult("SELECT COUNT(*) AS `count` FROM (SELECT DISTINCT `goods_id` FROM `basket` WHERE `session_id` = '{$session}') AS t1")['count'];
}

function deleteGoodBasket($id)
{
	return executeSql("DELETE FROM basket WHERE goods_id = {$id}");
}

function addGoodBasket($good_id, $session)
{
	return executeSql("INSERT INTO basket (`goods_id`, `session_id`) VALUES ({$good_id}, '{$session}')");
}
