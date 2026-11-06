<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> | Web Developer &amp; UI/UX Portfolio</title>
  <meta name="description" content="Portofolio resmi <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> — Mahasiswa D-IV Teknik Informatika Politeknik Negeri Malang. Spesialis UI/UX (Figma), Frontend (React &amp; Tailwind CSS), dan Backend (Laravel &amp; PHP)." />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portfolio.css')); ?>" />
</head>
<body>

  <!-- ========================================================================
       1. TOP NAVBAR (Exact femasaf.my.id structure)
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
        <a href="#prestasi">prestasi</a>
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
      </div>
    </div>

    <!-- ======================================================================
         4. SECTION 01: KARYA PILIHAN / PROJEK (Split-Screen Interactive Showcase)
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
                 data-proj-url="<?php echo e($proj->live_url); ?>"
                 data-proj-slug="<?php echo e($proj->slug); ?>"
                 data-mockup-id="mockup-proj-<?php echo e($idx); ?>">
              
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

          <!-- Right Column: Sticky Live Preview Window with Real High-Fidelity UI Mockups -->
          <div class="project-sticky-preview">
            <div class="preview-top-bar">
              <span class="preview-counter" id="preview-counter">01 / <?php echo e(sprintf('%02d', count($projects))); ?></span>
              <span class="preview-title-bar" id="preview-title-bar"><?php echo e($projects[0]->title ?? 'PROJEK'); ?></span>
              <span class="preview-badge-status">PRATINJAU</span>
            </div>

            <div class="preview-mockup-wrapper">
              
              <!-- Mockup 1: Hunian Lestari Property Platform -->
              <div class="mockup-item active" id="mockup-proj-1">
                <div class="browser-frame">
                  <div class="browser-header">
                    <div class="browser-dots">
                      <span class="dot-btn dot-red"></span>
                      <span class="dot-btn dot-yellow"></span>
                      <span class="dot-btn dot-green"></span>
                    </div>
                    <div class="browser-address-bar">
                      <span class="lock-icon">🔒</span>
                      <span>https://hunianlestari.com</span>
                    </div>
                  </div>
                  <div class="mockup-hunian-portal">
                    <div class="hl-nav">
                      <span class="hl-brand">HUNIAN LESTARI</span>
                      <div class="hl-menu">
                        <span>Tipe Rumah</span>
                        <span>Lokasi</span>
                        <span>Konsultasi</span>
                      </div>
                    </div>
                    <div class="hl-hero-box">
                      <div class="hl-hero-title">Temukan Hunian Impian &amp; Investasi Masa Depan</div>
                      <div class="hl-hero-subtitle">Katalog properti modern terintegrasi konsultasi instan</div>
                      <div class="hl-search-bar">
                        <span>Cari rumah di Sidoarjo / Malang...</span>
                        <span class="hl-search-btn">Cari</span>
                      </div>
                    </div>
                    <div class="hl-cards-row">
                      <div class="hl-card-item">
                        <div class="hl-card-img-placeholder">🏡 Tipe 45/90</div>
                        <div class="hl-card-info">
                          <div class="hl-card-name">Eco Green Residence</div>
                          <div class="hl-card-price">Rp 485.000.000</div>
                        </div>
                      </div>
                      <div class="hl-card-item">
                        <div class="hl-card-img-placeholder">🏢 Tipe 70/120</div>
                        <div class="hl-card-info">
                          <div class="hl-card-name">Grand Deluxe Cluster</div>
                          <div class="hl-card-price">Rp 780.000.000</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Mockup 2: Applied Informatics Research Lab -->
              <div class="mockup-item" id="mockup-proj-2">
                <div class="browser-frame">
                  <div class="browser-header">
                    <div class="browser-dots">
                      <span class="dot-btn dot-red"></span>
                      <span class="dot-btn dot-yellow"></span>
                      <span class="dot-btn dot-green"></span>
                    </div>
                    <div class="browser-address-bar">
                      <span class="lock-icon">🔒</span>
                      <span>https://lab-ai.polinema.ac.id</span>
                    </div>
                  </div>
                  <div class="mockup-lab-portal">
                    <div class="lab-header-bar">
                      <span class="lab-title-text">APPLIED INFORMATICS LAB // POLINEMA</span>
                      <span style="font-family:var(--font-mono);font-size:0.6rem;color:var(--text-muted);">JTI RESMI</span>
                    </div>
                    <div class="lab-stats-pills">
                      <div class="lab-stat-pill">
                        <div class="lab-stat-num">18+</div>
                        <div class="lab-stat-lbl">Publikasi</div>
                      </div>
                      <div class="lab-stat-pill">
                        <div class="lab-stat-num">5</div>
                        <div class="lab-stat-lbl">Halaman UI</div>
                      </div>
                      <div class="lab-stat-pill">
                        <div class="lab-stat-num">6</div>
                        <div class="lab-stat-lbl">Hak Cipta</div>
                      </div>
                    </div>
                    <div class="lab-research-list">
                      <div class="lab-research-item">
                        <span class="lab-res-badge">COMPUTER VISION</span>
                        <div class="lab-res-title">Deteksi Cerdas Mutu Hasil Pertanian Berbasis Deep Learning</div>
                      </div>
                      <div class="lab-research-item">
                        <span class="lab-res-badge">NLP BAHASA INDONESIA</span>
                        <div class="lab-res-title">Klasifikasi Opini Publik &amp; Ekstraksi Informasi Teks Akademik</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Mockup 3: Dual Phone Mockup for PBL Polinema (Mirrors Femas MI Jurnal Mengajar) -->
              <div class="mockup-item" id="mockup-proj-3">
                <div class="mockup-dual-phone-wrap">
                  <!-- Phone 1: Sprint & Task Tracker -->
                  <div class="phone-device">
                    <div class="phone-speaker-notch"></div>
                    <div class="phone-screen">
                      <div class="phone-app-bar">PBL TRACKER · POLINEMA</div>
                      <div class="phone-sprint-badge">
                        <span>Sprint 04 (Agile Scrum)</span>
                        <div class="phone-progress-bar">
                          <div class="phone-progress-fill"></div>
                        </div>
                      </div>
                      <div class="phone-task-row">
                        <span style="color:#10b981;">✓</span>
                        <span>Slicing Figma UI ke React</span>
                      </div>
                      <div class="phone-task-row">
                        <span style="color:#10b981;">✓</span>
                        <span>Integrasi REST API Auth</span>
                      </div>
                      <div class="phone-task-row">
                        <span style="color:#f59e0b;">⏳</span>
                        <span>Usability Testing D-IV TI</span>
                      </div>
                    </div>
                  </div>

                  <!-- Phone 2: Team Dashboard & Modules -->
                  <div class="phone-device">
                    <div class="phone-speaker-notch"></div>
                    <div class="phone-screen">
                      <div class="phone-app-bar" style="background:#1e293b;">DASHBOARD TIM</div>
                      <div style="font-size:0.58rem;color:#94a3b8;margin-bottom:0.4rem;text-align:center;">
                        PM: Arjuna Carly (Lead)
                      </div>
                      <div class="phone-grid-icons">
                        <div class="phone-grid-box" style="border:1px solid rgba(56,189,248,0.3);">
                          <div style="font-size:0.75rem;margin-bottom:2px;">📋</div>
                          <span>Backlog</span>
                        </div>
                        <div class="phone-grid-box" style="border:1px solid rgba(16,185,129,0.3);">
                          <div style="font-size:0.75rem;margin-bottom:2px;">👥</div>
                          <span>Anggota</span>
                        </div>
                        <div class="phone-grid-box" style="border:1px solid rgba(244,63,94,0.3);">
                          <div style="font-size:0.75rem;margin-bottom:2px;">📊</div>
                          <span>Burndown</span>
                        </div>
                        <div class="phone-grid-box" style="border:1px solid rgba(168,85,247,0.3);">
                          <div style="font-size:0.75rem;margin-bottom:2px;">🚀</div>
                          <span>Release</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Mockup 4: Arjuna Studio Laravel CMS Console -->
              <div class="mockup-item" id="mockup-proj-4">
                <div class="browser-frame">
                  <div class="browser-header">
                    <div class="browser-dots">
                      <span class="dot-btn dot-red"></span>
                      <span class="dot-btn dot-yellow"></span>
                      <span class="dot-btn dot-green"></span>
                    </div>
                    <div class="browser-address-bar">
                      <span class="lock-icon">🔒</span>
                      <span>http://127.0.0.1:8000/admin</span>
                    </div>
                  </div>
                  <div class="mockup-cms-console">
                    <div class="cms-top-status">
                      <span>ARJUNA STUDIO // LARAVEL MVC ADMIN</span>
                      <span class="term-green">ONLINE</span>
                    </div>
                    <div class="cms-metrics-row">
                      <div class="cms-stat-mini">
                        <div class="cms-stat-val"><?php echo e(count($projects)); ?></div>
                        <div class="cms-stat-key">PROJEK</div>
                      </div>
                      <div class="cms-stat-mini">
                        <div class="cms-stat-val"><?php echo e(count($workExperiences) + count($orgExperiences)); ?></div>
                        <div class="cms-stat-key">RIWAYAT</div>
                      </div>
                      <div class="cms-stat-mini">
                        <div class="cms-stat-val"><?php echo e(count($skills)); ?></div>
                        <div class="cms-stat-key">KEAHLIAN</div>
                      </div>
                      <div class="cms-stat-mini">
                        <div class="cms-stat-val" style="color:#10b981;">0</div>
                        <div class="cms-stat-key">BUGS</div>
                      </div>
                    </div>
                    <div class="cms-terminal-box">
                      <div><span class="term-cyan">$</span> php artisan serve --host=127.0.0.1:8000</div>
                      <div class="term-green">[INFO] Server running on [http://127.0.0.1:8000]</div>
                      <div>[DB] SQLite PDO connection initialized</div>
                      <div>[AUTH] Admin Session active (Arjuna Carly)</div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Preview Bottom Details Bar -->
            <div class="preview-bottom-bar">
              <p class="preview-desc-text" id="preview-desc-text">
                <?php echo e($projects[0]->short_description ?? ''); ?>
              </p>
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
         5. STATEMENT / QUOTE SECTION (Frame 00:12)
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
         6. SECTION 02: REKAM PRESTASI (Frame 00:11)
         ====================================================================== -->
    <section class="section-wrap" id="prestasi">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">02 / REKAM PRESTASI</div>
          <div class="section-counter-tag"><span>4 PENGHARGAAN</span></div>
        </div>

        <div class="section-heading-row">
          <h2 class="section-giant-title">PRESTASI<span class="dot">.</span></h2>
          <p class="section-sub-desc">
            Daftar sertifikasi kompetensi, pencapaian proyek akademik, dan rekam jejak kepemimpinan yang pernah saya raih beserta institusi penerbit.
          </p>
        </div>

        <div class="achievements-table">
          <div class="achievement-row">
            <div>
              <span class="award-badge-pill">PROJECT MANAGER</span>
            </div>
            <div class="award-title-bold">PBL Agile Scrum Software Engineering &amp; Mobile App</div>
            <div class="award-issuer">Politeknik Negeri Malang · 2024</div>
            <div class="award-link-cell">
              <a href="#projek">Lihat Proyek ↗</a>
            </div>
          </div>

          <div class="achievement-row">
            <div>
              <span class="award-badge-pill" style="background:#e11d48;">CHIEF ORGANIZER</span>
            </div>
            <div class="award-title-bold">Charity Mobile Legends Championship &amp; PMCC Polinema</div>
            <div class="award-issuer">Polinema E-Sports Community · 2024</div>
            <div class="award-link-cell">
              <span>Dokumentasi ↗</span>
            </div>
          </div>

          <div class="achievement-row">
            <div>
              <span class="award-badge-pill" style="background:#2563eb;">KETUA UMUM</span>
            </div>
            <div class="award-title-bold">Kepemimpinan Komunitas Mahasiswa Polinema E-Sports</div>
            <div class="award-issuer">Politeknik Negeri Malang · 2023 - 2024</div>
            <div class="award-link-cell">
              <span>SK Ormawa ↗</span>
            </div>
          </div>

          <div class="achievement-row">
            <div>
              <span class="award-badge-pill" style="background:#059669;">UI/UX DESIGNER</span>
            </div>
            <div class="award-title-bold">Design System &amp; Web Showcase — Lab Applied Informatics</div>
            <div class="award-issuer">Laboratorium Riset JTI Polinema · 2024</div>
            <div class="award-link-cell">
              <a href="#projek">Portofolio ↗</a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         7. SECTION 03: PENGALAMAN & REKAM JEJAK
         ====================================================================== -->
    <section class="section-wrap" id="pengalaman">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">03 / REKAM PENGALAMAN</div>
          <div class="section-counter-tag"><span><?php echo e(count($workExperiences) + count($orgExperiences)); ?> ENTITAS</span></div>
        </div>

        <div class="section-heading-row">
          <h2 class="section-giant-title">PENGALAMAN<span class="dot">.</span></h2>
          <p class="section-sub-desc">
            Riwayat pengerjaan proyek web development mitra industri, riset laboratorium kampus, kepemimpinan organisasi, serta keikutsertaan kepanitiaan.
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
              <span>Proyek Riset</span>
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
         8. SECTION 04: TECH STACK OBSIDIAN NETWORK GRAPH (Frame 00:13 - 00:18)
         ====================================================================== -->
    <section class="section-wrap" id="keahlian">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">04 / TECH STACK &amp; TOOLS</div>
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
            <button type="button" class="graph-cat-btn active" data-cluster="all" data-cluster-label="Semua Hubungan Teknologi · 18 Node Terhubung">
              <span>00 SEMUA DOMAIN</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="bahasa" data-cluster-label="Bahasa Pemrograman (PHP, JS, HTML/CSS, TS, SQL) · 5 teknologi">
              <span>01 BAHASA PEMROGRAMAN</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="framework" data-cluster-label="Framework &amp; UI (Laravel, React, Tailwind, Bootstrap, Livewire) · 5 teknologi">
              <span>02 FRAMEWORK &amp; UI</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="database" data-cluster-label="Database &amp; Storage (MySQL, PostgreSQL, SQLite, REST API) · 4 teknologi">
              <span>03 DATABASE &amp; CLOUD</span>
              <span>→</span>
            </button>
            <button type="button" class="graph-cat-btn" data-cluster="tools" data-cluster-label="Tools &amp; Management (Figma UI/UX, Git, VS Code, Agile Scrum) · 4 teknologi">
              <span>04 TOOLS &amp; DESIGN</span>
              <span>→</span>
            </button>
          </div>

          <!-- Right: Interactive Canvas Network Graph -->
          <div class="graph-canvas-container">
            <div class="graph-canvas-overlay">GESER UNTUK MENGGESER</div>
            <canvas id="obsidian-network-canvas"></canvas>
            <div class="graph-footer-info" id="graph-active-label">Semua Hubungan Teknologi · 18 Node Terhubung</div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         9. SECTION 05: GIANT CONTACT SECTION (Frame 00:14)
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
       10. FOOTER BAR (Frame 00:14)
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
