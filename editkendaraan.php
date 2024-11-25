<?php

// Include koneksi database
include('koneksi.php');

// Get data dari form
$id_kendaraan    = $_POST['id_kendaraan'];
$no_plat   = $_POST['no_plat'];
$merek   = $_POST['merek'];
$model   = $_POST['model'];
$harga   = $_POST['harga'];
$status   = $_POST['status'];

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE kendaraan SET no_plat = '$no_plat', merek = '$merek', model = '$model', harga = '$harga', status = '$status' WHERE id_kendaraan = '$id_kendaraan'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query)) {
    // Redirect ke halaman tampil.php 
    header("location: datakendaraan.php");
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
