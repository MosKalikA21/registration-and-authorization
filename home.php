<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Добро пожаловать</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="home.php"><h1>Заголовок сайта</h1></a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Персональная страница</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Выйти</a>
			</div>
		</nav>
		<div class="content">
			<h2>Стартовая страница</h2>
			<p>С возвращением, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>
