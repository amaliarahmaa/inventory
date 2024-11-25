<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['status'] != 'login') {
    header("Location: formlogin.php");
    exit;
}

include 'koneksi.php'; // Menghubungkan ke database

// Query untuk mengambil data pengguna
$query = mysqli_query($koneksi, "SELECT * FROM login ORDER BY idLogin DESC");

if (!$query) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <!-- Link CSS atau Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Data Pengguna</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Menampilkan data pengguna
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>{$data['username']}</td>
                        <td>{$data['password']}</td>
                        <td>
                            <a href='edit.php?id={$data['idLogin']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id={$data['idLogin']}' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Script JS untuk Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
