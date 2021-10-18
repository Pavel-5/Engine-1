<?php
function getImage(int $id)
{
	return getOneResult("SELECT title, views FROM images WHERE id = $id");
}

function addViews(int $id)
{
	executeSql("UPDATE images SET views = views + 1 WHERE id = $id");
}
