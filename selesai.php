<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Selesai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40; /* Warna teks utama */
            font-family: 'Montserrat', sans-serif; /* Font family Montserrat */
        }
        .container {
            margin-top: 50px;
            text-align: center;
        }
        .jumbotron {
            background-color: #007bff; /* Warna latar belakang jumbotron */
            color: #fff; /* Warna teks jumbotron */
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .jumbotron h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .lead {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .btn {
            font-size: 1.1rem;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #28a745; /* Warna latar tombol utama */
            border-color: #28a745; /* Warna border tombol utama */
        }
        .btn-primary:hover {
            background-color: #218838; /* Warna latar tombol utama saat hover */
            border-color: #1e7e34; /* Warna border tombol utama saat hover */
        }
        .btn-secondary {
            background-color: #6c757d; /* Warna latar tombol sekunder */
            border-color: #6c757d; /* Warna border tombol sekunder */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Warna latar tombol sekunder saat hover */
            border-color: #545b62; /* Warna border tombol sekunder saat hover */
        }

        /* Responsiveness */
        @media (max-width: 576px) {
            .jumbotron {
                padding: 1.5rem;
            }
            .jumbotron h1 {
                font-size: 2rem;
            }
            .lead {
                font-size: 1rem;
            }
            .btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Reservasi Anda Telah Terkirim</h1>
            <p class="lead">Terima kasih telah melakukan reservasi. Kami akan segera mengkonfirmasi melalui kontak yang Anda berikan.</p>
            <a href="index.html" class="btn btn-primary">Logout</a>
            <a href="undangan.html" class="btn btn-secondary">Kembali ke undangan</a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
