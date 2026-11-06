@extends('layouts.admin')

@section('title', '05 / Pengalaman & Organisasi — JUN.dev CMS')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
  <div>
    <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">05 / Pengalaman Kerja &amp; Organisasi</h1>
    <p style="color:var(--muted);font-size:0.88rem;">Tambah atau perbarui rekam jejak proyek pengembangan web maupun kepanitiaan/organisasi.</p>
  </div>
  <a href="/admin/experiences/create" class="btn btn-emerald">+ Tambah Pengalaman Baru</a>
</div>

<div class="card">
  <table>
    <thead>
      <tr>
        <th>Urutan</th>
        <th>Kategori</th>
        <th>Periode</th>
        <th>Instansi / Proyek</th>
        <th>Peran / Jabatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($experiences as $e)
      <tr>
        <td>#{{ $e->sort_order }}</td>
        <td>
          @if($e->type === 'work')
            <span class="badge" style="color:#10b981;border-color:rgba(16,185,129,0.35);">Proyek &amp; Kerja</span>
          @else
            <span class="badge" style="color:#38bdf8;border-color:rgba(56,189,248,0.35);">Organisasi</span>
          @endif
        </td>
        <td>{{ $e->period }}</td>
        <td><strong>{{ $e->company }}</strong></td>
        <td>{{ $e->role }}</td>
        <td style="display:flex;gap:0.45rem;">
          <a href="/admin/experiences/{{ $e->id }}/edit" class="btn btn-outline" style="padding:0.3rem 0.65rem;">Edit</a>
          <form action="/admin/experiences/{{ $e->id }}" method="POST" onsubmit="return confirm('Hapus pengalaman ini?');">
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
