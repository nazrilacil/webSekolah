<?php include 'header.php' ?>
<script src="https://unpkg.com/lucide@latest"></script>

<div class="min-h-screen bg-gray-100 p-4">
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
                <i data-lucide="image-plus" class="w-6 h-6 text-blue-500"></i> Tambah Galeri
            </h2>
            <button onclick="window.location='galeri.php'" class="text-sm text-gray-600 hover:text-blue-500 flex items-center gap-1">
                <i data-lucide="arrow-left-circle" class="w-5 h-5"></i> Kembali
            </button>
        </div>

        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
            
            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1">
                    <i data-lucide="file-text" class="w-4 h-4 text-gray-500"></i> Keterangan
                </label>
                <input type="text" name="keterangan" placeholder="Keterangan foto" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1">
                    <i data-lucide="image" class="w-4 h-4 text-gray-500"></i> Gambar
                </label>
                <input type="file" name="gambar" class="w-full file:px-4 file:py-2 file:bg-blue-500 file:text-white file:border-none rounded-md border" required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <button type="button" onclick="window.location = 'galeri.php'" class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100 flex items-center gap-2">
                    <i data-lucide="x-circle" class="w-5 h-5"></i> Batal
                </button>
                <button type="submit" name="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 flex items-center gap-2">
                    <i data-lucide="save" class="w-5 h-5"></i> Simpan
                </button>
            </div>
        </form>

        <!-- PHP Handler -->
        <?php
        if(isset($_POST['submit'])){
            $ket = addslashes(ucwords($_POST['keterangan']));
            $filename = $_FILES['gambar']['name'];
            $tmpname = $_FILES['gambar']['tmp_name'];
            $filesize = $_FILES['gambar']['size'];
            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'galeri'.time().'.'.$formatfile;

            $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

            if(!in_array($formatfile, $allowedtype)){
                echo '<div class="mt-4 text-red-600">Format file tidak diizinkan.</div>';
            } elseif($filesize > 1000000){
                echo '<div class="mt-4 text-red-600">Ukuran file tidak boleh lebih dari 1 MB.</div>';
            } else {
                move_uploaded_file($tmpname, "../uploads/galeri/".$rename);
                $simpan = mysqli_query($conn, "INSERT INTO galeri (foto, keterangan) VALUES ('$rename', '$ket')");

                if($simpan){
                    echo '<div class="mt-4 text-green-600">Simpan berhasil.</div>';
                } else {
                    echo '<div class="mt-4 text-red-600">Gagal simpan '.mysqli_error($conn).'</div>';
                }
            }
        }
        ?>

    </div>
</div>
</div>
<?php include 'footer.php' ?>
