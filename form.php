<?php
$conn = new mysqli("localhost", "root", "", "chat");
$conn->query("SET NAMES 'utf8'");

if (isset($_POST['reg-button'])) {
  header("location: reg.php");
}

if (isset($_POST['log-button'])) {
  header("location: login.php");
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Чат</title>
</head>

<body style="background-color:black;">
  <section>
    <div class="container">
      <div class="form-block">
        <div class="form-title">
          <p class="form-text">Добро пожаловать!</p>
          <p class="form-text">в наш чат</p><br>
        </div>
        <div class="form-image">
          <img src="./img/image.png" alt="chat">
        </div>
        <form class="form" action="" method="post">
          <div class="reg">
            <input class="form-button" type="submit" name="reg-button" value="Регистрация" />
          </div>
          <div class="log">
            <input class="form-button" type="submit" name="log-button" value="Войти" />
          </div>
        </form>
      </div>
  </section>

</body>

</html>