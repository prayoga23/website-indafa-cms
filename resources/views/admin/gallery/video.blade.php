@extends('layouts_admin.admin')

@section('title', 'Manajemen Galeri Video')
@section('page-title', 'Galeri Video YouTube')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fab fa-youtube text-warning"></i> Manajemen Galeri Video YouTube</h4>
                <p>Kelola tautan video YouTube untuk dipasang di galeri liputan, edukasi, maupun sorotan utama profil prodi/institut.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Video Streaming
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger py-2 small mb-4">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            {{-- FORM INPUT VIDEO --}}
            <div class="col-xl-4">
                <div class="form-section-card h-100">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Tambah Koleksi Video</h5>
                            <p class="form-section-desc">Masukkan URL YouTube dan detail video.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.gallery.video.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Judul Video / Liputan</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control-custom"
                                   placeholder="Contoh: Kuliah Umum Perkawinan Kontemporer"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Tautan / URL YouTube</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="youtube_url"
                                   class="form-control-custom"
                                   placeholder="https://www.youtube.com/watch?v=..."
                                   required>
                            <div class="form-hint">
                                <i class="fab fa-youtube text-rose-600"></i>
                                <span>Salin link video lengkap dari YouTube.</span>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label-custom">
                                    <span>Kategori</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <select name="category" class="form-select-custom" required>
                                    <option value="Edukasi">Edukasi</option>
                                    <option value="Aktivitas">Aktivitas</option>
                                    <option value="Seminar">Seminar</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label-custom">
                                    <span>Durasi</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text"
                                       name="duration"
                                       class="form-control-custom"
                                       placeholder="15 Menit">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Ringkasan Deskripsi</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="description"
                                      class="form-control-custom"
                                      rows="3"
                                      placeholder="Tuliskan keterangan singkat video..."></textarea>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                                <label class="form-check-label text-xs font-semibold text-slate-700" for="is_featured">
                                    Jadikan Video Sorotan Utama (Featured)
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-plus"></i> Simpan Koleksi Video
                        </button>
                    </form>
                </div>
            </div>

            {{-- LIST VIDEO TERPASANG --}}
            <div class="col-xl-8">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm h-100">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fab fa-youtube text-rose-600"></i> Video Terpasang di Sistem
                        </span>
                        <span class="badge bg-rose-100 text-rose-800 text-xxs font-bold">{{ count($videos) }} Video</span>
                    </div>

                    <div class="p-3">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                    <tr>
                                        <th class="ps-2">Judul Video</th>
                                        <th>Kategori</th>
                                        <th>Durasi</th>
                                        <th class="text-center" style="width: 80px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($videos as $v)
                                    <tr>
                                        <td class="ps-2">
                                            <div class="font-bold text-slate-800 text-xs">{{ $v->title }}</div>
                                            <a href="{{ $v->youtube_url }}" target="_blank" class="text-xxs text-emerald-600 text-decoration-none">
                                                <i class="fas fa-external-link-alt me-1"></i> Buka di YouTube
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-slate-100 text-slate-700 text-xxs">{{ $v->category }}</span>
                                        </td>
                                        <td class="text-xs text-slate-500">{{ $v->duration ?? '-' }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.gallery.video.destroy', $v->id) }}" method="POST" onsubmit="return confirm('Hapus video ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-slate-400 py-4 text-xs">Belum ada video yang ditambahkan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
