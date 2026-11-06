@extends('layouts.admin')

@section('title', '02 / Kelola Proyek — JUN.dev CMS')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
  <div>
    <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">02 / Proyek Portofolio</h1>
    <p style="color:var(--muted);font-size:0.88rem;">Tambah, edit, atau hapus karya proyek web, UI/UX, dan aplikasi Anda.</p>
  </div>
  <a href="/admin/projects/create" class="btn btn-emerald">+ Tambah Proyek Baru</a>
</div>

<div class="card">
  <table>
    <thead>
      <tr>
        <th>Urutan</th>
        <th>Judul Proyek</th>
        <th>Peran</th>
        <th>Kategori</th>
        <th>Tech Stack</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $p)
      <tr>
        <td>#{{ $p->sort_order }}</td>
        <td>
          <strong>{{ $p->title }}</strong><br>
          <span style="font-size:0.75rem;color:var(--muted);">{{ $p->client }} · {{ $p->period }}</span>
        </td>
        <td>{{ $p->role }}</td>
        <td><span class="badge">{{ $p->category }}</span></td>
        <td style="font-size:0.78rem;color:var(--muted);">{{ $p->tech_stack }}</td>
        <td style="display:flex;gap:0.45rem;">
          <a href="/projects/{{ $p->slug }}" target="_blank" class="btn btn-outline" style="padding:0.3rem 0.65rem;">Lihat</a>
          <a href="/admin/projects/{{ $p->id }}/edit" class="btn btn-outline" style="padding:0.3rem 0.65rem;">Edit</a>
          <form action="/admin/projects/{{ $p->id }}" method="POST" onsubmit="return confirm('Hapus proyek ini?');">
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
