<?php
include 'koneksi.php';

$nama_cabang = $_POST['nama_cabang'];
$alamat_cabang = $_POST['alamat_cabang'];

// Jika id_cabang auto-increment, Anda tidak perlu menyertakannya dalam query.
$query = "INSERT INTO cabang (nama_cabang, alamat_cabang) VALUES ('$nama_cabang', '$alamat_cabang')";
$result = mysqli_query($koneksi, $query);

header("location:tampildata.php");
?>
