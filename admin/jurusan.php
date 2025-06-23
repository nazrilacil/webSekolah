<?php include 'header.php' ?>

<!-- content -->
<div class="content">

	<div class="container">

		<div class="box">
			<div class="mx-auto max-w-lg text-center mt-4 mb-4">
				<h2 class="text-2xl font-bold text-gray-900 md:text-3xl" data-aos="fade-up" data-aos-duration="500">
					Jurusan di <strong class="text-teal-600"> <?= $d->nama ?> </strong>
				</h2>
			</div>

			<div class="box-body">

				<?php
				if (isset($_GET['success'])) {
					echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
				}
				?>

				<form action="" class="w-80 mx-auto mb-4">
					<label for="Search">
						<span class="text-sm font-medium text-gray-700"> Search </span>

						<div class="relative">
							<input
								type="text"
								id="Search"
								name="key"
								class="mt-0.5 w-full h-10 rounded border-gray-400 bg-gray-300 p-4 pe-10 shadow-lg sm:text-sm" />

							<span class="absolute inset-y-0 right-2 grid w-8 place-content-center">
								<button
									type="submit"
									aria-label="Submit"
									class="rounded-full p-1.5 text-gray-700 transition-colors hover:bg-gray-100">
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
											d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
									</svg>
								</button>
							</span>
						</div>
					</label>
				</form>
				
				<a href="tambah-jurusan.php" class="flex items-center px-3 py-1 w-25 h-8 text-sm text-blue-600 bg-blue-50 rounded-lg">
					<i data-lucide="plus" class="w-4 h-4 mr-1"></i>
					Tambah
				</a>
				<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-6 lg:p-4 md:p-8 p-10" id="jurusan">


					<?php
					$no = 1;

					$where = " WHERE 1=1 ";
					if (isset($_GET['key'])) {
						$where .= " AND nama LIKE '%" . addslashes($_GET['key']) . "%' ";
					}

					$jurusan = mysqli_query($conn, "SELECT * FROM jurusan $where ORDER BY id DESC");
					if (mysqli_num_rows($jurusan) > 0) {
						while ($p = mysqli_fetch_array($jurusan)) {
					?>
							<div class="container">

								<div
									class="max-w-lg overflow-hidden rounded-lg border border-gray-100 bg-white shadow-xs"
									data-aos="fade-up"
									data-aos-duration="300">
									<img
										alt="<?= $p['nama'] ?>"
										src="../uploads/jurusan/<?= $p['gambar'] ?>"
										class="h-56 w-full object-cover" />

									<div class="p-4 sm:p-6"
										data-aos="fade-right"
										data-aos-offset="300"
										data-aos-easing="ease-in-sine">
										<a href="#">
											<h3 class="text-lg font-medium text-gray-900">
												<?= $p['nama'] ?>
											</h3>
										</a>

										<p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
											<?= $p['keterangan'] ?>
										</p>
										<div class="mt-4 mx-auto">
											<span
												class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
												<a href="edit-jurusan.php?id=<?= $p['id'] ?>" title="Edit Data"
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

												<a href="../uploads/jurusan/<?= $p['gambar'] ?>" data-fancybox="jurusan" data-caption="<?= $p['nama'] ?>"
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

												<a href="hapus.php?idjurusan=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data"
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

							</div>

						<?php }
					} else { ?>
						<tr>
							<td colspan="5">Data tidak ada</td>
						</tr>
					<?php } ?>

				</div>
			</div>

		</div>

	</div>

</div>
</div>

<?php include 'footer.php' ?>