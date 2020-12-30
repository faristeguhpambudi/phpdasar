<?php 

//MATERI SINTAKS DASAR PHP
//INI ADALAH SNTAKS KOMENTAR
/*INIJUGA KOMENTAR
BANYAK BARIS KOMENTAR
*/

//Standar Output
//echo, print, print_r, var_dump
echo "Faris Teguh Pambudi";
echo "<br>";
print "Faris Teguh Pambudi (dengan print)";
print "<br>";
var_dump("Faris Teguh Pambudi");

//PENULISAN SINTAKS PHP
//1.PHP DIDALAM HTML
//2.HTML DI DALAM PHP


//VARIABEL DAN TIPE DATA
//tidak boleh diawali dengan angka tapi boleh mengandung angka
$nama = "Faris Teguh Ya";

//OPERATOR
//aritmatika + - * / %
$x = 20; $y = 30;
echo $x + $y;
//penggabung string .
$namaDepan = "Faris";
$namaBelakang = "Teguh";
echo $namaDepan." ".$namaBelakang;
//assignment->penugasan += -= *= /= .=
$m = 1;
$m += 6;
echo $m;

$nama = "Andi";
$nama .= " ";
$nama .= "Teguh";

//OPerator perbandingan < > <= >= == !=
var_dump(1 === "1");

//OPERATOR LOGIKA && || !
$z = 10;
var_dump($z <20 && $z%2==0);
var_dump($z <5 || $z%2==0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BELAJAR php</title>
</head>
<body>
	<h1>Selmat datang <?= $nama; ?></h1>
	<?php 
		echo "<h1> Selamat datang Faris</h1>";
	?>
</body>
</html>