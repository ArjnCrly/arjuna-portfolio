@extends('layouts.admin')

@section('title', '03 / Keahlian & Tech Stack — JUN.dev CMS')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
  <div>
    <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">03 / Spesialisasi &amp; Keahlian Teknologi</h1>
    <p style="color:var(--muted);font-size:0.88rem;">Kelola daftar teknologi (Figma, React, Tailwind CSS, Laravel, JS, PHP, HTML, Soft Skills &amp; Bahasa).</p>
  </div>
  <a href="/admin/skills/create" class="btn btn-emerald">+ Tambah Keahlian Baru</a>
</div>

<div class="card">
  <table>
    <thead>
      <tr>
        <th>Urutan</th>
        <th>Kategori</th>
        <th>Nama Skill / Teknologi</th>
        <th>Level</th>
        <th>Deskripsi Singkat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($skills as $sk)
      <tr>
        <td>#{{ $sk->sort_order }}</td>
        <td><span class="badge">{{ $sk->category_label }}</span></td>
        <td>
          <strong>{{ $sk->name }}</strong>
          @if($sk->is_highlighted)
            <span class="badge" style="color:#10b981;border-color:rgba(16,185,129,0.4);">★ Highlight</span>
          @endif
        </td>
        <td>{{ $sk->level_badge }}</td>
        <td style="color:var(--muted);font-size:0.82rem;">{{ $sk->description }}</td>
        <td style="display:flex;gap:0.45rem;">
          <a href="/admin/skills/{{ $sk->id }}/edit" class="btn btn-outline" style="padding:0.3rem 0.65rem;">Edit</a>
          <form action="/admin/skills/{{ $sk->id }}" method="POST" onsubmit="return confirm('Hapus skill ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="padding:0.3rem 0.65rem;">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
