<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?> | Web Developer &amp; UI/UX Designer</title>
  <meta name="description" content="Portofolio resmi <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?>, Mahasiswa Politeknik Negeri Malang Jurusan Teknologi Informasi. Spesialis UI/UX (Figma), Frontend (React, Tailwind CSS, JS, HTML), dan Backend (Laravel, PHP)." />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portfolio.css')); ?>" />
</head>
<body>

  <!-- ========================================================================
       TOP NAVIGATION BAR (Clean & Minimalist seperti femasaf.my.id)
       ======================================================================== -->
  <header class="site-header">
    <div class="container nav-inner">
      <a href="/" class="brand-logo">
        <span>arjuna_carly</span><span class="brand-underscore">_</span>
      </a>

      <div class="nav-right">
        <nav class="nav-menu" id="nav-menu" aria-label="Navigasi Utama">
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
          <button type="button" class="theme-btn" id="theme-toggle-btn" title="Ubah Mode Gelap / Terang">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="5"></circle>
              <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
            </svg>
          </button>

          <a href="/admin" class="cms-nav-btn" title="Dashboard Admin Laravel">
            <span>admin cms</span>
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
    </div>
  </header>

  <main>
    <!-- ======================================================================
         HERO SECTION (Proporsional & Seimbang)
         ====================================================================== -->
    <section class="hero-section" id="beranda">
      <div class="container">
        <div class="hero-grid">

          <!-- Left Column: Intro & CTA -->
          <div class="hero-left">
            <span class="bracket-greeting">[ <?php echo e($profile->greeting_badge ?? 'halo, selamat datang'); ?> ]</span>

            <h1 class="hero-title">
              Saya <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?>,
              <span class="role-text">pengembang web &amp; <span class="role-highlight">UI/UX designer</span>.</span>
            </h1>

            <p class="hero-lead">
              <?php echo e($profile->hero_bio ?? 'Saya merancang dan membangun website serta sistem antarmuka yang cepat, responsif, dan memiliki fungsionalitas tinggi. Berfokus pada penulisan kode yang terstruktur dan antarmuka pengguna yang intuitif.'); ?>
            </p>

            <p class="hero-sublead">
              Mahasiswa <strong><?php echo e($profile->university ?? 'Politeknik Negeri Malang'); ?> — <?php echo e($profile->department ?? 'Jurusan Teknologi Informasi'); ?></strong> (kelahiran <?php echo e($profile->birth_place ?? 'Sidoarjo'); ?>, <?php echo e($profile->birth_date ?? '13 Desember 2004'); ?>) — berpengalaman lintas stack mulai dari perancangan antarmuka di <strong>Figma</strong>, frontend interaktif (<strong>React &amp; Tailwind CSS</strong>), hingga arsitektur backend handal berbasis <strong>Laravel &amp; PHP</strong>.
            </p>

            <div class="hero-actions">
              <a href="#projek" class="btn-primary">
                <span>lihat projek</span>
              </a>
              <a href="#kontak" class="btn-secondary">
                <span>hubungi saya</span>
              </a>
            </div>
          </div>

          <!-- Right Column: Terminal Data Card (arjuna_env.json) -->
          <div class="hero-right">
            <div class="studio-window">
              <div class="studio-header">
                <div class="window-dots">
                  <span class="win-dot red"></span>
                  <span class="win-dot yellow"></span>
                  <span class="win-dot green"></span>
                </div>
                <div class="studio-title">arjuna_env.json</div>
              </div>

              <div class="studio-body">
                <div class="term-line">
                  <span class="term-prompt">~</span>
                  <span class="term-cmd">cat profile.json</span>
                </div>
                <div class="term-json">
                  {<br>
                  &nbsp;&nbsp;<span class="json-key">"nama"</span>: <span class="json-str">"arjuna carly dhymas m."</span>,<br>
                  &nbsp;&nbsp;<span class="json-key">"peran"</span>: <span class="json-str">"web dev &amp; ui/ux designer"</span>,<br>
                  &nbsp;&nbsp;<span class="json-key">"asal"</span>: <span class="json-str">"sidoarjo, jawa timur"</span>,<br>
                  &nbsp;&nbsp;<span class="json-key">"kampus"</span>: <span class="json-str">"polinema — teknologi informasi"</span>,<br>
                  &nbsp;&nbsp;<span class="json-key">"status"</span>: <span class="json-str">"tersedia untuk projek baru"</span><br>
                  }
                </div>

                <div class="term-line">
                  <span class="term-prompt">~</span>
                  <span class="term-cmd">ping -c 1 tech_stack</span>
                </div>
                <div class="term-stack-output">
                  figma &nbsp;react &nbsp;tailwind &nbsp;laravel &nbsp;javascript &nbsp;php &nbsp;html/css
                </div>

                <div class="term-interactive-box">
                  <div class="term-dynamic-output" id="term-dynamic-output">
                    <div><span class="term-prompt">~</span> <span style="color:#64748b;">sys_online</span></div>
                  </div>
                  <div class="term-input-row">
                    <span class="term-prompt">$</span>
                    <input type="text" id="term-cli-input" class="term-input" placeholder="ketik: whoami, skills, projects, org, clear" autocomplete="off" />
                  </div>
                  <div class="term-quick-cmds">
                    <button type="button" class="term-chip-btn" data-cmd="whoami">whoami</button>
                    <button type="button" class="term-chip-btn" data-cmd="skills">skills</button>
                    <button type="button" class="term-chip-btn" data-cmd="projects">projects</button>
                    <button type="button" class="term-chip-btn" data-cmd="org">org</button>
                    <button type="button" class="term-chip-btn" data-cmd="clear">clear</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ======================================================================
         01 — PENGALAMAN (Riwayat Karir, Proyek Web & Organisasi)
         ====================================================================== -->
    <section class="portfolio-section" id="pengalaman">
      <div class="container">
        <div class="section-header">
          <div>
            <span class="section-index">01 — pengalaman kerja &amp; organisasi</span>
            <h2 class="section-title">Riwayat Karir &amp; Kepemimpinan</h2>
          </div>

          <div class="filter-tabs">
            <button type="button" class="filter-tab active" data-exp-filter="all">semua (<?php echo e(count($workExperiences) + count($orgExperiences)); ?>)</button>
            <button type="button" class="filter-tab" data-exp-filter="work">proyek web (<?php echo e(count($workExperiences)); ?>)</button>
            <button type="button" class="filter-tab" data-exp-filter="organization">organisasi (<?php echo e(count($orgExperiences)); ?>)</button>
          </div>
        </div>

        <div class="timeline-list">
          <?php foreach($workExperiences as $exp): ?>
          <article class="timeline-item" data-exp-type="work">
            <div class="timeline-meta">
              <span class="timeline-period"><?php echo e($exp->period); ?></span>
              <span class="timeline-type-badge">Web Development</span>
              <?php if($exp->location): ?>
              <span class="timeline-location"><?php echo e($exp->location); ?></span>
              <?php endif; ?>
              <?php if($exp->link_url): ?>
              <a href="<?php echo e($exp->link_url); ?>" target="_blank" rel="noopener" class="link-more" style="margin-top:0.25rem;font-size:0.74rem;">
                hunianlestari.com ↗
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

          <?php foreach($orgExperiences as $org): ?>
          <article class="timeline-item" data-exp-type="organization">
            <div class="timeline-meta">
              <span class="timeline-period"><?php echo e($org->period); ?></span>
              <span class="timeline-type-badge">Organisasi &amp; Event</span>
              <?php if($org->location): ?>
              <span class="timeline-location"><?php echo e($org->location); ?></span>
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
            <div class="tag-row">
              <?php foreach($courses as $c): ?>
              <span class="tech-pill"><?php echo e($c); ?></span>
              <?php endforeach; ?>
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
            <button type="button" class="filter-tab active" data-proj-filter="all">semua</button>
            <button type="button" class="filter-tab" data-proj-filter="Fullstack & Laravel">laravel &amp; fullstack</button>
            <button type="button" class="filter-tab" data-proj-filter="Frontend & UI/UX">frontend &amp; ui/ux</button>
            <button type="button" class="filter-tab" data-proj-filter="Project Management & Frontend">pm &amp; agile</button>
          </div>
        </div>

        <div class="projects-grid">
          <?php foreach($projects as $proj): ?>
          <article class="project-card" data-proj-category="<?php echo e($proj->category); ?>">
            <div>
              <div class="project-meta-top">
                <span><?php echo e($proj->role); ?></span>
                <?php if($proj->metrics_highlight): ?>
                  <span class="metrics-badge"><?php echo e($proj->metrics_highlight); ?></span>
                <?php endif; ?>
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

              <?php if($proj->live_url): ?>
              <a href="<?php echo e($proj->live_url); ?>" target="_blank" rel="noopener" style="font-family:var(--font-mono);font-size:0.75rem;color:var(--text-secondary);">
                kunjungi situs ↗
              </a>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>

        <div class="section-bottom-cta">
          <a href="/projects" class="btn-secondary">
            <span>lihat semua projek</span>
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
            <span class="section-index">04 — spesialisasi</span>
            <h2 class="section-title">Teknologi &amp; Bahasa Pemrograman</h2>
          </div>
        </div>

        <div class="skills-matrix">
          <?php foreach($groupedSkills as $categoryLabel => $catSkills): ?>
          <div class="skill-category-row">
            <div class="skill-cat-title"><?php echo e($categoryLabel); ?></div>
            <div class="skill-pills-wrap">
              <?php foreach($catSkills as $sk): ?>
              <div class="skill-badge-card <?php echo e($sk->is_highlighted ? 'highlighted' : ''); ?>" title="<?php echo e($sk->description); ?>">
                <span><?php echo e($sk->name); ?></span>
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
        </div>

        <div class="contact-grid">
          <div>
            <p style="color:var(--text-secondary);font-size:0.94rem;margin-bottom:1.1rem;">
              Terbuka untuk kolaborasi proyek pengembangan web (Figma UI/UX, React, Tailwind CSS, Laravel) maupun kesempatan internship.
            </p>

            <div class="contact-card-list">
              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">email</span>
                  <span class="channel-value"><?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?></span>
                </div>
                <button type="button" class="copy-btn" data-copy-text="<?php echo e($profile->email ?? 'arjuna.carly1304@gmail.com'); ?>">
                  salin alamat email
                </button>
              </div>

              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">whatsapp / telepon</span>
                  <span class="channel-value"><?php echo e($profile->phone ?? '082126908940'); ?></span>
                </div>
                <a href="https://wa.me/<?php echo e($profile->whatsapp ?? '6282126908940'); ?>" target="_blank" rel="noopener" class="copy-btn">
                  hubungi via wa ↗
                </a>
              </div>

              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">temukan saya di linkedin</span>
                  <span class="channel-value"><?php echo e($profile->linkedin_handle ?? 'arjunacarly'); ?></span>
                </div>
                <a href="<?php echo e($profile->linkedin_url ?? 'https://linkedin.com/in/arjunacarly'); ?>" target="_blank" rel="noopener" class="copy-btn">
                  linkedin ↗
                </a>
              </div>

              <div class="contact-channel-card">
                <div>
                  <span class="channel-label">portofolio live</span>
                  <span class="channel-value">hunianlestari.com</span>
                </div>
                <a href="<?php echo e($profile->website_url ?? 'https://hunianlestari.com'); ?>" target="_blank" rel="noopener" class="copy-btn">
                  buka situs ↗
                </a>
              </div>
            </div>
          </div>

          <div class="contact-form-box">
            <h3 style="font-family:var(--font-display);font-size:1.12rem;margin-bottom:0.3rem;">
              Kirim Pesan Kolaborasi
            </h3>
            <p style="font-size:0.82rem;color:var(--text-muted);margin-bottom:1.1rem;">
              Tersimpan langsung ke database Dashboard Admin Laravel.
            </p>

            <?php if(session()->has('success')): ?>
              <div class="alert-success">
                <?php echo e(session('success')); ?>
              </div>
            <?php endif; ?>

            <form action="<?php echo e(route('portfolio.contact.store')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label class="form-label" for="name">nama *</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Anda" required />
              </div>

              <div class="form-group">
                <label class="form-label" for="email">email *</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" required />
              </div>

              <div class="form-group">
                <label class="form-label" for="message">pesan *</label>
                <textarea id="message" name="message" rows="3" class="form-control" placeholder="Tulis pesan Anda..." required></textarea>
              </div>

              <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                <span>kirim pesan</span>
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
        © 2026 <?php echo e($profile->full_name ?? 'Arjuna Carly Dhymas Mahendra'); ?>. Dibuat menggunakan Laravel &amp; CSS murni.
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
        <a href="/admin">admin cms</a>
      </div>
    </div>
  </footer>

  <script src="<?php echo e(asset('assets/js/portfolio.js')); ?>"></script>
</body>
</html>
