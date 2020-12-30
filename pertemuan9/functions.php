<?php
//buat koneksi ke database. simpan di variabel koneksi.
$koneksi  = mysqli_connect("localhost", "root", "", "belajarphpdasar");

function queryHasil($queryDiTangkap)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $queryDiTangkap);
    $wadah = []; //MENYIAPKAN WADAH KOSONG
    while ($fetchhasil = mysqli_fetch_assoc($hasil)) {
        $wadah[] = $fetchhasil; //MENGISI WADAH
    }
    return $wadah; //MENGEMBALIKAN NILAI AKHIR
}
