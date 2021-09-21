<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require_once 'connectDB.php';
if(!$_SESSION['user']) {
	header('Location:/');
}

if($_GET['del']>0) {
	mysqli_query($connect,"DELETE  FROM `testovoe` WHERE `id`='{$_GET['del']}'");
}
if($_GET['edit']>0) {
	$table1 = mysqli_query($connect,"SELECT * FROM `testovoe` WHERE `id`='{$_GET['edit']}'");
	$edit = mysqli_fetch_array($table1);
	
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Profile</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TESTOVOE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Записи</a>
        <a class="nav-link" href="logout.php">Выход</a>
      </div>
    </div>
  </div>
</nav>
		<h2><?= $_SESSION['user']['full_name'] ?></h2>
 <div class="col-6">
 <form  action="addText.php" method="post">
  <div class="mb-3">
    <label class="form-label">Название</label>
    <input type="text" name="nameAdd" class="form-control" value="<?= $edit['nameAdd']?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Описание</label>
    <input type="text" name="text" class="form-control" value="<?= $edit['text']?>">
  </div>
   <div class="mb-3">
    <label class="form-label">Сумма UAH</label>
    <input type="number" name="sum" class="form-control" value="<?= $edit['sum']?>">
  </div>
   <div class="mb-3">
    <label  class="form-label">Дата</label>
    <input type="date" name="date" class="form-control" value="<?= $edit['date']?>">
  </div>
  <?php if($_GET['edit']>0) { ?>
  <button type="submit" class="btn btn-primary">Сохранить изменения</button>
  <a class="btn btn-primary" href="profile.php">Выйти из режима редактирования</a>
  <?php } else {?>
  	<button type="submit" class="btn btn-primary">Добавить запись</button>
  	<?php } ?>

</form>
</div>
    <?php
      if ( $_SESSION['message']) {
        echo '<p class="msg">' .$_SESSION['message']. '</p>';
      }
      unset($_SESSION['message']);

      ?>

      <?php 
      $cnt=0;
      $testovoe = mysqli_query($connect,"SELECT * FROM `testovoe`");
      while($row=mysqli_fetch_array($testovoe)) {
      	?>
      	<table class="table">
    <tr>
      <td scope="col"><?= ++$cnt; ?></td>
      <td scope="col"><?= $row['nameAdd'] ?></td>
      <td scope="col"><?= $row['text'] ?></td>
      <td scope="col"><?= $row['sum'] ?></td>
      <td scope="col"><?= $row['date'] ?></td>
      <td><a class="btn btn-danger" href="?del=<?=$row['id']?>">Удалить</a></td>
      <td><a class="btn btn-primary" href="?edit=<?=$row['id']?>">Редактировать</a></td>
    </tr>
    <?php
      }

      ?>
  </body>
</html>