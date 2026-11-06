@extends('layouts.admin')

@section('title', '05 / Form Pengalaman & Organisasi — JUN.dev CMS')

@section('content')
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">
    {{ $experience ? '05 / Edit Pengalaman & Organisasi' : '05 / Tambah Pengalaman Baru' }}
  </h1>
</div>

<div class="card">
  <form action="{{ $experience ? '/admin/experiences/' . $experience->id : '/admin/experiences' }}" method="POST">
    @csrf
    @if($experience)
      @method('PUT')
    @endif

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tipe Pengalaman</label>
        <select name="type" class="form-control">
          <option value="work" {{ ($experience && $experience->type === 'work') ? 'selected' : '' }}>Pengalaman Kerja &amp; Proyek Web (work)</option>
          <option value="organization" {{ ($experience && $experience->type === 'organization') ? 'selected' : '' }}>Pengalaman Organisasi &amp; Kepanitiaan (organization)</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Periode Waktu *</label>
        <input type="text" name="period" class="form-control" value="{{ $experience->period ?? '' }}" placeholder="Contoh: Feb 2024 - Agu 2024" required />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nama Instansi / Proyek / Organisasi *</label>
        <input type="text" name="company" class="form-control" value="{{ $experience->company ?? '' }}" required />
      </div>
      <div class="form-group">
        <label class="form-label">Peran / Jabatan *</label>
        <input type="text" name="role" class="form-control" value="{{ $experience->role ?? '' }}" required />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" value="{{ $experience->location ?? '' }}" placeholder="Malang / Sidoarjo" />
      </div>
      <div class="form-group">
        <label class="form-label">Urutan Tampil (Angka kecil tampil di atas)</label>
        <input type="number" name="sort_order" class="form-control" value="{{ $experience->sort_order ?? 1 }}" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Poin-Poin Deskripsi &amp; Pencapaian (Pisahkan setiap poin dengan baris baru / Enter)</label>
      <textarea name="description" rows="5" class="form-control">{{ $experience->description ?? '' }}</textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tags Teknologi / Kompetensi (Pisahkan dengan koma)</label>
        <input type="text" name="tags" class="form-control" value="{{ $experience->tags ?? '' }}" placeholder="Figma, React, Tailwind CSS, Laravel" />
      </div>
      <div class="form-group">
        <label class="form-label">Tautan Eksternal (Opsional)</label>
        <input type="text" name="link_url" class="form-control" value="{{ $experience->link_url ?? '' }}" placeholder="https://hunianlestari.com" />
      </div>
    </div>

    <div style="display:flex;gap:0.75rem;">
      <button type="submit" class="btn btn-emerald">Simpan Pengalaman</button>
      <a href="/admin/experiences" class="btn btn-outline">Batal</a>
    </div>
  </form>
</div>
@endsection
