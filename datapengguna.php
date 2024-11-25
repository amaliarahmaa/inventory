<?php
// Menghubungkan ke database
require_once "config.php";

// Mengambil data pengguna dari database
$sql = "SELECT * FROM login";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard & Data Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts for Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Roboto', sans-serif;">
    <!-- Sidebar dan Navbar dari template yang ada -->
    <?php
    require_once "template/header.php";
    require_once "template/navbar.php";
    require_once "template/sidebar.php";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <!-- Tabel Data Pengguna -->
            <div class="container mt-5">
                <h2 class="text-center mb-4 text-primary">Data Pengguna</h2>

                <!-- Card untuk Tabel -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">List Data Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Menampilkan data pengguna
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                                <td>{$row['username']}</td>
                                                <td>{$row['password']}</td>
                                                <td>
                                                    <a href='ubah.php?id={$row['idLogin']}' class='btn btn-warning btn-sm'>
                                                        <i class='fas fa-edit'></i> Edit
                                                    </a>
                                                    <a href='hapus.php?id={$row['idLogin']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data?\")'>
                                                        <i class='fas fa-trash'></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tombol untuk Menambah Pengguna -->
                <a href="tambah.php" class="btn btn-success btn-lg mt-3">
                    <i class="fas fa-plus"></i> Tambah Pengguna
                </a>
            </div>
        </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

require_once "template/footer.php";

?>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
