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

    //JALANKAN FUNGSI UPLOAD GAMBAR
    $gambar = uploadGambar();
    //JIKA GAGAL UPLOAD GAMBAR
    if (!$gambar) {
        return false;
    }

    //melakukan query insert data
    $query = "INSERT INTO mahasiswa VALUES 
                ('','$nama','$npm','$email','$jurusan','$gambar')";
    mysqli_query($koneksi, $query);

    //mengembalikan nilai akhir apakah ada tabel terpengaruh
    return mysqli_affected_rows($koneksi);
}

function uploadGambar()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    //CEK APAKAH TIDAK ADA GAMBAR YANG DIUPLOAD
    if ($error === 4) { //4 berarti jenis error tidak ada file
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //CEK YANG DIUPLOAD GAMBAR ATAU BUKAN
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode(".", $namaFile); //memecah nama file
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    //JIKA TIDAK ADA DI EKSTENSI YANG VALID
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    //cek jika ukuran file terlalu besar
    if ($ukuranFile > 10000000) {
        echo "
        <script>
            alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    //LOLOS SEMUA PENGECEKAN. SIAP DIUPLOAD
    //GENERATE NAMA FILE BARU
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadGambar();
    }


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
