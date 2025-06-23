<?php
include 'header.php';

$galeri = mysqli_query($conn, "SELECT * FROM sliders WHERE id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($galeri) == 0) {
    echo "<script>window.location='slider.php'</script>";
}
$p = mysqli_fetch_object($galeri);
?>

<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <i data-lucide="edit-3" class="w-6 h-6"></i> Edit Slider
            </h2>
            <a href="galeri.php" class="text-blue-600 hover:underline flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
            </a>
        </div>

        <!-- Panduan -->
        <div class="bg-blue-100 text-blue-800 text-sm rounded p-3 mb-6">
            <i data-lucide="info" class="inline w-4 h-4 mr-1"></i>
            Judul harus sesuai dengan konten gambar. Jika tidak ingin mengganti gambar, abaikan kolom upload file.
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Slide</label>
                <input type="text" name="keterangan" placeholder="Judul Slide" value="<?= htmlspecialchars($p->title) ?>"
                    class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
                <img id="preview-image" src="../uploads/<?= $p->image ?>" alt="Gambar slider" class="w-48 rounded shadow mb-2 border border-gray-300">
                <input type="hidden" name="gambar2" value="<?= $p->image ?>">

                <input type="file" name="gambar" accept="image/*" onchange="previewFile(this)"
                    class="w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex justify-end gap-3">
                <a href="galeri.php"
                    class="px-4 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
                    <i data-lucide="x" class="w-4 h-4 inline mr-1"></i> Batal
                </a>
                <button type="submit" name="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded transition flex items-center gap-1">
                    <i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
                </button>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $ket = addslashes(ucwords($_POST['keterangan']));
            $currdate = date('Y-m-d H:i:s');

            if ($_FILES['gambar']['name'] != '') {
                $filename = $_FILES['gambar']['name'];
                $tmpname = $_FILES['gambar']['tmp_name'];
                $filesize = $_FILES['gambar']['size'];

                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                $rename = 'slider' . time() . '.' . $formatfile;
                $relativePath = 'slider/' . $rename;

                $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                if (!in_array($formatfile, $allowedtype)) {
                    echo '<div class="mt-4 text-red-600">Format file tidak diizinkan.</div>';
                    return false;
                } elseif ($filesize > 10000000) {
                    echo '<div class="mt-4 text-red-600">Ukuran file tidak boleh lebih dari 10 MB.</div>';
                    return false;
                } else {
                    if (file_exists("../uploads/" . $_POST['gambar2'])) {
                        unlink("../uploads/" . $_POST['gambar2']);
                    }
                    move_uploaded_file($tmpname, "../uploads/" . $relativePath);
                }
            } else {
                $relativePath = $_POST['gambar2'];
            }

            $update = mysqli_query($conn, "UPDATE sliders SET
                title = '$ket',
                image = '$relativePath',
                created_at = '$currdate'
                WHERE id = '" . $_GET['id'] . "'");

            if ($update) {
                echo "<script>window.location='slider.php?success=Edit Data Berhasil'</script>";
            } else {
                echo '<div class="mt-4 text-red-600">Gagal mengedit: ' . mysqli_error($conn) . '</div>';
            }
        }
        ?>
    </div>
</div>
</div>

<!-- Lucide Icon -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>

<!-- Preview Gambar Live -->
<script>
  function previewFile(input) {
    const file = input.files[0];
    const preview = document.getElementById('preview-image');

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
      }

      reader.readAsDataURL(file);
    }
  }
</script>

<?php include 'footer.php'; ?>
