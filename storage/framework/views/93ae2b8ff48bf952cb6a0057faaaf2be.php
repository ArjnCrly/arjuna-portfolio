<!DOCTYPE html>
<html lang="id" data-theme="dark" data-accent="emerald">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> — Web Developer &amp; UI/UX Portfolio</title>
  <meta name="description" content="Portofolio resmi <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?>, Mahasiswa Politeknik Negeri Malang Jurusan Teknologi Informasi. Spesialis UI/UX (Figma), Frontend (React, Tailwind CSS, JS, HTML), dan Backend (Laravel, PHP)." />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portfolio.css')); ?>" />
</head>
<body>

  <!-- Ambient Subtle Background Glows -->
  <div class="bg-glow bg-glow-1"></div>
  <div class="bg-glow bg-glow-2"></div>

  <!-- ========================================================================
       TOP STICKY NAVIGATION BAR
       ======================================================================== -->
  <header class="site-header">
    <div class="container nav-inner">
      <a href="/" class="brand-logo">
        <span class="brand-status-dot"></span>
        <span>arjuna<span class="brand-slash">.</span>carly</span>
        <span class="brand-sub">ui/ux · react/tailwind · laravel</span>
      </a>

      <nav class="nav-menu" id="nav-menu" aria-label="Navigasi Utama">
        <a href="#alur-kerja">tentang</a>
        <span class="nav-dot">·</span>
        <a href="#pengalaman">pengalaman</a>
        <span class="nav-dot">·</span>
        <a href="#pendidikan">pendidikan</a>
        <span class="nav-dot">·</span>
        <a href="#projek">projek</a>
        <span class="nav-dot">·</span>
        <a href="#keahlian">keahlian</a>
        <span class="nav-dot">·</span>
        <a href="#kontak">kontak</a>
      </nav>

      <div class="nav-controls">
        <!-- Live Accent Color Token Switcher (Unique UI/UX Feature) -->
        <div class="accent-switcher" title="Ubah Warna Aksen UI">
          <button type="button" class="accent-dot active" data-accent-choice="emerald" style="background:#10b981;" aria-label="Emerald"></button>
          <button type="button" class="accent-dot" data-accent-choice="cyan" style="background:#06b6d4;" aria-label="Cyan"></button>
          <button type="button" class="accent-dot" data-accent-choice="indigo" style="background:#6366f1;" aria-label="Indigo"></button>
          <button type="button" class="accent-dot" data-accent-choice="amber" style="background:#f59e0b;" aria-label="Amber"></button>
        </div>

        <!-- Dark / Light Blueprint Theme Toggle -->
        <button type="button" class="theme-btn" id="theme-toggle-btn" title="Ubah Mode Gelap / Terang">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="5"></circle>
            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
          </svg>
        </button>

        <!-- Direct Laravel Admin CMS Link -->
        <a href="/admin" class="cms-nav-btn" title="Kelola &amp; Perbarui Portofolio (Laravel CMS)">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
          </svg>
          <span>CMS</span>
        </a>

        <button type="button" class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Menu">
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
         HERO SECTION (Perkenalan Utama + Studio Terminal & UI/UX Inspector)
         ====================================================================== -->
    <section class="hero-section" id="beranda">
      <div class="container">
        <div class="hero-grid">

          <!-- Left Column: Editorial Intro -->
          <div class="hero-left">
            <div class="hero-badges-row">
              <span class="bracket-greeting">[ <?php echo e($profile->greeting_badge ?? 'halo, selamat datang'); ?> ]</span>
              <span class="availability-pill">
                <span class="dot"></span>
                <span><?php echo e($profile->availability_text ?? 'tersedia untuk projek baru & internship'); ?></span>
              </span>
            </div>

            <h1 class="hero-title">
              Saya <span class="highlight-name"><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?></span>,
              <span class="role-underline"><?php echo e($profile->headline_role ?? 'Web Developer — UI/UX, Frontend & Laravel'); ?></span>.
            </h1>

            <p class="hero-lead">
              <?php echo e($profile->hero_bio ?? 'Saya merancang antarmuka modern yang intuitif dan membangun aplikasi web yang cepat, responsif, serta terstruktur.'); ?>
            </p>

            <p class="hero-sublead">
              <?php echo e($profile->hero_sub_bio ?? 'Mahasiswa Politeknik Negeri Malang Jurusan Teknologi Informasi (kelahiran Sidoarjo, 13 Desember 2004) dengan keahlian Web Developing menggunakan Figma untuk UI/UX, React & Tailwind CSS untuk Frontend, serta Laravel, PHP, JavaScript, dan HTML untuk Backend & Fullstack.'); ?>
            </p>

            <!-- Identity Metadata Chips -->
            <div class="identity-chips">
              <div class="identity-chip">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <span><?php echo e($profile->birth_place ?? 'Sidoarjo'); ?>, <?php echo e($profile->birth_date ?? '13 Desember 2004'); ?></span>
              </div>
              <div class="identity-chip">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                  <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                </svg>
                <span><?php echo e($profile->university ?? 'Politeknik Negeri Malang'); ?> — <?php echo e($profile->department ?? 'Jurusan Teknologi Informasi'); ?></span>
              </div>
              <div class="identity-chip">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="16 18 22 12 16 6"></polyline>
                  <polyline points="8 6 2 12 8 18"></polyline>
                </svg>
                <span>Figma · React · Tailwind · Laravel · JS · PHP · HTML</span>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="hero-actions">
              <a href="#projek" class="btn-primary">
                <span>lihat projek</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </a>
              <a href="#kontak" class="btn-secondary">
                <span>hubungi saya</span>
              </a>
              <a href="/projects" class="btn-secondary">
                <span> katalog semua projek</span>
              </a>
            </div>
          </div>

          <!-- Right Column: Interactive 3-Tab Developer & UI/UX Studio Card -->
          <div class="hero-right">
            <div class="studio-window">
              <div class="studio-header">
                <div class="window-dots">
                  <span class="win-dot red"></span>
                  <span class="win-dot yellow"></span>
                  <span class="win-dot green"></span>
                </div>
                <div class="studio-tabs">
                  <button type="button" class="studio-tab active" data-tab-target="pane-terminal">arjuna_env.json</button>
                  <button type="button" class="studio-tab" data-tab-target="pane-figma">ui_system.fig</button>
                  <button type="button" class="studio-tab" data-tab-target="pane-laravel">biodata.php</button>
                </div>
              </div>

              <div class="studio-body">
                <!-- TAB 1: Interactive Terminal & JSON Environment -->
                <div class="studio-pane active" id="pane-terminal">
                  <div class="term-line">
                    <span class="term-prompt">~</span>
                    <span class="term-cmd">cat arjuna_profile.json</span>
                  </div>
                  <div class="term-json">
                    {<br>
                    &nbsp;&nbsp;<span class="json-key">"nama"</span>: <span class="json-str">"arjuna carly dhymas mahendra"</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">"kelahiran"</span>: <span class="json-str">"sidoarjo, 13 desember 2004"</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">"kampus"</span>: <span class="json-str">"politeknik negeri malang (jti)"</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">"peran"</span>: <span class="json-str">"ui/ux, frontend &amp; laravel dev"</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">"status"</span>: <span class="json-str">"aktif"</span><br>
                    }
                  </div>

                  <div class="term-line">
                    <span class="term-prompt">~</span>
                    <span class="term-cmd">ping -c 1 core_stack</span>
                  </div>
                  <div class="term-stack-output">
                    <span class="term-stack-badge">figma</span>
                    <span class="term-stack-badge">react</span>
                    <span class="term-stack-badge">tailwindcss</span>
                    <span class="term-stack-badge">laravel</span>
                    <span class="term-stack-badge">javascript</span>
                    <span class="term-stack-badge">php</span>
                    <span class="term-stack-badge">html5/css3</span>
                  </div>

                  <!-- Interactive Command Runner -->
                  <div class="term-interactive-box">
                    <div class="term-dynamic-output" id="term-dynamic-output">
                      <div style="color:#64748b;">~ sys_online — klik tombol atau ketik perintah di bawah:</div>
                    </div>
                    <div class="term-input-row">
                      <span class="term-prompt">$</span>
                      <input type="text" id="term-cli-input" class="term-input" placeholder="ketik 'help', 'skills', 'projects', 'org' lalu Enter..." autocomplete="off" />
                    </div>
                    <div class="term-quick-cmds">
                      <button type="button" class="term-chip-btn" data-cmd="whoami">whoami</button>
                      <button type="button" class="term-chip-btn" data-cmd="skills">skills</button>
                      <button type="button" class="term-chip-btn" data-cmd="projects">projects</button>
                      <button type="button" class="term-chip-btn" data-cmd="org">org</button>
                      <button type="button" class="term-chip-btn" data-cmd="contact">contact</button>
                      <button type="button" class="term-chip-btn" data-cmd="clear">clear</button>
                    </div>
                  </div>
                </div>

                <!-- TAB 2: Interactive Figma UI/UX Design Token Inspector -->
                <div class="studio-pane" id="pane-figma">
                  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.65rem;">
                    <span style="color:#94a3b8;font-size:0.75rem;">Figma Design System → React &amp; Tailwind</span>
                    <button type="button" id="figma-wireframe-toggle" class="term-chip-btn">Mode: Hi-Fi React + Tailwind</button>
                  </div>

                  <div class="figma-canvas-box">
                    <span class="figma-node-tag">❖ Component / PropertyCard_HunianLestari</span>
                    <div class="figma-preview-card" id="figma-preview-card">
                      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.4rem;">
                        <strong style="color:#f8fafc;font-size:0.84rem;">Pixel-Perfect UI/UX Architecture</strong>
                        <span style="font-size:0.68rem;color:var(--accent);border:1px solid var(--accent-border);padding:0.08rem 0.45rem;border-radius:99px;">+90% Responsive</span>
                      </div>
                      <p style="font-size:0.74rem;color:#94a3b8;margin-bottom:0.55rem;">
                        Dirancang dengan Wireframe &amp; Prototype High-Fidelity di Figma, diimplementasikan ke React, Tailwind CSS, &amp; Backend Laravel.
                      </p>
                      <div style="display:flex;gap:0.4rem;flex-wrap:wrap;">
                        <span class="term-stack-badge">Auto-Layout: 16px</span>
                        <span class="term-stack-badge">Grid: 12-Col Responsive</span>
                        <span class="term-stack-badge">Contrast: AAA</span>
                      </div>
                    </div>

                    <div class="figma-props-grid">
                      <div class="figma-prop-item">Design Tool: <strong style="color:#f8fafc;">Figma Hi-Fi</strong></div>
                      <div class="figma-prop-item">Frontend: <strong style="color:#f8fafc;">React &amp; Tailwind</strong></div>
                      <div class="figma-prop-item">Backend: <strong style="color:#f8fafc;">Laravel MVC</strong></div>
                      <div class="figma-prop-item">Role: <strong style="color:#f8fafc;">PM &amp; Web Dev</strong></div>
                    </div>
                  </div>
                </div>

                <!-- TAB 3: Laravel PHP Config View -->
                <div class="studio-pane" id="pane-laravel">
                  <div class="term-line">
                    <span class="term-prompt">php</span>
                    <span class="term-cmd">artisan about:developer</span>
                  </div>
                  <div class="term-json" style="line-height:1.7;">
                    <span class="json-comment">// config/developer.php (Laravel 10.x)</span><br>
                    <span style="color:#f472b6;">return</span> [<br>
                    &nbsp;&nbsp;<span class="json-key">'full_name'</span> =&gt; <span class="json-str">'Arjuna Carly Dhymas Mahendra'</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">'birth'</span> =&gt; <span class="json-str">'Sidoarjo, 13 Desember 2004'</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">'college'</span> =&gt; <span class="json-str">'Politeknik Negeri Malang'</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">'major'</span> =&gt; <span class="json-str">'Jurusan Teknologi Informasi (D-IV TI)'</span>,<br>
                    &nbsp;&nbsp;<span class="json-key">'ui_ux'</span> =&gt; [<span class="json-str">'Figma'</span>, <span class="json-str">'Wireframe'</span>, <span class="json-str">'Prototype'</span>],<br>
                    &nbsp;&nbsp;<span class="json-key">'frontend'</span> =&gt; [<span class="json-str">'React'</span>, <span class="json-str">'Tailwind CSS'</span>, <span class="json-str">'JS'</span>, <span class="json-str">'HTML/CSS'</span>],<br>
                    &nbsp;&nbsp;<span class="json-key">'backend'</span> =&gt; [<span class="json-str">'Laravel'</span>, <span class="json-str">'PHP'</span>, <span class="json-str">'MySQL'</span>, <span class="json-str">'PostgreSQL'</span>],<br>
                    &nbsp;&nbsp;<span class="json-key">'cms_ready'</span> =&gt; <span style="color:#38bdf8;">true</span>,<br>
                    ];
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ======================================================================
         TENTANG SAYA & ALUR KERJA END-TO-END (Figma -> React/Tailwind -> Laravel)
         ====================================================================== -->
    <section class="workflow-section" id="alur-kerja">
      <div class="container">
        <span class="section-index">00 — tentang saya &amp; pendekatan kerja</span>
        <h2 class="section-title">Dari Riset UI/UX di Figma hingga Arsitektur Fullstack Laravel</h2>
        <p style="color:var(--text-secondary);max-width:860px;margin-top:0.65rem;font-size:0.96rem;">
          <?php echo e($profile->about_text ?? ''); ?>
        </p>

        <div class="workflow-grid">
          <div class="workflow-card">
            <span class="workflow-step-num">tahap 01 · ui/ux design</span>
            <h3>Figma &amp; Design System</h3>
            <p>
              Merancang arsitektur informasi, user flow, wireframe, hingga interactive prototype high-fidelity di <strong>Figma</strong> yang berfokus pada kemudahan navigasi dan identitas visual produk.
            </p>
          </div>
          <div class="workflow-card">
            <span class="workflow-step-num">tahap 02 · frontend engineering</span>
            <h3>React, Tailwind CSS &amp; JS</h3>
            <p>
              Mengimplementasikan desain menjadi antarmuka web responsif menggunakan <strong>React, Tailwind CSS, JavaScript (ES6+), HTML5, CSS3, dan Bootstrap</strong> dengan kompatibilitas lintas perangkat.
            </p>
          </div>
          <div class="workflow-card">
            <span class="workflow-step-num">tahap 03 · backend &amp; project delivery</span>
            <h3>Laravel, PHP &amp; Agile Scrum</h3>
            <p>
              Membangun sistem backend dinamis dengan <strong>Framework Laravel &amp; PHP</strong> (MVC, Eloquent, MySQL/PostgreSQL, API) serta memimpin kolaborasi tim dengan metodologi <strong>Agile Scrum</strong>.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ======================================================================
         01 — PENGALAMAN KERJA, PROYEK WEB & ORGANISASI (Dari CV Arjuna)
         ====================================================================== -->
    <section class="portfolio-section" id="pengalaman">
      <div class="container">
        <div class="section-header">
          <div>
            <span class="section-index">01 — pengalaman kerja &amp; kepemimpinan</span>
            <h2 class="section-title">Riwayat Karir, Proyek Web &amp; Organisasi</h2>
          </div>

          <div class="filter-tabs">
            <button type="button" class="filter-tab active" data-exp-filter="all">semua (<?php echo e(count($workExperiences) + count($orgExperiences)); ?>)</button>
            <button type="button" class="filter-tab" data-exp-filter="work">proyek &amp; web dev (<?php echo e(count($workExperiences)); ?>)</button>
            <button type="button" class="filter-tab" data-exp-filter="organization">organisasi &amp; kepanitiaan (<?php echo e(count($orgExperiences)); ?>)</button>
          </div>
        </div>

        <div class="timeline-list">
          <!-- Work & Web Development Experiences -->
          <?php foreach($workExperiences as $exp): ?>
          <article class="timeline-item" data-exp-type="work">
            <div class="timeline-meta">
              <span class="timeline-period"><?php echo e($exp->period); ?></span>
              <span class="timeline-type-badge">Web Development &amp; Proyek</span>
              <?php if($exp->location): ?>
              <span class="timeline-location">📍 <?php echo e($exp->location); ?></span>
              <?php endif; ?>
              <?php if($exp->link_url): ?>
              <a href="<?php echo e($exp->link_url); ?>" target="_blank" rel="noopener" class="link-more" style="margin-top:0.35rem;font-size:0.75rem;">
                kunjungi situs ↗
              </a>
              <?php endif; ?>
            </div>

            <div class="timeline-content">
              <h3><?php echo e($exp->company); ?></h3>
              <div class="timeline-role"><?php echo e($exp->role); ?></div>

              <?php 
                $bullets = array_filter(array_map('trim', explode("\n", (string)$exp->description)));
                $tags = array_filter(array_map('trim', explode(',', (string)$exp->tags)));
               ?>

              <?php if(count($bullets) > 0): ?>
              <ul class="timeline-bullets">
                <?php foreach($bullets as $point): ?>
                <li><?php echo e($point); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>

              <?php if(count($tags) > 0): ?>
              <div class="tag-row">
                <?php foreach($tags as $tag): ?>
                <span class="tech-pill"><?php echo e($tag); ?></span>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>

          <!-- Organization & Committee Experiences -->
          <?php foreach($orgExperiences as $org): ?>
          <article class="timeline-item" data-exp-type="organization">
            <div class="timeline-meta">
              <span class="timeline-period"><?php echo e($org->period); ?></span>
              <span class="timeline-type-badge">Organisasi &amp; Kepanitiaan</span>
              <?php if($org->location): ?>
              <span class="timeline-location">📍 <?php echo e($org->location); ?></span>
              <?php endif; ?>
            </div>

            <div class="timeline-content">
              <h3><?php echo e($org->company); ?></h3>
              <div class="timeline-role"><?php echo e($org->role); ?></div>

              <?php 
                $orgBullets = array_filter(array_map('trim', explode("\n", (string)$org->description)));
                $orgTags = array_filter(array_map('trim', explode(',', (string)$org->tags)));
               ?>

              <?php if(count($orgBullets) > 0): ?>
              <ul class="timeline-bullets">
                <?php foreach($orgBullets as $point): ?>
                <li><?php echo e($point); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>

              <?php if(count($orgTags) > 0): ?>
              <div class="tag-row">
                <?php foreach($orgTags as $tag): ?>
                <span class="tech-pill"><?php echo e($tag); ?></span>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ======================================================================
         02 — PENDIDIKAN (Riwayat Akademik)
         ====================================================================== -->
    <section class="portfolio-section" id="pendidikan">
      <div class="container">
        <div class="section-header">
          <div>
            <span class="section-index">02 — pendidikan</span>
            <h2 class="section-title">Riwayat Akademik</h2>
          </div>
        </div>

        <div class="edu-grid">
          <?php foreach($educations as $edu): ?>
          <article class="edu-card">
            <div>
              <span class="edu-period"><?php echo e($edu->period); ?> <?php if($edu->location): ?> · <?php echo e($edu->location); ?> <?php endif; ?></span>
              <h3 class="edu-institution"><?php echo e($edu->institution); ?></h3>
              <div class="edu-degree"><?php echo e($edu->degree); ?></div>
              <p class="edu-desc"><?php echo e($edu->description); ?></p>
            </div>

            <?php 
              $courses = array_filter(array_map('trim', explode(',', (string)$edu->highlights)));
             ?>
            <?php if(count($courses) > 0): ?>
            <div>
              <div style="font-family:var(--font-mono);font-size:0.72rem;color:var(--text-muted);margin-bottom:0.45rem;">
                mata kuliah &amp; fokus relevan:
              </div>
              <div class="tag-row">
                <?php foreach($courses as $c): ?>
                <span class="tech-pill"><?php echo e($c); ?></span>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ======================================================================
         03 — PROJEK SAYA (Hasil Karya Terpilih)
         ====================================================================== -->
    <section class="portfolio-section" id="projek">
      <div class="container">
        <div class="section-header">
          <div>
            <span class="section-index">03 — projek saya</span>
            <h2 class="section-title">Hasil Karya Terpilih</h2>
          </div>

          <div class="filter-tabs">
            <button type="button" class="filter-tab active" data-proj-filter="all">semua projek</button>
            <button type="button" class="filter-tab" data-proj-filter="Fullstack & Laravel">fullstack &amp; laravel</button>
            <button type="button" class="filter-tab" data-proj-filter="Frontend & UI/UX">frontend &amp; ui/ux</button>
            <button type="button" class="filter-tab" data-proj-filter="Project Management & Frontend">pm &amp; agile</button>
          </div>
        </div>

        <div class="projects-grid">
          <?php foreach($projects as $proj): ?>
          <article class="project-card" data-proj-category="<?php echo e($proj->category); ?>">
            <!-- Visual Header / Custom Uploaded Thumbnail or Architectural Blueprint -->
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
                <h3 class="project-title"><?php echo e($proj->title); ?></h3>
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
                  <span>selengkapnya</span>
                  <span>→</span>
                </a>

                <div style="display:flex;gap:0.75rem;align-items:center;">
                  <?php if($proj->live_url): ?>
                  <a href="<?php echo e($proj->live_url); ?>" target="_blank" rel="noopener" style="font-family:var(--font-mono);font-size:0.76rem;color:var(--text-secondary);">
                    live demo ↗
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </article>
          <?php endforeach; ?>
        </div>

        <div class="section-bottom-cta">
          <a href="/projects" class="btn-secondary">
            <span>lihat semua projek (<?php echo e(count($projects)); ?>)</span>
            <span>→</span>
          </a>
        </div>
      </div>
    </section>

    <!-- ======================================================================
         04 — SPESIALISASI & KEAHLIAN (Teknologi & Bahasa Pemrograman)
         ====================================================================== -->
    <section class="portfolio-section" id="keahlian">
      <div class="container">
        <div class="section-header">
          <div>
            <span class="section-index">04 — spesialisasi &amp; keahlian</span>
            <h2 class="section-title">Teknologi, Bahasa Pemrograman &amp; Kompetensi</h2>
          </div>
        </div>

        <!-- Core 7 Signature Technologies Spotlight (Sesuai Prompt User) -->
        <div class="core-stack-banner">
          <div class="core-stack-item">
            <span class="stack-role">UI/UX Design</span>
            <span class="stack-name">Figma</span>
          </div>
          <div class="core-stack-item">
            <span class="stack-role">Frontend UI</span>
            <span class="stack-name">React</span>
          </div>
          <div class="core-stack-item">
            <span class="stack-role">Modern Styling</span>
            <span class="stack-name">Tailwind CSS</span>
          </div>
          <div class="core-stack-item">
            <span class="stack-role">Backend MVC</span>
            <span class="stack-name">Laravel</span>
          </div>
          <div class="core-stack-item">
            <span class="stack-role">Interactivity</span>
            <span class="stack-name">JavaScript</span>
          </div>
          <div class="core-stack-item">
            <span class="stack-role">Server-Side</span>
            <span class="stack-name">PHP</span>
          </div>
          <div class="core-stack-item">
            <span class="stack-role">Web Foundation</span>
            <span class="stack-name">HTML5 &amp; CSS3</span>
          </div>
        </div>

        <!-- Categorized Skill Matrix (Dynamic from Database) -->
        <div class="skills-matrix">
          <?php foreach($groupedSkills as $categoryLabel => $catSkills): ?>
          <div class="skill-category-row">
            <div class="skill-cat-title"><?php echo e($categoryLabel); ?></div>
            <div class="skill-pills-wrap">
              <?php foreach($catSkills as $sk): ?>
              <div class="skill-badge-card <?php echo e($sk->is_highlighted ? 'highlighted' : ''); ?>" title="<?php echo e($sk->description); ?>">
                <span><?php echo e($sk->name); ?></span>
                <?php if($sk->level_badge): ?>
                <span class="skill-level"><?php echo e($sk->level_badge); ?></span>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ======================================================================
         05 — HUBUNGI SAYA (Contact Channels + Direct Laravel Database Form)
         ====================================================================== -->
    <section class="portfolio-section" id="kontak">
      <div class="container">
        <div class="section-header">
          <div>
            <span class="section-index">05 — hubungi saya</span>
            <h2 class="section-title">Mari membangun sesuatu yang menarik bersama</h2>
          </div>
          <span class="availability-pill">
            <span class="dot"></span>
            <span><?php echo e($profile->availability_text ?? 'tersedia untuk projek baru'); ?></span>
          </span>
        </div>

        <div class="contact-grid">
          <!-- Left: Direct Contact Channels & 1-Click Copy (Referensi femasaf.my.id) -->
          <div>
            <p style="color:var(--text-secondary);font-size:0.96rem;margin-bottom:1.25rem;">
              Tertarik berdiskusi mengenai pengembangan website (React, Tailwind CSS, Laravel), perancangan antarmuka UI/UX di Figma, atau peluang magang/kolaborasi? Silakan hubungi saya melalui kanal berikut:
            </p>

            <div class="contact-card-list">
              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">alamat email resmi</span>
                  <span class="channel-value"><?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?></span>
                </div>
                <button type="button" class="copy-btn" data-copy-text="<?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?>">
                  salin email
                </button>
              </div>

              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">telepon / whatsapp</span>
                  <span class="channel-value"><?php echo e($profile->phone ?? '082126908940'); ?></span>
                </div>
                <div style="display:flex;gap:0.45rem;">
                  <button type="button" class="copy-btn" data-copy-text="<?php echo e($profile->phone ?? '082126908940'); ?>">
                    salin nomor
                  </button>
                  <a href="https://wa.me/<?php echo e($profile->whatsapp ?? '6282126908940'); ?>" target="_blank" rel="noopener" class="copy-btn">
                    chat wa ↗
                  </a>
                </div>
              </div>

              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">linkedin profesional</span>
                  <span class="channel-value">linkedin.com/in/<?php echo e($profile->linkedin_handle ?? 'arjunacarly'); ?></span>
                </div>
                <a href="<?php echo e($profile->linkedin_url ?? 'https://linkedin.com/in/arjunacarly'); ?>" target="_blank" rel="noopener" class="copy-btn">
                  buka profil ↗
                </a>
              </div>

              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">proyek live komersial</span>
                  <span class="channel-value">hunianlestari.com</span>
                </div>
                <a href="<?php echo e($profile->website_url ?? 'https://hunianlestari.com'); ?>" target="_blank" rel="noopener" class="copy-btn">
                  kunjungi ↗
                </a>
              </div>
            </div>
          </div>

          <!-- Right: Interactive Contact Form Connected to Laravel Database -->
          <div class="contact-form-box">
            <h3 style="font-family:var(--font-display);font-size:1.18rem;margin-bottom:0.35rem;">
              Kirim Pesan Langsung
            </h3>
            <p style="font-size:0.84rem;color:var(--text-muted);margin-bottom:1.2rem;">
              Pesan Anda akan tersimpan langsung ke Dashboard Admin Laravel saya.
            </p>

            <?php if(session()->has('success')): ?>
              <div class="alert-success">
                <?php echo e(session('success')); ?>
              </div>
            <?php endif; ?>

            <form action="<?php echo e(route('portfolio.contact.store')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label class="form-label" for="name">nama lengkap *</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Anda / Instansi" required />
              </div>

              <div class="form-group">
                <label class="form-label" for="email">alamat email *</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" required />
              </div>

              <div class="form-group">
                <label class="form-label" for="subject">subjek / keperluan</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Diskusi Projek Web / UI-UX / Internship" />
              </div>

              <div class="form-group">
                <label class="form-label" for="message">pesan *</label>
                <textarea id="message" name="message" rows="4" class="form-control" placeholder="Tuliskan detail pesan atau kolaborasi yang ingin didiskusikan..." required></textarea>
              </div>

              <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                <span>kirim pesan ke arjuna</span>
                <span>→</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ========================================================================
       FOOTER
       ======================================================================== -->
  <footer class="site-footer">
    <div class="container footer-inner">
      <div>
        © 2026 <strong><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?></strong>. Dibuat menggunakan Framework Laravel, React/Tailwind Concept &amp; CSS Modern.
      </div>

      <div class="footer-links">
        <a href="#pengalaman">pengalaman</a>
        <span>·</span>
        <a href="#pendidikan">pendidikan</a>
        <span>·</span>
        <a href="#projek">projek</a>
        <span>·</span>
        <a href="#keahlian">keahlian</a>
        <span>·</span>
        <a href="#kontak">kontak</a>
        <span>·</span>
        <a href="/admin" style="color:var(--accent);">dashboard admin</a>
      </div>
    </div>
  </footer>

  <script src="<?php echo e(asset('assets/js/portfolio.js')); ?>"></script>
</body>
</html>
