<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

if($_SESSION['user']) {
  header('Location:profile.php');
}
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Авторизация</title>
  </head>
  <body class="body">
  <form  action="signin.php" class="form" method="post">
  <div class="mb-3">
    <label for="exampleInputLogin1" class="form-label">Логин</label>
    <input type="text" name="login" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
  <p>У вас нет аккаунта? - <a class="loginLink" href="registr.php">Зарегестрируйтесь</a></p>
    <?php
      if ( $_SESSION['message']) {
        echo '<p class="msg">' .$_SESSION['message']. '</p>';
      }
      unset($_SESSION['message']);

      ?>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>