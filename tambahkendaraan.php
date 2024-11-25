<?php
// Menghubungkan ke database
require_once "config.php";

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $no_plat = $_POST['no_plat'];
    $merek = $_POST['merek'];
    $model = $_POST['model'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Query untuk menyimpan data cabang
    $sql = "INSERT INTO kendaraan (no_plat, merek, model, harga, status) VALUES ('$no_plat', '$merek', '$model', '$harga', '$status')";
    
    // Eksekusi query dan cek apakah berhasil
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, arahkan ke halaman data cabang
        header("Location: datakendaraan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Cabang</title>
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
        <h3 class="text-center">Tambah Data Kendaraan</h3>
        <form method="post" action="inputkendaraan.php">
            <div class="mb-3">
                <label for="no_plat" class="form-label">No Plat</label>
                <input type="text" name="no_plat" class="form-control" id="no_plat" required>
            </div>
            <div class="mb-3">
                <label for="merek" class="form-label">Merek</label>
                <input type="text" name="merek" class="form-control" id="merek" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" class="form-control" id="model" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Sewa</label>
                <input type="number" name="harga" class="form-control" id="harga" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Disewakan">Disewakan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-custom">SIMPAN</button>
            <a href="datakendaraan.php" class="btn btn-back">KEMBALI</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybQlIqZ26eP3QzzP6UrB/1mo8iW9Sm3vPqapFj8v7g3ZB9K3p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/0hYl4jURfxB/D40/kolJ4CqUp/GyId2R/5D0A8" crossorigin="anonymous"></script>
</body>
</html>
