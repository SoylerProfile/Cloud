<?php
session_start();
require_once("functions.php");
$user = $_SESSION['login'];
echo "Вы ввошли!<br>Это ваш кабинет, <b>".$user."</b>";

$allowedTypes = array('jpg', 'jpeg', 'png', 'pdf', 'txt'); //типы допустимых расширений
$location = "files/".$user."/"; //путь к папке пользователя
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" href="style/style.css">
	<title>Мой кабинет</title>
</head>
<body>
	<div id="content">
		<div id="incloud">
			<h4><p>Загрузить файл в хранилище:</p></h4>
			<form method="POST" action="profile.php" enctype="multipart/form-data">
				<input type="file" name="filename" size="9">
				<input type="submit" value="Download" class="btn btn-success">
			</form>
				<h4>Требования к загружаемым файлам:</h4>
				<ul>
					<li>Расширения картинок: jpg, jpeg, png</li>
					<li>Расширения документов: pdf, txt</li>
					<li>Файл не должен превышать 100МБ</li>
				</ul>
			<hr>
		</div>
	<?php
        addFile($user, $allowedTypes, $location);
	?>
		<br><br>
		Вы можете посмотреть свои картинки, нажав на кнопку "Мои картинки"<br>
		<form method="POST">
			<input type="submit" name="images" value="Мои картинки" class="btn btn-primary">
			<input type="submit" value="Скрыть картинки" class="btn btn-info"><br>
	<?php
        showImages($location);
	?>
		</form>
		<hr>
		Вы можете посмотреть свои документы, нажав на кнопку "Мои документы"<br>
		<form method="POST">
			<input type="submit" name="documents" value="Мои документы" class="btn btn-primary">
			<input type="submit" value="Скрыть документы" class="btn btn-info"><br>
	<?php 
        showDocuments($location);
	?>
		</form>
		<hr>
		<form method="POST">
			<input type="submit" value="Мои файлы" name="myfiles" class="btn btn-warning">
			<input type="submit" value="Скрыть список" class="btn btn-info">
			<?php
                showAllFiles($location);
			?>
		</form>
		<form method="POST">
			Для удаления, введите полное имя файла и нажмите кнопку "Удалить"<br>
			Пример имени: hanter.jpg<br><br>
			<input type="text" placeholder="Имя файла" name="trash">
			<input type="submit" value="Удалить" name="deleting" class="btn btn-danger">

			<?php
                deleteFiles($location);
			?>		

		</form>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous">
		</script>
	</div>
</body>
</html>