<?php
// Menghubungkan ke database
require_once "config.php";

// Mengambil data transaksi dari database
$sql = "SELECT * FROM transaksi";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard & Data Cabang</title>
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
            <!-- Tabel Data transaksi -->
            <div class="container mt-5">
                <h2 class="text-center mb-4 text-primary">Data Transaksi</h2>

                <!-- Card untuk Tabel -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">List Data Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Mulai Sewa</th>
                                        <th>Selesai Sewa</th>
                                        <th>Total Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Cek apakah total_biaya kosong atau 0, jika ya, atur ke 0
                                        $total_biaya = $row['total_biaya'] == 0 ? 0 : $row['total_biaya'];
                                        // Format harga menjadi Rp. 1.000.000
                                        $harga_format = "Rp. " . number_format($total_biaya, 0, ',', '.');

                                        echo "<tr>
                                                <td>{$no}</td>
                                                <td>{$row['tgl_mulai_sewa']}</td>
                                                <td>{$row['tgl_selesai_sewa']}</td>
                                                <td>{$harga_format}</td>
                                                <td>
                                                    <a href='ubahtransaksi.php?id={$row['id_transaksi']}' class='btn btn-warning btn-sm'>
                                                        <i class='fas fa-edit'></i> Edit
                                                    </a>
                                                    <a href='hapustransaksi.php?id={$row['id_transaksi']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data?\")'>
                                                        <i class='fas fa-trash'></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tombol untuk Menambah Transaksi -->
                <a href="tambahtransaksi.php" class="btn btn-success btn-lg mt-3">
                    <i class="fas fa-plus"></i> Tambah Transaksi
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
