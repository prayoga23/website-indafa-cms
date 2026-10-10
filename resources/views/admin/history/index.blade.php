@extends('layouts_admin.admin')

@section('title', 'Kelola Sejarah Prodi')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center my-4 border-bottom pb-3">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Manajemen Profil</h1>
            <p class="text-muted mb-0 small">Kelola data latar belakang dan garis waktu (milestone) sejarah Program Studi.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-light p-2 rounded-3 border">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none"><i class="fas fa-tachometer-alt me-1"></i>Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        {{-- SECTION GIRI KIRI: FORM LATAR BELAKANG --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-transparent border-bottom py-3 d-flex align-items-center">
                    <div class="icon-shape bg-primary-soft text-primary rounded-circle me-2 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px; background-color: rgba(13, 110, 253, 0.1);">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-bold text-dark">Latar Belakang Pendirian</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center border-0 shadow-sm py-2" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <form action="{{ route('admin.history.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Judul Konten</label>
                            <input type="text" name="title" class="form-control form-control-lg fs-6" value="{{ old('title', $info->title ?? 'Latar Belakang Pendirian') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Paragraf 1</label>
                            <textarea name="text_1" class="form-control" rows="4" placeholder="Tulis paragraf pertama di sini..." required>{{ old('text_1', $info->text_1 ?? '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Paragraf 2 (Opsional)</label>
                            <textarea name="text_2" class="form-control" rows="4" placeholder="Tulis paragraf kedua jika ada...">{{ old('text_2', $info->text_2 ?? '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Gambar Terkait</label>
                            <input type="file" name="image" class="form-control">
                            @if($info && $info->image)
                                <div class="mt-3 p-2 border rounded bg-light d-inline-block text-center">
                                    <p class="mb-1 small text-muted fw-bold">Pratinjau Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $info->image) }}" class="img-thumbnail" style="max-height: 120px; object-fit: cover;">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold shadow-sm"><i class="fas fa-save me-2"></i>Perbarui Latar Belakang</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- SECTION KANAN: FORM & LIST MILESTONE TIMELINE --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-transparent border-bottom py-3 d-flex align-items-center">
                    <div class="icon-shape bg-success-soft text-success rounded-circle me-2 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px; background-color: rgba(25, 135, 84, 0.1);">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-bold text-dark">Tambah Milestone / Perkembangan</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success_timeline'))
                        <div class="alert alert-success d-flex align-items-center border-0 shadow-sm py-2" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <div>{{ session('success_timeline') }}</div>
                        </div>
                    @endif

                    <form action="{{ route('admin.history.timeline.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold text-secondary small">Tahun</label>
                                <input type="number" name="year" class="form-control" placeholder="Contoh: 2026" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-semibold text-secondary small">Judul Peristiwa</label>
                                <input type="text" name="title" class="form-control" placeholder="Contoh: Izin Operasional" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Deskripsi Singkat</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="Tulis rincian singkat peristiwa..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2 fw-semibold shadow-sm"><i class="fas fa-plus-circle me-2"></i>Tambah ke Garis Waktu</button>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-transparent border-bottom py-3 d-flex align-items-center">
                    <div class="icon-shape bg-dark-soft text-dark rounded-circle me-2 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px; background-color: rgba(33, 37, 41, 0.1);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-bold text-dark">Urutan Garis Waktu Saat Ini</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light text-secondary small fw-bold text-uppercase border-bottom">
                                <tr>
                                    <th class="ps-4" width="15%">Tahun</th>
                                    <th width="35%">Judul</th>
                                    <th width="40%">Deskripsi</th>
                                    <th class="text-center pe-4" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($timelines as $time)
                                <tr class="border-bottom">
                                    <td class="ps-4 fw-bold text-success fs-5">{{ $time->year }}</td>
                                    <td>
                                        <span class="fw-semibold text-dark">{{ $time->title }}</span>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted small" style="line-height: 1.4;">{{ Str::limit($time->description, 60) }}</p>
                                    </td>
                                    <td class="text-center pe-4">
                                        <form action="{{ route('admin.history.timeline.destroy', $time->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus milestone ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger rounded-circle p-2 border shadow-sm transition-all" title="Hapus Milestone" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-trash-alt small"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-5">
                                        <div class="py-3">
                                            <i class="fas fa-folder-open fa-3x text-light mb-3"></i>
                                            <p class="mb-0 fw-medium text-secondary">Garis waktu masih kosong.</p>
                                        </div>
                                    </td>
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
@endsection
