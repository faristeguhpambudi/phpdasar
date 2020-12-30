<?php 
//ARRAY ASSOSIATIF, ARRAY YANG KEYNYA ADALAH STRING YANG DIBUAT SENDIRI
$mahasiswa = [
	[
		"nama" => "Faris Teguh",
		"nrp" => "43a87007160298",
		"email" => "faris@gmail.com",
		"jurusan" => "Sistem Informasi"
	],
	[
		"nama" => "Teguh Pambudi",
		"nrp" => "43a87007160299",
		"email" => "teguh@gmail.com",
		"jurusan" => "Teknik Informasi"
	]
]
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<?php foreach($mahasiswa as $m): ?>
	<ul>
		<li>Nama : <?= $m["nama"]; ?></li>
		<li>NRP : <?= $m["nrp"]; ?></li>
		<li>Email : <?= $m["email"]; ?></li>
		<li>Jurusan : <?= $m["jurusan"]; ?></li>
	</ul>
	<?php endforeach; ?>
</body>
</html>