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
        $data = mysqli_query($koneksi, "SELECT * FROM login WHERE idLogin='$id'");
        
        if (mysqli_num_rows($data) > 0) {
            while ($d = mysqli_fetch_array($data)) {
        ?>
                <form method="post" action="edit.php">
                    <input type="hidden" name="idLogin" value="<?php echo $d['idLogin']; ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $d['password']; ?>" required>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="datapengguna.php" class="btn btn-secondary">Kembali</a>
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
