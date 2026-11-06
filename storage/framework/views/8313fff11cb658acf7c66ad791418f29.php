<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>02 / Form Proyek — JUN.dev CMS — JUN.dev CMS</title>
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
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">
    <?php echo e($project ? 'Edit Proyek Portofolio' : 'Tambah Proyek Portofolio Baru'); ?>
  </h1>
</div>

<div class="card">
  <form action="<?php echo e($project ? '/admin/projects/' . $project->id : '/admin/projects'); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if($project): ?>
      <?php echo method_field("PUT"); ?>
    <?php endif; ?>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Judul Proyek *</label>
        <input type="text" name="title" class="form-control" value="<?php echo e($project->title ?? ''); ?>" required />
      </div>
      <div class="form-group">
        <label class="form-label">Slug URL (Kosongkan agar dibuat otomatis)</label>
        <input type="text" name="slug" class="form-control" value="<?php echo e($project->slug ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Peran Anda *</label>
        <input type="text" name="role" class="form-control" value="<?php echo e($project->role ?? ''); ?>" placeholder="UI/UX Designer & Fullstack Developer" required />
      </div>
      <div class="form-group">
        <label class="form-label">Mitra / Instansi / Klien</label>
        <input type="text" name="client" class="form-control" value="<?php echo e($project->client ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Kategori Filter</label>
        <select name="category" class="form-control">
          <option value="Fullstack & Laravel" <?php echo e(($project && $project->category === 'Fullstack & Laravel') ? 'selected' : ''); ?>>Fullstack &amp; Laravel</option>
          <option value="Frontend & UI/UX" <?php echo e(($project && $project->category === 'Frontend & UI/UX') ? 'selected' : ''); ?>>Frontend &amp; UI/UX</option>
          <option value="Project Management & Frontend" <?php echo e(($project && $project->category === 'Project Management & Frontend') ? 'selected' : ''); ?>>Project Management &amp; Frontend</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Periode Pengerjaan</label>
        <input type="text" name="period" class="form-control" value="<?php echo e($project->period ?? ''); ?>" placeholder="Feb 2024 - Agu 2024" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tech Stack (Pisahkan dengan koma)</label>
        <input type="text" name="tech_stack" class="form-control" value="<?php echo e($project->tech_stack ?? ''); ?>" placeholder="Laravel, React, Tailwind CSS, Figma, JavaScript, PHP" />
      </div>
      <div class="form-group">
        <label class="form-label">Badge Highlight Metrik (Contoh: +90% Skor Responsivitas)</label>
        <input type="text" name="metrics_highlight" class="form-control" value="<?php echo e($project->metrics_highlight ?? ''); ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Ringkasan Singkat (Tampil di Kartu Beranda) *</label>
      <textarea name="short_description" rows="2" class="form-control" required><?php echo e($project->short_description ?? ''); ?></textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Studi Kasus Lengkap (Tampil di Halaman Detail /projects/{slug})</label>
      <textarea name="full_description" rows="5" class="form-control"><?php echo e($project->full_description ?? ''); ?></textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Fitur Utama &amp; Kontribusi (Pisahkan setiap poin dengan baris baru / Enter)</label>
      <textarea name="key_features" rows="4" class="form-control"><?php echo e($project->key_features ?? ''); ?></textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL Live Website / Demo</label>
        <input type="text" name="live_url" class="form-control" value="<?php echo e($project->live_url ?? ''); ?>" placeholder="https://hunianlestari.com" />
      </div>
      <div class="form-group">
        <label class="form-label">URL Repository GitHub</label>
        <input type="text" name="repo_url" class="form-control" value="<?php echo e($project->repo_url ?? ''); ?>" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tema Warna Blueprint Card (Jika tanpa gambar upload)</label>
        <select name="preview_theme" class="form-control">
          <option value="emerald" <?php echo e(($project && $project->preview_theme === 'emerald') ? 'selected' : ''); ?>>Emerald Cyber</option>
          <option value="indigo" <?php echo e(($project && $project->preview_theme === 'indigo') ? 'selected' : ''); ?>>Indigo Violet</option>
          <option value="cyan" <?php echo e(($project && $project->preview_theme === 'cyan') ? 'selected' : ''); ?>>Cyan Ocean</option>
          <option value="amber" <?php echo e(($project && $project->preview_theme === 'amber') ? 'selected' : ''); ?>>Amber Gold</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Upload Screenshot Proyek (Opsional)</label>
        <input type="file" name="image" class="form-control" accept="image/*" />
        <?php if($project && $project->image): ?>
          <div style="margin-top:0.6rem;display:flex;align-items:center;gap:0.75rem;padding:0.5rem 0.75rem;background:rgba(255,255,255,0.04);border-radius:6px;border:1px solid var(--border);">
            <img src="<?php echo e(asset($project->image)); ?>" alt="Preview" style="height:48px;width:72px;object-fit:cover;border-radius:4px;border:1px solid rgba(255,255,255,0.1);" />
            <div>
              <div style="font-size:0.78rem;color:var(--accent);font-family:var(--font-mono);">✓ Gambar saat ini terpasang</div>
              <div style="font-size:0.72rem;color:var(--muted);"><?php echo e(basename($project->image)); ?></div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="sort_order" class="form-control" value="<?php echo e($project->sort_order ?? 1); ?>" />
      </div>
      <div class="form-group" style="display:flex;align-items:center;gap:0.5rem;padding-top:1.5rem;">
        <input type="checkbox" id="is_featured" name="is_featured" value="1" <?php echo e((!$project || $project->is_featured) ? 'checked' : ''); ?> />
        <label for="is_featured">Tampilkan sebagai Proyek Pilihan (Featured)</label>
      </div>
    </div>

    <div style="display:flex;gap:0.75rem;">
      <button type="submit" class="btn btn-emerald">Simpan Proyek</button>
      <a href="/admin/projects" class="btn btn-outline">Batal</a>
    </div>
  </form>
</div>

    </main>
  </div>
</body>
</html>
