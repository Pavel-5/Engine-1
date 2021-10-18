<?php
function getAllFeedback()
{
	return getAssocResult("SELECT id, author, text FROM feedback ORDER BY id DESC");
}

function getOneFeedback(int $id)
{
	return getAssocResult("SELECT id, author, text FROM feedback WHERE id='$id'");
}

function addFeedback($author, $text)
{
	$count = executeSql("INSERT INTO feedback (author, text) VALUES ('$author', '$text')");

	return ($count === 1) ? "ok" : "error";
}

function saveFeedback($id, $author, $text)
{
	$count = executeSql("UPDATE feedback SET author = '$author', text = '$text' WHERE id = $id");

	return ($count === 1) ? "ok" : "error";
}

function deleteFeedback($id)
{
	$count = executeSql("DELETE FROM feedback WHERE id = $id");

	return ($count === 1) ? "ok" : "error";
}

function doFeedbackAction($action)
{
	switch ($action) {
		case 'add':
			$message = addFeedback($_POST['author'], $_POST['text']);
			($message === "ok") ? header("Location: /feedback") : header("Location: /feedback/?message=$message");
			die();

		case 'edit':
			$id = (int)$_GET['id'];
			$result = getOneFeedback($id)[0];

			break;

		case 'save':
			$message = saveFeedback($_POST['id'], $_POST['author'], $_POST['text']);
			($message === "ok") ? header("Location: /feedback") : header("Location: /feedback/?message=$message");
			die();

		case 'delete':
			$id = (int)$_GET['id'];
			$message = deleteFeedback($id);
			($message === "ok") ? header("Location: /feedback") : header("Location: /feedback/?message=$message");
			die();

		default:
			$result = null;
			break;
	}

	return $result;
}
