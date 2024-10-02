<?php
$servername = "localhost";  // Ganti dengan nama server MySQL Anda jika berbeda
$username = "root";         // Ganti dengan username MySQL Anda
$password = "";             // Ganti dengan password MySQL Anda (kosongkan jika tidak ada)

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memilih database "undangan"
$conn->select_db("undangan");

// Set charset menjadi UTF-8 (opsional)
$conn->set_charset("utf8");

?>
