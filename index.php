<?php
$servername = "localhost"; // Atur sesuai dengan server database Anda
$username = "root"; // Username database Anda
$password = ""; // Password database Anda
$dbname = "peduli_diri"; // Nama database yang sudah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    // Mengecek apakah NIK atau Nama sudah terdaftar
    $sql = "SELECT * FROM users WHERE id = '$nik' OR name = '$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<script>alert("NIK / Nama sudah terdaftar");</script>';
    } else {
        // Menyimpan data baru ke database
        $sql = "INSERT INTO users (id, name) VALUES ('$nik', '$nama')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Data Berhasil Di Tambahkan");</script>';
        } else {
            echo '<script>alert("Error: " . $conn->error);</script>';
        }
    }
} else if (isset($_POST['masuk'])) {
    error_reporting(0);
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    // Mencari data pengguna di database
    $sql = "SELECT * FROM users WHERE id = '$nik' AND name = '$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $nama;
        header('location: home.php');
    } else {
        echo '<script>alert("Data tidak ditemukan");</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Peduli Diri</title>
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 170px;
        }

        img {
            width: 100%;
            transform: translateY(-55px);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <center><h2 class="font-weight-light text-info">MASUK</h2></center>
                        <h6 class="font-weight-light text-info">Silahkan masuk menggunakan akun yang telah terdaftar.</h6>  
                <form method="POST">
                    <div class="form-group">
                        <label for="nik"></label>
                        <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="nana"></label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <button type="submit" class="btn btn-info text-white" name="masuk">Masuk</button>
                    <div class="text-center mt-4 font-weight-light">
                        Belum mempunyai akun? <a href="register.php" class="text-info">Daftar Sekarang</a>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <img src="assets/img/icon_app.png" alt="">
            </div>
        </div>
    </div>
    <div>
        <footer class="footer">
            <center>
            © 2024 by Muhammad Zulfati</a>
            </center>
        </footer>

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="assets/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="assets/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="assets/js/custom.js"></script>
</body>

</html>
