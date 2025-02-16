<?php
$host = "localhost"; // Sesuaikan dengan host database
$user = "root"; // Sesuaikan dengan username MySQL
$pass = ""; // Sesuaikan dengan password MySQL (kosong jika default)
$dbname = "peduli_diri"; 

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
