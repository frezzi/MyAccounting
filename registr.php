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
  <form action="signup.php" class="form" method="post">
  <div class="mb-3">
    <label class="form-label">Логин</label>
    <input type="text" name="login" class="form-control">
  </div>
    <div class="mb-3">
    <label class="form-label">ФИО</label>
    <input type="text" name="full_name" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Пароль</label>
    <input type="password"  name="password" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Повторите пароль</label>
    <input type="password" name="password_confirm"class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
  <p>У вас уже есть аккаунт? - <a class="loginLink" href="index.php">Авторизируйтесь</a></p>
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