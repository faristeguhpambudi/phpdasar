<?php 
//cek dulu tombol submit sudah ditekan
if (isset($_POST["submit"])){
//cek username password
	if ($_POST["username"] == "admin" && $_POST["password"]=="123"){
//jika benar redirect ke admin.php
		header("Location: admin.php");
		exit;
} else{
//jika salah tampilkan pesan kesalaahnn
	$error = true;
}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
<h1>LOGIN ADMIN </h1>
<?php if (isset($error)) :?>
<p>USERNAME ATAU PASSWORD SALAH</p>
<?php endif; ?>
<ul>
	<form action="" method="post">
		
		<li>
			<label for="username">Username</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="submit">Kirim</button>
		</li>
	</form>
</ul>
</body>
</html>