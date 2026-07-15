@extends('layouts_admin.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Galeri Foto</h1>
    <p class="text-muted">Unggah dan kelola dokumentasi visual kegiatan akademik, praktik peradilan, dan aktivitas mahasiswa.</p>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show py-2 small" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.5rem 0.75rem;"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold small py-2">
                    <i class="bi bi-camera-fill me-2"></i> + Unggah Dokumentasi Foto
                </div>
                <div class="card-body small p-3">
                    <form action="{{ route('admin.gallery.photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Judul Kegiatan / Keterangan</label>
                            <input type="text" name="title" class="form-control form-control-sm" placeholder="Contool: Simulasi Sidang Gugatan Waris" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Kategori Dokumentasi</label>
                            <input type="text" name="category" class="form-control form-control-sm" placeholder="Contoh: Praktek lapangan" required>

                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tanggal Pelaksanaan</label>
                            <input type="date" name="activity_date" class="form-control form-control-sm" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih File Gambar</label>
                            <input type="file" name="image" class="form-control form-control-sm" accept="image/*" required>
                            <div class="form-text" style="font-size: 11px;">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success w-100">Mulai Unggah Foto</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light text-dark fw-bold small py-2 border-bottom">
                    <i class="bi bi-images me-1"></i> Daftar Foto Terpasang di Sistem
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped align-middle border small">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 100px;">Pratinjau</th>
                                    <th>Keterangan / Judul</th>
                                    <th>Kategori</th>
                                    <th>Waktu Kegiatan</th>
                                    <th class="text-center" style="width: 60px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($photos as $p)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $p->image_path) }}" class="rounded border" style="width: 80px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td><strong class="text-dark">{{ $p->title }}</strong></td>
                                    <td>
                                        @if($p->category == 'Praktik Peradilan')
                                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2">Praktik Peradilan</span>
                                        @elseif($p->category == 'Seminar & Workshop')
                                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2">Seminar & Workshop</span>
                                        @else
                                            <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2">Aktivitas Mahasiswa</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($p->activity_date)->translatedFormat('F Y') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.gallery.photo.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini secara permanen?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-link btn-sm text-danger p-0 m-0"><i class="fa fa-trash fs-5"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Belum ada foto dokumentasi yang diunggah ke dalam galeri.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Link Pagination (Otomatis Sync dengan Style Bootstrap) --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $photos->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
