@extends('layouts.admin')

@section('title', '06 / Kontak & Pesan — JUN.dev CMS')

@section('content')
<div style="margin-bottom:1.5rem;">
  <h1 style="font-size:1.45rem;margin-bottom:0.25rem;">06 / Kontak &amp; Pesan Masuk</h1>
  <p style="color:var(--muted);font-size:0.88rem;">Daftar pesan kolaborasi yang dikirim melalui formulir kontak di website portofolio Anda.</p>
</div>

<div class="card">
  <table>
    <thead>
      <tr>
        <th>Status</th>
        <th>Pengirim</th>
        <th>Subjek &amp; Pesan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($messages as $m)
      <tr>
        <td>
          @if($m->is_read)
            <span class="badge">Sudah Dibaca</span>
          @else
            <span class="badge" style="color:#10b981;border-color:rgba(16,185,129,0.4);">● Baru</span>
          @endif
        </td>
        <td>
          <strong>{{ $m->name }}</strong><br>
          <span style="font-size:0.78rem;color:var(--muted);">{{ $m->email }}</span>
        </td>
        <td>
          <strong>{{ $m->subject }}</strong><br>
          <span style="color:var(--muted);">{{ $m->message }}</span>
        </td>
        <td style="display:flex;gap:0.45rem;">
          <form action="/admin/messages/{{ $m->id }}/read" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-outline" style="padding:0.3rem 0.65rem;">
              {{ $m->is_read ? 'Tandai Belum Baca' : 'Tandai Dibaca' }}
            </button>
          </form>
          <form action="/admin/messages/{{ $m->id }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
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
