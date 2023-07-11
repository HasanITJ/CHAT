<?php
$mysql = new mysqli("localhost", "root", "", "chat");
$mysql->query("SET NAMES 'utf8'");

session_start();
$name = "";
$email = "";
$password = "";
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["password"] = $password;
$error_name = "";
$error_email = "";
$error_password = "";
$error = false;
if (isset($_POST["button"])) {

    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }


    if (strlen($name) == 0) {
        $error_name = "Введите имя";
        $error = true;
    }

    if (strlen($password) == 0) {
        $error_password = "Введите пароль";
        $error = true;
    }

    if (strlen($email) == 0) {
        $error_email = "Введите email";
        $error = true;
    }

    if ($email == "" || !preg_match("/@/", $email)) {
        $error_email = "Введите корректный email";
        $error = true;
    }

    if (!$error) {
        $mysql->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email','$password')");
        header("Location:chat.php?login-button=1");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>

<body style=" background-color: #191919;">
    <section class="login">
        <h1 class='title'>Регистрация</h1>
        <form class="login-form" action="" method="POST">
            <label>Ведите имя:</label>
            <span style="color:red;">
                <?= $error_name ?>
            </span>
            <input class="input-login" type="text" name="name" placeholder="Имя"
                value="<?= $_SESSION["name"] ?>" /><br><br>
            <label>Ведите свой email:</label>
            <span style="color:red;">
                <?= $error_email ?>
            </span>
            <input class="input-login" type="text" name="email" placeholder="Email" value="<?= $_SESSION["email"] ?>" /><br><br>
            <label>Ведите пороль:</label>
            <span style="color:red;">
                <?= $error_password ?>
            </span>
            <input class="input-login" type="int" name="password" placeholder="Password"
                value="<?= $_SESSION["password"] ?>" /><br><br>
            <input class="login-button" type="submit" name="button" value="LOGIN">
        </form>
    </section>
</body>

</html>