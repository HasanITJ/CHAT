<?php

$conn = new mysqli("localhost", "root", "", "chat");
$conn->query("SET NAMES 'utf8'");

session_start();
$error_id = "";
$email = "";
$password = "";
$_SESSION["email"] =$email; 
$_SESSION["password"] = $password;

if (isset($_POST["button"])) {

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    $result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $user_data = $result->fetch_assoc(); 

    if ($result->num_rows == 1) {
        $_SESSION['id'] = $user_data['id'];
        header("Location: chat.php");
        exit;
    } else {
        $error_id = "Неверное имя пользователя или пароль.";
    }

}
$conn->close();
//если пользователь нажал кнопку отправить
//выполнить SQL запрос получить данные пользвателя
//если есть такой пользователь
//то сохранить его id в сессию и перенаправить его на chat.php
//если нет такого пользователя то вывести ошибку
// Параметры подключения к базе данных
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Войти</title>
</head>

<body style=" background-color: #191919;">

    <section class="login">
        <h1 class='title'>Войти</h1>
        <form class="login-form" action="" method="POST">
            <span style="color:red;">
                <?= $error_id ?>
            </span><br><br>
            <label>Введите свой email:</label>
            <input class="input-login" type="text" name="email" placeholder="Email"
                value="<?= $_SESSION["email"] ?>" /><br><br>
            <label>Введите пароль:</label>
            <input class="input-login" type="int" name="password" placeholder="Password"
                value="<?= $_SESSION["password"] ?>" /><br><br>
            <input class="login-button" type="submit" name="button" value="sign in">
        </form>
    </section>
</body>

</html>