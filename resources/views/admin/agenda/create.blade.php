@extends('layouts_admin.admin')

@section('title', 'Tambah Agenda Baru')
@section('page-title', 'Tambah Agenda')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-calendar-plus text-warning"></i> Tambah Agenda Baru</h4>
                <p>Jadwalkan kegiatan seminar, workshop, wisuda, atau agenda akademik lainnya.</p>
            </div>
            <a href="{{ route('admin.agenda.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.agenda.store') }}" method="POST">
        @csrf

        <div class="p-3 p-md-4">

            {{-- SECTION 1: INFORMASI AGENDA --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Informasi & Kategori Agenda</h5>
                        <p class="form-section-desc">Nama kegiatan dan kategori klasifikasi agenda kampus.</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Judul Agenda / Nama Kegiatan</span>
                        <span class="badge-req">* Wajib Diisi</span>
                    </label>
                    <input type="text"
                           class="form-control-custom @error('title') border-rose-500 @enderror"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Contoh: Kuliah Umum Nasional & Bedah Buku"
                           required>
                    <div class="form-hint">
                        <i class="fas fa-pen"></i>
                        <span>Tuliskan nama acara atau agenda kegiatan kampus.</span>
                    </div>
                    @error('title')
                        <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Kategori / Tag Agenda</span>
                            <span class="badge-req">* Wajib Dipilih</span>
                        </label>
                        <select class="form-select-custom @error('tag') border-rose-500 @enderror" id="tag" name="tag" required>
                            <option value="" disabled selected>-- Pilih Kategori Kegiatan --</option>
                            <option value="Seminar" {{ old('tag') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="Workshop" {{ old('tag') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="Wisuda" {{ old('tag') == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
                            <option value="Lainnya" {{ old('tag') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <div class="form-hint">
                            <i class="fas fa-tag"></i>
                            <span>Pilih jenis kegiatan yang sesuai.</span>
                        </div>
                        @error('tag')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Lokasi / Tempat Pelaksanaan</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               class="form-control-custom @error('location') border-rose-500 @enderror"
                               id="location"
                               name="location"
                               value="{{ old('location') }}"
                               placeholder="Contoh: Gedung Rektorat Lt. 3 / Zoom Meeting"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Tempat pelaksanaan offline atau link webinar.</span>
                        </div>
                        @error('location')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: WAKTU & TANGGAL PELAKSANAAN --}}
            <div class="form-section-card mb-0">
                <div class="form-section-header">
                    <div class="form-section-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Waktu & Jadwal Pelaksanaan</h5>
                        <p class="form-section-desc">Tentukan tanggal kegiatan serta jam mulai dan perkiraan selesai.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Tanggal Pelaksanaan</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="date"
                               class="form-control-custom @error('event_date') border-rose-500 @enderror"
                               id="event_date"
                               name="event_date"
                               value="{{ old('event_date', date('Y-m-d')) }}"
                               required>
                        <div class="form-hint">
                            <i class="far fa-calendar-alt"></i>
                            <span>Tanggal penyelenggaraan acara.</span>
                        </div>
                        @error('event_date')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Jam Mulai</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="time"
                               class="form-control-custom @error('start_time') border-rose-500 @enderror"
                               id="start_time"
                               name="start_time"
                               value="{{ old('start_time', '09:00') }}"
                               required>
                        <div class="form-hint">
                            <i class="far fa-clock"></i>
                            <span>Waktu pembukaan kegiatan.</span>
                        </div>
                        @error('start_time')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Jam Selesai</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="time"
                               class="form-control-custom @error('end_time') border-rose-500 @enderror"
                               id="end_time"
                               name="end_time"
                               value="{{ old('end_time') }}">
                        <div class="form-hint">
                            <i class="far fa-clock"></i>
                            <span>Biarkan kosong bila s/d selesai.</span>
                        </div>
                        @error('end_time')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Pastikan field bertanda <span class="badge-req">* Wajib Diisi</span> telah diisi dengan benar.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.agenda.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Agenda
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
