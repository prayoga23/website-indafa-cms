@extends('layouts_admin.admin')

@section('title', 'Kelola Kalender Akademik')
@section('page-title', 'Kalender & Agenda Akademik')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-calendar-alt text-warning"></i> Manajemen Kalender Akademik & Agenda</h4>
                <p>Kelola jadwal masa perkuliahan, UTS/UAS, KRS, dan unggah berkas SK Kalender Akademik resmi (PDF).</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Kalender Resmi
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        <div class="row g-4">

            {{-- PANEL KIRI: INPUT AGENDA BARU & UPLOAD PDF --}}
            <div class="col-xl-5">

                {{-- FORM TAMBAH AGENDA KEGIATAN --}}
                <div class="form-section-card mb-4">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Tambah Butir Agenda Kegiatan</h5>
                            <p class="form-section-desc">Tambahkan jadwal kegiatan perkuliahan semester ganjil / genap.</p>
                        </div>
                    </div>

                    @if(session('success_agenda'))
                        <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                            <i class="fas fa-check-circle me-1"></i> {{ session('success_agenda') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.calendar.agenda.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Blok Semester</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <select name="semester_type" class="form-select-custom" required>
                                <option value="ganjil">Semester Ganjil</option>
                                <option value="genap">Semester Genap</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Nama Kegiatan Akademik</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="activity_name"
                                   class="form-control-custom"
                                   placeholder="Contoh: Masa Perkuliahan Tahap I"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Rentang Tanggal Pelaksanaan</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="date_range"
                                   class="form-control-custom"
                                   placeholder="Contoh: 1 September - 23 Oktober 2026"
                                   required>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-7">
                                <label class="form-label-custom">
                                    <span>Penanda Warna Badge</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <select name="color_class" class="form-select-custom">
                                    <option value="">Default (Netral / Abu)</option>
                                    <option value="font-green">Hijau (Masa Perkuliahan)</option>
                                    <option value="font-gold">Kuning / Emas (Ujian UTS & UAS)</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label-custom">
                                    <span>No Urut</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="number"
                                       name="order_position"
                                       class="form-control-custom"
                                       value="1"
                                       min="1"
                                       required>
                            </div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-plus"></i> Daftarkan ke Kalender
                        </button>
                    </form>
                </div>

                {{-- FORM UPLOAD FILE SK PDF --}}
                <div class="form-section-card mb-0">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Dokumen SK Kalender Resmi (.PDF)</h5>
                            <p class="form-section-desc">File PDF resmi yang dapat diunduh mahasiswa.</p>
                        </div>
                    </div>

                    @if(session('success_pdf'))
                        <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                            <i class="fas fa-check-circle me-1"></i> {{ session('success_pdf') }}
                        </div>
                    @endif

                    @if($setting && $setting->pdf_file_path)
                        <div class="p-3 bg-white rounded-xl border border-emerald-200 mb-3 d-flex align-items-center justify-content-between">
                            <span class="text-xs font-semibold text-emerald-800 d-flex align-items-center gap-1.5">
                                <i class="fas fa-check-circle text-emerald-600"></i> Dokumen PDF aktif tersedia
                            </span>
                            <a href="{{ asset('storage/' . $setting->pdf_file_path) }}" target="_blank" class="btn-secondary-custom btn-sm py-1 px-3">
                                <i class="fas fa-eye"></i> Lihat PDF
                            </a>
                        </div>
                    @else
                        <div class="p-2.5 bg-amber-50 rounded-xl border border-amber-200 mb-3 text-xs text-amber-800">
                            <i class="fas fa-exclamation-triangle text-amber-600 me-1"></i> File SK PDF belum diunggah.
                        </div>
                    @endif

                    <form action="{{ route('admin.calendar.pdf.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="file-dropzone-wrapper py-3">
                                <input type="file"
                                       name="pdf_file"
                                       accept="application/pdf"
                                       required>
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-cloud-upload-alt text-rose-600"></i>
                                </div>
                                <div class="text-xs font-semibold text-slate-700">
                                    Pilih file PDF kalender akademik
                                </div>
                                <div class="text-xxs text-slate-500 mt-1">
                                    Format: <strong>PDF saja</strong> &bull; Maks. 5MB
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2">
                            <i class="fas fa-upload"></i> Unggah File Dokumen
                        </button>
                    </form>
                </div>

            </div>

            {{-- PANEL KANAN: PREVIEW STRUKTUR AGENDA AKADEMIK --}}
            <div class="col-xl-7">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm h-100">
                    <div class="p-3 bg-slate-50 border-b border-slate-200">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-stream text-emerald-600"></i> Garis Waktu & Urutan Kegiatan Akademik
                        </span>
                    </div>

                    <div class="p-3" style="max-height: 690px; overflow-y: auto;">
                        {{-- SEKTOR SEMESTER GANJIL --}}
                        <div class="mb-4">
                            <h6 class="font-bold text-emerald-800 text-xs pb-2 border-b border-emerald-100 mb-2 d-flex align-items-center gap-1.5">
                                <i class="fas fa-circle text-emerald-600" style="font-size: 8px;"></i> Agenda Semester Ganjil
                            </h6>
                            @include('admin.calendar.partials.agenda_table', ['agendasCollection' => $ganjilAgendas])
                        </div>

                        {{-- SEKTOR SEMESTER GENAP --}}
                        <div>
                            <h6 class="font-bold text-amber-800 text-xs pb-2 border-b border-amber-100 mb-2 d-flex align-items-center gap-1.5">
                                <i class="fas fa-circle text-amber-600" style="font-size: 8px;"></i> Agenda Semester Genap
                            </h6>
                            @include('admin.calendar.partials.agenda_table', ['agendasCollection' => $genapAgendas])
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
