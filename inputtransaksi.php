<?php 
include 'koneksi.php';

// Pastikan data dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_kendaraan = (int) $_POST['id_kendaraan']; // Pastikan id_kendaraan dalam format integer
    $tgl_mulai_sewa = $_POST['tgl_mulai_sewa'];
    $tgl_selesai_sewa = $_POST['tgl_selesai_sewa'];

    // Hitung lama sewa dalam hari
    $lama_sewa = (strtotime($tgl_selesai_sewa) - strtotime($tgl_mulai_sewa)) / (60 * 60 * 24);

    // Ambil harga_sewa dari tabel kendaraan berdasarkan id_kendaraan
    $queryHarga = "SELECT harga FROM kendaraan WHERE id_kendaraan = $id_kendaraan";
    $resultHarga = mysqli_query($koneksi, $queryHarga);

    if (mysqli_num_rows($resultHarga) > 0) {
        $row = mysqli_fetch_assoc($resultHarga);
        $harga_sewa = $row['harga'];

        // Hitung total biaya
        $total_biaya = $harga_sewa * $lama_sewa;

        // Masukkan data transaksi ke tabel transaksi
        $queryInsert = "INSERT INTO transaksi (id_kendaraan, tgl_mulai_sewa, tgl_akhir_sewa, total_biaya) 
                        VALUES ($id_kendaraan, '$tgl_mulai_sewa', '$tgl_selesai_sewa', $total_biaya)";
        
        if (mysqli_query($koneksi, $queryInsert)) {
            echo "Transaksi berhasil ditambahkan dengan total biaya: Rp$total_biaya";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Kendaraan tidak ditemukan.";
    }
}
?>
