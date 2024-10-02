<?php
// Include file koneksi
include 'koneksi.php';

// Mengecek apakah request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir dan membersihkannya
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $attendance = mysqli_real_escape_string($conn, $_POST['attendance']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Membuat prepared statement
    $stmt = $conn->prepare("INSERT INTO reservasi (name, address, phone, date, time, attendance, message) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $address, $phone, $date, $time, $attendance, $message);

    // Menjalankan query
    if ($stmt->execute()) {
        // Redirect ke halaman 'selesai.php' jika berhasil
        header("Location: selesai.php");
        exit;
    } else {
        // Tampilkan pesan error jika terjadi kesalahan
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>
