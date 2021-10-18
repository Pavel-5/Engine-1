<? if (!$auth) : ?><br>
	<form action="/registration/add" method="post">
		Логин: <input type="text" name="login" /><br>
		Пароль: <input type="password" name="pass" /><br>
		<input type="submit" value="Зарегистрироваться" />
	</form>
<? endif;
