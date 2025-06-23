	<?php 
    include 'koneksi.php';
    $title = "Tentang Sekolah | $d->nama";
    include 'header.php'; ?>
	<section id="about" class="section-padding relative z-10 p-6">
    <div>
      <div class="text-center mb-16" ref="sectionTitle">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
          <span class="dark:text-slate-50 text-slate-950">Tentang <?= $d->nama ?></span>
        </h2>
      </div>
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="relative" ref="aboutContent">
          <div class="relative z-10">
            <p class="dark:text-slate-300 text-slate-900 text-lg mb-6">
              <span class="font-semibold dark:text-white text-black"><?= $d->nama ?></span> <?= htmlspecialchars($d->tentang_sekolah, ENT_QUOTES, 'UTF-8') ?>
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="p-6 rounded-2xl bg-gray-500/50 dark:bg-gray-950/50 backdrop-blur-sm border border-slate-800">
                <div class="w-12 h-12 rounded-full flex items-center justify-center bg-bg-gray-900/20 text-bg-gray-900 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                    <path d="M2 12h20"></path>
                  </svg>
                </div>
                <h3 class="font-semibold text-xl mb-2">Visi</h3>
                <p class="dark:text-slate-400 text-slate-900"><?= $d->visi ?></p>
              </div>
              
              <div class="p-6 rounded-2xl bg-gray-500/50 dark:bg-gray-950/50 backdrop-blur-sm border border-slate-800">
                <div class="w-12 h-12 rounded-full flex items-center justify-center bg-bg-gray-950/20 text-bg-gray-950 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb" aria-hidden="true">
                    <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"></path>
                    <path d="M9 18h6"></path>
                    <path d="M10 22h4"></path>
                  </svg>
                </div>
                <h3 class="font-semibold text-xl mb-2">Misi</h3>
                <p class="dark:text-slate-400 text-slate-900"><?= $d->misi ?></p>
              </div>
            </div>
          </div>
          <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-gradient-to-r from-slate-900/30 to-slate-950/30 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative" ref="aboutStats">
          <div class="relative z-10 overflow-hidden rounded-2xl border border-slate-800">
            <div class="backdrop-blur-md bg-gray-950/30 p-8">
              
              		<img
						src="uploads/identitas/<?= $d->foto_sekolah ?>"
						class="rounded w-full h-full "
						alt="Tentang Sekolah <?= $d->nama ?>"
					/>
 
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
	<?php include 'footer.php'; ?>