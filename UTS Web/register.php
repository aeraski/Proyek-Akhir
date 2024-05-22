<?php
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

    // Mengenkripsi password (opsional, tapi direkomendasikan)
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Memasukkan data pengguna ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
