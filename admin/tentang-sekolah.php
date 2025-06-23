<?php include 'header.php'; ?>
<?php
if (isset($_GET['success'])) {
	echo "<div class='bg-green-100 text-green-800 px-4 py-2 rounded mb-4 max-w-2xl mx-auto'>" . $_GET['success'] . "</div>";
}
?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow space-y-6 mt-6">
	<h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
		<i data-lucide="school" class="w-6 h-6"></i> Edit Tentang Sekolah
	</h1>

	<!-- Panduan -->
	<div class="bg-blue-50 text-blue-800 p-4 rounded text-sm flex gap-2">
		<i data-lucide="info" class="w-5 h-5 mt-0.5"></i>
		<div>
			<strong>Panduan:</strong> Semua karakter akan disimpan dengan aman menggunakan fungsi `htmlspecialchars`.  
			Contohnya:
			<ul class="list-disc ml-5 mt-1">
				<li><code><?= htmlspecialchars('&lt;') ?></code> untuk tanda <code><</code></li>
				<li><code><?= htmlspecialchars('&gt;') ?></code> untuk tanda <code>></code></li>
				<li><code><?= htmlspecialchars('&quot;') ?></code> untuk tanda <code>"</code></li>
				<li><code><?= htmlspecialchars('&#039;') ?></code> untuk tanda <code>'</code></li>
			</ul>
		</div>
	</div>

	<form action="" method="POST" enctype="multipart/form-data" class="space-y-6">

		<!-- Tentang -->
		<div>
			<label class="block mb-1 text-sm font-medium text-gray-700">Tentang Sekolah</label>
			<textarea name="tentang" rows="6" placeholder="Tentang Sekolah"
				class="w-full border rounded p-3 text-sm focus:ring focus:ring-blue-300"><?= htmlspecialchars($d->tentang_sekolah, ENT_QUOTES, 'UTF-8') ?></textarea>
		</div>

		<!-- Visi Misi -->
		<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
			<div>
				<label class="block mb-1 text-sm font-medium text-gray-700">VISI</label>
				<textarea name="visi" rows="6" placeholder="Visi"
					class="w-full border rounded p-3 text-sm focus:ring focus:ring-blue-300"><?= htmlspecialchars($d->visi, ENT_QUOTES, 'UTF-8') ?></textarea>
			</div>
			<div>
				<label class="block mb-1 text-sm font-medium text-gray-700">MISI</label>
				<textarea name="misi" rows="6" placeholder="Misi"
					class="w-full border rounded p-3 text-sm focus:ring focus:ring-blue-300"><?= htmlspecialchars($d->misi, ENT_QUOTES, 'UTF-8') ?></textarea>
			</div>
		</div>

		<!-- Foto Sekolah -->
		<div>
			<label class="block mb-1 text-sm font-medium text-gray-700">Foto Sekolah</label>
			<img src="../uploads/identitas/<?= $d->foto_sekolah ?>" id="preview-img" alt="Foto Sekolah Lama"
				class="w-52 border rounded shadow mb-3">

			<input type="hidden" name="foto_lama" value="<?= $d->foto_sekolah ?>">

			<input type="file" name="foto_baru" accept="image/*" onchange="previewFile(this)"
				class="block w-full border rounded p-2 text-sm text-gray-700">
		</div>

		<!-- Tombol Submit -->
		<button type="submit" name="submit"
			class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded flex items-center gap-2">
			<i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
		</button>

	</form>
    
						<?php

							if(isset($_POST['submit'])){

								$tentang  = htmlspecialchars($_POST['tentang'], ENT_QUOTES, 'UTF-8');
								$visi  = htmlspecialchars($_POST['visi'], ENT_QUOTES, 'UTF-8');
								$misi  = htmlspecialchars($_POST['misi'], ENT_QUOTES, 'UTF-8');
								$currdate = date('Y-m-d H:i:s');

								// menampung dan validasi data foto sekolah
								if($_FILES['foto_baru']['name'] != ''){

									$filename 	= $_FILES['foto_baru']['name'];
									$tmpname 	= $_FILES['foto_baru']['tmp_name'];
									$filesize 	= $_FILES['foto_baru']['size'];

									$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
									$rename 	 = 'sekolah'.time().'.'.$formatfile;

									$allowedtype = array('png', 'jpg', 'jpeg', 'gif');

									if(!in_array($formatfile, $allowedtype)){

										echo '<div class="alert alert-error">Format file foto sekolah tidak diizinkan.</div>';

										return false;

									}elseif($filesize > 1000000){

										echo '<div class="alert alert-error">Ukuran file foto sekolah tidak boleh lebih dari 1 MB.</div>';

										return false;

									}else{

										if(file_exists("../uploads/identitas/".$_POST['foto_lama'])){

											unlink("../uploads/identitas/".$_POST['foto_lama']);

										}

										move_uploaded_file($tmpname, "../uploads/identitas/".$rename);

									}

								}else{

									$rename 	= $_POST['foto_lama'];

								}

								

								$update = mysqli_query($conn, "UPDATE pengaturan SET
										tentang_sekolah = '".$tentang."',
										foto_sekolah = '".$rename."',
										updated_at = '".$currdate."',
										visi = '".$visi."',
										misi = '".$misi."'
										WHERE id = '".$d->id."'
									");


								if($update){
									echo "<script>window.location='tentang-sekolah.php?success=Edit Data Berhasil'</script>";
								}else{
									echo 'gagal edit '.mysqli_error($conn);
								}

							}

						?>

</div>
</div>

<!-- Preview Gambar -->
<script>
	function previewFile(input) {
		const file = input.files[0];
		const preview = document.getElementById('preview-img');
		if (file) {
			const reader = new FileReader();
			reader.onload = function (e) {
				preview.src = e.target.result;
			}
			reader.readAsDataURL(file);
		}
	}
</script>

<?php include 'footer.php'; ?>
