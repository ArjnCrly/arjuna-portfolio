@extends('layouts.admin')

@section('title', '02 / Form Proyek — JUN.dev CMS')

@section('content')
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">
    {{ $project ? 'Edit Proyek Portofolio' : 'Tambah Proyek Portofolio Baru' }}
  </h1>
</div>

<div class="card">
  <form action="{{ $project ? '/admin/projects/' . $project->id : '/admin/projects' }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($project)
      @method('PUT')
    @endif

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Judul Proyek *</label>
        <input type="text" name="title" class="form-control" value="{{ $project->title ?? '' }}" required />
      </div>
      <div class="form-group">
        <label class="form-label">Slug URL (Kosongkan agar dibuat otomatis)</label>
        <input type="text" name="slug" class="form-control" value="{{ $project->slug ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Peran Anda *</label>
        <input type="text" name="role" class="form-control" value="{{ $project->role ?? '' }}" placeholder="UI/UX Designer & Fullstack Developer" required />
      </div>
      <div class="form-group">
        <label class="form-label">Mitra / Instansi / Klien</label>
        <input type="text" name="client" class="form-control" value="{{ $project->client ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Kategori Filter</label>
        <select name="category" class="form-control">
          <option value="Fullstack & Laravel" {{ ($project && $project->category === 'Fullstack & Laravel') ? 'selected' : '' }}>Fullstack &amp; Laravel</option>
          <option value="Frontend & UI/UX" {{ ($project && $project->category === 'Frontend & UI/UX') ? 'selected' : '' }}>Frontend &amp; UI/UX</option>
          <option value="Project Management & Frontend" {{ ($project && $project->category === 'Project Management & Frontend') ? 'selected' : '' }}>Project Management &amp; Frontend</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Periode Pengerjaan</label>
        <input type="text" name="period" class="form-control" value="{{ $project->period ?? '' }}" placeholder="Feb 2024 - Agu 2024" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tech Stack (Pisahkan dengan koma)</label>
        <input type="text" name="tech_stack" class="form-control" value="{{ $project->tech_stack ?? '' }}" placeholder="Laravel, React, Tailwind CSS, Figma, JavaScript, PHP" />
      </div>
      <div class="form-group">
        <label class="form-label">Badge Highlight Metrik (Contoh: +90% Skor Responsivitas)</label>
        <input type="text" name="metrics_highlight" class="form-control" value="{{ $project->metrics_highlight ?? '' }}" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Ringkasan Singkat (Tampil di Kartu Beranda) *</label>
      <textarea name="short_description" rows="2" class="form-control" required>{{ $project->short_description ?? '' }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Studi Kasus Lengkap (Tampil di Halaman Detail /projects/{slug})</label>
      <textarea name="full_description" rows="5" class="form-control">{{ $project->full_description ?? '' }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Fitur Utama &amp; Kontribusi (Pisahkan setiap poin dengan baris baru / Enter)</label>
      <textarea name="key_features" rows="4" class="form-control">{{ $project->key_features ?? '' }}</textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL Live Website / Demo</label>
        <input type="text" name="live_url" class="form-control" value="{{ $project->live_url ?? '' }}" placeholder="https://hunianlestari.com" />
      </div>
      <div class="form-group">
        <label class="form-label">URL Repository GitHub</label>
        <input type="text" name="repo_url" class="form-control" value="{{ $project->repo_url ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tema Warna Blueprint Card (Jika tanpa gambar upload)</label>
        <select name="preview_theme" class="form-control">
          <option value="emerald" {{ ($project && $project->preview_theme === 'emerald') ? 'selected' : '' }}>Emerald Cyber</option>
          <option value="indigo" {{ ($project && $project->preview_theme === 'indigo') ? 'selected' : '' }}>Indigo Violet</option>
          <option value="cyan" {{ ($project && $project->preview_theme === 'cyan') ? 'selected' : '' }}>Cyan Ocean</option>
          <option value="amber" {{ ($project && $project->preview_theme === 'amber') ? 'selected' : '' }}>Amber Gold</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Upload Screenshot Proyek (Opsional)</label>
        <input type="file" name="image" class="form-control" accept="image/*" />
        @if($project && $project->image)
          <div style="margin-top:0.6rem;display:flex;align-items:center;gap:0.75rem;padding:0.5rem 0.75rem;background:rgba(255,255,255,0.04);border-radius:6px;border:1px solid var(--border);">
            <img src="{{ asset($project->image) }}" alt="Preview" style="height:48px;width:72px;object-fit:cover;border-radius:4px;border:1px solid rgba(255,255,255,0.1);" />
            <div>
              <div style="font-size:0.78rem;color:var(--accent);font-family:var(--font-mono);">✓ Gambar saat ini terpasang</div>
              <div style="font-size:0.72rem;color:var(--muted);">{{ basename($project->image) }}</div>
            </div>
          </div>
        @endif
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="sort_order" class="form-control" value="{{ $project->sort_order ?? 1 }}" />
      </div>
      <div class="form-group" style="display:flex;align-items:center;gap:0.5rem;padding-top:1.5rem;">
        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ (!$project || $project->is_featured) ? 'checked' : '' }} />
        <label for="is_featured">Tampilkan sebagai Proyek Pilihan (Featured)</label>
      </div>
    </div>

    <div style="display:flex;gap:0.75rem;">
      <button type="submit" class="btn btn-emerald">Simpan Proyek</button>
      <a href="/admin/projects" class="btn btn-outline">Batal</a>
    </div>
  </form>
</div>
@endsection
