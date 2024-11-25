<?php
// Memasukkan koneksi ke database
include 'koneksi.php';

// Periksa apakah parameter `id` ada dan tidak kosong
if (isset($_GET['id']) && $_GET['id'] !== '') {
    // Sanitasi input `id`
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query untuk mendapatkan data transaksi berdasarkan `id`
    $data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
    
    if (mysqli_num_rows($data) > 0) {
        $d = mysqli_fetch_array($data);

        // Jika form disubmit, update data transaksi
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tgl_mulai_sewa = $_POST['tgl_mulai_sewa'];
            $tgl_selesai_sewa = $_POST['tgl_selesai_sewa'];

            // Hitung lama sewa dalam hari
            $lama_sewa = (strtotime($tgl_selesai_sewa) - strtotime($tgl_mulai_sewa)) / (60 * 60 * 24);

            // Ambil harga sewa kendaraan berdasarkan ID kendaraan
            $queryHarga = "SELECT harga FROM kendaraan WHERE id_kendaraan = '" . $d['id_kendaraan'] . "'";
            $resultHarga = mysqli_query($koneksi, $queryHarga);

            if (mysqli_num_rows($resultHarga) > 0) {
                $row = mysqli_fetch_assoc($resultHarga);
                $harga_sewa = $row['harga'];

                // Hitung total biaya
                $total_biaya = $harga_sewa * $lama_sewa;

                // Update data transaksi di database
                $queryUpdate = "UPDATE transaksi SET 
                                tgl_mulai_sewa='$tgl_mulai_sewa', 
                                tgl_selesai_sewa='$tgl_selesai_sewa', 
                                total_biaya='$total_biaya' 
                                WHERE id_transaksi='$id'";

                if (mysqli_query($koneksi, $queryUpdate)) {
                    echo "<div class='alert alert-success'>Data transaksi berhasil diperbarui.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($koneksi) . "</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>Kendaraan tidak ditemukan.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
        exit; // Menghentikan eksekusi jika data tidak ditemukan
    }
} else {
    echo "<div class='alert alert-warning'>Parameter ID tidak ditemukan di URL.</div>";
    exit; // Menghentikan eksekusi jika parameter ID tidak ada
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .btn-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-3 text-center">Ubah Data Transaksi</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="tgl_mulai_sewa" class="form-label">Mulai Sewa</label>
                <input type="date" name="tgl_mulai_sewa" class="form-control" value="<?php echo $d['tgl_mulai_sewa']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_selesai_sewa" class="form-label">Selesai Sewa</label>
                <input type="date" name="tgl_selesai_sewa" class="form-control" value="<?php echo $d['tgl_selesai_sewa']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="total_biaya" class="form-label">Total Biaya</label>
                <input type="text" name="total_biaya" class="form-control" value="<?php echo $d['total_biaya']; ?>" readonly>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="datatransaksi.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
