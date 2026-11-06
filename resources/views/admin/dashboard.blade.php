@extends('layouts.admin')

@section('title', 'Ringkasan Dashboard — JUN.dev CMS')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem;">
  <div>
    <h1 style="font-size:1.5rem;margin-bottom:0.25rem;">Dashboard CMS Portofolio JUN.dev</h1>
    <p style="color:var(--muted);font-size:0.9rem;">Kelola seluruh konten portofolio Anda secara terpadu tanpa perlu mengubah kode program.</p>
  </div>
  <div style="display:flex;gap:0.6rem;">
    <a href="/admin/projects/create" class="btn btn-emerald">+ Tambah Proyek Baru</a>
    <a href="/admin/experiences/create" class="btn btn-outline">+ Tambah Pengalaman</a>
  </div>
</div>

<div class="stats-grid">
  <div class="stat-box">
    <div class="stat-label">02 / Total Proyek</div>
    <div class="stat-val">{{ $stats['projects'] }}</div>
  </div>
  <div class="stat-box">
    <div class="stat-label">03 / Keahlian &amp; Tech</div>
    <div class="stat-val">{{ $stats['skills'] }}</div>
  </div>
  <div class="stat-box">
    <div class="stat-label">04 / Prestasi &amp; Pendidikan</div>
    <div class="stat-val">{{ $stats['educations'] }}</div>
  </div>
  <div class="stat-box">
    <div class="stat-label">05 / Pengalaman Kerja</div>
    <div class="stat-val">{{ $stats['work_exp'] }}</div>
  </div>
  <div class="stat-box">
    <div class="stat-label">05 / Organisasi</div>
    <div class="stat-val">{{ $stats['org_exp'] }}</div>
  </div>
  <div class="stat-box">
    <div class="stat-label">06 / Pesan Masuk</div>
    <div class="stat-val">{{ $stats['total_messages'] }}</div>
  </div>
</div>

<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
    <h2 style="font-size:1.1rem;">Daftar Proyek Terbaru</h2>
    <a href="/admin/projects" class="btn btn-outline">Kelola Semua Proyek →</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>Judul Proyek</th>
        <th>Peran</th>
        <th>Kategori</th>
        <th>Highlight</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($recentProjects as $p)
      <tr>
        <td><strong>{{ $p->title }}</strong></td>
        <td>{{ $p->role }}</td>
        <td><span class="badge">{{ $p->category }}</span></td>
        <td>{{ $p->metrics_highlight }}</td>
        <td>
          <a href="/admin/projects/{{ $p->id }}/edit" class="btn btn-outline" style="padding:0.3rem 0.65rem;">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
    <h2 style="font-size:1.1rem;">Pesan Kontak Terbaru</h2>
    <a href="/admin/messages" class="btn btn-outline">Lihat Semua Pesan →</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>Pengirim</th>
        <th>Email</th>
        <th>Pesan</th>
      </tr>
    </thead>
    <tbody>
      @foreach($recentMessages as $m)
      <tr>
        <td><strong>{{ $m->name }}</strong></td>
        <td>{{ $m->email }}</td>
        <td>{{ $m->message }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
