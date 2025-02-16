<?php
require 'config.php';

// Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['daftar'])) {
    $nik = trim($_POST['nik']);
    $nama = trim($_POST['nama']);

    // Cek apakah NIK sudah terdaftar
    $stmt = $conn->prepare("SELECT * FROM users WHERE nik = ?");
    if (!$stmt) {
        die("Query Error: " . $conn->error);
    }
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

    if ($result->num_rows == 0) {
        // Jika belum terdaftar, tambahkan ke database
        $stmt = $conn->prepare("INSERT INTO users (nik, nama) VALUES (?, ?)");
        if (!$stmt) {
            die("Query Error: " . $conn->error);
        }
        $stmt->bind_param("ss", $nik, $nama);

        if ($stmt->execute()) {
            echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Pendaftaran Berhasil!',
                            text: 'Anda akan diarahkan ke halaman login.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.replace('index.php');
                        });
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan, coba lagi.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        }
    } else {
        // Jika NIK sudah ada, langsung arahkan ke login
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Akun Sudah Terdaftar!',
                        text: 'Anda akan diarahkan ke halaman login.',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.replace('index.php');
                    });
                });
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Peduli Diri</title>
    <link href="assets/css/style.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <center>
                    <h2 class="font-weight-light text-info">DAFTAR</h2>
                    <h6 class="font-weight-light text-info">Silahkan lakukan pendaftaran untuk melanjutkan.</h6>
                </center>

                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" required>
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <button type="submit" class="btn btn-info text-white" name="daftar">Daftar</button>
                    <div class="text-center mt-4 font-weight-light">
                        Sudah punya akun? <a href="index.php" class="text-info">Login Sekarang</a>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <img src="assets/img/icon_app.png" alt="Logo">
            </div>
        </div>
    </div>

    <footer class="footer">
        <center>© 2025 by Muhammad Zulfati</center>
    </footer>

    <!-- Jquery dan Bootstrap -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
