<?php
include 'koneksi.php';

// Pastikan data dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_transaksi = (int) $_POST['id_transaksi'];
    $tgl_mulai_sewa = $_POST['tgl_mulai_sewa'];
    $tgl_selesai_sewa = $_POST['tgl_selesai_sewa'];

    // Ambil id_kendaraan dari transaksi yang ingin diupdate
    $queryKendaraan = "SELECT id_kendaraan FROM transaksi WHERE id_transaksi = $id_transaksi";
    $resultKendaraan = mysqli_query($koneksi, $queryKendaraan);
    $rowKendaraan = mysqli_fetch_assoc($resultKendaraan);
    $id_kendaraan = $rowKendaraan['id_kendaraan'];

    // Ambil harga sewa kendaraan dari tabel kendaraan
    $queryHarga = "SELECT harga FROM kendaraan WHERE id_kendaraan = $id_kendaraan";
    $resultHarga = mysqli_query($koneksi, $queryHarga);

    if (mysqli_num_rows($resultHarga) > 0) {
        $row = mysqli_fetch_assoc($resultHarga);
        $harga_sewa = $row['harga'];

        // Hitung lama sewa dalam hari
        $lama_sewa = (strtotime($tgl_selesai_sewa) - strtotime($tgl_mulai_sewa)) / (60 * 60 * 24);

        // Hitung total biaya baru
        $total_biaya = $harga_sewa * $lama_sewa;

        // Update data transaksi
        $queryUpdate = "UPDATE transaksi SET tgl_mulai_sewa = '$tgl_mulai_sewa', tgl_selesai_sewa = '$tgl_selesai_sewa', total_biaya = $total_biaya WHERE id_transaksi = $id_transaksi";
        
        if (mysqli_query($koneksi, $queryUpdate)) {
            // Redirect ke halaman tampilan data setelah update berhasil
            header("Location: datakendaraan.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Kendaraan tidak ditemukan.";
    }
}
?>
