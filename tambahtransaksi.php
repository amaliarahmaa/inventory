<?php
// Memasukkan koneksi ke database
include 'koneksi.php';

// Ambil data kendaraan dari database
$queryKendaraan = "SELECT id_kendaraan, merek, harga FROM kendaraan";
$resultKendaraan = mysqli_query($koneksi, $queryKendaraan);

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_kendaraan = $_POST['id_kendaraan'];
    $tgl_mulai_sewa = $_POST['tgl_mulai_sewa'];
    $tgl_selesai_sewa = $_POST['tgl_selesai_sewa'];

    // Hitung lama sewa dalam hari
    $lama_sewa = (strtotime($tgl_selesai_sewa) - strtotime($tgl_mulai_sewa)) / (60 * 60 * 24);

    // Ambil harga sewa kendaraan berdasarkan ID
    $queryHarga = "SELECT harga FROM kendaraan WHERE id_kendaraan = '$id_kendaraan'";
    $resultHarga = mysqli_query($koneksi, $queryHarga);

    if (mysqli_num_rows($resultHarga) > 0) {
        $row = mysqli_fetch_assoc($resultHarga);
        $harga_sewa = $row['harga'];

        // Hitung total biaya
        $total_biaya = $harga_sewa * $lama_sewa;

        // Masukkan data transaksi ke dalam tabel transaksi
        $queryInsert = "INSERT INTO transaksi (id_kendaraan, tgl_mulai_sewa, tgl_selesai_sewa, total_biaya) 
                        VALUES ('$id_kendaraan', '$tgl_mulai_sewa', '$tgl_selesai_sewa', '$total_biaya')";

        if (mysqli_query($koneksi, $queryInsert)) {
            echo "<div class='alert alert-success'>Transaksi berhasil ditambahkan dengan total biaya: Rp" . number_format($total_biaya, 0, ',', '.') . "</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($koneksi) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Kendaraan tidak ditemukan.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-bottom: 20px;
        }
        label {
            color: #22303F;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #394A56;
            color: white;
        }
        .btn-back {
            background-color: #2C6485;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Tambah Data Transaksi</h3>
        <form method="post" action="tambahtransaksi.php">
            <div class="mb-3">
                <label for="id_kendaraan" class="form-label">Pilih Kendaraan</label>
                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                    <!-- Mengambil opsi kendaraan dari database -->
                    <?php
                    while ($rowKendaraan = mysqli_fetch_assoc($resultKendaraan)) {
                        echo "<option value='" . $rowKendaraan['id_kendaraan'] . "'>" . $rowKendaraan['merek'] . " - Rp" . number_format($rowKendaraan['harga'], 0, ',', '.') . "/hari</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_mulai_sewa" class="form-label">Mulai Sewa</label>
                <input type="date" name="tgl_mulai_sewa" class="form-control" id="tgl_mulai_sewa" required>
            </div>
            <div class="mb-3">
                <label for="tgl_selesai_sewa" class="form-label">Selesai Sewa</label>
                <input type="date" name="tgl_selesai_sewa" class="form-control" id="tgl_selesai_sewa" required>
            </div>
            <button type="submit" class="btn btn-custom">SIMPAN</button>
            <a href="datatransaksi.php" class="btn btn-back">KEMBALI</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybQlIqZ26eP3QzzP6UrB/1mo8iW9Sm3vPqapFj8v7g3ZB9K3p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/0hYl4jURfxB/D40/kolJ4CqUp/GyId2R/5D0A8" crossorigin="anonymous"></script>
</body>
</html>
