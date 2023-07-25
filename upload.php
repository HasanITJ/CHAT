<!DOCTYPE html>
<html>

<head>
	<title>METANIT.COM</title>
	<meta charset="utf-8" />
</head>

<body>
	<?php
	$conn = new mysqli("localhost", "root", "", "chat");
	$conn->query("SET NAMES 'utf8'");

	if ($_FILES) {
		foreach ($_FILES["uploads"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["uploads"]["tmp_name"][$key];
				$name = $_FILES["uploads"]["name"][$key];
				move_uploaded_file($tmp_name, "$name");
			}
			// if ($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
			// 	$name = "upload/" . $_FILES["filename"]["name"];
			//     move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
			// 	echo "Файл загружен";
			// }
		}

		$path = $conn->query("INSERT INTO `gallery` (`name`, `path`) VALUES ('$name', '");
		echo "Файлы загружены";
	}
	$unload = $conn->query("SELECT * FROM `gallery`");

   print_r($unload);
	if ($unload->num_rows > 1) {
		while ($row = $unload->fetch_assoc()) {
			echo "<img src=" . $row['path'] . "  alt=" . $row['name'] . ">";
			print_r($row);
		}
	}
	
	$conn->close();
	?>
	<h2>Загрузка файла</h2>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="uploads[]" /><br />
		<input type="file" name="uploads[]" /><br />
		<input type="file" name="uploads[]" /><br />
		<input type="submit" value="Загрузить" />
	</form>
</body>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>instagram</title>
	<link rel="stylesheet" href="./test4.css" />
	<link rel="stylesheet" type="text/css" href="./font-awesome/css/font-awesome.css">
</head>

<body>
	<div class="header-container">
		<div class="header">
			<div class="header-image">
				<img src="./img/logo.png" />
			</div>
			<div class="svg-header">
				<img src="./img/icons/compass.svg">
				<img src="./img/icons/direct.svg">
				<img src="./img/icons/heart.svg">
				<img src="./img/icons/home.svg">
				<img src="./img/avatar.jpg" style="width: 30px; height: 30px;">
			</div>
		</div>
	</div>
	<div class="article">
		<img class="supercar" src="./img/supercarcomp.jpg">
		<div class="article-title">
			<div class="block">
				<h2><span><strong>supercarcompany</strong></span></h2><button class="button">подписаться</button>
			</div>
			<div>
				<h3>
					<span class="text">
						<strong>545</strong>публикаций <strong>51,7 тыс.</strong> подписчиков <strong>175</strong>
						подпичиков
					</span>
					<span class="text1"><strong>supercar company</strong></span>
					<span class="text2"><img class="svg" src="./img/icons/petrol_station.svg"> THE HOME OF
						SUPERCARS</span>
					<span class="text3"><img src="./img/icons/порщень.svg">Fouwer/Ower:@misterkyc</span>
					<span class="text4"><img src="./img/icons/рука.svg">Use #SupercarCompany to get featured!</span>
					<span class="text5"><img src="./img/icons/канверт.svg">DM for Inquiries/Partnerships!</span>
				</h3>
			</div>
		</div>
	</div>
	<div class="container3">
		<div class="center">
			<img class="bmw" src="./img/votes/vote1.jpg">
			<span class="text6"><strong>BATLLES</strong></span>
		</div>
		<div class="center">
			<img class="bmw" src="./img/votes/vote2.jpg">
			<span class="text6"><strong>YOUR OPINION V</strong></span>
		</div>
		<div class="center">
			<img class="bmw" src="./img/votes/vote3.jpg">
			<span class="text6"><strong>PHOTOS/INOS||</strong></span>
		</div class="center">
		<div> <img class="bmw" src="./img/votes/vote4.jpg">
			<span class="text6"><strong>BATLLES V</strong></span>
		</div class="center">

		<div class="center"><img class="bmw" src="./img/votes/vote5.jpg">
			<span class="text6"><strong>YOUR OPINION |V</strong></span>
		</div>
		<div class="center"> <img class="bmw" src="./img/votes/vote6.jpg">
			<span class="text6"><strong>PHOTOS/INOS</strong></span>
		</div>
		<div class="center"> <img class="bmw" src="./img/votes/vote7.jpg">
			<span class="text6"><strong>BATLLES|V</strong>
		</div>
		</span>
	</div>
	<hr />
	<div class="display01">
		<span class="text0"><i class="fa fa-th" aria-hidden="true"></i><strong>публикатции</strong></span>
		<span class="text0"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>REEL</span>
		<span class="text0"><i class="fa fa-television" aria-hidden="true"></i>IGTV</span>
		<span class="text0"><i class="fa fa-user-o" aria-hidden="true"></i>отметки</span>

	</div>
	<div class="display0">
		<img class="car" src="./img/feed/feed1.jpg">
		<img class="car" src="./img/feed/feed2.jpg">
		<img class="car" src="./img/feed/feed3.jpg">
		<img class="car" src="./img/feed/feed4.jpg">
		<img class="car" src="./img/feed/feed5.jpg">
		<img class="car" src="./img/feed/feed6.jpg">
	</div>
	<p class="border">

	</p>

	<div class="display02">
		<span class="text01"> Информация</span><span class="text01">Блог</span><span class="text01">Вакансии</span><span
			class="text01"></span> <span class="text01"> Помощь</span> <span class="text01">TPI</span><span
			class="text01">Конфиденциальность </span><span class="text01">Условия</span> <span class="text01">Популярние
			аккаунты</span><span class="text01">
			Хештеги </span><span class="text01">Места</span>
		</span>
	</div>

</body>
Здесь определена форм с атрибутом enctype="multipart/form-data". Форма содержит специальное поле для выбора файла.

Все загружаемые файлы попадают в ассоциативный массив $_FILES. Чтобы определить, а есть ли вообще загруженные файлы, можно использовать конструкцию if: if ($_FILES)

Массив $_FILES является двухмерным. Мы можем загрузить набор файлов, и каждый загруженный файл можно получить по ключу, который совпадает со значением атрибута name.

Так как элемент для загрузки файла на форме имеет name="filename", то данный файл мы можем получить с помощью выражения $_FILES["filename"].

У каждого объекта файла есть свои параметры, которые мы можем получить:

$_FILES["file"]["name"]: имя файла

$_FILES["file"]["type"]: тип содержимого файла, например, image/jpeg

$_FILES["file"]["size"]: размер файла в байтах

$_FILES["file"]["tmp_name"]: имя временного файла, сохраненного на сервере

$_FILES["file"]["error"]: код ошибки при загрузке

Также мы можем проверить наличие ошибок при загрузке. Если у нас нет ошибки, то поле $_FILES["filename"]["error"] содержит значение 
UPLOAD_ERR_OK.

При отправке файла на сервер он сначала загружается во временное место, из которого затем с помощью функции move_uploaded_file() 
он перемещается в каталог 
сервера, где расположен скрипт "upload.php". -->