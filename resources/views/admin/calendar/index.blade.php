@extends('layouts_admin.admin')

@section('title', 'Kelola Kalender Akademik')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Akademik: Kalender & Agenda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Kalender Akademik</li>
    </ol>

    <div class="row">
        {{-- PANEL KIRI: INPUT AGENDA BARU & UPLOAD PDF --}}
        <div class="col-xl-5 mb-4">

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-calendar-plus me-1"></i> Tambah Agenda Kegiatan
                </div>
                <div class="card-body">
                    @if(session('success_agenda'))
                        <div class="alert alert-success py-2 small">{{ session('success_agenda') }}</div>
                    @endif

                    <form action="{{ route('admin.calendar.agenda.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Blok Semester</label>
                            <select name="semester_type" class="form-select" required>
                                <option value="ganjil">Semester Ganjil </option>
                                <option value="genap">Semester Genap </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Nama Kegiatan Akademik</label>
                            <input type="text" name="activity_name" class="form-control" placeholder="Contoh: Masa Perkuliahan Kuliah (Bagian I)" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Tanggal Pelaksanaan</label>
                            <input type="text" name="date_range" class="form-control" placeholder="Contoh: 1 Sept - 23 Okt 2026" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold small">Warna Badge (CSS Class)</label>
                                <select name="color_class" class="form-select">
                                    <option value="">Default (Abu-abu)</option>
                                    <option value="font-green">Hijau (Masa Kuliah)</option>
                                    <option value="font-gold">Emas / Kuning (Ujian UTS/UAS)</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold small">No Urut Tampil</label>
                                <input type="number" name="order_position" class="form-control" value="1" min="1" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-plus me-1"></i> Daftarkan Agenda</button>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="fas fa-file-pdf me-1"></i> File SK Kalender Resmi (.PDF)
                </div>
                <div class="card-body">
                    @if(session('success_pdf'))
                        <div class="alert alert-success py-2 small">{{ session('success_pdf') }}</div>
                    @endif

                    @if($setting && $setting->pdf_file_path)
                        <div class="alert alert-info py-2 d-flex align-items-center justify-content-between">
                            <span class="small text-truncate"><i class="fas fa-check-circle me-1"></i> Dokumen aktif tersedia</span>
                            <a href="{{ asset('storage/' . $setting->pdf_file_path) }}" target="_blank" class="btn btn-sm btn-secondary py-0 px-2 small">Lihat</a>
                        </div>
                    @else
                        <div class="alert alert-warning py-2 small"><i class="fas fa-exclamation-triangle me-1"></i> File SK PDF belum diunggah.</div>
                    @endif

                    <form action="{{ route('admin.calendar.pdf.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Pilih Berkas PDF Baru</label>
                            <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                            <div class="form-text text-muted small">Ekstensi dokumen wajib berformat .pdf (Maksimal ukuran 5MB)</div>
                        </div>
                        <button type="submit" class="btn btn-danger w-100"><i class="fas fa-upload me-1"></i> Perbarui File Dokumen</button>
                    </form>
                </div>
            </div>

        </div>

        {{-- PANEL KANAN: PREVIEW STRUKTUR AGENDA AKADEMIK --}}
        <div class="col-xl-7 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="fas fa-stream me-1"></i> Garis Waktu & Urutan Kegiatan
                </div>
                <div class="card-body" style="max-height: 690px; overflow-y: auto;">

                    {{-- TABEL SEKTOR SEMESTER GANJIL --}}
                    <h6 class="fw-bold text-success border-bottom pb-2 mb-2"><i class="fas fa-circle me-1 text-success small"></i> Sektor Agenda Semester Ganjil</h6>
                    @include('admin.calendar.partials.agenda_table', ['agendasCollection' => $ganjilAgendas])

                    <div class="my-4"></div>

                    {{-- TABEL SEKTOR SEMESTER GENAP --}}
                    <h6 class="fw-bold text-warning border-bottom pb-2 mb-2"><i class="fas fa-circle me-1 text-warning small"></i> Sektor Agenda Semester Genap</h6>
                    @include('admin.calendar.partials.agenda_table', ['agendasCollection' => $genapAgendas])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
