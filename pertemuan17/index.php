<?php
session_start();
//cek apakah punya session login
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
//HUBUNGKAN DENGAN FILE FUNCTIONS
require 'functions.php';

//menjalankan function query yang ada di file functions.php lalu simpan ke variable
$mahasiswa = readMahasiswa("SELECT * FROM mahasiswa");

//Jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cariMahasiswa($_POST["keyword"]);
}
?>
<html>
<title>Halaman Admin</title>

<body>
    <h1>Daftar Mahasiswa</h1>
    <br>
    <a href="tambah.php">Tambah data</a>
    <a href="logout.php">Logout</a>
    <br>
    <br>
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" size="50" placeholder="masukkan kata pencarian.." autofocus autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Npm</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <img src="img/<?= $mhs["gambar"]; ?>" width="50">
                </td>
                <td><?= $mhs["npm"]; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $mhs["id"]; ?>">Edit</a> ||
                    <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('yakin hapus?');">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>