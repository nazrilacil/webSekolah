	<?php 
    include 'koneksi.php';
    $title = "Jurusan | $d->nama";    
    include 'header.php'; ?>
	<section class="bg-gray-50 dark:bg-gray-900">
		<div class="p-8 md:p-12 lg:px-16 lg:py-24">
			<div class="mx-auto max-w-lg text-center">
				<h2 class="text-2xl font-bold dark:text-white text-gray-900 md:text-3xl" data-aos="fade-up" data-aos-duration="500">
					Jurusan di <strong class="text-teal-600"> <?= $d->nama ?> </strong>
				</h2>

				<p class="text-gray-500 sm:mt-4" data-aos="fade-right">
					Jurusan adalah bagian dari fakultas di perguruan tinggi yang berfokus pada bidang studi tertentu. Mahasiswa dalam satu jurusan akan mempelajari mata kuliah yang berbeda sesuai dengan bidang studi masing-masing. Jurusan juga bisa disebut program studi atau prodi.
				</p>
			</div>

		</div>
	</section>
	<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 lg:gap-6" id="jurusan">

		<?php
		$jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");
		if (mysqli_num_rows($jurusan) > 0) {
			while ($j = mysqli_fetch_array($jurusan)) {
		?>
				<div class="container p-4">

					<div
						class="max-w-lg overflow-hidden rounded-lg border border-gray-100 bg-white shadow-xs dark:border-gray-800 dark:bg-gray-900 dark:shadow-gray-700/25"
						data-aos="fade-up"
						data-aos-duration="500">
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

	<?php include 'footer.php'; ?>