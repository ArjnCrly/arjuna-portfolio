@extends('layouts.admin')

@section('title', '01 / Tentang Saya & Biodata — JUN.dev CMS')

@section('content')
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">01 / Tentang Saya &amp; Profil Utama</h1>
  <p style="color:var(--muted);font-size:0.88rem;">Perbarui informasi pribadi, deskripsi Hero, Tentang Saya, serta tautan sosial media dan kontak.</p>
</div>

<div class="card">
  <form action="/admin/profile" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="full_name" class="form-control" value="{{ $profile->full_name ?? '' }}" required />
      </div>
      <div class="form-group">
        <label class="form-label">Nama Singkat / Panggilan</label>
        <input type="text" name="short_name" class="form-control" value="{{ $profile->short_name ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="birth_place" class="form-control" value="{{ $profile->birth_place ?? 'Sidoarjo' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Tanggal Lahir</label>
        <input type="text" name="birth_date" class="form-control" value="{{ $profile->birth_date ?? '13 Desember 2004' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Perguruan Tinggi / Kampus</label>
        <input type="text" name="university" class="form-control" value="{{ $profile->university ?? 'Politeknik Negeri Malang' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Jurusan</label>
        <input type="text" name="department" class="form-control" value="{{ $profile->department ?? 'Jurusan Teknologi Informasi' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Program Studi</label>
        <input type="text" name="study_program" class="form-control" value="{{ $profile->study_program ?? 'D-IV Teknik Informatika' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi Domisili</label>
        <input type="text" name="location" class="form-control" value="{{ $profile->location ?? 'Sidoarjo & Malang, Jawa Timur' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Headline Peran (Hero Section)</label>
        <input type="text" name="headline_role" class="form-control" value="{{ $profile->headline_role ?? '' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Status Ketersediaan</label>
        <input type="text" name="availability_text" class="form-control" value="{{ $profile->availability_text ?? '' }}" />
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Greeting Badge (Teks di dalam kurung siku atas Hero)</label>
      <input type="text" name="greeting_badge" class="form-control" value="{{ $profile->greeting_badge ?? 'halo, selamat datang' }}" />
    </div>

    <div class="form-group">
      <label class="form-label">Paragraf Utama Hero</label>
      <textarea name="hero_bio" rows="2" class="form-control">{{ $profile->hero_bio ?? '' }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Sub-Paragraf Keahlian Hero (Figma, React, Tailwind, Laravel, JS, PHP, HTML)</label>
      <textarea name="hero_sub_bio" rows="3" class="form-control">{{ $profile->hero_sub_bio ?? '' }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Deskripsi Lengkap "Tentang Saya" (Sesuai CV)</label>
      <textarea name="about_text" rows="4" class="form-control">{{ $profile->about_text ?? '' }}</textarea>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Email Resmi</label>
        <input type="email" name="email" class="form-control" value="{{ $profile->email ?? '' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" name="phone" class="form-control" value="{{ $profile->phone ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">Nomor WhatsApp (Format 628...)</label>
        <input type="text" name="whatsapp" class="form-control" value="{{ $profile->whatsapp ?? '' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Website Portofolio Komersial</label>
        <input type="text" name="website_url" class="form-control" value="{{ $profile->website_url ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL LinkedIn</label>
        <input type="text" name="linkedin_url" class="form-control" value="{{ $profile->linkedin_url ?? '' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Username LinkedIn</label>
        <input type="text" name="linkedin_handle" class="form-control" value="{{ $profile->linkedin_handle ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL GitHub</label>
        <input type="text" name="github_url" class="form-control" value="{{ $profile->github_url ?? '' }}" />
      </div>
      <div class="form-group">
        <label class="form-label">Username GitHub</label>
        <input type="text" name="github_handle" class="form-control" value="{{ $profile->github_handle ?? '' }}" />
      </div>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label class="form-label">URL Instagram</label>
        <input type="text" name="instagram_url" class="form-control" value="{{ $profile->instagram_url ?? '' }}" placeholder="https://instagram.com/arjunacarly" />
      </div>
      <div class="form-group">
        <label class="form-label">Username Instagram</label>
        <input type="text" name="instagram_handle" class="form-control" value="{{ $profile->instagram_handle ?? '' }}" placeholder="@arjunacarly" />
      </div>
    </div>

    <button type="submit" class="btn btn-emerald">Simpan Perubahan Biodata</button>
  </form>
</div>
@endsection
