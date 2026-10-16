@extends('layouts_admin.admin')

@section('title', 'Kelola Statistik Kampus')
@section('page-title', 'Statistik Kampus')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-chart-line text-warning"></i> Statistik Utama Kampus (Angka Bicara)</h4>
                <p>Kelola data agregat capaian: Mahasiswa aktif, Dosen/Staf, Alumni, dan Program Studi untuk beranda utama.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Counter Beranda
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.statistic.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-section-card mb-4">
                <div class="form-section-header">
                    <div class="form-section-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Indikator Angka Statistik</h5>
                        <p class="form-section-desc">Angka-angka ini akan dianimasikan secara interaktif (counter) di halaman depan website.</p>
                    </div>
                </div>

                <div class="row g-4">
                    {{-- Jumlah Mahasiswa Aktif --}}
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span><i class="fas fa-user-graduate text-emerald-600 me-1"></i> Jumlah Mahasiswa Aktif</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="number"
                               class="form-control-custom @error('students_count') border-rose-500 @enderror"
                               id="students_count"
                               name="students_count"
                               value="{{ old('students_count', $statistic->students_count ?? 0) }}"
                               min="0"
                               placeholder="Contoh: 1250"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i>
                            <span>Total mahasiswa yang sedang aktif menempuh perkuliahan.</span>
                        </div>
                        @error('students_count')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah Dosen / Pengajar --}}
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span><i class="fas fa-chalkboard-teacher text-blue-600 me-1"></i> Jumlah Dosen & Tenaga Pendidik</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="number"
                               class="form-control-custom @error('lecturers_count') border-rose-500 @enderror"
                               id="lecturers_count"
                               name="lecturers_count"
                               value="{{ old('lecturers_count', $statistic->lecturers_count ?? 0) }}"
                               min="0"
                               placeholder="Contoh: 85"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i>
                            <span>Total dosen tetap, dosen luar biasa, dan staf pengajar.</span>
                        </div>
                        @error('lecturers_count')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah Alumni --}}
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span><i class="fas fa-users text-amber-600 me-1"></i> Jumlah Alumni Terdata</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="number"
                               class="form-control-custom @error('alumni_count') border-rose-500 @enderror"
                               id="alumni_count"
                               name="alumni_count"
                               value="{{ old('alumni_count', $statistic->alumni_count ?? 0) }}"
                               min="0"
                               placeholder="Contoh: 4300"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i>
                            <span>Lulusan yang telah berkiprah di masyarakat dan dunia kerja.</span>
                        </div>
                        @error('alumni_count')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah Program Studi --}}
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span><i class="fas fa-book-open text-purple-600 me-1"></i> Jumlah Program Studi Aktif</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="number"
                               class="form-control-custom @error('programs_count') border-rose-500 @enderror"
                               id="programs_count"
                               name="programs_count"
                               value="{{ old('programs_count', $statistic->programs_count ?? 0) }}"
                               min="0"
                               placeholder="Contoh: 5"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i>
                            <span>Jumlah total program studi di seluruh fakultas.</span>
                        </div>
                        @error('programs_count')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="p-3 bg-slate-50 border border-slate-200 rounded-xl d-flex align-items-center justify-content-between flex-wrap gap-2">
                <span class="text-xs text-slate-500">
                    <i class="fas fa-info-circle text-emerald-600"></i> Perubahan angka statistik akan langsung terupdate pada counter di beranda.
                </span>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Data Statistik
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
