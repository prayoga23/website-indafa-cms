@extends('layouts_admin.admin')

@section('title', 'Manajemen Galeri Foto')
@section('page-title', 'Galeri Foto Kegiatan')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-camera text-warning"></i> Manajemen Dokumentasi Galeri Foto</h4>
                <p>Unggah dan kelola dokumentasi visual kegiatan akademik, seminar, dan aktivitas kemahasiswaan.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Galeri Visual
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

        <div class="row g-4">

            {{-- FORM UPLOAD FOTO --}}
            <div class="col-xl-4">
                <div class="form-section-card h-100">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Unggah Foto Baru</h5>
                            <p class="form-section-desc">Tambahkan foto dokumentasi kegiatan.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.gallery.photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Judul Kegiatan / Keterangan</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control-custom"
                                   placeholder="Contoh: Simulasi Sidang Semu Peradilan"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Kategori Dokumentasi</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <input type="text"
                                   name="category"
                                   class="form-control-custom"
                                   placeholder="Contoh: Praktik Lapangan / Seminar"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Tanggal Pelaksanaan</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <input type="date"
                                   name="activity_date"
                                   class="form-control-custom"
                                   value="{{ date('Y-m-d') }}"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">
                                <span>Berkas Gambar Foto</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <div class="file-dropzone-wrapper py-3">
                                <input type="file"
                                       name="image"
                                       accept="image/*"
                                       data-preview="photo-gallery-preview"
                                       required>
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text-xs font-semibold text-slate-700">
                                    Pilih gambar foto dokumentasi
                                </div>
                                <div class="text-xxs text-slate-500 mt-1">
                                    Format: <strong>JPG, PNG, WEBP</strong> &bull; Maks. 2MB
                                </div>
                            </div>
                            <div id="photo-gallery-preview" class="live-preview-box" style="display: none;"></div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-upload"></i> Unggah Foto Dokumentasi
                        </button>
                    </form>
                </div>
            </div>

            {{-- LIST FOTO TERPASANG --}}
            <div class="col-xl-8">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm h-100">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-images text-emerald-600"></i> Daftar Foto Terpasang di Sistem
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ $photos->total() ?? count($photos) }} Foto</span>
                    </div>

                    <div class="p-3">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                    <tr>
                                        <th class="ps-2" style="width: 90px;">Pratinjau</th>
                                        <th>Keterangan / Judul</th>
                                        <th>Kategori</th>
                                        <th>Waktu</th>
                                        <th class="text-center" style="width: 60px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($photos as $p)
                                    <tr>
                                        <td class="ps-2">
                                            <img src="{{ asset('storage/' . $p->image_path) }}" class="rounded-lg border shadow-xs" style="width: 75px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td><div class="font-bold text-slate-800 text-xs">{{ $p->title }}</div></td>
                                        <td>
                                            @if($p->category == 'Praktik Peradilan')
                                                <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-semibold">Praktik Peradilan</span>
                                            @elseif($p->category == 'Seminar & Workshop')
                                                <span class="badge bg-amber-100 text-amber-800 text-xxs font-semibold">Seminar & Workshop</span>
                                            @else
                                                <span class="badge bg-slate-100 text-slate-700 text-xxs font-semibold">{{ $p->category }}</span>
                                            @endif
                                        </td>
                                        <td class="text-xxs text-slate-500">{{ \Carbon\Carbon::parse($p->activity_date)->translatedFormat('F Y') }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.gallery.photo.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini secara permanen?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-slate-400 py-4 text-xs">Belum ada foto dokumentasi yang diunggah ke dalam galeri.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $photos->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
