<?php
// Konfigurasi database
$host = "localhost"; // Host database (biasanya localhost)
$user = "root";      // Username database
$password = "";      // Password database
$database = "cv_devan"; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    //echo "Koneksi berhasil!";
}
?>
