<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>
<?php if (isset($_POST["submit"])) : ?>
	<h1>Halo selamat datang <?= $_POST["nama"]; ?></h1>
<?php endif; ?>
	<form action="" method="post">
		Masukkan nama : <input type="text" name="nama">
		<br>
		<button type="submiy" name="submit">Kirim</button>
	</form>
</body>
</html>