<?php
session_start();
//  if(!isset($_SESSION['id']))
// {
//      header("location: login.php");
//  }

$conn = new mysqli("localhost", "root", "", "chat");
$conn->query("SET NAMES 'utf8'");
$result = $conn->query("SELECT * FROM `users`");


function printResult($result)
{
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="chat.php?user_id=' . $row["id"] . '" style ="color:black; text-decoration:none; display:flex; align-items: center; margin: 20px;">';
            echo "<img src='img/unnamed.png' alt='unnamed' style = 'width: 50px; haight = 50px'/>";
            echo "" . $row['id'];
            echo "    .Name: " . $row['name'] . "</br>";
            echo '</a>';
        }
    }
}

$user_id = $_GET['user_id'];

$user_id_from = $_SESSION['id'];

if (isset($_POST["button"])) {

    if (isset($row["id"])) {
        $_GET["user_id"];
    }

    if (isset($_POST["input-text"])) {
        $input = $_POST["input-text"];
    }

    $enter = $conn->query("INSERT INTO `messages` (`id_user_from`, `id_user_to`, `text`) VALUES ('$user_id_from', '$user_id','$input')");
    
    $poison = $conn->query("SELECT `text` FROM `messages`");
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
    <title>Chat</title>
</head>

<body>
    <section class="blocks">
        <div class="left-block">
            <?php echo "<div class='message-block'>" . $input . "</div>"; ?>
        </div>
        <div class="right-block">
            <div class='scrollbar' id='style-4'>
                <?php
                echo printResult($result);
                ?>
            </div>
        </div>
    </section>
    <div class="input">
        <form action="" method="POST">
            <input class="input-text" type="text" name="input-text" placeholder="Сообщение" />
            <input class="button" type="submit" name="button" value="отправить" />
        </form>
    </div>
</body>

</html>