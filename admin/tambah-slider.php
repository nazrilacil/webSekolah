<?php include 'header.php'; ?>
<?php include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $imageName = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $uploadDir = '../uploads/slider/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadPath = $uploadDir . basename($imageName);
    $relativePath = 'slider/' . $imageName;

    if (move_uploaded_file($tmp, $uploadPath)) {
        $stmt = $conn->prepare("INSERT INTO sliders (title, image) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $relativePath);
        $stmt->execute();

        $success = "Slide berhasil ditambahkan!";
    } else {
        $error = "Gagal mengupload gambar.";
    }
}
?>

<div class="max-w-md mx-auto bg-white p-6 mt-10 rounded shadow-lg">
    <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center gap-2">
        <i data-lucide="plus" class="w-5 h-5"></i> Tambahkan Slider
    </h2>

    <?php if (isset($success)): ?>
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4"><?= $success ?></div>
    <?php elseif (isset($error)): ?>
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block text-gray-700">Judul Slide</label>
            <input type="text" name="title" required
                class="mt-1 w-full px-3 py-2 border rounded bg-gray-50 focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-gray-700">Gambar</label>
            <input type="file" name="image" accept="image/*" required onchange="previewImage(this)"
                class="mt-1 w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <!-- Preview -->
        <div>
            <label class="block text-gray-700 mb-1">Preview Gambar:</label>
            <img id="image-preview" class="w-48 h-auto border rounded shadow" src="#" alt="Preview" style="display: none;">
        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition flex items-center gap-1">
            <i data-lucide="upload-cloud" class="w-4 h-4"></i> Upload Slide
        </button>
    </form>
</div>
</div>

<!-- Preview Gambar -->
<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    }
</script>

<?php include 'footer.php'; ?>
