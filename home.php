<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
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
            background:rgb(36, 149, 255);
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .navbar {
            background:rgb(36, 149, 255);
        }
    </style>
</head>

<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="text-center mb-4">
                <img src="assets/img/icon_main.png" alt="Logo" width="120">
            </div>
            <a href="home.php"><i class="fa fa-home me-2"></i>Home</a>
            <hr>
            <a href="catatan.php"><i class="fa fa-book me-2"></i>Catatan Perjalanan</a>
            <hr>
            <a href="isidata.php"><i class="fa fa-edit me-2"></i>Isi Data</a>
            <hr>
        </div>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="logout.php" class="link" data-toggle="tooltip" title="Logout">
                        <i class="mdi mdi-power"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

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
            <h2 class="text-center">Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
            <p class="lead text-center">Di Aplikasi Catatan Perjalanan Peduli Diri</p>

            <div class="row justify-content-center">
                <div class="col-md-6 d-flex">
                    <div class="card shadow-lg h-100">
                        <img src="assets/img/peduli.png" class="card-img-top" alt="Self Care">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fw-bold">Belajar Mencintai Diri Sendiri</h5>
                            <p class="card-text flex-grow-1">Self care adalah kegiatan untuk menyeimbangkan hidup dengan memenuhi kebutuhan diri.</p>
                            <a href="https://kumparan.com/isabellaa-putri/belajar-mencintai-diri-sendiri-1voQfI1XEbJ"class="btn mt-auto text-white"style="background-color: rgb(36, 149, 255); border-color: rgb(36, 149, 255);">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 d-flex">
                    <div class="card shadow-lg h-100">
                        <img src="assets/img/corona.png" class="card-img-top" alt="Covid-19">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fw-bold">Pengertian Virus Corona (COVID-19)</h5>
                            <p class="card-text flex-grow-1">Infeksi coronavirus menyebabkan gangguan pernapasan yang berbahaya.</p>
                            <a href="https://kumparan.com/isabellaa-putri/belajar-mencintai-diri-sendiri-1voQfI1XEbJ"class="btn mt-auto text-white"style="background-color: rgb(36, 149, 255); border-color: rgb(36, 149, 255);">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5 py-3 bg-light">
            &copy; 2025 Muhammad Zulfati
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 