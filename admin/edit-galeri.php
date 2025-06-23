<?php include 'header.php';

$galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id = '".$_GET['id']."' ");
if(mysqli_num_rows($galeri) == 0){
    echo "<script>window.location='galeri.php'</script>";
}
$p = mysqli_fetch_object($galeri);
?>

<div class="max-w-3xl mx-auto mt-10 bg-white shadow rounded p-6 space-y-6">

    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
        <i data-lucide="image" class="w-6 h-6"></i> Edit Galeri
    </h1>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block font-medium text-gray-700 mb-1">Keterangan</label>
            <input type="text" name="keterangan" value="<?= htmlspecialchars($p->keterangan, ENT_QUOTES) ?>"
                class="w-full p-2 border rounded focus:ring focus:ring-blue-300" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Gambar Lama</label>
            <img src="../uploads/galeri/<?= $p->foto ?>" alt="Gambar Lama" class="w-48 rounded shadow border mb-2">
            <input type="hidden" name="gambar2" value="<?= $p->foto ?>">
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Gambar Baru</label>
            <input type="file" name="gambar" accept="image/*" onchange="previewFile(this, 'preview')" class="w-full p-2 border rounded text-sm">
            <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
            <img id="preview" class="mt-2 w-48 hidden border rounded shadow">
        </div>

        <div class="flex gap-4 mt-4">
            <button type="button" onclick="window.location='galeri.php'"
                class="flex items-center gap-2 px-4 py-2 border border-gray-400 rounded text-gray-700 hover:bg-gray-100">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
            </button>

            <button type="submit" name="submit"
                class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                <i data-lucide="save" class="w-4 h-4"></i> Simpan
            </button>
        </div>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $ket = addslashes(ucwords($_POST['keterangan']));
        $currdate = date('Y-m-d H:i:s');

        if($_FILES['gambar']['name'] != ''){
            $filename = $_FILES['gambar']['name'];
            $tmpname = $_FILES['gambar']['tmp_name'];
            $filesize = $_FILES['gambar']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'galeri'.time().'.'.$formatfile;
            $allowedtype = ['png', 'jpg', 'jpeg', 'gif'];

            if(!in_array($formatfile, $allowedtype)){
                echo '<div class="text-red-600 font-medium">Format file tidak diizinkan.</div>';
                return false;
            } elseif($filesize > 1000000){
                echo '<div class="text-red-600 font-medium">Ukuran file tidak boleh lebih dari 1 MB.</div>';
                return false;
            } else {
                if(file_exists("../uploads/galeri/".$_POST['gambar2'])){
                    unlink("../uploads/galeri/".$_POST['gambar2']);
                }
                move_uploaded_file($tmpname, "../uploads/galeri/".$rename);
            }
        } else {
            $rename = $_POST['gambar2'];
        }

        $update = mysqli_query($conn, "UPDATE galeri SET
            keterangan = '".$ket."',
            foto = '".$rename."',
            updated_at = '".$currdate."'
            WHERE id = '".$_GET['id']."'
        ");

        if($update){
            echo "<script>window.location='galeri.php?success=Edit Data Berhasil'</script>";
        } else {
            echo '<div class="text-red-600 font-medium">Gagal edit: '.mysqli_error($conn).'</div>';
        }
    }
    ?>
</div>
</div>

<!-- Preview Gambar -->
<script>
    function previewFile(input, id) {
        const file = input.files[0];
        const preview = document.getElementById(id);
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<?php include 'footer.php'; ?>
