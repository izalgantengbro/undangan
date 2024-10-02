$servername = "localhost";
$username = "root";      // Ganti dengan nama pengguna MySQL Anda
$password = "password";      // Ganti dengan kata sandi MySQL Anda
$dbname = "undangan";

// Mencoba untuk terhubung ke database MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
