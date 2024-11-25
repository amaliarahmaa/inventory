<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
        }
        .container {
            margin-top: 20px; /* Mengatur jarak atas */
        }
        .btn-container {
            display: flex;
            justify-content: flex-start; /* Mengatur agar tombol berada di satu sisi */
            gap: 10px; /* Mengatur jarak antar tombol */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-3 text-center">Update Data</h2>

        <h3 class="mt-4">Data User</h3>
        
        <?php
        include 'koneksi.php';

        // Mengambil ID dari URL dan sanitasi input
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
        $data = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
        
        if (mysqli_num_rows($data) > 0) {
            while ($d = mysqli_fetch_array($data)) {
        ?>
                <form method="post" action="editkendaraan.php">
                    <input type="hidden" name="id_kendaraan" value="<?php echo $d['id_kendaraan']; ?>">
                    <div class="mb-3">
                        <label for="no_plat" class="form-label">No Plat</label>
                        <input type="text" name="no_plat" class="form-control" value="<?php echo $d['no_plat']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" value="<?php echo $d['merek']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" value="<?php echo $d['model']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa</label>
                        <input type="number" name="harga" class="form-control"value="<?php echo $d['harga']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="Tersedia" <?php if ($d['status'] == "Tersedia") echo "selected"; ?>>Tersedia</option>
                            <option value="Disewakan" <?php if ($d['status'] == "Disewakan") echo "selected"; ?>>Disewakan</option>
                        </select>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="datakendaraan.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
        <?php 
            }
        } else {
            echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgVRvuATP8S0CkdoTjED49s8hGd6j+ZJ2w4mIhLxSjmrOBh1Xy4bklBToZy9D3Kq" crossorigin="anonymous"></script>
</body>
</html>
