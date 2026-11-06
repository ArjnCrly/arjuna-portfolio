<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Katalog Proyek &amp; Studi Kasus — <?php echo e($profile->full_name ?? 'Arjuna Carly'); ?></title>
  <meta name="description" content="Katalog portofolio dan studi kasus pengembangan web, UI/UX, dan aplikasi sistem oleh <?php echo e($profile->full_name ?? 'Arjuna Carly'); ?>." />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portfolio.css')); ?>?v=<?php echo e(filemtime(public_path('assets/css/portfolio.css'))); ?>" />
</head>
<body class="case-study-page">

  <main>
    <!-- ======================================================================
         1. HERO HEADER (No Floating Navbar)
         ====================================================================== -->
    <section class="case-hero-section">
      <div class="container">
        
        <div class="case-breadcrumb-row">
          <div class="breadcrumb-left">
            <a href="/" class="case-back-btn">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
              </svg>
              <span>Kembali ke Beranda</span>
            </a>
            <span class="breadcrumb-divider">/</span>
            <span class="breadcrumb-active">Semua Proyek &amp; Studi Kasus</span>
          </div>

          <div class="breadcrumb-right">
            <!-- Theme Toggle Switch -->
            <button type="button" class="theme-toggle-switch" id="theme-toggle-switch" title="Ubah Mode Gelap / Terang">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="5"></circle>
                <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
              </svg>
            </button>
          </div>
        </div>

        <div class="section-top-label-row">
          <div class="section-counter-tag">ARSIP KARYA &amp; PORTOFOLIO</div>
          <div class="section-counter-tag"><span><?php echo e(count($projects)); ?> REPOSITORY PROJEK</span></div>
        </div>

        <h1 class="case-main-title">
          SEMUA PROYEK<span class="dot">.</span>
        </h1>
        <p class="case-lead-desc">
          Kumpulan hasil rekayasa perangkat lunak, perancangan antarmuka Figma, integrasi API, dan aplikasi komersial maupun akademik yang telah saya kembangkan.
        </p>

        <!-- Category Filter Pills -->
        <div class="catalog-filter-bar">
          <button type="button" class="catalog-filter-btn active" data-filter="all">Semua (<?php echo e(count($projects)); ?>)</button>
          <button type="button" class="catalog-filter-btn" data-filter="fullstack">Fullstack &amp; Laravel</button>
          <button type="button" class="catalog-filter-btn" data-filter="frontend">Frontend &amp; UI/UX</button>
          <button type="button" class="catalog-filter-btn" data-filter="pm">Project Management &amp; Agile</button>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         3. CATALOG GRID
         ====================================================================== -->
    <section class="case-content-section">
      <div class="container">
        
        <div class="other-projects-grid" id="catalog-projects-grid">
          <?php foreach($projects as $proj): ?>
          <?php 
            $catLower = strtolower($proj->category ?? '');
            $filterTag = 'all';
            if (str_contains($catLower, 'fullstack') || str_contains($catLower, 'laravel')) {
                $filterTag .= ' fullstack';
            }
            if (str_contains($catLower, 'frontend') || str_contains($catLower, 'ui/ux')) {
                $filterTag .= ' frontend';
            }
            if (str_contains($catLower, 'management') || str_contains($catLower, 'agile') || str_contains($catLower, 'pm')) {
                $filterTag .= ' pm';
            }
           ?>
          <a href="<?php echo e(route('portfolio.project.show', ['slug' => $proj->slug])); ?>" class="other-project-card catalog-card" data-category="<?php echo e($filterTag); ?>">
            <?php if($proj->image): ?>
            <div class="other-card-img-wrap" style="height:210px;">
              <img src="<?php echo e(asset($proj->image)); ?>" alt="<?php echo e($proj->title); ?>" class="other-card-img" />
            </div>
            <?php endif; ?>
            <div class="other-card-body">
              <div class="other-card-meta">
                <span class="other-card-cat"><?php echo e($proj->category); ?></span>
                <span class="other-card-role"><?php echo e($proj->period); ?></span>
              </div>
              <h3 class="other-card-title"><?php echo e($proj->title); ?></h3>
              <p class="other-card-desc"><?php echo e($proj->short_description); ?></p>

              <?php 
                $pStacks = array_filter(array_map('trim', explode(',', (string)$proj->tech_stack)));
               ?>
              <?php if(count($pStacks) > 0): ?>
              <div class="case-stack-pills" style="margin-bottom:1.25rem;">
                <?php foreach(array_slice($pStacks, 0, 4) as $st): ?>
                <span class="case-tech-chip" style="font-size:0.72rem;padding:0.2rem 0.55rem;"><?php echo e($st); ?></span>
                <?php endforeach; ?>
                <?php if(count($pStacks) > 4): ?>
                <span class="case-tech-chip" style="font-size:0.72rem;padding:0.2rem 0.55rem;">+<?php echo e(count($pStacks) - 4); ?></span>
                <?php endif; ?>
              </div>
              <?php endif; ?>

              <div class="other-card-footer">
                <span class="other-card-link">Baca Studi Kasus Lengkap →</span>
              </div>
            </div>
          </a>
          <?php endforeach; ?>
        </div>

      </div>
    </section>
  </main>

  <!-- ========================================================================
       4. FOOTER BAR
       ======================================================================== -->
  <footer class="site-footer-bar">
    <div class="container footer-bar-inner">
      <div class="footer-monogram">
        © <?php echo e(date('Y')); ?> <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> · Semua Hak Dilindungi
      </div>
      <div class="footer-social-links">
        <a href="https://github.com/arjunacarly" target="_blank" rel="noopener">GitHub</a>
        <a href="https://linkedin.com/in/arjunacarly" target="_blank" rel="noopener">LinkedIn</a>
        <a href="https://instagram.com/arjunacarly" target="_blank" rel="noopener">Instagram</a>
        <a href="#home" class="back-to-top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">↑ Ke Atas</a>
      </div>
    </div>
  </footer>

  <script src="<?php echo e(asset('assets/js/portfolio.js')); ?>"></script>
  <script>
    // Simple instant filter for catalog page
    document.querySelectorAll('.catalog-filter-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.catalog-filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.catalog-card').forEach(card => {
          if (filter === 'all' || card.dataset.category.includes(filter)) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>
