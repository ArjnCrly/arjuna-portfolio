<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>01 / Tentang Saya & Biodata — JUN.dev CMS — JUN.dev CMS</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-body: #070a0f;
      --bg-sidebar: #0b1018;
      --bg-card: #101723;
      --bg-input: #090d14;
      --border: rgba(148, 163, 184, 0.14);
      --text: #f1f5f9;
      --muted: #94a3b8;
      --accent: #10b981;
      --accent-soft: rgba(16, 185, 129, 0.12);
      --danger: #ef4444;
      --font-sans: 'Inter', system-ui, sans-serif;
      --font-mono: 'JetBrains Mono', monospace;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: var(--bg-body);
      color: var(--text);
      font-family: var(--font-sans);
      display: flex;
      min-height: 100vh;
    }
    a { color: inherit; text-decoration: none; }
    .sidebar {
      width: 260px;
      background: var(--bg-sidebar);
      border-right: 1px solid var(--border);
      padding: 1.5rem 1.1rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      flex-shrink: 0;
    }
    .brand {
      font-family: var(--font-mono);
      font-weight: 700;
      font-size: 1rem;
      padding: 0 0.6rem 1.25rem;
      border-bottom: 1px solid var(--border);
      margin-bottom: 1.15rem;
      display: flex;
      align-items: center;
      gap: 0.55rem;
    }
    .brand-dot {
      width: 9px; height: 9px; border-radius: 50%; background: var(--accent);
    }
    .nav-list {
      display: flex;
      flex-direction: column;
      gap: 0.3rem;
    }
    .nav-item {
      display: flex;
      align-items: center;
      gap: 0.65rem;
      padding: 0.65rem 0.85rem;
      border-radius: 8px;
      font-size: 0.88rem;
      color: var(--muted);
      transition: all 0.18s ease;
    }
    .nav-item:hover, .nav-item.active {
      background: var(--accent-soft);
      color: var(--accent);
      font-weight: 600;
    }
    .main-area {
      flex: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
    }
    .topbar {
      height: 64px;
      border-bottom: 1px solid var(--border);
      padding: 0 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: rgba(11, 16, 24, 0.85);
    }
    .content {
      padding: 2rem;
      max-width: 1180px;
      width: 100%;
    }
    .card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1rem;
      margin-bottom: 1.75rem;
    }
    .stat-box {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 1.15rem 1.25rem;
    }
    .stat-label { font-family: var(--font-mono); font-size: 0.75rem; color: var(--muted); }
    .stat-val { font-size: 1.75rem; font-weight: 700; color: var(--accent); margin-top: 0.25rem; }
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.45rem;
      font-family: var(--font-mono);
      font-size: 0.8rem;
      font-weight: 600;
      padding: 0.58rem 1rem;
      border-radius: 7px;
      border: 1px solid transparent;
      cursor: pointer;
    }
    .btn-emerald { background: var(--accent); color: #04130e; }
    .btn-outline { background: transparent; border-color: var(--border); color: var(--text); }
    .btn-outline:hover { border-color: var(--accent); color: var(--accent); }
    .btn-danger { background: rgba(239, 68, 68, 0.14); border-color: rgba(239, 68, 68, 0.35); color: #f87171; }
    table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
    th, td { text-align: left; padding: 0.85rem 0.9rem; border-bottom: 1px solid var(--border); }
    th { font-family: var(--font-mono); font-size: 0.75rem; color: var(--muted); text-transform: uppercase; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .form-group { margin-bottom: 1rem; }
    .form-label { display: block; font-family: var(--font-mono); font-size: 0.76rem; color: var(--muted); margin-bottom: 0.38rem; }
    .form-control {
      width: 100%;
      padding: 0.65rem 0.85rem;
      background: var(--bg-input);
      border: 1px solid var(--border);
      border-radius: 7px;
      color: var(--text);
      font-family: var(--font-sans);
      font-size: 0.9rem;
    }
    .form-control:focus { outline: none; border-color: var(--accent); }
    .alert {
      padding: 0.85rem 1.1rem;
      border-radius: 8px;
      background: var(--accent-soft);
      border: 1px solid rgba(16, 185, 129, 0.35);
      color: #34d399;
      font-family: var(--font-mono);
      font-size: 0.82rem;
      margin-bottom: 1.25rem;
    }
    .badge {
      font-family: var(--font-mono);
      font-size: 0.72rem;
      padding: 0.18rem 0.5rem;
      border-radius: 4px;
      background: rgba(255,255,255,0.06);
      border: 1px solid var(--border);
    }
    @media (max-width: 820px) {
      body { flex-direction: column; }
      .sidebar { width: 100%; border-right: none; border-bottom: 1px solid var(--border); }
      .form-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>
  <aside class="sidebar">
    <div>
      <div class="brand">
        <span class="brand-dot"></span>
        <span>JUN<span style="color:var(--accent);">.dev</span> <span style="font-size:0.75rem;opacity:0.6;font-weight:400;margin-left:2px;">CMS</span></span>
      </div>
      <?php 
        $currUri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
        $currUri = '/' . trim($currUri, '/');
        if ($currUri !== '/') $currUri = rtrim($currUri, '/');
       ?>
      <nav class="nav-list">
        <a href="/admin" class="nav-item <?php echo e($currUri === '/admin' ? 'active' : ''); ?>">
          <span>📊</span>
          <span>Ringkasan Dashboard</span>
        </a>
        <a href="/admin/profile" class="nav-item <?php echo e(($currUri === '/admin/profile' || strpos($currUri, '/admin/profile') === 0) ? 'active' : ''); ?>">
          <span>👤</span>
          <span>01 / Tentang Saya</span>
        </a>
        <a href="/admin/projects" class="nav-item <?php echo e(($currUri === '/admin/projects' || strpos($currUri, '/admin/projects') === 0) ? 'active' : ''); ?>">
          <span>🚀</span>
          <span>02 / Proyek</span>
        </a>
        <a href="/admin/skills" class="nav-item <?php echo e(($currUri === '/admin/skills' || strpos($currUri, '/admin/skills') === 0) ? 'active' : ''); ?>">
          <span>⚡</span>
          <span>03 / Keahlian</span>
        </a>
        <a href="/admin/educations" class="nav-item <?php echo e(($currUri === '/admin/educations' || strpos($currUri, '/admin/educations') === 0) ? 'active' : ''); ?>">
          <span>🎓</span>
          <span>04 / Prestasi &amp; Pendidikan</span>
        </a>
        <a href="/admin/experiences" class="nav-item <?php echo e(($currUri === '/admin/experiences' || strpos($currUri, '/admin/experiences') === 0) ? 'active' : ''); ?>">
          <span>💼</span>
          <span>05 / Pengalaman &amp; Organisasi</span>
        </a>
        <a href="/admin/messages" class="nav-item <?php echo e(($currUri === '/admin/messages' || strpos($currUri, '/admin/messages') === 0) ? 'active' : ''); ?>">
          <span>✉️</span>
          <span>06 / Kontak &amp; Pesan</span>
        </a>
      </nav>
    </div>

    <div style="padding-top:1.5rem;border-top:1px solid var(--border);display:flex;flex-direction:column;gap:0.5rem;">
      <a href="/" target="_blank" class="btn btn-outline" style="justify-content:center;">↗ Lihat Website Live</a>
      <form action="/admin/logout" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger" style="width:100%;justify-content:center;">Keluar Sesi Admin</button>
      </form>
    </div>
  </aside>

  <div class="main-area">
    <header class="topbar">
      <div style="font-family:var(--font-mono);font-size:0.85rem;color:var(--muted);">
        JUN.dev Admin CMS · <strong>Arjuna Carly Dhymas Mahendra</strong>
      </div>
      <div>
        <a href="/" class="btn btn-outline">← Kembali ke Portofolio</a>
      </div>
    </header>

    <main class="content">
      <?php if(session()->has('success')): ?>
        <div class="alert">✓ <?php echo e(session('success')); ?></div>
      <?php endif; ?>
      <?php if(session()->has('error')): ?>
        <div class="alert" style="background:rgba(239,68,68,0.12);border-color:rgba(239,68,68,0.35);color:#f87171;">
          ⚠ <?php echo e(session('error')); ?>
        </div>
      <?php endif; ?>

      
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">01 / Tentang Saya &amp; Profil Utama</h1>
  <p style="color:var(--muted);font-size:0.88rem;">Perbarui informasi pribadi, deskripsi Hero, Tentang Saya, serta tautan sosial media dan kontak.</p>
</div>

<div class="card">
  <form action="/admin/profile" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PUT"); ?>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="full_name" class="form-control" value="<?php echo e($profile->full_name ?? ''); ?>" required />
      </div>
      <div class="form-group">
        <label class="form-label">Nama Singkat / Panggilan</label>
        <input type="text" name="short_name" class="form-control" value="<?php echo e($profile->short_name ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="birth_place" class="form-control" value="<?php echo e($profile->birth_place ?? 'Sidoarjo'); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Tanggal Lahir</label>
        <input type="text" name="birth_date" class="form-control" value="<?php echo e($profile->birth_date ?? '13 Desember 2004'); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Perguruan Tinggi / Kampus</label>
        <input type="text" name="university" class="form-control" value="<?php echo e($profile->university ?? 'Politeknik Negeri Malang'); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Jurusan</label>
        <input type="text" name="department" class="form-control" value="<?php echo e($profile->department ?? 'Jurusan Teknologi Informasi'); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Program Studi</label>
        <input type="text" name="study_program" class="form-control" value="<?php echo e($profile->study_program ?? 'D-IV Teknik Informatika'); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi Domisili</label>
        <input type="text" name="location" class="form-control" value="<?php echo e($profile->location ?? 'Sidoarjo & Malang, Jawa Timur'); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Headline Peran (Hero Section)</label>
        <input type="text" name="headline_role" class="form-control" value="<?php echo e($profile->headline_role ?? ''); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Status Ketersediaan</label>
        <input type="text" name="availability_text" class="form-control" value="<?php echo e($profile->availability_text ?? ''); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Greeting Badge (Teks di dalam kurung siku atas Hero)</label>
      <input type="text" name="greeting_badge" class="form-control" value="<?php echo e($profile->greeting_badge ?? 'halo, selamat datang'); ?>" />
    </div>

    <div class="form-group">
      <label class="form-label">Paragraf Utama Hero</label>
      <textarea name="hero_bio" rows="2" class="form-control"><?php echo e($profile->hero_bio ?? ''); ?></textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Sub-Paragraf Keahlian Hero (Figma, React, Tailwind, Laravel, JS, PHP, HTML)</label>
      <textarea name="hero_sub_bio" rows="3" class="form-control"><?php echo e($profile->hero_sub_bio ?? ''); ?></textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Deskripsi Lengkap "Tentang Saya" (Sesuai CV)</label>
      <textarea name="about_text" rows="4" class="form-control"><?php echo e($profile->about_text ?? ''); ?></textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Email Resmi</label>
        <input type="email" name="email" class="form-control" value="<?php echo e($profile->email ?? ''); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" name="phone" class="form-control" value="<?php echo e($profile->phone ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nomor WhatsApp (Format 628...)</label>
        <input type="text" name="whatsapp" class="form-control" value="<?php echo e($profile->whatsapp ?? ''); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Website Portofolio Komersial</label>
        <input type="text" name="website_url" class="form-control" value="<?php echo e($profile->website_url ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL LinkedIn</label>
        <input type="text" name="linkedin_url" class="form-control" value="<?php echo e($profile->linkedin_url ?? ''); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Username LinkedIn</label>
        <input type="text" name="linkedin_handle" class="form-control" value="<?php echo e($profile->linkedin_handle ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL GitHub</label>
        <input type="text" name="github_url" class="form-control" value="<?php echo e($profile->github_url ?? ''); ?>" />
      </div>
      <div class="form-group">
        <label class="form-label">Username GitHub</label>
        <input type="text" name="github_handle" class="form-control" value="<?php echo e($profile->github_handle ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL Instagram</label>
        <input type="text" name="instagram_url" class="form-control" value="<?php echo e($profile->instagram_url ?? ''); ?>" placeholder="https://instagram.com/arjunacarly" />
      </div>
      <div class="form-group">
        <label class="form-label">Username Instagram</label>
        <input type="text" name="instagram_handle" class="form-control" value="<?php echo e($profile->instagram_handle ?? ''); ?>" placeholder="@arjunacarly" />
      </div>
    </div>

    <button type="submit" class="btn btn-emerald">Simpan Perubahan Biodata</button>
  </form>
</div>

    </main>
  </div>
</body>
</html>
