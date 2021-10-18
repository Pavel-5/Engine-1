<? if ($auth) : ?>
	Добро пожаловать, <?= $name ?>! <a href="/logout">[Выход]</a>
<? else : ?>
	<form action="/login" method="post">
		<input type="text" name="login">
		<input type="text" name="pass">
		Save? <input type='checkbox' name='save'>
		<input type="submit">
	</form>
<? endif; ?>
<br>
<a href="/">Главная</a>
<a href="/catalog">Каталог</a>
<a href="/about">О нас</a>
<a href="/bux">Бухучет</a>
<a href="/gallery">Галерея</a>
<a href="/news">Новости</a>
<a href="/feedback">Отзывы</a>
<a href="/basket">Корзина (<?= $count ?>)</a>
<? if ($auth) : ?>
	<a href="/orders">Мои заказы</a>
<? endif; ?>
<a href="/calculator">Калькулятор</a>
<? if (!$auth) : ?>
	<a href="/registration">Регистрация</a>
<? endif; ?>
<? if ($isAdmin) : ?>
	<a href="/admin">Админка</a>
<? endif; ?><br>