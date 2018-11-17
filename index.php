<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" href="style/style.css">
	<title>MyCloud</title>
</head>
<body>
	<div><h4>Форма регистрации нового пользователя</h4></div>
	<form action="registration.php" method="POST">
		<input type="text" name="login" placeholder="Придумайте логин"> <br>
		<input type="password" name="password" placeholder="Придумайте пароль"> <br>
		<input type="password" name="rpassowrd" placeholder="Потворите пароль">
		<br>
		<input type="text" name="email" placeholder="Введите ваш email"> <br>
		<input type="submit" value="Зарегистрироваться" class="button"> <br>
	</form>
	<hr>
	<div><h4>Форма авторизации</h4></div>
	<form action="login.php" method="POST">
		<input type="text" name="login" placeholder="Введите ваш логин"> <br>
		<input type="password" name="password" placeholder="Введите ваш пароль"> <br>
		<input type="submit" class="button" value="Авторизироваться">
		
	</form>
</body>
</html>