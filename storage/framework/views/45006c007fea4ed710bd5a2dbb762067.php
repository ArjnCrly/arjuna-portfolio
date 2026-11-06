<!DOCTYPE html>
<html lang="id" data-theme="dark" data-accent="emerald">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo e($project->title); ?> — Studi Kasus Portofolio Arjuna Carly</title>
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
        <a href="/">← beranda</a>
        <span class="nav-dot">·</span>
        <a href="/projects">semua projek</a>
        <span class="nav-dot">·</span>
        <a href="/#kontak">hubungi saya</a>
      </nav>
      <div class="nav-controls">
        <a href="/admin/projects/<?php echo e($project->id); ?>/edit" class="cms-nav-btn">Edit Projek Ini</a>
      </div>
    </div>
  </header>

  <main class="portfolio-section">
    <div class="container" style="max-width:900px;">
      <div style="margin-bottom:1.5rem;">
        <a href="/#projek" class="link-more">← kembali ke daftar projek</a>
      </div>

      <span class="section-index">[ <?php echo e(strtolower($project->category ?? 'studi kasus projek')); ?> ]</span>
      <h1 class="hero-title" style="font-size:clamp(1.8rem, 3.2vw, 2.5rem);margin-bottom:0.85rem;">
        <?php echo e($project->title); ?>
      </h1>

      <div class="identity-chips" style="margin-bottom:2rem;">
        <div class="identity-chip"><strong>Peran:</strong>&nbsp;<?php echo e($project->role); ?></div>
        <?php if($project->client): ?>
        <div class="identity-chip"><strong>Mitra / Instansi:</strong>&nbsp;<?php echo e($project->client); ?></div>
        <?php endif; ?>
        <?php if($project->period): ?>
        <div class="identity-chip"><strong>Periode:</strong>&nbsp;<?php echo e($project->period); ?></div>
        <?php endif; ?>
        <?php if($project->metrics_highlight): ?>
        <div class="identity-chip" style="border-color:var(--accent-border);color:var(--accent);">
          <strong>Impact:</strong>&nbsp;<?php echo e($project->metrics_highlight); ?>
        </div>
        <?php endif; ?>
      </div>

      <?php if($project->image): ?>
      <div style="margin-bottom:2rem;border-radius:12px;overflow:hidden;border:1px solid var(--border-subtle);">
        <img src="<?php echo e(asset($project->image)); ?>" alt="<?php echo e($project->title); ?>" style="width:100%;max-height:420px;object-fit:cover;" />
      </div>
      <?php endif; ?>

      <div class="edu-card" style="margin-bottom:1.75rem;">
        <h2 style="font-family:var(--font-display);font-size:1.25rem;margin-bottom:0.85rem;">Deskripsi &amp; Studi Kasus</h2>
        <?php 
          $paragraphs = array_filter(array_map('trim', explode("\n", (string)$project->full_description)));
         ?>
        <?php foreach($paragraphs as $p): ?>
        <p style="color:var(--text-secondary);margin-bottom:0.95rem;line-height:1.75;"><?php echo e($p); ?></p>
        <?php endforeach; ?>

        <?php 
          $features = array_filter(array_map('trim', explode("\n", (string)$project->key_features)));
         ?>
        <?php if(count($features) > 0): ?>
        <h3 style="font-family:var(--font-display);font-size:1.1rem;margin:1.25rem 0 0.75rem;">Fitur Utama &amp; Kontribusi Teknis</h3>
        <ul class="timeline-bullets">
          <?php foreach($features as $feat): ?>
          <li><?php echo e($feat); ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <div style="margin-top:1.5rem;padding-top:1.2rem;border-top:1px solid var(--border-subtle);">
          <div style="font-family:var(--font-mono);font-size:0.75rem;color:var(--text-muted);margin-bottom:0.5rem;">
            teknologi &amp; instrumen yang digunakan:
          </div>
          <?php 
            $stacks = array_filter(array_map('trim', explode(',', (string)$project->tech_stack)));
           ?>
          <div class="tag-row">
            <?php foreach($stacks as $st): ?>
            <span class="tech-pill"><?php echo e($st); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="hero-actions">
        <?php if($project->live_url): ?>
        <a href="<?php echo e($project->live_url); ?>" target="_blank" rel="noopener" class="btn-primary">
          <span>buka live website</span>
          <span>↗</span>
        </a>
        <?php endif; ?>
        <a href="/projects" class="btn-secondary">lihat projek lainnya</a>
      </div>
    </div>
  </main>

  <script src="<?php echo e(asset('assets/js/portfolio.js')); ?>"></script>
</body>
</html>
