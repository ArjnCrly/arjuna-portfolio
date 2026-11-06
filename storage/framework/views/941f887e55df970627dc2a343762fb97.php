<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> | Web Developer &amp; UI/UX Portfolio</title>
  <meta name="description" content="Portofolio resmi <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> — Mahasiswa D-IV Teknik Informatika Politeknik Negeri Malang. Spesialis UI/UX (Figma), Frontend (React & Tailwind CSS), dan Backend (Laravel & PHP)." />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portfolio.css')); ?>" />
</head>
<body>

  <!-- ========================================================================
       1. TOP NAVBAR (Format femasaf.my.id)
       ======================================================================== -->
  <header class="site-header">
    <div class="container nav-container">
      <a href="/" class="brand-wrapper">
        <div class="brand-title">
          <span>ARJUNA</span>
          <span class="brand-badge">C</span>
        </div>
        <span class="brand-subtext">PORTOFOLIO</span>
      </a>

      <nav class="nav-center-links" id="nav-center-links" aria-label="Navigasi Utama">
        <a href="#projek" class="active">projek</a>
        <span class="nav-dot">·</span>
        <a href="#pengalaman">pengalaman</a>
        <span class="nav-dot">·</span>
        <a href="#keahlian">keahlian</a>
        <span class="nav-dot">·</span>
        <a href="#kontak">kontak</a>
      </nav>

      <div class="nav-right-controls">
        <div class="nav-location">
          <span>📍</span>
          <span>Sidoarjo &amp; Malang, Jatim</span>
        </div>

        <button type="button" class="ctrl-btn" id="theme-toggle-btn" title="Ubah Mode Gelap / Terang">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="5"></circle>
            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
          </svg>
        </button>

        <a href="/admin" class="cms-link" title="Dashboard Admin Laravel">CMS</a>

        <button type="button" class="ctrl-btn mobile-toggle" id="mobile-toggle-btn" aria-label="Menu">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <main>
    <!-- ======================================================================
         2. HERO SECTION (Giant Brutalist Typography & Scroll Down)
         ====================================================================== -->
    <section class="hero-editorial">
      <div class="container" style="flex:1;display:flex;flex-direction:column;justify-content:space-between;">
        
        <div>
          <h1 class="hero-giant-title">
            <span class="title-line-1">ARJUNA<span class="hero-accent-badge">CAR</span>LY</span>
            <span class="title-line-2">DHYMAS MAHENDRA</span>
          </h1>
        </div>

        <div class="hero-bottom-grid">
          <p class="hero-bio-lead">
            Mahasiswa <strong>Teknik Informatika Polinema</strong> (kelahiran Sidoarjo, 13 Desember 2004) yang berfokus merancang antarmuka intuitif di <strong>Figma</strong>, rekayasa frontend interaktif dengan <strong>React &amp; Tailwind CSS</strong>, serta arsitektur backend handal berbasis <strong>Laravel &amp; PHP</strong>.
          </p>

          <a href="#projek" class="hero-scroll-indicator">
            <span>SCROLL</span>
            <span class="scroll-arrow">↓</span>
          </a>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         3. HORIZONTAL RUNNING MARQUEE TICKER (Frame 00:01 - 00:06)
         ====================================================================== -->
    <div class="marquee-ticker-wrap">
      <div class="marquee-ticker-content">
        <div class="ticker-item"><span class="ticker-dot">•</span> FIGMA UI/UX DESIGN</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> REACT FRONTEND</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> TAILWIND CSS</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> LARAVEL BACKEND</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> JAVASCRIPT (ES6+)</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> PHP MVC</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> RESTFUL API</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> AGILE SCRUM PM</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> MYSQL &amp; POSTGRESQL</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> BOOTSTRAP 5</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> HTML5 &amp; CSS3</div>
        <!-- Duplicate for continuous seamless loop -->
        <div class="ticker-item"><span class="ticker-dot">•</span> FIGMA UI/UX DESIGN</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> REACT FRONTEND</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> TAILWIND CSS</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> LARAVEL BACKEND</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> JAVASCRIPT (ES6+)</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> PHP MVC</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> RESTFUL API</div>
        <div class="ticker-item"><span class="ticker-dot">•</span> AGILE SCRUM PM</div>
      </div>
    </div>

    <!-- ======================================================================
         4. SECTION 01: KARYA PILIHAN / PROJEK (Interactive Split Showcase)
         ====================================================================== -->
    <section class="section-wrap" id="projek">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">01 / KARYA PILIHAN</div>
          <div class="section-counter-tag"><span><?php echo e(count($projects)); ?> PROJEK</span></div>
        </div>

        <div class="section-heading-row">
          <h2 class="section-giant-title">PROJEK<span class="dot">.</span></h2>
          <p class="section-sub-desc">
            Kumpulan platform web komersial, company profile lab akademik, dan proyek sistem aplikasi yang pernah saya rancang selama kuliah maupun kolaborasi mitra industri.
          </p>
        </div>

        <div class="projects-split-layout">
          <!-- Left Column: Interactive Projects List -->
          <div class="projects-interactive-list">
            <?php  $idx = 1;  ?>
            <?php foreach($projects as $proj): ?>
            <div class="project-row-item <?php echo e($idx === 1 ? 'active' : ''); ?>"
                 data-proj-num="<?php echo e(sprintf('%02d', $idx)); ?>"
                 data-proj-total="<?php echo e(sprintf('%02d', count($projects))); ?>"
                 data-proj-title="<?php echo e($proj->title); ?>"
                 data-proj-desc="<?php echo e($proj->short_description); ?>"
                 data-proj-features="<?php echo e(str_replace("\n", "|", (string)$proj->key_features)); ?>"
                 data-proj-url="<?php echo e($proj->live_url); ?>"
                 data-proj-slug="<?php echo e($proj->slug); ?>">
              
              <div class="project-row-top">
                <span class="project-num"><?php echo e(sprintf('%02d', $idx)); ?></span>
                <span><?php echo e($proj->period ?? '2024'); ?></span>
              </div>

              <div class="project-row-main">
                <h3 class="project-item-title"><?php echo e($proj->title); ?></h3>
                <span class="project-lihat-pill">LIHAT</span>
              </div>

              <div class="project-tags-row">
                <?php 
                  $tags = array_filter(array_map('trim', explode(',', (string)$proj->tech_stack)));
                 ?>
                <?php foreach(array_slice($tags, 0, 4) as $tag): ?>
                <span class="project-tag-pill"><?php echo e($tag); ?></span>
                <?php endforeach; ?>
                <?php if($proj->metrics_highlight): ?>
                <span class="project-tag-pill" style="color:var(--accent);border-color:var(--accent-border);">
                  <?php echo e($proj->metrics_highlight); ?>
                </span>
                <?php endif; ?>
              </div>

            </div>
            <?php  $idx++;  ?>
            <?php endforeach; ?>
          </div>

          <!-- Right Column: Sticky Live Preview Window -->
          <div class="project-sticky-preview">
            <div class="preview-top-bar">
              <span class="preview-counter" id="preview-counter">01 / <?php echo e(sprintf('%02d', count($projects))); ?></span>
              <span class="preview-title-bar" id="preview-title-bar"><?php echo e($projects[0]->title ?? 'PROJEK'); ?></span>
              <span class="preview-badge-status">PRATINJAU</span>
            </div>

            <div class="preview-screen-body">
              <div>
                <h4 class="preview-inner-title" id="preview-inner-title"><?php echo e($projects[0]->title ?? 'PROJEK'); ?></h4>
                <p class="preview-inner-desc" id="preview-inner-desc"><?php echo e($projects[0]->short_description ?? ''); ?></p>
                
                <ul class="preview-features-list" id="preview-features-list">
                  <?php 
                    $initFeats = array_filter(array_map('trim', explode("\n", (string)($projects[0]->key_features ?? ''))));
                   ?>
                  <?php foreach(array_slice($initFeats, 0, 4) as $f): ?>
                  <li><?php echo e($f); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>

              <a href="<?php echo e($projects[0]->live_url ?? '#'); ?>" 
                 id="preview-action-btn" 
                 class="preview-action-btn" 
                 target="<?php echo e(($projects[0]->live_url ?? '') ? '_blank' : '_self'); ?>">
                <?php echo e(($projects[0]->live_url ?? '') ? 'Buka Website Live ↗' : 'Detail Studi Kasus →'); ?>
              </a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         5. BIG STATEMENT / QUOTE SECTION (Frame 00:12)
         ====================================================================== -->
    <section class="statement-section">
      <div class="container">
        <span class="statement-tag">[ TENTANG SAYA ]</span>
        <div class="statement-big-text">
          Frontend developer &amp; UI/UX designer yang fokus <span class="statement-highlight">build scalable web apps</span>, merancang wireframe &amp; prototype di <span class="statement-highlight">Figma</span>, dan membangun backend tangguh dengan <span class="statement-highlight">Laravel</span>.
        </div>
      </div>
    </section>

    <!-- ======================================================================
         6. SECTION 02: PENGALAMAN & REKAM JEJAK (Frame 00:11)
         ====================================================================== -->
    <section class="section-wrap" id="pengalaman">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">02 / REKAM PENGALAMAN</div>
          <div class="section-counter-tag"><span><?php echo e(count($workExperiences) + count($orgExperiences)); ?> ENTITAS</span></div>
        </div>

        <div class="section-heading-row">
          <h2 class="section-giant-title">PENGALAMAN<span class="dot">.</span></h2>
          <p class="section-sub-desc">
            Riwayat pengerjaan proyek web development mitra luar, proyek riset laboratorium kampus, kepemimpinan organisasi, serta keikutsertaan kepanitiaan.
          </p>
        </div>

        <div class="timeline-table">
          <?php  $rIdx = 1;  ?>
          <?php foreach($workExperiences as $exp): ?>
          <div class="timeline-row">
            <span class="row-index"><?php echo e(sprintf('%02d', $rIdx)); ?></span>
            <div>
              <div class="row-title-bold"><?php echo e($exp->company); ?></div>
              <div style="font-family:var(--font-mono);font-size:0.75rem;color:var(--accent);margin-top:2px;">
                <?php echo e($exp->period); ?>
              </div>
            </div>
            <div class="row-subtitle"><?php echo e($exp->role); ?></div>
            <div class="row-action-link">
              <?php if($exp->link_url): ?>
              <a href="<?php echo e($exp->link_url); ?>" target="_blank" rel="noopener">Kunjungi ↗</a>
              <?php else: ?>
              <span>Proyek</span>
              <?php endif; ?>
            </div>
          </div>
          <?php  $rIdx++;  ?>
          <?php endforeach; ?>

          <?php foreach($orgExperiences as $org): ?>
          <div class="timeline-row">
            <span class="row-index"><?php echo e(sprintf('%02d', $rIdx)); ?></span>
            <div>
              <div class="row-title-bold"><?php echo e($org->company); ?></div>
              <div style="font-family:var(--font-mono);font-size:0.75rem;color:var(--text-muted);margin-top:2px;">
                <?php echo e($org->period); ?>
              </div>
            </div>
            <div class="row-subtitle"><?php echo e($org->role); ?></div>
            <div class="row-action-link">
              <span>Organisasi</span>
            </div>
          </div>
          <?php  $rIdx++;  ?>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         7. SECTION 03: TECH STACK OBSIDIAN GRAPH VIEW (Frame 00:13 - 00:18)
         ====================================================================== -->
    <section class="section-wrap" id="keahlian">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">03 / TECH STACK &amp; TOOLS</div>
          <div class="section-counter-tag"><span>4 CORE DOMAINS</span></div>
        </div>

        <div class="section-heading-row">
          <h2 class="section-giant-title">KEAHLIAN<span class="dot">.</span></h2>
          <p class="section-sub-desc">
            Visualisasi keterhubungan teknologi, framework, dan tools yang saya gunakan dalam pengembangan produk digital end-to-end.
          </p>
        </div>

        <div class="graph-section-grid">
          <!-- Left: Category List Buttons -->
          <div class="graph-sidebar-nav">
            <div class="graph-nav-heading">PILIH DOMAIN</div>
            <button type="button" class="graph-cat-btn active" data-cluster="all" data-cluster-label="Semua Hubungan Teknologi">
              <span>00 SEMUA DOMAIN</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="bahasa" data-cluster-label="Bahasa Pemrograman (PHP, JS, HTML/CSS, TS)">
              <span>01 BAHASA PEMROGRAMAN</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="framework" data-cluster-label="Framework &amp; UI (Laravel, React, Tailwind, Bootstrap)">
              <span>02 FRAMEWORK &amp; UI</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="database" data-cluster-label="Database &amp; Storage (MySQL, PostgreSQL, SQLite)">
              <span>03 DATABASE &amp; CLOUD</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="tools" data-cluster-label="Tools &amp; Management (Figma, Git, VS Code, Scrum)">
              <span>04 TOOLS &amp; DESIGN</span>
              <span>→</span>
            </button>
          </div>

          <!-- Right: Interactive Canvas Network Graph -->
          <div class="graph-canvas-container">
            <div class="graph-canvas-overlay">GRAPH VIEW INTERAKTIF</div>
            <canvas id="obsidian-network-canvas"></canvas>
            <div class="graph-footer-info" id="graph-active-label">Semua Hubungan Teknologi</div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         8. SECTION 04: GIANT CONTACT SECTION (Frame 00:14)
         ====================================================================== -->
    <section class="contact-giant-section" id="kontak">
      <div class="container">
        
        <h2 class="contact-giant-title">HUBUNGI<span style="color:var(--accent);">.</span></h2>

        <div class="contact-channels-grid">
          <!-- Left: Channels -->
          <div class="contact-card-box">
            <div class="contact-channel-item">
              <div>
                <span class="channel-tag">EMAIL RESMI</span>
                <div class="channel-val"><?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?></div>
              </div>
              <button type="button" class="copy-pill-btn" data-copy-text="<?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?>">
                SALIN EMAIL
              </button>
            </div>

            <div class="contact-channel-item">
              <div>
                <span class="channel-tag">WHATSAPP / TELEPON</span>
                <div class="channel-val"><?php echo e($profile->phone ?? '082126908940'); ?></div>
              </div>
              <a href="https://wa.me/<?php echo e($profile->whatsapp ?? '6282126908940'); ?>" target="_blank" rel="noopener" class="copy-pill-btn">
                CHAT WA ↗
              </a>
            </div>

            <div class="contact-channel-item">
              <div>
                <span class="channel-tag">LINKEDIN</span>
                <div class="channel-val">linkedin.com/in/<?php echo e($profile->linkedin_handle ?? 'arjunacarly'); ?></div>
              </div>
              <a href="<?php echo e($profile->linkedin_url ?? 'https://linkedin.com/in/arjunacarly'); ?>" target="_blank" rel="noopener" class="copy-pill-btn">
                BUKA ↗
              </a>
            </div>

            <div class="contact-channel-item">
              <div>
                <span class="channel-tag">PORTOFOLIO MITRA</span>
                <div class="channel-val">hunianlestari.com</div>
              </div>
              <a href="<?php echo e($profile->website_url ?? 'https://hunianlestari.com'); ?>" target="_blank" rel="noopener" class="copy-pill-btn">
                KUNJUNGI ↗
              </a>
            </div>
          </div>

          <!-- Right: Direct Message Form Connected to Laravel Database -->
          <div class="contact-card-box">
            <?php if(session()->has('success')): ?>
              <div style="background:var(--accent-soft);border:1px solid var(--accent-border);color:var(--accent);padding:0.75rem 1rem;border-radius:6px;font-family:var(--font-mono);font-size:0.8rem;margin-bottom:1rem;">
                ✓ <?php echo e(session('success')); ?>
              </div>
            <?php endif; ?>

            <form action="<?php echo e(route('portfolio.contact.store')); ?>" method="POST" class="contact-form-modern">
              <?php echo csrf_field(); ?>
              <input type="text" name="name" placeholder="NAMA LENGKAP *" required />
              <input type="email" name="email" placeholder="ALAMAT EMAIL *" required />
              <textarea name="message" rows="4" placeholder="PESAN / PERIHAL KERJASAMA *" required></textarea>
              <button type="submit" class="contact-submit-btn">KIRIM PESAN SEKARANG</button>
            </form>
          </div>
        </div>

      </div>
    </section>

  </main>

  <!-- ========================================================================
       9. FOOTER BAR (Frame 00:14)
       ======================================================================== -->
  <footer class="site-footer-bar">
    <div class="container footer-bar-inner">
      <a href="mailto:<?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?>">
        <?php echo e(strtoupper($profile->email ?? 'arjuna.carly1304@gmail.com')); ?>
      </a>

      <div class="footer-social-links">
        <a href="<?php echo e($profile->linkedin_url ?? 'https://linkedin.com/in/arjunacarly'); ?>" target="_blank" rel="noopener">LINKEDIN</a>
        <a href="<?php echo e($profile->github_url ?? 'https://github.com/arjunacarly'); ?>" target="_blank" rel="noopener">GITHUB</a>
        <a href="/admin">CMS ADMIN</a>
        <button type="button" class="back-to-top-btn" id="back-to-top-btn">BACK TO TOP ↑</button>
      </div>
    </div>
  </footer>

  <script src="<?php echo e(asset('assets/js/portfolio.js')); ?>"></script>
</body>
</html>
