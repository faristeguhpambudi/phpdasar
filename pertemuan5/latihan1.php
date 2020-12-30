<?php 
//ARRAY, variabel yang dapat menampung banyak nilai
//pasangan antara key dan value. index dimulai dari 0

//Cara Lama
$namaArray = array("isi", "isi");

//Cara Baru
$namaHari = [
    "Senin", 
    "Selasa", 
    "Rabu", 
    "Kamis", 
    "Jumat",
    "Sabtu",
    "Minggu"
];

//menampilkan array
//var_dump() atau print_r
var_dump($namaHari);
print_r($namaHari);
//echo, untuk satu isi array
echo $namaHari[2];

//menambahkan elemen baru pada array
$namaHari[] = "ahad";
var_dump($namaHari);
?>