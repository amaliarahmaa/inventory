<?php
// Menghubungkan ke database
require_once "config.php";

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_cabang = $_POST['nama_cabang'];
    $alamat_cabang = $_POST['alamat_cabang'];

    // Query untuk menyimpan data cabang
    $sql = "INSERT INTO cabang (nama_cabang, alamat_cabang) VALUES ('$nama_cabang', '$alamat_cabang')";
    
    // Eksekusi query dan cek apakah berhasil
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, arahkan ke halaman data cabang
        header("Location: datacabang.php");
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
    <title>Tambah Cabang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f4f7fa;
            font-family: 'Roboto', sans-serif;
        }
        .card-header-custom {
            background-color: #394A56;
            color: white;
        }
        .btn-save {
            background-color: #FFD700; /* Kuning */
            border-color: #FFD700; /* Kuning */
            color: black;
        }
        .btn-save:hover {
            background-color: #FFC107; /* Kuning lebih cerah */
            border-color: #FFC107; /* Kuning lebih cerah */
        }
        .btn-back {
            background-color: #000000; /* Hitam */
            border-color: #000000; /* Hitam */
            color: white;
        }
        .btn-back:hover {
            background-color: #333333; /* Hitam lebih gelap */
            border-color: #333333; /* Hitam lebih gelap */
        }
        .button-container {
            display: flex;
            gap: 10px;
        }
        .button-container .btn {
            width: auto;
        }
    </style>
</head>
<body>
    <!-- Sidebar dan Navbar dari template yang ada -->
    <?php
    require_once "template/header.php";
    require_once "template/navbar.php";
    require_once "template/sidebar.php";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container mt-5">
                <h2 class="text-center mb-4 text-primary">Tambah Data Cabang</h2>

                <!-- Card untuk Form Tambah Cabang -->
                <div class="card shadow-lg">
                    <div class="card-header card-header-custom text-center">
                        <h5>Form Tambah Cabang</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="tambahcabang.php">
                            <div class="mb-3">
                                <label for="nama_cabang" class="form-label">Nama Cabang</label>
                                <input type="text" name="nama_cabang" id="nama_cabang" class="form-control" placeholder="Masukkan Nama Cabang" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_cabang" class="form-label">Alamat Cabang</label>
                                <textarea name="alamat_cabang" id="alamat_cabang" class="form-control" rows="3" placeholder="Masukkan Alamat Cabang" required></textarea>
                            </div>
                            
                            <!-- Tombol Kembali dan Simpan Berdampingan -->
                            <div class="button-container">
                                <a href="datacabang.php" class="btn btn-back btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-save btn-sm">Simpan Cabang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
