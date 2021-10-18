<?php
function getCatalog()
{
	return getAssocResult("SELECT id, title, price, image FROM goods");
}

function getGood(int $id)
{
	return getOneResult("SELECT id, title, price, description, image FROM goods WHERE id = $id");
}
