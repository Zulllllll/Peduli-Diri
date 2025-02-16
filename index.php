<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];

  // Pastikan input tidak kosong
  if (!empty($nik) && !empty($nama)) {
    $_SESSION['username'] = $nama; // Simpan nama pengguna dalam session

    // Redirect ke home.php
    header("Location: home.php");
    exit();
  } else {
    echo "Harap isi NIK dan Nama Lengkap!";
  }
}
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
  <div class="flex min-h-screen items-center justify-center bg-white px-6 py-12">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
      <div class="text-center">
        <img src="assets/img/icon_app.png" alt="Your Company" class="mx-auto w-20 h-20">
        <h2 class="mt-6 text-2xl font-bold text-gray-900">MASUK</h2>
      </div>

      <form class="mt-6 space-y-4" action="#" method="POST">
        <div>
          <label for="nik" class="block text-sm font-medium text-gray-900">Nomor Induk Kependudukan</label>
          <input type="text" name="nik" id="nik" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
          <label for="nama" class="block text-sm font-medium text-gray-900">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
          <button type="submit" class="w-full rounded-md bg-sky-500 px-3 py-2 text-white font-semibold hover:bg-sky-400 focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">Masuk</button>
        </div>
      </form>
      <div class="text-center mt-6">
            <p class="text-sm text-gray-600">Belum punya akun? 
              <a href="register.php" class="text-sky-500 font-medium hover:text-sky-600 hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>
  </div>

  <div>
    <footer class="w-full bg-blue-600 text-white py-4 text-center">
      © 2025 by Muhammad Zulfati
    </footer>
  </div>

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

    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>