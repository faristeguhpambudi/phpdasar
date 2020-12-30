<?php
//HUBUNGKAN DENGAN FILE FUNCTIONS
require 'functions.php';

//menjalankan function query yang ada di file functions.php lalu simpan ke variable
$mahasiswa = readMahasiswa("SELECT * FROM mahasiswa");


?>
<html>
<title>Halaman Admin</title>

<body>
    <h1>Daftar Mahasiswa</h1>
    <br>
    <a href="tambah.php">Tambah data</a>
    <br>

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
                    <a href="">Edit</a> || <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('yakin hapus?');">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>