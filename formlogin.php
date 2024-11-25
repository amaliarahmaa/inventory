<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnWheels Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg-img {
            background-image: url('images/loginmobil.jpeg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* Membuat posisi overlay di atas gambar */
        }

        .bg-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Gelapkan background dengan warna hitam dan opacity 0.5 */
            z-index: 1; /* Menempatkan overlay di atas gambar */
        }

        .login-container {
            background-color: rgba(57, 74, 86, 0.85); /* Dark semi-transparent background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            color: #ffffff;
            width: 100%;
            max-width: 400px;
            z-index: 2; /* Menempatkan form di atas overlay */
        }

        .login-container h2 {
            color: #ffca2c;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            color: #ffca2c;
        }

        .btn-primary {
            background-color: #ffca2c;
            border-color: #ffca2c;
            color: #394a56;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #e6b323;
            border-color: #e6b323;
        }
    </style>
</head>
<body>
    <div class="bg-img">
        <div class="login-container">
            <h2>Welcome to OnWheels</h2>
            <form action="ceklogin.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
