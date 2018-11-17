<?php
require_once("bd.php");

$login = $_POST['login'];
$password = $_POST['password'];
$rpassword = $_POST['rpassowrd'];
$email = $_POST['email'];
$errors = array();

if(empty($login)){
	$errors[] = "Вы не заполнили поле Login";
}
if(empty($password)){
	$errors[] = "Вы не заполнили поле Password";
}
if(empty($email)){
	$errors[] = "Вы не заполнили поле email";
}
if(strlen($password)<4){
	$errors[] = "Пароль должен содержать не менее 5 символов";
}
if(strlen($login)<4){
	$errors[] = "Логин должен содержать не менее 5 символов";
}
if($password!==$rpassword){
	$errors[] = "Пароли должны совпадать";
}
if(!empty($errors)){
	echo "<p>Не удалось зарегистрироваться: <p><hr>";
	foreach($errors as $value){
	echo '<li>'.$value.'<br>';
	}
	echo "<p><a href='index.php'>Вернуться к регистрации</a></p>";
}
else{
    $connect = connectToBd();
	if($connect()) {
	    $connect = connectToBd();
        $db = mysqli_query($connect, "SELECT DATABASE()");
        $users = 'SELECT id FROM users WHERE login = "'.$login.'"';
        $checklogin = mysqli_query($connect, $users);
        if(mysqli_num_rows($checklogin)>0){
            echo "Такой логин уже существует!";
            echo "<p><a href='index.php'>Вернуться к регистрации</a></p>";
        }
        else{
            $query = "INSERT INTO users (`login`,`password`,`email`) VALUES ('$login','$password','$email')";
            $result = mysqli_query($connect, $query);
            if($result==false){
                echo mysqli_error($connect);
            }else{
                echo "Вы зарегистрированы!<br>Авторизируйтесь, пожалуйста.<br>";
                echo "<a href='index.php'><b>Авторизироваться</b></a>";
            }

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" href="style/style.css">
	<title>Регистрация</title>
</head>
<body>
	
</body>
</html>