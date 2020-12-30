<?php 
$mahasiswa =[ 
			[
				"nama" => "faris",
				"npm" => "43a87007160298",
				"email" => "farisemail",
				"jurusan" => "sisteminformasi",
				"gambar" => "faris.jpg"
			],
			[
				"nama" => "teguhh",
				"npm" => "43a87007160299",
				"email" => "teguhemail",
				"jurusan" => "sisteminformasi",
				"gambar" => "teguh.jpg"
			]
		];
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>TENTANG MATERI GET</title>
 </head>
 <body>
 <h1>DAFTAR MAHASISWA</h1>
 <ul>
 <?php foreach ($mahasiswa as $mhs) : ?>
 	<li>
 		<a href="latihan2.php?nama=<?= $mhs["nama"];?>&npm=<?= $mhs["npm"];?>&email=<?= $mhs["email"];?>&jurusan=<?= $mhs["jurusan"];?>&gambar=<?= $mhs["gambar"];?>">
 			<?= $mhs["nama"]; ?>
 		</a>
 	</li>
 <?php endforeach; ?>
 </ul>
 </body>
 </html>