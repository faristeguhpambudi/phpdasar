<?php 
//membuat function sendiri
function salam($waktu = "datang", $nama="admin")
{
	return "Selamat $waktu, $nama";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1><?=salam("pagi","faris"); ?></h1>
</body>
</html>