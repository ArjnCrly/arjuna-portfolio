@extends('layouts.admin')

@section('title', '04 / Form Prestasi & Pendidikan — JUN.dev CMS')

@section('content')
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">
    {{ $education ? '04 / Edit Prestasi & Pendidikan' : '04 / Tambah Prestasi & Pendidikan' }}
  </h1>
</div>

<div class="card">
  <form action="{{ $education ? '/admin/educations/' . $education->id : '/admin/educations' }}" method="POST">
    @csrf
    @if($education)
      @method('PUT')
    @endif

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nama Institusi / Kampus / Sekolah *</label>
        <input type="text" name="institution" class="form-control" value="{{ $education->institution ?? '' }}" required />
      </div>
      <div class="form-group">
        <label class="form-label">Jurusan / Program Studi *</label>
        <input type="text" name="degree" class="form-control" value="{{ $education->degree ?? '' }}" required />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Periode Tahun *</label>
        <input type="text" name="period" class="form-control" value="{{ $education->period ?? '' }}" placeholder="Agu 2023 - Sekarang" required />
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" value="{{ $education->location ?? '' }}" placeholder="Malang, Jawa Timur" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Deskripsi Akademik</label>
      <textarea name="description" rows="3" class="form-control">{{ $education->description ?? '' }}</textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Mata Kuliah Relevan / Fokus (Pisahkan dengan koma)</label>
        <input type="text" name="highlights" class="form-control" value="{{ $education->highlights ?? '' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="sort_order" class="form-control" value="{{ $education->sort_order ?? 1 }}" />
      </div>
    </div>

    <div style="display:flex;gap:0.75rem;">
      <button type="submit" class="btn btn-emerald">Simpan Pendidikan</button>
      <a href="/admin/educations" class="btn btn-outline">Batal</a>
    </div>
  </form>
</div>
@endsection
