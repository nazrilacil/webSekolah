<?php include 'header.php'; ?>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
  });

  function toggleContent(id) {
    const content = document.getElementById('content-' + id);
    const icon = document.getElementById('icon-' + id);
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  }
</script>

<div class="max-w-5xl mx-auto px-4 py-10 space-y-10">

  <!-- Judul Halaman -->
  <div class="text-center">
    <h1 class="lg:text-4xl text-2xl md:text-3xl font-bold text-blue-700 flex items-center justify-center gap-2">
      <i data-lucide="book-open-check"></i>
    </h1>
    <h2 class="lg:text-4xl text-2xl md:text-3xl font-bold text-blue-700 flex items-center justify-center gap-2"> Dokumentasi Website <?= $d->nama ?></h2>
    <p class="text-gray-600 mt-2">Informasi lengkap tentang pengembangan dan penggunaan website ini.</p>
  </div>

  <!-- Teknologi -->
  <div class="bg-white p-6 rounded-lg shadow space-y-3">
    <h2 class="text-2xl font-semibold flex items-center gap-2 text-gray-800">
      <i data-lucide="cpu"></i> Teknologi yang Digunakan
    </h2>
    <ul class="list-disc list-inside text-gray-700 space-y-1">
      <li><strong>PHP:</strong> Bahasa utama backend website <?= $d->nama ?>.</li>
      <li><strong>MySQL:</strong> DBMS untuk website <?= $d->nama ?>.</li>
      <li><strong>Vue.js:</strong> Untuk antarmuka interaktif dan dinamis.</li>
      <li><strong>Tailwind CSS:</strong> Styling UI dengan utility-first class.</li>
      <li><strong>Framer Motion:</strong> Untuk Animasi Website <?= $d->nama ?>.</li>
    </ul>
  </div>

  <!-- Developer -->
  <div class="bg-white p-6 rounded-lg shadow space-y-6">
    <h2 class="text-2xl font-semibold flex items-center gap-2 text-gray-800">
      <i data-lucide="users"></i> Developer
    </h2>

    <!-- Nazril Acil -->
    <div class="border border-blue-200 rounded-lg overflow-hidden">
      <button onclick="toggleContent('nazril')" class="w-full text-left flex items-center justify-between px-5 py-4 bg-blue-50 hover:bg-blue-100">
        <span class="flex items-center gap-2 text-blue-700 font-semibold">
          <i data-lucide="user-cog"></i> Nazril Acil – CEO & Fronted Developer
        </span>
        <i data-lucide="chevron-down" id="icon-nazril" class="transition-transform"></i>
      </button>
      <div id="content-nazril" class="p-5 text-gray-700 space-y-2 hidden">
        <div class="bg-gray-50 p-4 rounded-md border text-sm leading-relaxed shadow-inner">
          <p><strong>Nazril Acil</strong> adalah seorang <strong>pengembang web</strong> dan pelajar di SMK AL-MASTURIYAH.<br>
        Ia aktif dalam pengembangan frontend dan backend serta UI/UX.</p>
          <p>Beliau juga adalah <a href="https://xtrahera.vercel.app"><strong>pendiri XTRAHERA</strong></a>,<br> penyedia solusi digital premium yang berfokus pada dampak nyata bagi klien.</p>
          <ul class="list-disc list-inside mt-2 space-y-1">
            <li><strong>Peran:</strong> CEO & Frontend Developer</li>
            <li><strong>Keahlian:</strong> Frontend (Vue, React, Astro, NextJS, NuxtJS Tailwind),UI/UX Design</li>
            <li><strong>Lokasi:</strong> Langkaplancar, Jawa Barat</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Safira Aliyah Azmi -->
    <div class="border border-green-200 rounded-lg overflow-hidden">
      <button onclick="toggleContent('safira')" class="w-full text-left flex items-center justify-between px-5 py-4 bg-green-50 hover:bg-green-100">
        <span class="flex items-center gap-2 text-green-700 font-semibold">
          <i data-lucide="user-check"></i> Safira Aliyah Azmi – CMO & Backend Engineer
        </span>
        <i data-lucide="chevron-down" id="icon-safira" class="transition-transform"></i>
      </button>
      <div id="content-safira" class="p-5 text-gray-700 space-y-2 hidden">
        <div class="bg-gray-50 p-4 rounded-md border text-sm leading-relaxed shadow-inner">
          <p><strong>Safira Aliyah Azmi</strong> adalah <a href="https://xtrahera.vercel.app"><strong>CMO di XTRAHERA</strong></a> sekaligus mahasiswa UPI Bandung.</p>
          <p>Beliau ahli dalam pemasaran digital, strategi pertumbuhan, dan backend development.</p>
          <ul class="list-disc list-inside mt-2 space-y-1">
            <li><strong>Peran:</strong> Chief Marketing Officer & Backend Engineer</li>
            <li><strong>Skill Backend:</strong> PHP, Laravel, Flutter, Dart</li>
            <li><strong>Keahlian:</strong> Strategi merek, growth hacking, pemasaran konten, riset pasar</li>
            <li><strong>Karier:</strong> Human Resources di PT Makmur Indo Tunggal (Slimsure)</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Cara Menggunakan Website -->
  <div class="bg-white p-6 rounded-lg shadow space-y-4">
    <h2 class="text-2xl font-semibold flex items-center gap-2 text-gray-800">
      <i data-lucide="layout-dashboard"></i> Cara Menggunakan Website
    </h2>
    <ul class="list-decimal list-inside text-gray-700 space-y-2">
      <li>Pengunjung dapat menelusuri halaman: beranda, jurusan, galeri, berita, kontak.</li>
      <li>Admin masuk melalui halaman login untuk mengelola konten.</li>
      <li>Admin dapat menambahkan, mengedit, dan menghapus informasi melalui dashboard.</li>
      <li>Nama file gambar tidak boleh pakai sepasi jika 2 kata pisahkan pakai - atau _ . <br/> 
      tidak boleh pakai /. jadi ubah dulu nama file gambarnya. tidak boleh pakai tipe gambar webp,<br/> selain webp boleh. asalkan gambar bukan video, ukuran tidak boleh lebih dari 10MB </li>
      <li>Semua gambar disimpan di folder <code>/uploads</code>, dan data di database MySQL.</li>
      <li>UI responsif, mendukung tampilan di mobile dan desktop.</li>
    </ul>
  </div>
<div class="bg-gray-100 p-6 rounded-xl shadow-lg max-w-xl mx-auto mt-8 space-y-4">
  <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
    <i data-lucide="help-circle" class="w-6 h-6 text-blue-600"></i>
    Butuh Bantuan?
  </h2>
  <p class="text-gray-700">
    Jika mengalami masalah, hubungi developer berikut:
  </p>
  
  <ul class="space-y-2">
    <li class="flex items-center gap-3 text-gray-800 ">
      <i data-lucide="user" class="w-5 h-5 text-blue-500"></i>
      Nazril Acil
    </li>
    <li class="flex items-center gap-3 text-gray-800">
      <i data-lucide="user" class="w-5 h-5 text-pink-500"></i>
      Safira Aliyah Azmi
    </li>
  </ul>

  <a href="https://xtrahera.vercel.app" target="_blank"
     class="inline-flex items-center gap-2 text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
    <i data-lucide="globe" class="w-5 h-5"></i>
    Kunjungi Website Developer
  </a>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
