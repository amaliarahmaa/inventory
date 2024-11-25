<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            background-color: #2C6485; /* Warna abu-abu */
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Tambah Data Pengguna</h3>
        <form method="post" action="inputuser.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-custom">SIMPAN</button>
            <a href="datapengguna.php" class="btn btn-back">KEMBALI</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybQlIqZ26eP3QzzP6UrB/1mo8iW9Sm3vPqapFj8v7g3ZB9K3p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/0hYl4jURfxB/D40/kolJ4CqUp/GyId2R/5D0A8" crossorigin="anonymous"></script>
</body>
</html>
