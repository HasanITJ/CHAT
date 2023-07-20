<?php
$conn = new mysqli("localhost", "root", "", "chat");
$conn->query("SET NAMES 'utf8'");

session_start();
$error_name = "";
$error_password = "";
$error = false;
$name_update = "";
$password_update = "";
$_SESSION["name_update"] = $name_update;
$_SESSION["password_update"] = $password_update;
$user_from = $_SESSION['id'];
// print_r($user_from);


if (isset($_POST["button"])) {

    if (isset($_POST["name_update"])) {
        $name_update = $_POST["name_update"];
    }

    if (isset($_POST["password_update"])) {
        $password_update = $_POST["password_update"];
    }


    $update = $conn->query("UPDATE `users` SET `name` = '$name_update', `password`='$password_update'  WHERE `id` = '$user_from'");
    // print_r($update);

    if (strlen($name_update) == 0) {
        $error_name = "Введите имя";
        $error = true;
    }

    if (strlen($password_update) == 0) {
        $error_password = "Введите пароль";
        $error = true;
    }

    if (!$error) {
        header("Location: chat.php");
        exit;
    }
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
    <title>Настройки</title>
</head>
<body style=" background-color: #191919;">
    <section class="login">
        <div style=" margin:20px;">
               <a href="chat.php"><img src='img/i.png' alt='Изменить' style='width: 65px;' /></a>
            </div>
        <h1 class='title'>Настройки</h1>
        <form class="login-form" action="" method="POST">
            <span style="color:red;">
                <?= $error_name ?>
            </span><br>
            <input class="input-login" type="text" name="name_update" placeholder="Введите имя"
                value="<?= $_SESSION["name_update"]; ?>" /><br><br>
            <span style="color:red;">
                <?= $error_password ?>
            </span><br>
            <input class="input-login" type="int" name="password_update" placeholder="Введите пароль"
                value="<?= $_SESSION["password_update"] ?>" /><br><br>
            <input class="login-button" type="submit" name="button" value="изменить">
        </form>
    </section>
</body>

</html>