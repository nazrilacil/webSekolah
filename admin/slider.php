<?php
include '../koneksi.php';
$sliders = $conn->query("SELECT * FROM sliders ORDER BY id DESC");
include 'header.php';
?>

<!-- Container Utama -->
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mt-8">Galeri Slider</h2>
        <a href="tambah-slider.php" class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah
        </a>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300 dark:bg-green-900 dark:text-green-200 dark:border-green-700">
            <?= htmlspecialchars($_GET['success']) ?>
        </div>
    <?php endif; ?>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <?php while ($row = $sliders->fetch_assoc()): ?>
        <div class="bg-gray-200 rounded-xl shadow hover:shadow-lg transition overflow-hidden border border-gray-200 dark:border-gray-700" data-aos="zoom-in">
            <a href="../uploads/<?= $row['image'] ?>" data-fancybox="slider" data-caption="<?= htmlspecialchars($row['title']) ?>">
                <img src="../uploads/<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="w-full h-48 object-cover">
            </a>
            <div class="p-4 space-y-2">
                <h3 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($row['title']) ?></h3>
                <div class="flex flex-wrap gap-2">
                    <a href="edit-slider.php?id=<?= $row['id'] ?>" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition text-sm">
                        <i data-lucide="edit" class="w-4 h-4"></i> Edit
                    </a>
                    <a href="../uploads/<?= $row['image'] ?>" data-fancybox="slid" data-caption="<?= htmlspecialchars($row['title']) ?>" class="inline-flex items-center gap-1 text-gray-600 hover:text-gray-800 transition text-sm">
                        <i data-lucide="eye" class="w-4 h-4"></i> Lihat
                    </a>
                    <a href="hapus.php?idslider=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition text-sm">
                        <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>