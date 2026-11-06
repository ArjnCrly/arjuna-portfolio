<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $project->title }} — Studi Kasus Portofolio {{ $profile->full_name ?? 'Arjuna Carly' }}</title>
  <meta name="description" content="Studi kasus pengerjaan {{ $project->title }}. Peran: {{ $project->role }} — {{ $project->short_description }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}?v={{ filemtime(public_path('assets/css/portfolio.css')) }}" />
</head>
<body class="case-study-page">

  <main>
    <!-- ======================================================================
         1. CASE STUDY HERO HEADER (No Floating Navbar)
         ====================================================================== -->
    <section class="case-hero-section">
      <div class="container">
        
        <!-- Breadcrumb & Top Utility Row -->
        <div class="case-breadcrumb-row">
          <div class="breadcrumb-left">
            <a href="/#projek" class="case-back-btn">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
              </svg>
              <span>Kembali ke Portofolio</span>
            </a>
            <span class="breadcrumb-divider">/</span>
            <a href="/projects" class="breadcrumb-link">Semua Proyek</a>
            <span class="breadcrumb-divider">/</span>
            <span class="breadcrumb-active">{{ $project->title }}</span>
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

        <!-- Top Category & Tag -->
        <div class="section-top-label-row">
          <div class="section-counter-tag">STUDI KASUS PROYEK</div>
          <div class="section-counter-tag"><span>{{ strtoupper($project->category ?? 'REKAYASA PERANGKAT LUNAK') }}</span></div>
        </div>

        <!-- Title & Subtitle -->
        <h1 class="case-main-title">
          {{ $project->title }}<span class="dot">.</span>
        </h1>
        <p class="case-lead-desc">
          {{ $project->short_description }}
        </p>

        <!-- 4-Card Metadata Strip -->
        <div class="case-meta-grid">
          
          <div class="case-meta-card">
            <div class="case-meta-label">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
              PERAN UTAMA
            </div>
            <div class="case-meta-val">{{ $project->role }}</div>
          </div>

          <div class="case-meta-card">
            <div class="case-meta-label">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
              MITRA / KLIEN
            </div>
            <div class="case-meta-val">{{ $project->client ?: 'Proyek Akademik / Portfolio' }}</div>
          </div>

          <div class="case-meta-card">
            <div class="case-meta-label">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              PERIODE
            </div>
            <div class="case-meta-val">{{ $project->period ?: '2024 - Sekarang' }}</div>
          </div>

          <div class="case-meta-card case-meta-card-highlight">
            <div class="case-meta-label">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              DAMPAK / IMPACT
            </div>
            <div class="case-meta-val">{{ $project->metrics_highlight ?: 'Selesai & Terverifikasi' }}</div>
          </div>

        </div>

        <!-- Action Buttons Row -->
        <div class="case-actions-row">
          @if($project->live_url)
          <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="case-cta-btn primary">
            <span>Buka Website Live</span>
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
          </a>
          @endif
          <a href="/#kontak" class="case-cta-btn secondary">
            <span>Diskusi Proyek Serupa</span>
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
          </a>
        </div>

      </div>
    </section>

    <!-- ======================================================================
         3. PROJECT VISUAL SHOWCASE FRAME
         ====================================================================== -->
    @if($project->image)
    <section class="case-visual-section">
      <div class="container">
        <div class="case-browser-window">
          <!-- Window Chrome Header -->
          <div class="case-browser-bar">
            <div class="browser-dots">
              <span class="dot-btn dot-red"></span>
              <span class="dot-btn dot-yellow"></span>
              <span class="dot-btn dot-green"></span>
            </div>
            <div class="case-browser-url">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
              <span>{{ $project->live_url ? parse_url($project->live_url, PHP_URL_HOST) : strtolower(str_replace([' ', '-', '_'], '', $project->title)) . '.polinema.ac.id' }}</span>
            </div>
            <div class="case-browser-tag">STUDIO SHOWCASE</div>
          </div>
          <!-- Window Image Viewport -->
          <div class="case-browser-body">
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="case-mockup-img" />
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- ======================================================================
         4. CASE STUDY DEEP DIVE (2-Column Editorial Architecture)
         ====================================================================== -->
    <section class="case-content-section">
      <div class="container">
        
        <div class="case-split-layout">
          
          <!-- Left Column: Main Narrative -->
          <div class="case-narrative-col">
            
            <!-- Block 1: Deskripsi & Latar Belakang -->
            <div class="case-card-panel">
              <div class="case-panel-header">
                <span class="panel-step-badge">01</span>
                <div>
                  <div class="panel-section-tag">LATAR BELAKANG &amp; KONSEP</div>
                  <h2 class="panel-heading">Deskripsi &amp; Studi Kasus</h2>
                </div>
              </div>
              <div class="case-panel-body">
                @php
                  $paragraphs = array_filter(array_map('trim', explode("\n", (string)$project->full_description)));
                @endphp
                @foreach($paragraphs as $p)
                <p class="case-body-text">{{ $p }}</p>
                @endforeach
              </div>
            </div>

            <!-- Block 2: Fitur Utama & Solusi Rekayasa -->
            @php
              $features = array_filter(array_map('trim', explode("\n", (string)$project->key_features)));
            @endphp
            @if(count($features) > 0)
            <div class="case-card-panel">
              <div class="case-panel-header">
                <span class="panel-step-badge">02</span>
                <div>
                  <div class="panel-section-tag">DELIVERABLE &amp; FITUR UTAMA</div>
                  <h2 class="panel-heading">Kontribusi Teknis &amp; Rekayasa Sistem</h2>
                </div>
              </div>
              <div class="case-panel-body">
                <div class="case-features-stack">
                  @foreach($features as $idx => $feat)
                  <div class="case-feature-row">
                    <div class="feat-num-box">{{ sprintf('%02d', $idx + 1) }}</div>
                    <div class="feat-content">
                      <p class="feat-text">{{ $feat }}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endif

            <!-- Block 3: Dampak & Hasil -->
            @if($project->metrics_highlight)
            <div class="case-card-panel case-impact-panel">
              <div class="case-panel-header">
                <span class="panel-step-badge">03</span>
                <div>
                  <div class="panel-section-tag">HASIL &amp; PENCAPAIAN</div>
                  <h2 class="panel-heading">Metrik Keberhasilan</h2>
                </div>
              </div>
              <div class="case-panel-body">
                <div class="impact-stat-box">
                  <div class="impact-big-stat">{{ $project->metrics_highlight }}</div>
                  <p class="case-body-text" style="margin-bottom:0;">
                    Hasil pengerjaan teruji dan telah diimplementasikan sesuai standar kualitas arsitektur perangkat lunak yang disepakati dengan tim dan mitra.
                  </p>
                </div>
              </div>
            </div>
            @endif

          </div>

          <!-- Right Column: Sticky Sidebar -->
          <aside class="case-sidebar-col">
            <div class="case-sidebar-sticky">
              
              <!-- Tech Stack Card -->
              <div class="case-sidebar-card">
                <div class="sidebar-card-title">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                  <span>Teknologi &amp; Instrumen</span>
                </div>
                <div class="case-stack-pills">
                  @php
                    $stacks = array_filter(array_map('trim', explode(',', (string)$project->tech_stack)));
                  @endphp
                  @foreach($stacks as $st)
                  <span class="case-tech-chip">{{ $st }}</span>
                  @endforeach
                </div>
              </div>

              <!-- Project Summary Card -->
              <div class="case-sidebar-card">
                <div class="sidebar-card-title">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                  <span>Ringkasan Metadata</span>
                </div>
                <ul class="case-summary-list">
                  <li>
                    <span class="summary-label">Status Proyek</span>
                    <span class="summary-val status-badge">Aktif / Selesai</span>
                  </li>
                  <li>
                    <span class="summary-label">Kategori</span>
                    <span class="summary-val">{{ $project->category }}</span>
                  </li>
                  <li>
                    <span class="summary-label">Peran</span>
                    <span class="summary-val">{{ $project->role }}</span>
                  </li>
                  <li>
                    <span class="summary-label">Mitra / Klien</span>
                    <span class="summary-val">{{ $project->client ?: 'Polinema' }}</span>
                  </li>
                  <li>
                    <span class="summary-label">Tahun</span>
                    <span class="summary-val">{{ $project->period ?: '2024' }}</span>
                  </li>
                </ul>

                @if($project->live_url)
                <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--border-color);">
                  <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="case-cta-btn primary" style="width:100%;justify-content:center;">
                    <span>Kunjungi Live Website</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                  </a>
                </div>
                @endif
              </div>

              <!-- Quick Contact / Hire Card -->
              <div class="case-sidebar-card case-contact-mini-card">
                <div class="mini-card-headline">Tertarik dengan hasil kerja ini?</div>
                <p class="mini-card-desc">Siap berdiskusi untuk proyek web, desain antarmuka UI/UX, atau rekayasa aplikasi baru.</p>
                <a href="/#kontak" class="case-cta-btn primary" style="width:100%;justify-content:center;">Hubungi Arjuna Carly</a>
              </div>

            </div>
          </aside>

        </div>

      </div>
    </section>

    <!-- ======================================================================
         5. OTHER PROJECTS SHOWCASE
         ====================================================================== -->
    @if(count($otherProjects) > 0)
    <section class="case-other-section">
      <div class="container">
        
        <div class="section-top-label-row">
          <div class="section-counter-tag">EKSPLORASI LANJUTAN</div>
          <div class="section-counter-tag"><span>PROYEK PILIHAN LAINNYA</span></div>
        </div>

        <div class="section-heading-row" style="margin-bottom:2.5rem;">
          <h2 class="section-giant-title">PROJEK LAINNYA<span class="dot">.</span></h2>
          <p class="section-sub-desc">Jelajahi karya desain antarmuka, aplikasi fullstack, dan integrasi backend lainnya.</p>
        </div>

        <div class="other-projects-grid">
          @foreach($otherProjects as $other)
          <a href="{{ route('portfolio.project.show', ['slug' => $other->slug]) }}" class="other-project-card">
            @if($other->image)
            <div class="other-card-img-wrap">
              <img src="{{ asset($other->image) }}" alt="{{ $other->title }}" class="other-card-img" />
            </div>
            @endif
            <div class="other-card-body">
              <div class="other-card-meta">
                <span class="other-card-cat">{{ $other->category }}</span>
                <span class="other-card-role">{{ $other->role }}</span>
              </div>
              <h3 class="other-card-title">{{ $other->title }}</h3>
              <p class="other-card-desc">{{ $other->short_description }}</p>
              <div class="other-card-footer">
                <span class="other-card-link">Baca Studi Kasus →</span>
              </div>
            </div>
          </a>
          @endforeach
        </div>

        <div style="text-align:center;margin-top:3.5rem;">
          <a href="/projects" class="case-cta-btn secondary" style="display:inline-flex;">
            <span>Lihat Semua Katalog Projek</span>
            <span>→</span>
          </a>
        </div>

      </div>
    </section>
    @endif

  </main>

  <!-- ========================================================================
       6. FOOTER BAR
       ======================================================================== -->
  <footer class="site-footer-bar">
    <div class="container footer-bar-inner">
      <div class="footer-monogram">
        © {{ date('Y') }} {{ $profile->full_name ?? 'Arjuna Carly Dhymas Mahendra' }} · Semua Hak Dilindungi
      </div>
      <div class="footer-social-links">
        <a href="https://github.com/arjunacarly" target="_blank" rel="noopener">GitHub</a>
        <a href="https://linkedin.com/in/arjunacarly" target="_blank" rel="noopener">LinkedIn</a>
        <a href="https://instagram.com/arjunacarly" target="_blank" rel="noopener">Instagram</a>
        <a href="#home" class="back-to-top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">↑ Ke Atas</a>
      </div>
    </div>
  </footer>

  <script src="{{ asset('assets/js/portfolio.js') }}"></script>
</body>
</html>
