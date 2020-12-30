<?php
session_start();
//cek apakah punya session login
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
//hubungkan dengan file functions.php
require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = readMahasiswa("SELECT * FROM mahasiswa WHERE id  = $id")[0];

//cek tombol submit udah ditekan apa belum
if (isset($_POST["submit"])) {
    //cek apakah berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "Data Gagal diubah";
    }
}

?>
<html>

<head>
    <title>
        Ubah data
    </title>
</head>

<body>

    <h1>Ubah Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="id" id="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" id="id" value="<?= $mhs["gambar"]; ?>">
            <li>
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" required value="<?= $mhs["npm"]; ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <img src="img/<?= $mhs["gambar"]; ?>" alt="">
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit"> Ubah </button>
            </li>
        </ul>
    </form>
</body>

</html>