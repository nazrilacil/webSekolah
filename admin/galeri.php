<?php include 'header.php' ?>
<script src="https://unpkg.com/lucide@latest"></script>

<div class="min-h-screen bg-gray-100 p-4">
    <div class="max-w-6xl mx-auto">

        <!-- Header & Card Tombol Tambah -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <i data-lucide="images" class="w-6 h-6 text-blue-600"></i> Galeri Sekolah
            </h1>
        </div>

        <!-- Alert -->
        <?php if(isset($_GET['success'])): ?>
            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded-lg shadow">
                <?= $_GET['success'] ?>
            </div>
        <?php endif; ?>

        <!-- Pencarian -->
        <form action="" method="GET" class="mb-6">
            <div class="flex items-center border rounded-xl overflow-hidden shadow-sm bg-white">
                <input type="text" name="key" placeholder="Cari keterangan..." class="flex-1 px-4 py-2 outline-none" value="<?= isset($_GET['key']) ? htmlspecialchars($_GET['key']) : '' ?>">
                <button type="submit" class="px-4 text-gray-600 hover:text-blue-600">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </button>
            </div>
        </form>

        <!-- Galeri Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Card Tombol Tambah -->
            <a href="tambah-galeri.php" class="flex flex-col items-center justify-center border-2 border-dashed border-blue-400 rounded-xl p-6 bg-white hover:bg-blue-50 transition cursor-pointer text-center">
                <i data-lucide="plus-circle" class="w-10 h-10 text-blue-600 mb-2"></i>
                <span class="text-blue-600 font-semibold">Tambah Foto</span>
            </a>

            <!-- Loop Data Galeri -->
            <?php
            $no = 1;
            $where = " WHERE 1=1 ";
            if(isset($_GET['key'])){
                $where .= " AND keterangan LIKE '%".addslashes($_GET['key'])."%' ";
            }

            $galeri = mysqli_query($conn, "SELECT * FROM galeri $where ORDER BY id DESC");
            if(mysqli_num_rows($galeri) > 0){
                while($p = mysqli_fetch_array($galeri)){
            ?>
            <div class="bg-white rounded-xl shadow hover:shadow-md overflow-hidden">
                <img src="../uploads/galeri/<?= $p['foto'] ?>" alt="Galeri" class="w-full h-48 object-cover">
                <div class="p-4 justify-between h-full">
                    <p class="text-gray-700 text-sm"><?= $p['keterangan'] ?></p>

										<div class="mt-4 mb-3">
						<span
							class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
							<a href="edit-galeri.php?id=<?= $p['id'] ?>" title="Edit Data"
								type="button"
								class="px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
								aria-label="Edit">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									fill="none"
									viewBox="0 0 24 24"
									stroke-width="1.5"
									stroke="currentColor"
									class="size-4">
									<path
										stroke-linecap="round"
										stroke-linejoin="round"
										d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
								</svg>
							</a>

							<a href="../uploads/galeri/<?= $p['foto'] ?>" data-fancybox="foto" data-caption="<?= $p['keterangan'] ?>"
								type="button"
								class="px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
								aria-label="View">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									fill="none"
									viewBox="0 0 24 24"
									stroke-width="1.5"
									stroke="currentColor"
									class="size-4">
									<path
										stroke-linecap="round"
										stroke-linejoin="round"
										d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
									<path
										stroke-linecap="round"
										stroke-linejoin="round"
										d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
								</svg>
							</a>

							<a href="hapus.php?idgaleri=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data"
								type="button"
								class="px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
								aria-label="Delete">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									fill="none"
									viewBox="0 0 24 24"
									stroke-width="1.5"
									stroke="currentColor"
									class="size-4">
									<path
										stroke-linecap="round"
										stroke-linejoin="round"
										d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
								</svg>
							</a>
						</span>
					</div>

                </div>
            </div>
            <?php }} else { ?>
                <div class="col-span-full text-center text-gray-500 py-10">Tidak ada data galeri ditemukan.</div>
            <?php } ?>
        </div>

    </div>
</div>
			</div>

<?php include 'footer.php' ?>
