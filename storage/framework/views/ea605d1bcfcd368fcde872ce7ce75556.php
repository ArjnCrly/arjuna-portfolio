<!DOCTYPE html>
<html lang="id" data-theme="dark" data-accent="emerald">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Semua Projek — <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?></title>
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portfolio.css')); ?>" />
</head>
<body>
  <div class="bg-glow bg-glow-1"></div>
  <div class="bg-glow bg-glow-2"></div>

  <header class="site-header">
    <div class="container nav-inner">
      <a href="/" class="brand-logo">
        <span class="brand-status-dot"></span>
        <span>arjuna<span class="brand-slash">.</span>carly</span>
      </a>
      <nav class="nav-menu">
        <a href="/">← kembali ke beranda</a>
        <span class="nav-dot">·</span>
        <a href="/projects" class="active">semua projek</a>
        <span class="nav-dot">·</span>
        <a href="/#kontak">kontak</a>
      </nav>
      <div class="nav-controls">
        <button type="button" class="theme-btn" id="theme-toggle-btn" title="Ubah Mode Gelap / Terang">☀</button>
        <a href="/admin/projects" class="cms-nav-btn">+ Kelola Projek</a>
      </div>
    </div>
  </header>

  <main class="portfolio-section">
    <div class="container">
      <div class="section-header">
        <div>
          <span class="section-index">arsip karya &amp; studi kasus</span>
          <h1 class="section-title">Semua Projek Portofolio (<?php echo e(count($projects)); ?>)</h1>
        </div>

        <div class="filter-tabs">
          <button type="button" class="filter-tab active" data-proj-filter="all">semua</button>
          <button type="button" class="filter-tab" data-proj-filter="Fullstack & Laravel">fullstack &amp; laravel</button>
          <button type="button" class="filter-tab" data-proj-filter="Frontend & UI/UX">frontend &amp; ui/ux</button>
          <button type="button" class="filter-tab" data-proj-filter="Project Management & Frontend">pm &amp; agile</button>
        </div>
      </div>

      <div class="projects-grid">
        <?php foreach($projects as $proj): ?>
        <article class="project-card" data-proj-category="<?php echo e($proj->category); ?>">
          <div class="project-visual">
            <?php if($proj->image): ?>
              <img src="<?php echo e(asset($proj->image)); ?>" alt="<?php echo e($proj->title); ?>" />
            <?php else: ?>
              <div class="project-blueprint-canvas theme-<?php echo e($proj->preview_theme ?? 'emerald'); ?>">
                <div class="blueprint-top-bar">
                  <span>[ <?php echo e(strtolower($proj->category ?? 'web project')); ?> ]</span>
                  <?php if($proj->metrics_highlight): ?>
                    <span class="metrics-badge"><?php echo e($proj->metrics_highlight); ?></span>
                  <?php endif; ?>
                </div>
                <div class="blueprint-mockup-box">
                  <div class="blueprint-mockup-title"><?php echo e($proj->title); ?></div>
                  <div class="blueprint-mockup-sub"><?php echo e($proj->role); ?> · <?php echo e($proj->period); ?></div>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <div class="project-body">
            <div>
              <div class="project-meta-top">
                <span><?php echo e($proj->role); ?></span>
                <span><?php echo e($proj->period); ?></span>
              </div>
              <h2 class="project-title"><?php echo e($proj->title); ?></h2>
              <p class="project-desc"><?php echo e($proj->short_description); ?></p>

              <?php 
                $pStacks = array_filter(array_map('trim', explode(',', (string)$proj->tech_stack)));
               ?>
              <?php if(count($pStacks) > 0): ?>
              <div class="tag-row">
                <?php foreach($pStacks as $st): ?>
                <span class="tech-pill"><?php echo e($st); ?></span>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
            </div>

            <div class="project-footer">
              <a href="<?php echo e(route('portfolio.project.show', ['slug' => $proj->slug])); ?>" class="link-more">
                <span>baca studi kasus</span>
                <span>→</span>
              </a>
              <?php if($proj->live_url): ?>
              <a href="<?php echo e($proj->live_url); ?>" target="_blank" rel="noopener" style="font-family:var(--font-mono);font-size:0.76rem;color:var(--text-secondary);">
                live demo ↗
              </a>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <div>© 2026 <strong><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?></strong></div>
      <div class="footer-links">
        <a href="/">beranda</a>
        <span>·</span>
        <a href="/admin">admin cms</a>
      </div>
    </div>
  </footer>

  <script src="<?php echo e(asset('assets/js/portfolio.js')); ?>"></script>
</body>
</html>
