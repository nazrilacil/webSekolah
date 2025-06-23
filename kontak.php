	<?php 
    include 'koneksi.php';
    $title = "Kontak | $d->nama";
    include 'header.php'; ?>
	<section id="contact" class="section-padding relative z-10 p-6">
		<div class="text-center mb-16" ref="sectionTitle" data-aos="zoom-in" data-aos-duration="300">
			<h2 class="text-4xl md:text-5xl font-bold mb-4">
				<span class="text-slate-950 dark:text-slate-50">Hubungi Kami</span>
			</h2>
			<p class="text-lg text-slate-800 dark:text-slate-400 max-w-2xl mx-auto">Tertarik mengenal lebih dalam tentang jurusan yang kami tawarkan, kegiatan praktik industri, atau proses penerimaan siswa baru? Hubungi kami melalui form atau kontak yang tersedia. Tim SMK kami siap membantu dengan informasi yang Anda butuhkan.</p>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
			<!-- Form Kontak -->
			<div class="bg-gray-950/20 backdrop-blur-sm border border-slate-800 rounded-2xl p-6 md:p-8" data-aos="zoom-in-right" data-aos-duration="600">
				<iframe src="<?= $d->google_maps ?>" class="w-full h-full"></iframe>
				<a
					href="<?= $d->google_maps ?>"
					data-fancybox
					data-type="iframe"
					data-width="640"
					data-height="480" class="group mt-2 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
					<i data-lucide="map-pinned"></i> 
					Lihat Detail
					<span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
						&rarr;
					</span>
				</a>
			</div>

			<!-- Informasi Kontak -->
			<div ref="contactInfo" data-aos="zoom-in-left" data-aos-duration="900">
				<div class="bg-gray-950/20 backdrop-blur-sm border border-slate-800 rounded-2xl p-6 md:p-8 mb-8">
					<h3 class="text-2xl font-bold mb-6 dark:text-white text-gray-900">Informasi Kontak</h3>
					<div class="space-y-4">
						<div class="flex items-start">
							<div class="w-10 h-10 rounded-full bg-bg-gray-950/20 flex items-center justify-center text-bg-gray-950 mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone" aria-hidden="true">
									<path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
								</svg>
							</div>
							<div>
								<h4 class="text-gray-900 dark:text-white font-medium">Telepon</h4>
								<p class="text-slate-800 dark:text-slate-400"><?= $d->telepon ?></p>
							</div>
						</div>

						<div class="flex items-start">
							<div class="w-10 h-10 rounded-full bg-bg-gray-950/20 flex items-center justify-center text-bg-gray-950 mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail" aria-hidden="true">
									<path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
									<rect x="2" y="4" width="20" height="16" rx="2"></rect>
								</svg>
							</div>
							<div>
								<h4 class="text-gray-900 dark:text-white font-medium">Email</h4>
								<p class="text-slate-800 dark:text-slate-400"><?= $d->email ?></p>
							</div>
						</div>

						<div class="flex items-start">
							<div class="w-10 h-10 rounded-full bg-bg-gray-950/20 flex items-center justify-center text-bg-gray-950 mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin" aria-hidden="true">
									<path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
									<circle cx="12" cy="10" r="3"></circle>
								</svg>
							</div>
							<div>
								<h4 class="dark:text-white text-gray-900 font-medium">Alamat</h4>
								<p class="text-slate-800 dark:text-slate-400"><?= $d->alamat ?></p>
							</div>
						</div>
					</div>
				</div>
	</section>

	<?php include 'footer.php'; ?>