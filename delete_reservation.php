<?php
// delete_reservation.php

// Masukkan file koneksi
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan id yang diterima aman untuk digunakan dalam query
    $id = $_POST['id'];

    // Buat query DELETE
    $sql = "DELETE FROM reservasi WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman 'selesai_delete.php'
        header("Location: selesai_delete.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
