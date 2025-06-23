<?php include 'header.php'; ?>

<div class="max-w-4xl mx-auto mt-10 bg-white shadow rounded p-6 space-y-6">

    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
        <i data-lucide="school" class="w-6 h-6"></i> Identitas Sekolah
    </h1>

    <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
            <?= $_GET['success'] ?>
        </div>
    <?php endif; ?>

    <div class="bg-blue-50 text-blue-800 p-4 rounded text-sm flex gap-2">
        <i data-lucide="info" class="w-5 h-5 mt-0.5"></i>
        <div>
            <strong>Panduan:</strong> Pastikan semua data sekolah diisi dengan benar.
			<ul class="list-disc list-outside ml-5 mt-1">
            <li>
Gambar harus berformat <code>.jpg</code>, <code>.png</code>, atau <code>.gif</code> dan tidak lebih dari <strong>1 MB</strong>.  
			</li>
			<li>
            Preview logo dan favicon akan ditampilkan sebelum disimpan.<br />

			</li> 
			<li> Untuk input Google Maps, salin link dari tab <strong>Sematkan peta</strong> (Embed a Map) saat klik tombol <strong>Bagikan</strong> di Google Maps, lalu ambil link dari atribut <code>src=""</code> seperti:<br>
        <code>https://www.google.com/maps/embed?pb=...</code></li>
			<li>
				Semua karakter akan disimpan dengan aman menggunakan fungsi `htmlspecialchars`.  
				Contohnya:
			</li> 
			</ul>
			<ul class="list-disc list-inside ml-5 mt-1">
				<li><code><?= htmlspecialchars('&lt;') ?></code> untuk tanda <code><</code></li>
				<li><code><?= htmlspecialchars('&gt;') ?></code> untuk tanda <code>></code></li>
				<li><code><?= htmlspecialchars('&quot;') ?></code> untuk tanda <code>"</code></li>
				<li><code><?= htmlspecialchars('&#039;') ?></code> untuk tanda <code>'</code></li>
			</ul>
        </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nama Sekolah</label>
            <input type="text" name="nama" value="<?= $d->nama ?>" required
                class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="<?= $d->email ?>" required
                    class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300" />
            </div>
            <div>
                <label class="block mb-1 font-medium text-gray-700">Telepon</label>
                <input type="text" name="telp" value="<?= $d->telepon ?>" required
                    class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300" />
            </div>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300"><?= $d->alamat ?></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Google Maps</label>
            <textarea name="gmaps" rows="3"
                class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300"><?= $d->google_maps ?></textarea>
        </div>

        <!-- Logo -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Logo Sekolah</label>
            <img src="../uploads/identitas/<?= $d->logo ?>" id="preview-logo" class="w-24 mb-2 rounded border shadow">
            <input type="hidden" name="logo_lama" value="<?= $d->logo ?>">
            <input type="file" name="logo_baru" accept="image/*" onchange="previewFile(this, 'preview-logo')"
                class="w-full border rounded p-2 text-sm text-gray-700" />
        </div>

        <!-- Favicon -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Favicon</label>
            <img src="../uploads/identitas/<?= $d->favicon ?>" id="preview-favicon" class="w-10 mb-2 rounded border shadow">
            <input type="hidden" name="favicon_lama" value="<?= $d->favicon ?>">
            <input type="file" name="favicon_baru" accept="image/*" onchange="previewFile(this, 'preview-favicon')"
                class="w-full border rounded p-2 text-sm text-gray-700" />
        </div>

        <button type="submit" name="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded flex items-center gap-2">
            <i data-lucide="save" class="w-5 h-5"></i> Simpan Perubahan
        </button>
    </form>
	<?php

							if(isset($_POST['submit'])){

								$nama 	= addslashes(ucwords($_POST['nama']));
								$email 	= addslashes($_POST['email']);
								$telp 	= addslashes($_POST['telp']);
								$alamat	= addslashes($_POST['alamat']);
								$gmaps 	= addslashes($_POST['gmaps']);
								$currdate = date('Y-m-d H:i:s');

								// menampung dan validasi data logo
								if($_FILES['logo_baru']['name'] != ''){

									$filename_logo 	= $_FILES['logo_baru']['name'];
									$tmpname_logo 	= $_FILES['logo_baru']['tmp_name'];
									$filesize_logo 	= $_FILES['logo_baru']['size'];

									$formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
									$rename_logo 	 = 'logo'.time().'.'.$formatfile_logo;

									$allowedtype_logo = array('png', 'jpg', 'jpeg', 'gif');

									if(!in_array($formatfile_logo, $allowedtype_logo)){

										echo '<div class="alert alert-error">Format file logo sekolah tidak diizinkan.</div>';

										return false;

									}elseif($filesize_logo > 1000000){

										echo '<div class="alert alert-error">Ukuran file logo sekolah tidak boleh lebih dari 1 MB.</div>';

										return false;

									}else{

										if(file_exists("../uploads/identitas/".$_POST['logo_lama'])){

											unlink("../uploads/identitas/".$_POST['logo_lama']);

										}

										move_uploaded_file($tmpname_logo, "../uploads/identitas/".$rename_logo);

									}

								}else{

									$rename_logo 	= $_POST['logo_lama'];

								}

								// menampung dan validasi data favicon
								if($_FILES['favicon_baru']['name'] != ''){

									$filename_favicon 	= $_FILES['favicon_baru']['name'];
									$tmpname_favicon 	= $_FILES['favicon_baru']['tmp_name'];
									$filesize_favicon 	= $_FILES['favicon_baru']['size'];

									$formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
									$rename_favicon 	= 'favicon'.time().'.'.$formatfile_favicon;

									$allowedtype_favicon = array('png', 'jpg', 'jpeg', 'gif');

									if(!in_array($formatfile_favicon, $allowedtype_favicon)){

										echo '<div class="alert alert-error">Format file favicon sekolah tidak diizinkan.</div>';

										return false;

									}elseif($filesize_favicon > 1000000){

										echo '<div class="alert alert-error">Ukuran file favicon sekolah tidak boleh lebih dari 1 MB.</div>';

										return false;

									}else{

										if(file_exists("../uploads/identitas/".$_POST['favicon_lama'])){

											unlink("../uploads/identitas/".$_POST['favicon_lama']);

										}

										move_uploaded_file($tmpname_favicon, "../uploads/identitas/".$rename_favicon);

									}

								}else{

									$rename_favicon 	= $_POST['favicon_lama'];

								}

								$update = mysqli_query($conn, "UPDATE pengaturan SET
										nama = '".$nama."',
										email = '".$email."',
										telepon = '".$telp."',
										alamat = '".$alamat."',
										google_maps = '".$gmaps."',
										logo = '".$rename_logo."',
										favicon = '".$rename_favicon."',
										updated_at = '".$currdate."'
										WHERE id = '".$d->id."'
									");


								if($update){
									echo "<script>window.location='identitas-sekolah.php?success=Edit Data Berhasil'</script>";
								}else{
									echo 'gagal edit '.mysqli_error($conn);
								}

							}

						?>
</div>
</div>

<!-- Script Preview Gambar -->
<script>
    function previewFile(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<!-- Lucide Icon -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>

<?php include 'footer.php'; ?>
