<?php include 'header.php'; ?>

<div class="max-w-screen mx-auto mt-10 bg-white p-6 shadow rounded-md space-y-6">

    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i data-lucide="users" class="w-6 h-6"></i> Daftar Pengguna
        </h1>
        <a href="tambah-pengguna.php"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center gap-2">
            <i data-lucide="plus-circle" class="w-5 h-5"></i> Tambah
        </a>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
            <?= $_GET['success'] ?>
        </div>
    <?php endif; ?>

    <form class="flex items-center gap-2 mt-2 mb-4" action="">
        <input type="text" name="key" placeholder="Cari nama pengguna..."
            value="<?= isset($_GET['key']) ? htmlspecialchars($_GET['key']) : '' ?>"
            class="w-full md:w-64 border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-300" />
        <button type="submit"
            class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded flex items-center gap-1">
            <i data-lucide="search" class="w-4 h-4"></i> Cari
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Username</th>
                    <th class="px-4 py-2 border">Level</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $where = " WHERE 1=1 ";
                if(isset($_GET['key'])){
                    $where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                }

                $pengguna = mysqli_query($conn, "SELECT * FROM pengguna $where ORDER BY id DESC");
                if(mysqli_num_rows($pengguna) > 0){
                    while($p = mysqli_fetch_array($pengguna)){
                ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-center"><?= $no++ ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($p['nama']) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($p['username']) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($p['level']) ?></td>
                        <td class="px-4 py-2 text-center flex gap-3 justify-center">
                            <a href="edit-pengguna.php?id=<?= $p['id'] ?>" title="Edit"
                                class="text-orange-500 hover:text-orange-600">
                                <i data-lucide="edit" class="w-5 h-5"></i>
                            </a>
                            <a href="hapus.php?idpengguna=<?= $p['id'] ?>"
                                onclick="return confirm('Yakin ingin hapus?')"
                                title="Hapus"
                                class="text-red-500 hover:text-red-600">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </a>
                        </td>
                    </tr>
                <?php }} else { ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Data tidak ditemukan</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>