<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION['status_login'])) {
    echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
    exit();
}
$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Panel Admin - <?= $d->nama ?></title>
  <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
  <link rel="stylesheet" href="../src/css/global.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    @media (max-width: 768px) {
      .sidebar-desktop { display: none; }
      .sidebar-mobile { display: block; }
    }
    @media (min-width: 768px) {
      .sidebar-desktop { display: block; }
      .sidebar-mobile { display: none; }
    }
  </style>
</head>
<body>
<div class="flex">

<!-- Sidebar Desktop -->
<aside class="sidebar-desktop w-64 h-screen bg-white border-r border-gray-200 p-4">
  <h2 class="text-xl font-bold mb-6">Menu</h2>
  <ul class="space-y-2 text-gray-700">
    <li><a href="index.php" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100"><i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard</a></li>
    <li><a href="identitas-sekolah.php" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100"><i data-lucide="building"></i> Identitas Sekolah</a></li>
    <li><a href="slider.php" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100"><i data-lucide="images"></i> Slider</a></li>
    <li><a href="tentang-sekolah.php" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100"><i data-lucide="school"></i> Tentang Sekolah</a></li>
    <li><a href="documentasi.php" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100"><i data-lucide="file-text"></i> Documentasi</a></li>
    <?php if ($_SESSION['ulevel'] == 'superadmin') : ?>
    <li><a href="pengguna.php" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100"><i data-lucide="users"></i> Pengguna</a></li>
    <?php endif; ?>
    <li><a href="logout.php" class="flex items-center gap-2 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200"><i data-lucide="log-out"></i> Logout</a></li>
  </ul>
</aside>

<!-- Tombol Toggle Sidebar Mobile -->
<div class="md:hidden fixed top-0 left-2 z-50 p-4">
<button id="menu-btn"
									class="absolute rounded-sm bg-black p-2 text-blue-600 shadow-md transition hover:text-gray-100/75 bg-gray-100 text-white z-70 hover:text-white/75">
									<span class="hamburger-top block w-6 h-0.5 bg-gray-800 transition duration-300"></span>
									<span class="hamburger-middle block w-6 h-0.5 bg-gray-800 mt-1.5 transition duration-300"></span>
									<span class="hamburger-bottom block w-6 h-0.5 bg-gray-800 mt-1.5 transition duration-300"></span>
								</button>

</div>

<!-- Sidebar Mobile -->
<aside id="menu" class="menu hidden relative top-0 left-0 z-10 h-230 w-64 bg-white p-4 w-screen sticky">
  <div class="flex justify-end items-center mb-4">
    <h2 class="text-lg font-bold">Menu</h2>
  </div>
  <ul class="space-y-2 text-gray-700">
    <li><a href="index.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="layout-dashboard"></i> Dashboard</a></li>
    <li><a href="identitas-sekolah.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="building"></i> Identitas Sekolah</a></li>
    <li><a href="slider.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="gallery-horizontal"></i> Slider</a></li>
    <li><a href="galeri.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="images"></i> Galeri</a></li>
    <li><a href="tentang-sekolah.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="school"></i> Tentang Sekolah</a></li>
    <li><a href="documentasi.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="file-text"></i> Documentasi</a></li>
    <li><a href="jurusan.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="graduation-cap"></i> Jurusan</a></li>
    <li><a href="informasi.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="badge-info"></i> informasi</a></li>
    <li>
							<details class="group [&_summary::-webkit-details-marker]:hidden">
								<summary
									class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
									<span class="text-sm font-medium"><i data-lucide="circle-user"></i> Account </span>

									<span class="shrink-0 transition duration-300 group-open:-rotate-180">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											class="size-5"
											viewBox="0 0 20 20"
											fill="currentColor">
											<path
												fill-rule="evenodd"
												d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
												clip-rule="evenodd" />
										</svg>
									</span>
								</summary>

								<ul class="mt-2 space-y-1 px-4">
									<li>
										<p
											class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500">
											<i data-lucide="user-round"></i> <?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)
										</p>
									</li>

									<li>
										<a
											href="ubah-password.php"
											class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
											<i data-lucide="user-pen"></i> Ubah Password
										</a>
									</li>
    <li><a href="logout.php" class="flex items-center gap-2 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200"><i data-lucide="log-out"></i> Logout</a></li>

								</ul>
							</details>
						</li>
    <?php if ($_SESSION['ulevel'] == 'Super Admin') : ?>
    <li><a href="pengguna.php" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i data-lucide="users"></i> Pengguna</a></li>
    <?php endif; ?>
  </ul>
</aside>

<!-- JS Toggle dan Lucide -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('openMenu').addEventListener('click', () => {
      document.getElementById('menuMobile').classList.remove('hidden');
    });
    document.getElementById('closeMenu').addEventListener('click', () => {
      document.getElementById('menuMobile').classList.add('hidden');
    });

    lucide.createIcons(); // Load all lucide icons
  });
</script>
