<?php

include 'koneksi.php';


$sql = "SELECT * FROM reservasi";
$result = $conn->query($sql);


$reservations = [];
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
        if (!empty($row['message'])) {
            $messages[] = ['name' => $row['name'], 'message' => $row['message']];
        }
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Reservasi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .table {
            margin-top: 20px;
        }
        .btn-delete {
            font-size: 0.875rem;
        }
        .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
            margin-left: 10px;
        }
        .btn-logout:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .marquee-wrapper {
            width: 40%;
            padding: 2px 10px;
            border-radius: 5px;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            background-color: #000000;
            color: #fff;
            margin: 9px auto;
        }
        .marquee {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            animation: scroll-left 5s linear infinite;
        }
        .admin-title {
            color: #fff;
            font-weight: bold;
        }
        .table-responsive {
            border-radius: 8px;
            overflow-x: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .table {
            border-radius: 8px;
        }
        .table thead {
            background-color: #343a40;
            color: #fff;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table td {
            color: #495057;
        }
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 10px;
            }
            .logo {
                max-width: 120px;
            }
            .marquee-wrapper {
                width: 80%;
                padding: 8px 12px;
            }
            .btn-delete, .btn-logout {
                font-size: 0.75rem;
            }
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container main-content">
        <div class="logo-container">
            <img src="assets/img/in.png" class="logo img-fluid" alt="Logo">
        </div>
        
        <h1 class="my-4 text-dark">Daftar Reservasi</h1>
        <div class="d-flex justify-content-start mb-3">
            <a href="admin.php" id="btn-reload" class="btn btn-success btn-sm">Reload</a>
            <a href="index.html" class="btn btn-logout btn-sm">Logout</a>
        </div>

        <div class="marquee-wrapper">
            <div class="marquee">
                <span class="admin-title">Lakukan reload setiap saat untuk melihat update terbaru</span>
            </div>
        </div>
        
        <div class="table-responsive table-container">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kehadiran</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($reservations)) {
                        foreach ($reservations as $reservation) {
                            echo "<tr>
                                    <td>{$reservation['name']}</td>
                                    <td>{$reservation['address']}</td>
                                    <td>{$reservation['phone']}</td>
                                    <td>{$reservation['date']}</td>
                                    <td>{$reservation['time']}</td>
                                    <td>{$reservation['attendance']}</td>
                                    <td>
                                        <form action='delete_reservation.php' method='POST' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus reservasi ini?\");'>
                                            <input type='hidden' name='id' value='{$reservation['id']}'>
                                            <button type='submit' class='btn btn-danger btn-sm btn-delete'>Hapus</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Belum ada reservasi.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h2 class="my-4 text-dark">Ucapan</h2>
        <div class="table-responsive table-container">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Ucapan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($messages)) {
                        foreach ($messages as $message) {
                            echo "<tr>
                                    <td>{$message['name']}</td>
                                    <td>{$message['message']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>Belum ada ucapan selamat.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const reloadBtn = document.getElementById('btn-reload');

        reloadBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.reload();
        });
    </script>
</body>
</html>
