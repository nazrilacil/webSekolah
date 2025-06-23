<?php include 'header.php'; ?>

<div class="max-w-md mx-auto mt-10 bg-white shadow rounded p-6 space-y-6">

    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
        <i data-lucide="lock" class="w-6 h-6"></i> Ubah Password
    </h1>

    <form action="" method="POST" class="space-y-4">
        <!-- Password -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Password Baru</label>
            <div class="relative">
                <input type="password" name="pass1" id="pass1"
                    class="w-full border rounded p-2 pr-10 text-sm focus:ring focus:ring-blue-300" required>
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword1('pass1', this)">
                    <i data-lucide="eye-off" class="w-5 h-5 text-gray-500" id="eye1"></i>
                </button>
            </div>
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Ulangi Password</label>
            <div class="relative">
                <input type="password" name="pass2" id="pass2"
                    class="w-full border rounded p-2 pr-10 text-sm focus:ring focus:ring-blue-300" required>
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('pass2', this)">
                    <i data-lucide="eye-off" class="w-5 h-5 text-gray-500" id="eye"></i>
                </button>
            </div>
        </div>

        <button type="submit" name="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded flex items-center gap-2">
            <i data-lucide="save" class="w-5 h-5"></i> Ubah Password
        </button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $pass1 = addslashes($_POST['pass1']);
        $pass2 = addslashes($_POST['pass2']);
        $currdate = date('Y-m-d H:i:s');

        if ($pass2 !== $pass1) {
            echo '<div class="bg-red-100 text-red-700 px-4 py-2 rounded">Ulangi Password tidak sesuai</div>';
        } else {
            $update = mysqli_query($conn, "UPDATE pengguna SET
                password = '" . md5($pass1) . "',
                updated_at = '$currdate'
                WHERE id = '" . $_SESSION['uid'] . "'
            ");

            if ($update) {
                echo '<div class="bg-green-100 text-green-700 px-4 py-2 rounded">Ubah Password Berhasil</div>';
            } else {
                echo 'Gagal edit ' . mysqli_error($conn);
            }
        }
    }
    ?>
</div>
</div>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    function togglePassword(fieldId, button) {
        const input = document.getElementById(fieldId);
        const icon = document.getElementById("eye");
        const isHidden = input.type === "password";

        input.type = isHidden ? "text" : "password";
        icon.setAttribute("data-lucide", isHidden ? "eye" : "eye-off");
        lucide.createIcons(); // refresh icon
    }

    function togglePassword1(fieldId, button) {
        const input = document.getElementById(fieldId);
        const icon1 = document.getElementById("eye1");
        const isHidden = input.type === "password";

        input.type = isHidden ? "text" : "password";
        icon1.setAttribute("data-lucide", isHidden ? "eye" : "eye-off");
        lucide.createIcons(); // refresh icon
    }
</script>

<?php include 'footer.php'; ?>
