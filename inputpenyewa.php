<?php
include 'koneksi.php';

$nama_penyewa = $_POST['nama_penyewa'];
$alamat_penyewa = $_POST['alamat_penyewa'];
$no_telpon = $_POST['no_telpon'];
$email = $_POST['email'];

// Menyisipkan data ke dalam tabel kendaraan tanpa menyertakan id_pemilik
$sql = "INSERT INTO penyewa (nama_penyewa, alamat_penyewa, no_telpon, email) 
        VALUES ('$nama_penyewa', '$alamat_penyewa', '$no_telpon', '$email')";

if (mysqli_query($koneksi, $sql)) {
    header("location:datapenyewa.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
?>
