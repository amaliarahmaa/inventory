<?php
require_once "config.php"; 
require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";

// Ambil jumlah penyewa, kendaraan, dan transaksi dari database
$sql_penyewa = "SELECT COUNT(*) AS total_penyewa FROM penyewa";
$result_penyewa = mysqli_query($koneksi, $sql_penyewa);
$row_penyewa = mysqli_fetch_assoc($result_penyewa);
$jumlah_penyewa = $row_penyewa['total_penyewa'];

$sql_kendaraan = "SELECT COUNT(*) AS total_kendaraan FROM kendaraan";
$result_kendaraan = mysqli_query($koneksi, $sql_kendaraan);
$row_kendaraan = mysqli_fetch_assoc($result_kendaraan);
$jumlah_kendaraan = $row_kendaraan['total_kendaraan'];

$sql_transaksi = "SELECT COUNT(*) AS total_transaksi FROM transaksi";
$result_transaksi = mysqli_query($koneksi, $sql_transaksi);
$row_transaksi = mysqli_fetch_assoc($result_transaksi);
$jumlah_transaksi = $row_transaksi['total_transaksi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .card-custom {
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }
        .card-custom:hover {
            transform: scale(1.05);
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df, #224abe);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #1cc88a, #198754);
        }
        .bg-gradient-warning {
            background: linear-gradient(135deg, #f6c23e, #d1a22e);
        }
        .card-icon {
            font-size: 2rem;
            margin-right: 10px;
        }
        .row {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Utama</li>
            </ol>
            <div class="row justify-content-center">
                <!-- Kartu Jumlah Penyewa -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card card-custom bg-gradient-primary">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-users card-icon"></i>
                            <div>Jumlah Penyewa: <?php echo $jumlah_penyewa; ?></div>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Kendaraan -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card card-custom bg-gradient-success">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-car card-icon"></i>
                            <div>Jumlah Kendaraan: <?php echo $jumlah_kendaraan; ?></div>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Transaksi -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card card-custom bg-gradient-warning">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-file-alt card-icon"></i>
                            <div>Jumlah Transaksi: <?php echo $jumlah_transaksi; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>

<?php


require_once "template/footer.php";


?>
