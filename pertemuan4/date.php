<?php 
//DATE MENAMPILKAN TANGGAL DENGAN FORMT TERTENTU
// echo date("l, d M Y");
// echo "<br>";

// //TIME, FUNGSI WAKTU
// //unix timestamps, detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo "<br>";
echo date("l, d M Y", time() + (60*60*24*100));
echo "<br>";
echo date("l, d M Y", mktime(0,0,0,10,16,1998));
echo "<br>";
//str to time
echo date("l", strtotime("16 Oct 1998"));

?>