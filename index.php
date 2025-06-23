	<?php 
    include 'koneksi.php';
    $title = "Beranda | $d->nama";
    include 'header.php';
	include 'slider.php'; ?>
	<!-- bagian banner -->
	<section class="bg-gray-50 dark:bg-gray-900">
		<div class="p-8 md:p-12 lg:px-14">
			<div class="mx-auto max-w-full text-center">
				<h2 class="text-1xl font-bold text-gray-900 md:text-3xl dark:text-white">
					Selamat Datang di <span class="text-teal-600"><?= $d->nama ?></span>
				</h2>

				<p class="text-gray-500 sm:mt-4 sm:block dark:text-gray-400">
					Sekolah Menengah Kejuruan dengan berbagai jurusan yang dapat Anda pilih sesuai minat dan bakat Anda.
				</p>
				<!-- bagian sambutan -->
				<h3 class="font-bold text-1xl mb-4 mt-8">Sambutan <span class="text-teal-600">Kepala Sekolah</span></h3>
				<article
					class="max-w-lg mx-auto overflow-hidden rounded-lg border border-gray-100 bg-white shadow-xs dark:border-gray-800 dark:bg-gray-900 dark:shadow-gray-700/25 hover:shadow-lg"
					data-aos="fade-down"
					data-aos-easing="linear"
					data-aos-duration="1500">

					<img class="mx-auto mt-2 rounded-full object-cover h-40 w-40" src="uploads/identitas/<?= $d->foto_kepsek ?>" width="100">
					<div class="p-4 sm:p-6">
						<a href="#">
							<h3 class="text-lg font-medium text-gray-900 dark:text-white">
								<?= $d->nama_kepsek ?>
							</h3>
						</a>

						<p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500 dark:text-gray-400">
							<?= $d->sambutan_kepsek ?>

						</p>
					</div>
				</article>
			</div>
		</div>
	</section>
	<!-- bagian jurusan -->
	<h3 class="font-bold text-lg text-4xl md:text-5xl mb-4 mt-4 text-center" data-aos="zoom-in-up">Jurusan</h3>
	<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-6 lg:p-4 md:p-8 p-10" id="jurusan">

		<?php
		$jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");
		if (mysqli_num_rows($jurusan) > 0) {
			while ($j = mysqli_fetch_array($jurusan)) {
		?>
				<div class="container">

					<div
						class="max-w-lg overflow-hidden rounded-lg border border-gray-100 bg-white shadow-xs dark:border-gray-800 dark:bg-gray-900 dark:shadow-gray-700/25"
						data-aos="fade-up"
						data-aos-duration="300">
						<img
							alt="<?= $j['nama'] ?>"
							src="uploads/jurusan/<?= $j['gambar'] ?>"
							class="h-56 w-full object-cover" />

						<div class="p-4 sm:p-6"
							data-aos="fade-right"
							data-aos-offset="300"
							data-aos-easing="ease-in-sine">
							<a href="#">
								<h3 class="text-lg font-medium text-gray-900 dark:text-white">
									<?= $j['nama'] ?>
								</h3>
							</a>

							<p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500 dark:text-gray-400">
								<?= $j['keterangan'] ?>
							</p>

							<a href="detail-jurusan.php?id=<?= $j['id'] ?>" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
								Find out more

								<span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
									&rarr;
								</span>
							</a>
						</div>
					</div>

				</div>

			<?php }
		} else { ?>

			Tidak ada data

		<?php } ?>
	</div>


	<!-- bagian informasi -->
	<h3 class="font-bold text-4xl md:text-5xl font-bold mb-4 mt-4 text-center" data-aos="zoom-in-up">Berita Terbaru</h3>
	<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-6" id="informasi">

		<?php
		$informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
		if (mysqli_num_rows($informasi) > 0) {
			while ($p = mysqli_fetch_array($informasi)) {
		?>

<div class="container p-4">

					<div class="relative overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg" data-aos="zoom-in-up">
						<img
							alt="<?= substr($p['judul'], 0, 50) ?>"
							src="uploads/informasi/<?= $p['gambar'] ?>"
							class="absolute inset-0 h-full w-full object-cover" />

						<div data-aos="fade-up" data-aos-duration="3000" class="relative bg-gradient-to-t from-white to-white/25 dark:bg-gradient-to-t dark:from-gray-900 dark:to-gray-900/25 pt-32 sm:pt-48 lg:pt-64">
							<div class="p-4 sm:p-6">
								<time datetime="<?= $p['created_at'] ?> " class="block text-xs dark:text-gray-400/90 text-gray-800/90"> <?= $p['created_at'] ?> </time>

								<a href="detail-informasi.php?id=<?= $p['id'] ?></a>">
									<h3 class="mt-0.5 text-lg dark:text-white text-black">
										<?= substr($p['judul'], 0, 50) ?>

									</h3>
								</a>

								<p class="line-clamp-3 truncate w-64 text-sm/relaxed dark:text-white/95 text-gray-900/95">
									<?= substr($p['keterangan'], 0, 150) ?>
								</p>
								<a href="detail-informasi.php?id=<?= $p['id'] ?>" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
									Lihat Detail

									<span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
										&rarr;
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>

			<?php }
		} else { ?>

			Tidak ada data

		<?php } ?>
	</div>

	<?php include 'footer.php'; ?>