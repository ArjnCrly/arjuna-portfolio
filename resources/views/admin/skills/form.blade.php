@extends('layouts.admin')

@section('title', '03 / Form Keahlian — JUN.dev CMS')

@section('content')
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">
    {{ $skill ? '03 / Edit Keahlian / Tech Stack' : '03 / Tambah Keahlian Baru' }}
  </h1>
</div>

<div class="card">
  <form action="{{ $skill ? '/admin/skills/' . $skill->id : '/admin/skills' }}" method="POST">
    @csrf
    @if($skill)
      @method('PUT')
    @endif

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nama Teknologi / Keahlian *</label>
        <input type="text" name="name" class="form-control" value="{{ $skill->name ?? '' }}" placeholder="Contoh: React / Tailwind CSS / Laravel" required />
      </div>
      <div class="form-group">
        <label class="form-label">Label Kelompok Kategori *</label>
        <input type="text" name="category_label" class="form-control" value="{{ $skill->category_label ?? 'frontend development' }}" placeholder="ui/ux design & prototyping | frontend development | backend & framework" required />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Level Kemahiran</label>
        <input type="text" name="level_badge" class="form-control" value="{{ $skill->level_badge ?? 'Utama' }}" placeholder="Utama / Mahir / Menengah" />
      </div>
      <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="sort_order" class="form-control" value="{{ $skill->sort_order ?? 1 }}" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Deskripsi Konteks Penggunaan</label>
      <input type="text" name="description" class="form-control" value="{{ $skill->description ?? '' }}" />
    </div>

    <div class="form-group" style="display:flex;align-items:center;gap:0.5rem;">
      <input type="checkbox" id="is_highlighted" name="is_highlighted" value="1" {{ ($skill && $skill->is_highlighted) ? 'checked' : '' }} />
      <label for="is_highlighted">Tandai sebagai Keahlian Utama (Highlighted Border)</label>
    </div>

    <div style="display:flex;gap:0.75rem;">
      <button type="submit" class="btn btn-emerald">Simpan Skill</button>
      <a href="/admin/skills" class="btn btn-outline">Batal</a>
    </div>
  </form>
</div>
@endsection
