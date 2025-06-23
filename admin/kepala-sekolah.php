<?php include 'header.php'; ?>

<div class="p-6 max-w-4xl mx-auto">
  <div class="bg-white rounded-xl shadow-lg p-6 space-y-6">
    <h2 class="text-2xl font-bold flex items-center gap-2">
      <i data-lucide="user-circle"></i> Edit Data Kepala Sekolah
    </h2>

    <?php if (isset($_GET['success'])): ?>
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md">
        <?= htmlspecialchars($_GET['success']) ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
      
      <!-- Nama -->
      <div>
        <label class="block mb-1 font-semibold">Nama Kepala Sekolah</label>
        <div class="relative">
          <input type="text" name="nama" value="<?= htmlspecialchars($d->nama_kepsek) ?>" required
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400">
          <i data-lucide="user" class="absolute right-3 top-2.5 text-gray-400"></i>
        </div>
      </div>

      <!-- Sambutan -->
      <div>
        <label class="block mb-1 font-semibold">Sambutan</label>
        <textarea name="sambutan" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Isi sambutan kepala sekolah"><?= htmlspecialchars($d->sambutan_kepsek) ?></textarea>
      </div>

      <!-- Foto Lama -->
      <div>
        <label class="block mb-1 font-semibold">Foto Lama</label>
        <img src="../uploads/identitas/<?= $d->foto_kepsek ?>" alt="Foto Kepala Sekolah" class="w-40 rounded-lg shadow">
        <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($d->foto_kepsek) ?>">
      </div>

      <!-- Foto Baru -->
      <div>
        <label class="block mb-1 font-semibold">Ganti Foto</label>
        <input type="file" name="foto_baru" accept="image/*" onchange="previewImage(event)"
          class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring focus:border-blue-400">
        <img id="imagePreview" class="w-40 mt-3 rounded shadow hidden" />
      </div>

      <!-- Submit -->
      <div>
        <button type="submit" name="submit"
          class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
          <i data-lucide="save"></i> Simpan Perubahan
        </button>
      </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $nama      = htmlspecialchars(ucwords($_POST['nama']));
      $sambutan  = htmlspecialchars($_POST['sambutan']);
      $currdate  = date('Y-m-d H:i:s');

      if ($_FILES['foto_baru']['name'] != '') {
        $filename   = $_FILES['foto_baru']['name'];
        $tmpname    = $_FILES['foto_baru']['tmp_name'];
        $filesize   = $_FILES['foto_baru']['size'];
        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
        $rename     = 'kepsek' . time() . '.' . $formatfile;
        $allowedtype = ['png', 'jpg', 'jpeg', 'gif'];

        if (!in_array($formatfile, $allowedtype)) {
          echo "<div class='bg-red-100 text-red-700 p-3 rounded'>Format file tidak diizinkan.</div>";
          return false;
        } elseif ($filesize > 1000000) {
          echo "<div class='bg-red-100 text-red-700 p-3 rounded'>Ukuran file terlalu besar.</div>";
          return false;
        } else {
          if (file_exists("../uploads/identitas/" . $_POST['foto_lama'])) {
            unlink("../uploads/identitas/" . $_POST['foto_lama']);
          }
          move_uploaded_file($tmpname, "../uploads/identitas/" . $rename);
        }
      } else {
        $rename = $_POST['foto_lama'];
      }

      $update = mysqli_query($conn, "UPDATE pengaturan SET
        nama_kepsek = '$nama',
        sambutan_kepsek = '$sambutan',
        foto_kepsek = '$rename',
        updated_at = '$currdate'
        WHERE id = '$d->id'
      ");

      if ($update) {
        echo "<script>window.location='kepala-sekolah.php?success=Edit Data Berhasil'</script>";
      } else {
        echo "<div class='bg-red-100 text-red-700 p-3 rounded'>Gagal edit: " . mysqli_error($conn) . "</div>";
      }
    }
    ?>

  </div>
</div>
</div>

<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
      const output = document.getElementById('imagePreview');
      output.src = reader.result;
      output.classList.remove('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<?php include 'footer.php'; ?>
