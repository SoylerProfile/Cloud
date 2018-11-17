<?php
session_start();
require_once("bd.php");

$login = $_POST['login'];
$password = $_POST['password'];
$connect = connectToBd();
if($connect) {
    $query = "SELECT * FROM users WHERE login='$login'and password='$password'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $count = mysqli_num_rows($result);
    if($count==1){
        $_SESSION['login'] = $login;
    }
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        echo "Привет, ".$login."<br> Вы авторизировались!";
        echo "<br><a href='profile.php'>Мой профиль</a>";
        echo "<br><a href='logout.php'>Logout</a>";

    }
    else{
        echo "Вы ввели неверно логин или пароль!";
        echo "<br><a href='index.php'>Вернуться к авторизации!</a>";
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
	<title>Успешная авторизация!</title>
</head>
<body>
	
</body>
</html>