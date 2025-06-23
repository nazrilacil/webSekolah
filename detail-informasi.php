	<?php 
    include 'koneksi.php';
    $title = "Berita | $d->nama";
    include 'header.php'; ?>

	<div class="lg:p-8 p-6 mt-10">

		<?php
		$informasi 	= mysqli_query($conn, "SELECT * FROM informasi LEFT JOIN pengguna ON pengguna.id = informasi.created_by WHERE informasi.id = '" . $_GET['id'] . "' ");

		if (mysqli_num_rows($informasi) == 0) {
			echo "<script>window.location='index.php'</script>";
		}

		$p 			= mysqli_fetch_object($informasi);
		?>
				<a href="uploads/informasi/<?= $p->gambar ?>" data-fancybox data-caption="<?= $p->judul ?>">
<section>
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8">
      <div>
        <div class="max-w-lg md:max-w-none">
          <h2 class="text-2xl text-gray-900 dark:text-gray-100 font-semibold text-gray-900 sm:text-3xl">
						<?= $p->judul ?>

          </h2>

          <p class="mt-4 text-gray-700 dark:text-gray-300">
					<?= $p->keterangan ?>

          </p>
          				<time datetime="<?= $p->created_at ?>" class="block mt-4 text-xs text-gray-500 dark:text-gray-400">
					Dibuat pada <?= $p->created_at ?>, oleh <?= $p->nama ?>
				</time>
        </div>
      </div>

      <div>
        <img
          src="uploads/informasi/<?= $p->gambar ?>"
          class="h-100 w-100 rounded"
          alt="<?= $p->judul ?>"
        />
      </div>
    </div>
  </div>
</section>
				</a>

	</div>

	<?php include 'footer.php'; ?>