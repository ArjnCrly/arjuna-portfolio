@extends('layouts.admin')

@section('title', '04 / Prestasi & Pendidikan — JUN.dev CMS')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
  <div>
    <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">04 / Prestasi &amp; Riwayat Pendidikan</h1>
    <p style="color:var(--muted);font-size:0.88rem;">Kelola daftar pendidikan akademik dan mata kuliah relevan.</p>
  </div>
  <a href="/admin/educations/create" class="btn btn-emerald">+ Tambah Pendidikan</a>
</div>

<div class="card">
  <table>
    <thead>
      <tr>
        <th>Urutan</th>
        <th>Periode</th>
        <th>Institusi</th>
        <th>Jurusan / Jenjang</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($educations as $ed)
      <tr>
        <td>#{{ $ed->sort_order }}</td>
        <td>{{ $ed->period }}</td>
        <td><strong>{{ $ed->institution }}</strong></td>
        <td>{{ $ed->degree }}</td>
        <td style="display:flex;gap:0.45rem;">
          <a href="/admin/educations/{{ $ed->id }}/edit" class="btn btn-outline" style="padding:0.3rem 0.65rem;">Edit</a>
          <form action="/admin/educations/{{ $ed->id }}" method="POST" onsubmit="return confirm('Hapus data pendidikan ini?');">
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
