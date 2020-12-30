<?php
//buat koneksi ke database. simpan di variabel koneksi.
$koneksi  = mysqli_connect("localhost", "root", "", "belajarphpdasar");

function readMahasiswa($queryDiTangkap)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $queryDiTangkap);
    $wadah = []; //MENYIAPKAN WADAH KOSONG
    while ($fetchhasil = mysqli_fetch_assoc($hasil)) {
        $wadah[] = $fetchhasil; //MENGISI WADAH
    }
    return $wadah; //MENGEMBALIKAN NILAI AKHIR
}

function tambah($data)
{
    global $koneksi;
    //menyimpan data yang ditangkap ke dalam variabel
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //melakukan query insert data
    $query = "INSERT INTO mahasiswa VALUES 
                ('','$nama','$npm','$email','$jurusan','$gambar')";
    mysqli_query($koneksi, $query);

    //mengembalikan nilai akhir apakah ada tabel terpengaruh
    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;
    //menyimpan data yang ditangkap ke dalam variabel
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //melakukan query Update data
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                npm = '$npm',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id  = $id
    ";
    mysqli_query($koneksi, $query);

    //mengembalikan nilai akhir apakah ada tabel terpengaruh
    return mysqli_affected_rows($koneksi);
}

function hapus($id)
{
    global $koneksi;
    //melakukan query delete data
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);

    //mengembalikan nilai akhir apakah ada tabel terpengaruh
    return mysqli_affected_rows($koneksi);
}

function cariMahasiswa($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE
        nama LIKE '%$keyword%' OR
        npm LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
    ";

    return readMahasiswa($query);
}
