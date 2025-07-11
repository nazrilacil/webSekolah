<?php include 'header.php' ?>

<?php
    $informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id = '".$_GET['id']."' ");

    if(mysqli_num_rows($informasi) == 0){
        echo "<script>window.location='informasi.php'</script>";
    }

    $p = mysqli_fetch_object($informasi);
?>

<!-- content -->
<div class="content">
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Edit Informasi</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" class="p-2 h-10 w-full" name="judul" placeholder="Judul" value="<?= htmlspecialchars($p->judul) ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea name="keterangan" rows="6" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" placeholder="Keterangan" id="keterangan"><?= htmlspecialchars($p->keterangan) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <img src="../uploads/informasi/<?= htmlspecialchars($p->gambar) ?>" width="200px" class="mb-2 rounded-md">
                    <input type="hidden" name="gambar2" value="<?= htmlspecialchars($p->gambar) ?>">
							<label for="File" class="block rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6">
			<div class="flex items-center justify-center gap-4">
				<input type="file" name="gambar" class="font-medium w-50" id="File">


				<svg
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke-width="1.5"
					stroke="currentColor"
					class="size-6">
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
				</svg>
			</div>
		</label>
                </div>

                <div class="flex justify-between">
                    <button type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400" onclick="window.location = 'informasi.php'">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 0l-3 3m3-3l-3-3"></path></svg>
                        Kembali
                    </button>
                    <input type="submit" name="submit" value="Simpan" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                </div>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $judul = addslashes(ucwords($_POST['judul']));
                    $ket = addslashes($_POST['keterangan']);
                    $currdate = date('Y-m-d H:i:s');

                    if($_FILES['gambar']['name'] != ''){
                        $filename = $_FILES['gambar']['name'];
                        $tmpname = $_FILES['gambar']['tmp_name'];
                        $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'informasi'.time().'.'.$formatfile;

                        $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                        if(!in_array($formatfile, $allowedtype)){
                            echo '<div class="mt-4 text-red-500">Format file tidak diizinkan.</div>';
                            return false;
                        } elseif($filesize > 1000000){
                            echo '<div class="mt-4 text-red-500">Ukuran file tidak boleh lebih dari 1 MB.</div>';
                            return false;
                        } else {
                            if(file_exists("../uploads/informasi/".$_POST['gambar2'])){
                                unlink("../uploads/informasi/".$_POST['gambar2']);
                            }
                            move_uploaded_file($tmpname, "../uploads/informasi/".$rename);
                        }
                    } else {
                        $rename = $_POST['gambar2'];
                    }

                    $update = mysqli_query($conn, "UPDATE informasi SET
                            judul = '".$judul."',
                            keterangan = '".$ket."',
                            gambar = '".$rename."',
                            updated_at = '".$currdate."'
                            WHERE id = '".$_GET['id']."'
                        ");

                    if($update){
                        echo "<script>window.location='informasi.php?success=Edit Data Berhasil'</script>";
                    } else {
                        echo '<div class="mt-4 text-red-500">Gagal edit '.mysqli_error($conn).'</div>';
                    }
                }
            ?>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php' ?>
