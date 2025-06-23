
<?php include 'header.php'; ?>

<!-- Konten Dashboard -->
<main class="flex-1 p-6 bg-gray-50 min-h-screen overflow-x-hidden">
    <h1 class="text-2xl font-bold mb-4 mt-6">Selamat Datang <span class="text-blue-600"><?= $_SESSION['uname'] ?></span> di Dashboard <?php echo ucfirst($_SESSION['ulevel']); ?></h1>
<div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
<div class="lg:col-span-2 bg-white text-gray-700 border border-blue-gray-100 rounded-xl shadow-sm">
<a href="documentasi.php">
  <div class="relative flex items-start gap-4 p-4">

    <!-- Ikon kiri -->
    <div class="flex-shrink-0 bg-gradient-to-tr from-red-900 to-red-800 text-white rounded-xl grid place-items-center h-12 w-12 shadow">
      <i data-lucide="book-alert"></i>
    </div>

    <!-- Teks kanan -->
    <div class="flex flex-col items-end text-right w-full">
      <p class="text-sm text-red-500 mt-1">
        Harap baca dokumentasi terlebih dahulu untuk cara penggunaan!
      </p>
      <h4 class="text-2xl font-semibold text-blue-gray-900">
        Documentasi
      </h4>
    </div>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-green-500 leading-relaxed font-normal text-blue-gray-600">Baca Sekarang</p>
  </div>
  <!-- Footer -->

</a>

    </div>
    <a href="slider.php">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                <div class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                    <i data-lucide="gallery-horizontal"></i>
                </div>
                <div class="p-4 text-right">
                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Klik Untuk CRUD</p>
                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Slider</h4>
                </div>
                <div class="border-t border-blue-gray-50 p-4">
                    <p class="block antialiased font-sans text-green-500 leading-relaxed font-normal text-blue-gray-600">Lihat Detail</p>
                </div>
            </div>
    </a>

    </div>
<div class="mb-12 mt-4 grid grid-cols-1 gap-6 lg:grid-cols-4 lg:gap-8">
    <a href="Informasi.php">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                <div class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                    <i data-lucide="badge-info"></i>
                </div>
                <div class="p-4 text-right">
                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Klik Untuk CRUD</p>
                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Informasi</h4>
                </div>
                <div class="border-t border-blue-gray-50 p-4">
                    <p class="block antialiased font-sans text-green-500 leading-relaxed font-normal text-blue-gray-600">Lihat Detail</p>
                </div>
            </div>
    </a>

    <a href="galeri.php">
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
            <div class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                <i data-lucide="images"></i>
            </div>
            <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Klik Untuk CRUD</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Galeri</h4>
            </div>
            <div class="border-t border-blue-gray-50 p-4">
                <p class="block antialiased font-sans text-green-500 leading-relaxed font-normal text-blue-gray-600">Lihat Detail</p>
            </div>
        </div>
    </a>
    <a href="jurusan.php">

        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
            <div class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                <i data-lucide="graduation-cap"></i>
            </div>
            <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Klik Untuk CRUD</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Jurusan</h4>
            </div>
            <div class="border-t border-blue-gray-50 p-4">
                <p class="block antialiased font-sans text-green-500 leading-relaxed font-normal text-blue-gray-600">Lihat Detail</p>
            </div>
        </div>
    </a>
    <a href="identitas-sekolah.php">

        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
            <div class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                <i data-lucide="school"></i>
            </div>
            <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Klik Untuk CRUD</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">identitas</h4>
            </div>
            <div class="border-t border-blue-gray-50 p-4">
                <p class="block antialiased font-sans text-green-500 leading-relaxed font-normal text-blue-gray-600">Lihat Detail</p>
            </div>
        </div>
        </a>
</div>
    <!-- Statistik Contoh -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Statistik Kehadiran</h2>
            <div class="relative w-full h-64">
                <canvas id="chartKehadiran" class="absolute inset-0 w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Pertumbuhan</h2>
            <div class="relative w-full h-64">
                <canvas id="chartPertumbuhan" class="absolute inset-0 w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <?php if ($_SESSION['ulevel'] == 'Super Admin') : ?>
    <!-- Hanya untuk Super Admin -->
    <div class="mt-10">
        <h2 class="text-xl font-semibold mb-4">Daftar Pengguna</h2>
        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-white rounded shadow">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">Username</th>
                        <th class="px-4 py-2 text-left">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $users = mysqli_query($conn, "SELECT * FROM pengguna ORDER BY id DESC");
                    while($u = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo htmlspecialchars($u['username']); ?></td>
                        <td class="border px-4 py-2"><?php echo ucfirst(htmlspecialchars($u['level'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</main>

<script>
    const ctx1 = document.getElementById('chartKehadiran');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Kehadiran (%)',
                data: [98, 96, 93, 95, 92],
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    const ctx2 = document.getElementById('chartPertumbuhan');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['A', 'B', 'C', 'D'],
            datasets: [{
                data: [20, 30, 25, 25],
                backgroundColor: ['#0ea5e9', '#10b981', '#facc15', '#f43f5e']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
</div>
<?php include 'footer.php'; ?>
