<?php 
session_start();
require_once 'connectDB.php';

$login = $_POST['login'];
$password =$_POST['password'];

$chek_user = mysqli_query($connect, "SELECT * FROM `userfluidweb` WHERE `login`='$login' AND `password`='$password' ");

if(mysqli_num_rows($chek_user) > 0) {

	$user = mysqli_fetch_assoc($chek_user);

	$_SESSION['user'] = [
		"id" => $user['id'],
		"full_name" => $user['full_name'],
	];

	header('Location: profile.php');

} else {
	$_SESSION['message'] = "Не верный логин или пароль";
	header('Location: index.php');
}

?>