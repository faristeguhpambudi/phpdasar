<?php 
//cek apakah tidak ada data di variabel get
if (!isset($_GET["nama"]) || 
	!isset($_GET["npm"]) || 
	!isset($_GET["jurusan"]) || 
	!isset($_GET["email"]) ||
	!isset($_GET["gambar"])){
	//redirect atau alihkan paksa
	header("Location: latihan1.php");
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Detail
	</title>
</head>
<body>
	<h1>Detail </h1>
	<ul>
 			<li>
 				<img src="img/<?= $_GET["gambar"]; ?>">
 			</li>
 			<li>Nama : <?= $_GET["nama"]; ?></li>
 			<li>NPM : <?= $_GET["npm"]; ?></li>
 			<li>Email : <?= $_GET["email"]; ?></li>
 			<li>Jurusan : <?= $_GET["jurusan"]; ?></li>
 	</ul>
 	<a href="latihan1.php">Kembali ke daftar mahasiswa</a>
</body>
</html>