<?php

// Include koneksi database
include('koneksi.php');

// Get data dari form
$idLogin    = $_POST['idLogin'];
$username   = $_POST['username'];
$password   = $_POST['password'];
// Query update data ke dalam database berdasarkan ID
$query = "UPDATE login SET username = '$username', password = '$password' WHERE idLogin = '$idLogin'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query)) {
    // Redirect ke halaman tampil.php 
    header("location: datapengguna.php");
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
