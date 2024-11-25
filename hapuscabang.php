<?php 
// Koneksi ke database
include 'koneksi.php';

// Cek apakah parameter id_cabang ada di URL
if (isset($_GET['id_cabang'])) {
    $id_cabang = $_GET['id_cabang'];

    // Menghapus data berdasarkan id_cabang
    $query = "DELETE FROM cabang WHERE id_cabang='$id_cabang'";

    if (mysqli_query($koneksi, $query)) {
        // Mengalihkan kembali ke halaman datacabang.php setelah berhasil dihapus
        header("Location: datacabang.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
} else {
    echo "ID cabang tidak ditemukan.";
}
?>
