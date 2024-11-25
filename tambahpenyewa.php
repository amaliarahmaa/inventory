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
        <h3 class="text-center">Tambah Data Penyewa</h3>
        <form method="post" action="inputpenyewa.php">
            <div class="mb-3">
                <label for="nama_penyewa" class="form-label">Nama</label>
                <input type="text" name="nama_penyewa" class="form-control" id="nama_penyewa" required>
            </div>
            <div class="mb-3">
                <label for="alamat_penyewa" class="form-label">Alamat</label>
                <input type="text" name="alamat_penyewa" class="form-control" id="alamat_penyewa" required>
            </div>
            <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telepon</label>
                <input type="text" name="no_telpon" class="form-control" id="no_telpon" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <button type="submit" class="btn btn-custom">SIMPAN</button>
            <a href="tampildata.php" class="btn btn-back">KEMBALI</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybQlIqZ26eP3QzzP6UrB/1mo8iW9Sm3vPqapFj8v7g3ZB9K3p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/0hYl4jURfxB/D40/kolJ4CqUp/GyId2R/5D0A8" crossorigin="anonymous"></script>
</body>
</html>
