<?php
//Hubungkan dengan file functions
require 'functions.php';

//cek tombol login sudah ditekan atau belum
if (isset($_POST["login"])) {
    //simpan ke dalam variabel
    $username = $_POST["username"];
    $password = $_POST["password"];

    //cek username
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        //cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header('Location: index.php');
            exit;
        }
    }

    $error = true;
}

?>

<html>

<head>
    <title>
        halaman login
    </title>
</head>

<body>
    <h1>Halaman Login</h1>
    <?php if (isset($error)) : ?>
        <p>PASSWORD SALAH</p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>