<?php
session_start();
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
                </div>
                <form class="form" action="" method="post">
                    <input class="form-button" name="reg-button" placeholder="Введите другое имя" />
                    <input class="form-button" name="log-button" placeholder="Введите другой пароль" />
                </form>
            </div>
    </section>

</body>

</html>