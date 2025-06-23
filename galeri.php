	<?php 
    include 'koneksi.php';
    $title = "Gallery | $d->nama";
    include 'header.php'; ?>


	<h2 class="text-center mb-20 mt-20 text-2xl font-bold dark:text-white text-gray-900 md:text-3xl" data-aos="fade-up" data-aos-duration="500">
		Gallery <strong class="text-teal-600"> <?= $d->nama ?> </strong>
	</h2>
	<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 lg:gap-6">
		<?php
		$galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
		if (mysqli_num_rows($galeri) > 0) {
			while ($p = mysqli_fetch_array($galeri)) {
		?>

				<div class="container p-4" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
					<a href="uploads/galeri/<?= $p['foto'] ?>" class="group relative block bg-black"
						data-fancybox="gallery"
						data-caption="<?= $p['keterangan'] ?>">
						<img
							alt="<?= $p['keterangan'] ?>"
							src="uploads/galeri/<?= $p['foto'] ?>"
							class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
						<div class="relative p-4 sm:p-6 lg:p-8">
							<p class="text-sm font-medium tracking-widest text-teal-500 uppercase"><?= $p['created_at'] ?></p>

							<p class="text-xl font-bold text-white sm:text-2xl"><?= $d->nama ?></p>

							<div class="mt-32 sm:mt-48 lg:mt-64">
								<div
									class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
									<p class="text-sm text-white">
										<?= $p['keterangan'] ?>
									</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php }
		} else { ?>

			Tidak ada data

		<?php } ?>

	</div>

	<?php include 'footer.php'; ?>