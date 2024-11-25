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
        $data = mysqli_query($koneksi, "SELECT * FROM penyewa WHERE id_penyewa='$id'");
        
        if (mysqli_num_rows($data) > 0) {
            while ($d = mysqli_fetch_array($data)) {
        ?>
                <form method="post" action="editpenyewa.php">
                    <input type="hidden" name="id_penyewa" value="<?php echo $d['id_penyewa']; ?>">
                    <div class="mb-3">
                        <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                        <input type="text" name="nama_penyewa" class="form-control" value="<?php echo $d['nama_penyewa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_penyewa" class="form-label">Alamat</label>
                        <input type="text" name="alamat_penyewa" class="form-control" value="<?php echo $d['alamat_penyewa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telpon" class="form-label">No Telepon</label>
                        <input type="text" name="no_telpon" class="form-control" value="<?php echo $d['no_telpon']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"value="<?php echo $d['email']; ?>" required>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="datapenyewa.php" class="btn btn-secondary">Kembali</a>
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
