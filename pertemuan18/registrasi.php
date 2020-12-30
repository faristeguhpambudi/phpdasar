<?php
//HUBUNGKAN DENGAN FILE FUNCTIONS
require 'functions.php';

//JIKA TOMBOL REGIST SUDAH DITEKAN
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('Registrasi Berhasil!');
        </script>";
    } else {
        mysqli_error($koneksi);
    }
}
?>
<html>

<head>
    <title>
        Halaman Registrasi</title>
</head>

<body>
    <h1>Halaman Registrasi</h1>
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
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Regist</button>
            </li>
        </ul>
    </form>
</body>

</html>