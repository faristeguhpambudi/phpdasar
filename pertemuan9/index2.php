<?php
//buat koneksi ke database. simpan di variabel koneksi.
$koneksi  = mysqli_connect("localhost", "root", "", "belajarphpdasar");

//AMBIL DATA DARI TABEL MAHASISWA. ATAU QUERY DATANYA. simpan ke variabel hasil
$hasil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");


?>
<html>
<title>Halaman Admin</title>

<body>
    <h1>Daftar Mahasiswa</h1>

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
        <?php while ($fetchmahasiswa = mysqli_fetch_assoc($hasil)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <img src="img/<?= $fetchmahasiswa["gambar"]; ?>" width="50">
                </td>
                <td><?= $fetchmahasiswa["npm"]; ?></td>
                <td><?= $fetchmahasiswa["nama"]; ?></td>
                <td><?= $fetchmahasiswa["email"]; ?></td>
                <td><?= $fetchmahasiswa["jurusan"]; ?></td>
                <td>
                    <a href="">Edit</a> || <a href="">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>

</html>