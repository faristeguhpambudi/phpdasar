<?php
session_start();
//cek apakah punya session login
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
//hubungkan dengan file functions
require 'functions.php';

//SIMPAN VARIABEL ID
$id = $_GET["id"];

//JIKA DATA BERHASIL DIHAPUS
if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data Berhasil dihapus!');
        document.location.href = 'index.php';
    </script>";
}
