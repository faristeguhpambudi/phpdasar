<?php 
//MENAMPILKAN ARRAY UNTUK USER
//pakai foreach
$namaHari = [
    "Senin", 
    "Selasa", 
    "Rabu", 
    "Kamis", 
    "Jumat",
    "Sabtu",
	"Minggu",
	"ahad"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php foreach ($namaHari as $nm) :?>
		<?= $nm; ?>
	<?php endforeach; ?>
</body>
</html>