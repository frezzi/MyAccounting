<?php 
session_start();
require_once 'connectDB.php';


$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if($password === $password_confirm) {

	mysqli_query($connect, "INSERT INTO `userfluidweb` (`id`, `full_name`, `login`, `email`, `password`) VALUES (NULL, '$full_name', '$login', '$email', '$password')");
	$_SESSION['message'] = "Регистрация прошла успешно";
	header('Location: index.php');

} else {
	$_SESSION['message'] = "Пароли не совпадают";
	header('Location: registr.php');
}
?>