<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'student-IU4';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Ошибка подключения к MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="home.php"> <h1>Заголовок сайта</h1></a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Персональная страница</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Выйти</a>
			</div>
		</nav>
		<div class="content">
			<h2>Персональная страница пользователя</h2>
			<div>
				<p>Детали аккаунта:</p>
				<table>
					<tr>
						<td>Логин:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Пароль:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
