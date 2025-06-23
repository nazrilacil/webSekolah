	<?php
    include 'koneksi.php';
    $title = "Informasi | $d->nama";    
    include 'header.php'; ?>
	<section class="bg-gray-50 dark:bg-gray-900">
		<div class="p-8 md:p-12 lg:px-16 lg:py-24">
			<div class="mx-auto max-w-lg text-center">
				<h2 class="text-2xl font-bold dark:text-white text-gray-900 md:text-3xl" data-aos="fade-up" data-aos-duration="500">
					Informasi <strong class="text-teal-600"> <?= $d->nama ?> </strong>
				</h2>

				<p class="text-gray-500 sm:mt-4" data-aos="fade-right">
					Sebuah sistem berbasis website yangd irancang untuk mengelola berbagai data dan informasi sekolah
				</p>
			</div>

		</div>
	</section>
		<h2 class="text-center mb-20 mt-20 text-2xl font-bold dark:text-white text-gray-900 text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up" data-aos-duration="500">
		Berita Terbaru
	</h2>
	<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-6" id="informasi">
			
			<?php
				$informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
				if(mysqli_num_rows($informasi) > 0){
					while($p = mysqli_fetch_array($informasi)){
			?>
				<div class="container p-4">

					<div class="relative overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
						<img
							alt="<?= substr($p['judul'], 0, 50) ?>"
							src="uploads/informasi/<?= $p['gambar'] ?>"
							class="absolute inset-0 h-full w-full object-cover" />

						<div class="relative bg-gradient-to-t from-white to-white/25 dark:bg-gradient-to-t dark:from-gray-900 dark:to-gray-900/25 pt-32 sm:pt-48 lg:pt-64">
							<div class="p-4 sm:p-6">
								<time datetime="<?= $p['created_at'] ?> " class="block text-xs text-gray-400/90"> <?= $p['created_at'] ?> </time>

								<a href="detail-informasi.php?id=<?= $p['id'] ?></a>">
									<h3 class="mt-0.5 text-lg dark:text-white text-black">
										<?= substr($p['judul'], 0, 50) ?>

									</h3>
								</a>

								<p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500 dark:text-gray-400">
									<?= substr($p['keterangan'], 0, 200) ?>...
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
			<?php }}else{ ?>

				Tidak ada data

			<?php } ?>
			
		</div>

	<?php include 'footer.php'; ?>