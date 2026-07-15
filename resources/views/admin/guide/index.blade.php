@extends('layouts_admin.admin')

@section('title', 'Kelola Panduan Akademik')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Akademik: Buku Pedoman & Prosedur</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Panduan Akademik</li>
    </ol>

    <div class="row">
        {{-- KIRI: MANAJEMEN BUKU PEDOMAN UTAMA --}}
        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="fas fa-book-open me-1"></i> Tambah Buku Pedoman Utama
                </div>
                <div class="card-body">
                    @if(session('success_book'))
                        <div class="alert alert-success py-2 small">{{ session('success_book') }}</div>
                    @endif

                    <form action="{{ route('admin.guide.book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Judul Buku / Panduan</label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Buku Saku Mahasiswa" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">Teks Badge</label>
                                <input type="text" name="badge_text" class="form-control" placeholder="Contoh: Edisi Terbaru" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">Style Warna Badge (CSS Class)</label>
                                <select name="badge_class" class="form-select">
                                    <option value="bg-gold-badge">Gold Badge (Emas)</option>
                                    <option value="bg-dark-green text-white">Dark Green (Hijau Tua)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">Ikon Bootstrap (CSS Class)</label>
                                <input type="text" name="icon_class" class="form-control" value="bi-book-half" placeholder="bi-book-half" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">Ikon Wrapper (CSS Class)</label>
                                <select name="icon_wrapper_class" class="form-select">
                                    <option value="bg-light-green text-dark-green">Light Green Container</option>
                                    <option value="bg-light-gold text-gold">Light Gold Container</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Ringkasan Deskripsi Singkat</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="Tulis ringkasan aturan/isi buku di sini..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Berkas File Dokumen (.PDF)</label>
                            <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100"><i class="fas fa-cloud-upload-alt me-1"></i> Upload Buku Pedoman</button>
                    </form>
                </div>
            </div>

            {{-- LIST BUKU YANG SUDAH DI-UPLOAD --}}
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold small">Daftar Buku Pedoman Aktif</div>
                <div class="card-body p-0">
                    <table class="table table-striped align-middle mb-0 table-sm">
                        <thead class="table-light small">
                            <tr>
                                <th>Judul Buku</th>
                                <th>Badge</th>
                                <th class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr class="small">
                                <td class="fw-bold text-dark p-2">{{ $book->title }}</td>
                                <td><span class="badge {{ $book->badge_class }}">{{ $book->badge_text }}</span></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.guide.book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center text-muted py-2 small">Belum ada buku panduan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- KANAN: MANAJEMEN ALUR PROSEDUR TIMELINE --}}
        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-route me-1"></i> Tambah Tahapan Alur Prosedur
                </div>
                <div class="card-body">
                    @if(session('success_step'))
                        <div class="alert alert-success py-2 small">{{ session('success_step') }}</div>
                    @endif

                    <form action="{{ route('admin.guide.step.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label class="form-label fw-bold small">Kategori Jenis Alur</label>
                                <select name="flow_type" class="form-select" required>
                                    <option value="krs">Alur KRS Online</option>
                                    <option value="skripsi">Pengajuan Skripsi</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold small">Langkah Ke- (Angka)</label>
                                <input type="number" name="step_number" class="form-control" value="1" min="1" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Nama / Judul Langkah Prosedur</label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Konsultasi Dosen PA" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Uraian / Detail Penjelasan Langkah</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Tulis petunjuk lengkap langkah ini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-plus-circle me-1"></i> Tambah Langkah Alur</button>
                    </form>
                </div>
            </div>

            {{-- PREVIEW DAFTAR DATA TIMELINE ALUR --}}
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold small">Data Langkah Prosedur Aktif</div>
                <div class="card-body p-3" style="max-height: 350px; overflow-y: auto;">

                    <h6 class="fw-bold text-success small"><i class="fas fa-chevron-right me-1"></i> Grup Alur KRS Online</h6>
                    @include('admin.guide.partials.step_list', ['stepsCollection' => $krsSteps])

                    <h6 class="fw-bold text-primary small mt-3"><i class="fas fa-chevron-right me-1"></i> Grup Pengajuan Skripsi</h6>
                    @include('admin.guide.partials.step_list', ['stepsCollection' => $skripsiSteps])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
