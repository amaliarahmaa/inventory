<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['status'] != 'login') {
    header("Location: formlogin.php");
    exit;
}

require_once "config.php";
require_once "template/header.php"; // Header
require_once "template/navbar.php"; // Navbar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="layoutSidenav">
        <?php require_once "template/sidebar.php"; // Memanggil sidebar ?>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <h2 class="text-center">CRUD Utama</h2>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span>Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>!</span>
                    </div>

                    <!-- Data Pengguna -->
                    <h3>Data Pengguna</h3>
                    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Pengguna</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM login");
                            while ($data = mysqli_fetch_assoc($query)) {
                                echo "<tr>
                                    <td>{$data['username']}</td>
                                    <td>{$data['password']}</td>
                                    <td>
                                        <a href='ubah.php?id={$data['idLogin']}' class='btn btn-warning btn-sm me-1'><i class='fas fa-edit'></i> Edit</a>
                                        <a href='hapus.php?id={$data['idLogin']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Data Cabang -->
                    <h3>Data Cabang</h3>
                    <a href="tambahcabang.php" class="btn btn-primary mb-3">+ Tambah Cabang</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Cabang</th>
                                <th>Nama Cabang</th>
                                <th>Alamat Cabang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM cabang");
                            while ($data = mysqli_fetch_assoc($query)) {
                                echo "<tr>
                                    <td>{$data['id_cabang']}</td>
                                    <td>{$data['nama_cabang']}</td>
                                    <td>{$data['alamat_cabang']}</td>
                                    <td>
                                        <a href='ubahcabang.php?id={$data['id_cabang']}' class='btn btn-warning btn-sm me-1'><i class='fas fa-edit'></i> Edit</a>
                                        <a href='hapuscabang.php?id={$data['id_cabang']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Tambah Tabel lainnya sesuai kebutuhan -->

                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>

<?php

require_once "template/footer.php"; // Footer


?>
