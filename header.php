<?php
include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SMK Al-Masturiyah Langkaplancar" />
<meta name="robots" content="index, follow" />

     <meta name="description" content="Website resmi SMK Al-Masturiyah Langkaplancar. Menyediakan informasi seputar jurusan, kegiatan OSIS, galeri, kontak, dan informasi penting lainnya." />
<meta name="keywords" content="SMK Al-Masturiyah, Sekolah Menengah Kejuruan, SMK Langkaplancar, Pendidikan, Jurusan SMK, PPDB SMK, OSIS SMK, Sekolah Langkaplancar, Smk Al Masturiyah Pangandaran, SMK AL-MASTURIYAH, Al Masturiyah, Altur, Website Smk Al Masturiyah, Smk Pangandaran, OSIS Altur, OSIS SMK AL-MASTURIYAH, SMK AL-MASTURIYAH LANGKAPLANCAR" />
<meta name="robots" content="index, follow" />
<meta name="language" content="id" />
<meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#111827" media="(prefers-color-scheme: dark)">

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://osissmkalmasturiyah.42web.io/">
<meta property="og:type" content="website">
<meta property="og:title" content='<?= isset($title) ? $title : "$d->nama" ?>'>
<meta property="og:description" content="Sekolah Menengah Kejuruan dengan berbagai jurusan yang dapat Anda pilih sesuai minat dan bakat Anda.">
<meta property="og:image" content="https://osissmkalmasturiyah.42web.io/og-image.jpg">
<meta property="og:site_name" content="SMK Al-Masturiyah" />

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="osissmkalmasturiyah.42web.io">
<meta property="twitter:url" content="https://osissmkalmasturiyah.42web.io/">
<meta name="twitter:title" content="<?= isset($title) ? $title : '$d->nama' ?>">
<meta name="twitter:description" content="Sekolah Menengah Kejuruan dengan berbagai jurusan yang dapat Anda pilih sesuai minat dan bakat Anda.">
<meta name="twitter:image" content="https://osissmkalmasturiyah.42web.io/og-image.jpg">
	<link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
	<title><?= isset($title) ? $title : "$d->nama" ?></title>
	<link rel="stylesheet" type="text/css" href="src/css/global.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
	<script>
		tailwind.config = {
			darkMode: 'class',
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/fuse.js/dist/fuse.min.js"></script>
</head>

<body class="bg-white dark:bg-gray-900 text-black dark:text-white transition-colors ease-in-out duration-300">

	<header class="bg-white dark:bg-gray-900 shadow-lg transition-colors ease-in-out duration-300 sticky top-0 z-50">
		<div class="relative z-60 mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
			<div class="flex h-16 items-center justify-between">
				<div class="md:flex md:items-center md:gap-12">
					<a class="block text-teal-600 dark:text-teal-600" href="#">
						<span class="sr-only">Home</span>
						<img src="uploads/identitas/<?= $d->logo ?>" class="h-8">
						<!-- <h2><a href="index.php"><?= $d->nama ?></a></h2> -->
					</a>
				</div>

				<div class="hidden md:block">
					<nav aria-label="Global">
						<ul class="flex items-center gap-6 text-sm">
							<li>
								<a
									class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
									href="index.php">
									<i data-lucide="house" class="mx-auto"></i>
									Beranda
								</a>
							</li>

							<li>
								<a
									class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
									href="tentang-sekolah.php">
									<i data-lucide="school" class="mx-auto"></i>
									Tentang Sekolah
								</a>
							</li>

							<li>
								<a
									class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
									href="jurusan.php">
									<i data-lucide="graduation-cap" class="mx-auto"></i>
									Jurusan
								</a>
							</li>

							<li>
								<a
									class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
									href="galeri.php">
									<i data-lucide="images" class="mx-auto"></i>
									Galeri
								</a>
							</li>

							<li>
								<a
									class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
									href="informasi.php">
									<i data-lucide="info" class="mx-auto"></i>
									Informasi
								</a>
							</li>

							<li>
								<a
									class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
									href="kontak.php">
									<i data-lucide="contact" class="mx-auto"></i>
									Kontak
								</a>
							</li>
						</ul>
					</nav>
				</div>

				<div class="flex items-center gap-4">
					<div class="sm:flex sm:gap-4">
						<button
							class="rounded-md bg-teal-600 px-3 py-2.5 text-sm font-medium text-white shadow-sm dark:hover:bg-teal-500 transition duration-300 ease-in-out"
							id="btn">
							<span id="sunIcon" class="hidden"><i data-lucide="sun"></i></span>
							<span id="moonIcon" class=""><i data-lucide="moon-star"></i></span>
						</button>
						<button id="openSearch" class="bg-white lg:ml-0 ml-2 px-3 py-2.5 rounded-full shadow-md hover:bg-gray-100 text-gray-950 dark:text-white dark:hover:bg-gray-700 dark:bg-gray-800 ">
							<i data-lucide="search"></i>
						</button>


						<!-- Search Modal -->
						<div id="searchModal" class="fixed inset-0 z-40 bg-black/50 hidden items-center justify-center">
							<div class="bg-gray-500/50 dark:bg-gray-950/50 backdrop-blur-sm max-w-xl mx-auto rounded-xl shadow-lg p-6 relative">
								<button id="closeSearch" class="absolute top-2 right-2 dark:text-gray-500 text-gray-950 hover:text-red-500">
									<i data-lucide="x"></i>
								</button>
								<h2 class="text-xl text-gray-950 dark:text-white font-semibold mb-4">Cari Informasi atau Jurusan</h2>
								<input type="text" id="searchInput" placeholder="Ketik sesuatu..." class="w-full border bg-white/50 dark:bg-gray-900/50 border-gray-300 rounded px-4 py-2 mb-4 focus:outline-none focus:ring focus:border-blue-400" />
								<ul id="resultsList" class="space-y-4 max-h-64 overflow-y-auto bg-gray-500/50 dark:bg-gray-950/50 backdrop-blur-sm"></ul>
							</div>
						</div>
					</div>

					<div class="block md:hidden">
						<button id="menu-btn"
							class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75">
							<span class="hamburger-top block w-6 h-0.5 dark:bg-gray-100 bg-gray-900 transition duration-300"></span>
							<span class="hamburger-middle block w-6 h-0.5 dark:bg-gray-100 mt-1.5 bg-gray-900 transition duration-300"></span>
							<span class="hamburger-bottom block w-6 h-0.5 dark:bg-gray-100 mt-1.5 bg-gray-900 transition duration-300"></span>
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- box menu mobile -->
		<nav class="hidden z-10 menu bg-white dark:bg-gray-900 p-4 absolute top-16 left-0 w-full " id="menu">
			<ul class="space-y-4 text-center">
				<li>
					<a
						href="index.php"
						class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-500 dark:hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200">
						<i data-lucide="house" class="mx-auto"></i>
						Beranda
					</a>
				</li>

				<li>
					<a
						href="tentang-sekolah.php"
						class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-500 dark:hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200">
						<i data-lucide="school" class="mx-auto"></i>
						Tentang Sekolah
					</a>
				</li>

				<li>
					<a
						href="jurusan.php"
						class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-500 dark:hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200">
						<i data-lucide="graduation-cap" class="mx-auto"></i>
						Jurusan
					</a>
				</li>

				<li>
					<a
						href="galeri.php"
						class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-500 dark:hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200">
						<i data-lucide="images" class="mx-auto"></i>
						Galeri
					</a>
				</li>

				<li>
					<a
						href="informasi.php"
						class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-500 dark:hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200">
						<i data-lucide="info" class="mx-auto"></i>
						Informasi
					</a>
				</li>
				<li>
					<a
						href="kontak.php"
						class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-500 dark:hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200">
						<i data-lucide="contact" class="mx-auto"></i>
						Kontak
					</a>
				</li>
			</ul>
		</nav>
	</header>
<script>
  const openBtn = document.getElementById('openSearch');
  const closeBtn = document.getElementById('closeSearch');
  const modal = document.getElementById('searchModal');
  const input = document.getElementById('searchInput');
  const resultList = document.getElementById('resultsList');

  let data = [];

  fetch('data.php')
    .then(res => res.json())
    .then(json => {
      data = json;

      const fuse = new Fuse(data, {
        keys: ['judul', 'keterangan'],
        threshold: 0.4,
      });

      input.addEventListener('input', function () {
        const keyword = this.value.trim();
        resultList.innerHTML = '';

        if (keyword.length > 1) {
          const results = fuse.search(keyword);
          if (results.length === 0) {
            resultList.innerHTML = `<li class="text-gray-500 text-center">Tidak ditemukan.</li>`;
          }

          results.forEach(({ item }) => {
            let li = document.createElement('li');
            li.className = "p-3 border rounded-lg hover:bg-gray-50/50 dark:hover:bg-gray-700 cursor-pointer flex gap-4 items-start";

            // Konten gambar langsung (gunakan Fancybox)
            if (item.tipe === 'gambar') {
              li.innerHTML = `
                <a data-fancybox="gallery" href="${item.gambar}" class="flex gap-4 items-start">
                  <img src="${item.gambar}" alt="Gambar" class="w-16 h-16 object-cover rounded-md">
                  <div>
                    <p class="text-sm text-blue-600 font-semibold">[Gambar]</p>
                    <h3 class="text-lg text-gray-900 dark:text-white font-bold">${item.judul}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">${item.keterangan.substring(0, 100)}...</p>
                  </div>
                </a>
              `;
            } else {
              // Untuk informasi atau jurusan
              const detailLink = item.tipe === 'informasi'
                ? `detail-informasi.php?id=${item.id}`
                : `detail-jurusan.php?id=${item.id}`;

              li.innerHTML = `
                <img src="${item.gambar}" alt="Gambar" class="w-16 h-16 object-cover rounded-md">
                <div>
                  <p class="text-sm text-blue-600 font-semibold">[${item.tipe}]</p>
                  <h3 class="text-lg text-gray-900 dark:text-white font-bold">${item.judul}</h3>
                  <p class="text-sm text-gray-600 dark:text-gray-300">${item.keterangan.substring(0, 100)}...</p>
                </div>
              `;
              li.onclick = () => window.location.href = detailLink;
            }

            resultList.appendChild(li);
          });

          // Inisialisasi ulang fancybox jika dibutuhkan (opsional)
          if (typeof Fancybox !== 'undefined') {
            Fancybox.bind('[data-fancybox="gallery"]');
          }
        }
      });
    });

  openBtn.onclick = () => {
    modal.classList.remove('hidden');
    input.focus();
  };

  closeBtn.onclick = () => {
    modal.classList.add('hidden');
    input.value = '';
    resultList.innerHTML = '';
  };
</script>

    <script type="text/javascript" src="src/js/script.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
	lucide.createIcons();
</script>
<script>
	const btn = document.getElementById('btn');
	const html = document.documentElement;
	const sunIcon = document.getElementById('sunIcon');
	const moonIcon = document.getElementById('moonIcon');

	if (localStorage.getItem('theme') === 'dark') {
		html.classList.add('dark');
		sunIcon.classList.remove('hidden');
		moonIcon.classList.add('hidden');
	} else {
		html.classList.remove('dark');
		sunIcon.classList.add('hidden');
		moonIcon.classList.remove('hidden');
	}

	btn.addEventListener('click', () => {
		html.classList.toggle('dark');

		const isDark = html.classList.contains('dark');
		localStorage.setItem('theme', isDark ? 'dark' : 'light');

		sunIcon.classList.toggle('hidden', !isDark);

		moonIcon.classList.toggle('hidden', isDark);
	});
</script>
<script>
	Fancybox.bind("[data-fancybox]", {});
</script>