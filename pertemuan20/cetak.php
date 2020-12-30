<?php

require_once __DIR__ . '/vendor/autoload.php';

//HUBUNGKAN DENGAN FILE FUNCTIONS
require 'functions.php';

//menjalankan function query yang ada di file functions.php lalu simpan ke variable
$mahasiswa = readMahasiswa("SELECT * FROM mahasiswa");

$mpdf = new \Mpdf\Mpdf();
$isiCetak = '<html>
<head>
<title></title>
<link rel="stylesheet" href="cetak.css">
</head>
<body>
<h1 style="align: center;">Daftar Mahasiswa</h1>
<table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Npm</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>';
$i = 1;
foreach ($mahasiswa as $mhs) {
    $isiCetak .= '<tr>
                        <td>' . $i++ . '</td>
                        <td><img src="img/' . $mhs["gambar"] . '" width="50"></td>
                        <td>' . $mhs["npm"] . '</td>
                        <td>' . $mhs["nama"] . '</td>
                        <td>' . $mhs["email"] . '</td>
                        <td>' . $mhs["jurusan"] . '</td>
                </tr>';
}
$isiCetak .= '</table>
</body>
</html>
';
$mpdf->WriteHTML($isiCetak);
$mpdf->Output('daftar-mahasiswa.pdf', 'I');
