<?php

// Include koneksi database
include('koneksi.php');

// Get data dari form
$id_penyewa    = $_POST['id_penyewa'];
$nama_penyewa   = $_POST['nama_penyewa'];
$alamat_penyewa   = $_POST['alamat_penyewa'];
$no_telpon   = $_POST['no_telpon'];
$email  = $_POST['email'];

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE penyewa SET nama_penyewa = '$nama_penyewa', alamat_penyewa = '$alamat_penyewa', no_telpon = '$no_telpon', email = '$email' WHERE id_penyewa = '$id_penyewa'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query)) {
    // Redirect ke halaman tampil.php 
    header("location: datapenyewa.php");
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
