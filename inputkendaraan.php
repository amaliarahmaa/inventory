<?php
include 'koneksi.php';

$no_plat = $_POST['no_plat'];
$merek = $_POST['merek'];
$model = $_POST['model'];
$harga = $_POST['harga'];
$status = $_POST['status'];

// Menyisipkan data ke dalam tabel kendaraan tanpa menyertakan id_pemilik
$sql = "INSERT INTO kendaraan (no_plat, merek, model, harga, status) 
        VALUES ('$no_plat', '$merek', '$model', '$harga', '$status')";

if (mysqli_query($koneksi, $sql)) {
    header("location:datakendaraan.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
?>
