<?php

function prepareVariables($page, $action)
{
	$params['layout'] = "main";
	$params['name'] = getUser();
	$params['auth'] = isAuth();
	$params['isAdmin'] = isAdmin();
	$params['count'] = ($params['auth']) ? getQuantityBasket(session_id()) : 0;

	switch ($page) {
		case "orders":
			if ($params['auth']) {
				$user_id = $_SESSION['id'];
				$params['orders'] = getUserOrders($user_id);
			} else {
				header("Location: /");
				die();
			}

			break;

		case "admin":
			if ($params['isAdmin']) {
				if ($action === "deleteOrder") {
					$id = (int)$_GET['id'];
					deleteOrder($id);

					header("Location: /admin");
					die();
				}

				$params['orders'] = getOrders();
			} else {
				header("Location: /");
				die();
			}

			break;

		case "orderDescription":
			if ($params['isAdmin']) {
				$id = (int)$_GET['id'];

				if ($action === "changeOrderStatus") {
					$params['action'] = $action;
				}

				if ($action === "saveOrderStatus") {
					$status = $_POST['status'];

					changeOrderStatus($id, $status);

					header("Location: /orderDescription/?id=$id");
					die();
				}

				$params['order'] = getOneOrder($id);

				$session = $params['order']['session_id'];
				$params['goods'] = getBasket($session);
			} else {
				header("Location: /");
				die();
			}

			break;

		case "registration":
			if ($action === "add") {
				$login = $_POST['login'];
				$password = $_POST['pass'];

				$user = getOneResult("SELECT id FROM users WHERE login='$login'");

				if (is_null($user)) {
					executeSql("INSERT INTO users (login, pass) VALUES ('$login', '$password')");
					header("Location: /login/?login=$login&pass=$password");
				} else {
					header("Location: /registration");
				}
			}

			break;
		case 'basket':
			$session = session_id();

			switch ($action) {
				case 'delete':
					deleteGoodBasket((int)$_GET['id']);

					header("Location: /basket");
					break;

				case 'add':
					if (!$params['auth']) {
						header("Location: /catalog/?message=auth");
						die();
					}

					addGoodBasket($_POST['good_id'], $session);

					header("Location: /catalog");
					break;

				case "addorder":
					$user = $_SESSION['id'];
					$name = htmlspecialchars(strip_tags(mysqli_real_escape_string(getDb(), $_POST['name'])));
					$phone = htmlspecialchars(strip_tags(mysqli_real_escape_string(getDb(), $_POST['phone'])));

					addOrder($name, $phone, $user, $session);

					session_regenerate_id();

					$params['message'] = "Заказ успешно оформлен";
					header("Location: /basket");
					die();

				default:
					# code...
					break;
			}

			$params['basket'] = getBasket($session);
			$params['sum'] = getSumBasket($session);
			break;

		case 'login':
			$login = $_REQUEST['login'];
			$pass = $_REQUEST['pass'];

			if (auth($login, $pass)) {
				if (isset($_POST['save'])) {
					setHashCookie($_SESSION['id']);
				}

				($_SERVER["HTTP_REFERER"] === $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/registration") ? header("Location: /") : header("Location: " . $_SERVER['HTTP_REFERER']);
				die();
			} else {
				die("Не верный логин пароль");
			}

		case 'logout':
			setcookie("hash", "", time() - 1, "/");
			session_regenerate_id();
			session_destroy();

			header("Location: "  . $_SERVER['HTTP_REFERER']);
			die();

		case 'bux':
			/*      if (!empty($_FILES)) {
            upload();
            header()
        }*/
			// $params['message'] = strip_tags($_GET['message']);
			$params['files'] = getFiles();
			break;

		case 'calculator':
			$arg1 = $_POST['arg1'] ?? 0;
			$arg2 = $_POST['arg2'] ?? 0;
			$operation = $_POST['operation'];
			$params['calculator'] = getCalculator($arg1, $arg2, $operation);
			break;

		case 'feedback':

			$params['editFeedback'] = doFeedbackAction($action);

			$params['feedback'] = getAllFeedback();

			$messageCode = strip_tags($_GET['message']);
			$params['message'] = CODES[$messageCode];

			break;

		case 'gallery':
			if (isset($_POST['load'])) {
				loadImage();
			}

			$params['layout'] = "gallery";
			$params['gallery'] = getGallery(IMG_BIG);

			$messageCode = strip_tags($_GET['message']);
			$params['message'] = CODES[$messageCode];
			break;

		case 'image':
			$id = (int)$_GET['id'];
			addViews($id);
			$params['image'] = getImage($id);
			$params['layout'] = "gallery";
			break;

		case 'news':
			$params['news'] = getNews();
			break;

		case 'onenews':
			$id = (int)$_GET['id'];
			$params['news'] = getOneNews($id);
			break;

		case 'catalog':
			//_log(getCatalog(), 'catalog');
			$params['catalog'] = getCatalog();
			$params['message'] = CODES[$_GET['message']];
			break;

		case 'good':
			$id = (int)$_GET['id'];
			$params['good'] = getGood($id);
			break;

		case 'apiCatalog':
			echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
			die();

		case 'apiCalculator':
			$postData = file_get_contents('php://input');
			$data = json_decode($postData, true);
			echo json_encode(getCalculator($data['arg1'], $data['arg2'], $data['operation']), JSON_UNESCAPED_UNICODE);
			die();
	}

	return $params;
}
