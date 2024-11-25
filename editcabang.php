<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id_cabang   = $_POST['id_cabang'];
$nama_cabang = $_POST['nama_cabang'];
$alamat_cabang = $_POST['alamat_cabang'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE cabang SET nama_cabang = '$nama_cabang', alamat_cabang = '$alamat_cabang' WHERE id_cabang = '$id_cabang'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman datacabang.php 
    header("location: datacabang.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>