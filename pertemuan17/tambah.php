<?php
session_start();
//cek apakah punya session login
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
//hubungkan dengan file functions.php
require 'functions.php';
//cek tombol submit udah ditekan apa belum
if (isset($_POST["submit"])) {
    //cek apakah berhasil ditambah
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "Data Gagal ditambah";
    }
}

?>
<html>

<head>
    <title>
        tambah data
    </title>
</head>

<body>

    <h1>Tambah Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit"> Tambah </button>
            </li>
        </ul>
    </form>
</body>

</html>