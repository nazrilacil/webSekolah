	<?php 
    include 'koneksi.php';
    $title = "Detail-Jurusan | $d->nama";
    include 'header.php'; ?>

	<div class="p-6 lg:p-8 mt-10">

		<?php
		$jurusan 	= mysqli_query($conn, "SELECT * FROM jurusan WHERE id = '" . $_GET['id'] . "' ");

		if (mysqli_num_rows($jurusan) == 0) {
			echo "<script>window.location='index.php'</script>";
		}

		$p 			= mysqli_fetch_object($jurusan);
		?>
        <a href="uploads/jurusan/<?= $p->gambar ?>" data-fancybox data-caption="<?= $p->keterangan ?>">
<section>
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8">
          <div>
        <img
          src="uploads/jurusan/<?= $p->gambar ?>"
          class="h-100 w-100 rounded"
          alt="<?= $p->nama ?>"
        />
      </div>
      <div>
      <div class="bg-white p-4 sm:p-6 dark:bg-gray-900">
        <div class="max-w-lg md:max-w-none">
			<div
				class="rounded-lg bg-white shadow-xs transition hover:shadow-lg sm:p-6 dark:border-gray-800 dark:bg-gray-900 dark:shadow-gray-700/25">

          <h2 class="text-2xl text-gray-900 dark:text-gray-100 font-semibold text-gray-900 sm:text-3xl">
									<span class="inline-flex rounded-sm mr-3 bg-blue-600 p-2 text-white dark:bg-blue-700">
<i data-lucide="graduation-cap"></i>
				</span><?= $p->nama ?>
						

          </h2>
</div>

          <p class="mt-4 text-gray-700 dark:text-gray-300">
					<?= $p->keterangan ?>

          </p>
          				<time datetime="<?= $p->created_at ?>" class="block mt-4 text-xs text-gray-500 dark:text-gray-400">
					Dibuat pada <?= $p->created_at ?>, oleh <?= $d->nama ?>
				</time>
        </div>
      </div>
    </div>
  </div>
</section>
				</a>
	</div>

	<?php include 'footer.php'; ?>