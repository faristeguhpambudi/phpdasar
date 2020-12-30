<?php
session_start();
//cek apakah punya session login
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
//HUBUNGKAN DENGAN FILE FUNCTIONS
require 'functions.php';

//BUAT KONFIGURASI PAGINATION
$jumlahDataPerHalaman = 5;
$totalData = count(readMahasiswa("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($totalData / $jumlahDataPerHalaman); //ceil : membulatkan angka ke atas
if (isset($_GET["halaman"])) {
    $halamanAktif  = $_GET["halaman"];
} else {
    $halamanAktif = 1;
}
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




//menjalankan function query yang ada di file functions.php lalu simpan ke variable
$mahasiswa = readMahasiswa("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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

    <!-- buat navigasi pagination -->
    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">PREVIOUS</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold;"> <?= $i; ?> </a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"> <?= $i; ?> </a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">NEXT</a>
    <?php endif; ?>

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