<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; // Ganti sesuai dengan password MySQL Anda
$dbname = "my_database"; // Ganti dengan nama database yang telah Anda buat

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Menghindari SQL Injection
    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    // Mengambil data pengguna dari database
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, memverifikasi password
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            // Password benar, mulai sesi
            $_SESSION['username'] = $user;
            header("Location: index.php"); // Mengarahkan ke halaman utama
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "Invalid username or password!";
    }
}

// Menutup koneksi
$conn->close();
?>
