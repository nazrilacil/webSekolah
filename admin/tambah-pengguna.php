<?php include 'header.php'; ?>

<div class="max-w-2xl mx-auto mt-10 bg-white shadow rounded p-6 space-y-6">

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i data-lucide="user-plus" class="w-6 h-6"></i> Tambah Pengguna
        </h1>
        <a href="pengguna.php" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
    </div>

    <form action="" method="POST" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" required
                class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300" />
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Username</label>
            <input type="text" name="user" placeholder="Username" required
                class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300" />
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Level</label>
            <select name="level" required
                class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Level --</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <p class="text-sm text-gray-600 flex items-center gap-1">
            <i data-lucide="info" class="w-4 h-4"></i> Password default untuk pengguna baru adalah <code>123456</code>
        </p>

        <button type="submit" name="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded flex items-center gap-2">
            <i data-lucide="save" class="w-5 h-5"></i> Simpan
        </button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama  = addslashes(ucwords($_POST['nama']));
        $user  = addslashes($_POST['user']);
        $level = $_POST['level'];
        $pass  = '123456';
        $created_at = date('Y-m-d H:i:s');

        $cek = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$user' ");
        if (mysqli_num_rows($cek) > 0) {
            echo "<div class='bg-red-100 text-red-700 px-4 py-2 rounded'>Username sudah digunakan</div>";
        } else {
            $simpan = mysqli_query($conn, "INSERT INTO pengguna VALUES (
                null,
                '$nama',
                '$user',
                '" . md5($pass) . "',
                '$level',
                '$created_at',
                null
            )");

            if ($simpan) {
                echo "<div class='bg-green-100 text-green-700 px-4 py-2 rounded'>Simpan Berhasil</div>";
            } else {
                echo 'Gagal simpan: ' . mysqli_error($conn);
            }
        }
    }
    ?>
</div>
</div>

<?php include 'footer.php'; ?>
