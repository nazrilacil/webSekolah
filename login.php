<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow">
  <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
  <title>Login Admin | SMK Al-Masturiyah</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  	<script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      lucide.createIcons();
    });
  </script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

  <div class="w-full max-w-md space-y-8 bg-white p-8 shadow-lg rounded-xl">
    <div class="text-center">
      <img class="mx-auto h-16 w-16" src="./uploads/identitas/logo1630507846.png" alt="Logo Sekolah" />
      <h2 class="mt-6 text-2xl font-bold text-gray-800 flex items-center justify-center gap-2">
        <i data-lucide="lock"></i> Login Admin
      </h2>
      <p class="text-sm text-gray-500 mt-1">Silakan masuk untuk mengelola website sekolah</p>
    </div>

    <?php
    if (isset($_GET['msg'])) {
      echo "<div class='bg-red-100 text-red-700 px-4 py-2 rounded text-sm'>" . $_GET['msg'] . "</div>";
    }
    ?>

    <form class="mt-8 space-y-6" method="POST">
      <div class="space-y-4">

        <div>
          <label for="user" class="block text-sm font-medium text-gray-700">Username</label>
          <div class="mt-1 relative">
            <input type="text" name="user" required class="block w-full rounded-md border border-gray-300 py-2 px-3 pl-10 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan username">
            <i data-lucide="user" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
          </div>
        </div>

        <div>
          <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1 relative">
            <input type="password" name="pass" required class="block w-full rounded-md border border-gray-300 py-2 px-3 pl-10 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan password">
            <i data-lucide="key-round" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
          </div>
        </div>
      </div>

      <div>
        <button type="submit" name="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <i data-lucide="log-in" class="w-5 h-5 mr-2"></i> Masuk
        </button>
      </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $user = mysqli_real_escape_string($conn, $_POST['user']);
      $pass = mysqli_real_escape_string($conn, $_POST['pass']);

      $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$user'");
      if (mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_object($cek);
        if (md5($pass) == $d->password) {
          $_SESSION['status_login'] = true;
          $_SESSION['uid'] = $d->id;
          $_SESSION['uname'] = $d->nama;
          $_SESSION['ulevel'] = $d->level;
          echo "<script>window.location='admin/index.php'</script>";
        } else {
          echo "<div class='mt-4 bg-red-100 text-red-700 px-4 py-2 rounded text-sm'>Password salah</div>";
        }
      } else {
        echo "<div class='mt-4 bg-red-100 text-red-700 px-4 py-2 rounded text-sm'>Username tidak ditemukan</div>";
      }
    }
    ?>

    <div class="mt-6 text-center text-sm text-gray-500">
      <a href="index.php" class="text-indigo-600 hover:text-indigo-500 flex items-center justify-center gap-1">
        <i data-lucide="arrow-left"></i> Kembali ke Halaman Utama
      </a>
    </div>
  </div>

</body>

</html>
