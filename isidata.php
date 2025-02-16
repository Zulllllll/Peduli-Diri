<?php

session_start();
require 'config.php'; // Pastikan file ini berisi koneksi ke database

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];

    // Cek apakah user sudah login
    if (!isset($_SESSION['username'])) {
        $_SESSION['alert'] = ['type' => 'error', 'message' => 'Anda harus login terlebih dahulu!'];
        header("Location: login.php");
        exit;
    }

    $nama = $_SESSION['username'];

    // Query untuk mendapatkan NIK berdasarkan session nama
    $stmt = $conn->prepare("SELECT nik FROM users WHERE nama = ?");
    $stmt->bind_param("s", $nama);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        $_SESSION['alert'] = ['type' => 'error', 'message' => 'Pengguna tidak ditemukan!'];
        header("Location: isidata.php");
        exit;
    }

    $nik = $user['nik'];

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO catatan (nik, nama, tanggal, waktu, lokasi, suhu) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nik, $nama, $tanggal, $waktu, $lokasi, $suhu);

    if ($stmt->execute()) {
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Catatan perjalanan berhasil disimpan.'];
    } else {
        $_SESSION['alert'] = ['type' => 'error', 'message' => 'Gagal menyimpan catatan!'];
    }

    $stmt->close();
    $conn->close();

    header("Location: isidata.php"); // Redirect agar form tidak disubmit ulang saat refresh
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: rgb(36, 149, 255);
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: block;
        }
        .sidebar a:hover {
            background: rgb(30, 130, 230);
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .navbar {
            background: rgb(36, 149, 255);
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4">
            <img src="assets/img/icon_main.png" alt="Logo" width="120">
        </div>
        <a href="home.php"><i class="fa fa-home me-2"></i>Home</a>
        <hr>
        <a href="catatan.php"><i class="fa fa-book me-2"></i>Catatan Perjalanan</a>
        <hr>
        <a href="isidata.php"><i class="fa fa-edit me-2"></i>Isi Data</a>
        <hr>
        <div class="sidebar-footer text-center">
            <a href="logout.php" class="link" data-toggle="tooltip" title="Logout">
                <i class="mdi mdi-power"></i> Logout
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Peduli Diri</a>
                <div class="ms-auto text-white">
                    <i class="fa fa-user-circle"></i> <?php echo $_SESSION['username']; ?>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h4 class="mb-3">Isi Data Perjalanan</h4>
            <div class="card p-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Jam</label>
                        <input type="time" class="form-control" name="waktu" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Yang Dikunjungi</label>
                        <input type="text" class="form-control" name="lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="suhu" class="form-label">Suhu Tubuh</label>
                        <input type="text" class="form-control" name="suhu" required>
                    </div>
                    <button type="submit" name="simpan" class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(36, 149, 255);">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Cek apakah ada session alert
        <?php if (isset($_SESSION['alert'])) : ?>
            Swal.fire({
                title: "<?php echo $_SESSION['alert']['type'] === 'success' ? 'Berhasil!' : 'Gagal!'; ?>",
                text: "<?php echo $_SESSION['alert']['message']; ?>",
                icon: "<?php echo $_SESSION['alert']['type']; ?>",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
            <?php unset($_SESSION['alert']); // Hapus session alert setelah ditampilkan ?>
        <?php endif; ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
