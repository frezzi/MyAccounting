<?php 
session_start();
require_once 'connectDB.php';

$nameAdd = $_POST['nameAdd'];
$text = $_POST['text'];
$sum = $_POST['sum'];
$date = $_POST['date'];





 if($_GET['edit']>0) {
 	  	 mysqli_query($connect,"UPDATE  `testovoe` SET 'nameAdd'='$nameAdd', 'text'='$text','sum'='$sum','date'='$date' WHERE `id`='{$_GET['edit']}'");
 	  	 header('Location: profile.php');

  } else {
  	 mysqli_query($connect, "INSERT INTO `testovoe` (`id`, `nameAdd`, `text`, `sum`, `date`) VALUES (NULL, '$nameAdd', '$text', '$sum', '$date')");
	header('Location: profile.php');
}

?>