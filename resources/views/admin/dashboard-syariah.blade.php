@extends('layouts_admin.admin')

@section('title', 'Dashboard Fakultas Syariah')

@section('page-title', 'Dashboard Fakultas Ilmu Syari\'ah (FASYA)')

@section('content')

{{-- ═══════════════════════════════════════════════
     DASHBOARD SWITCHER TABS
     ════════════════════════════════════════════════ --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-2 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center">
                    <span class="badge text-white me-2 px-2.5 py-1.5 text-xxs font-weight-bold" style="background: #8B0000;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">balance</i>Panel Fakultas Syari'ah
                    </span>
                    <span class="text-xs text-secondary font-weight-bold d-none d-md-inline">Pindah Panel Admin:</span>
                </div>
                <div class="d-flex flex-wrap gap-1">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">space_dashboard</i>
                        <span>Dashboard Utama</span>
                    </a>
                    <a href="{{ route('admin.dashboard.syariah') }}" class="btn btn-sm text-white mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-xs" style="background: #8B0000;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">balance</i>
                        <span>Fakultas Syari'ah</span>
                    </a>
                    <a href="{{ route('admin.dashboard.febit') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none" style="border-color: #0f2b48; color: #0f2b48;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">trending_up</i>
                        <span>Fakultas FEBIT</span>
                    </a>
                    <a href="{{ route('admin.dashboard.lpm') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none" style="border-color: #059669; color: #059669;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">verified</i>
                        <span>LPM Mutu</span>
                    </a>
                    <a href="{{ route('admin.dashboard.lp2m') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none" style="border-color: #4f46e5; color: #4f46e5;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">biotech</i>
                        <span>LP2M Riset</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     HEADER BANNER FAKULTAS SYARIAH
     ════════════════════════════════════════════════ --}}
<div class="row mb-2">
    <div class="col-12">
        <div class="card p-4 text-white border-0 position-relative overflow-hidden mb-4" style="background: linear-gradient(135deg, #700000 0%, #8B0000 50%, #4a0000 100%); box-shadow: 0 10px 30px rgba(139, 0, 0, 0.25);">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-white text-dark px-3 py-1 text-xxs font-weight-bolder text-uppercase me-2">Control Center Fakultas</span>
                        <span class="badge px-3 py-1 text-xxs font-weight-bolder text-uppercase" style="background: rgba(212, 175, 55, 0.3); color: #fff; border: 1px solid rgba(212, 175, 55, 0.6);">
                            <i class="material-symbols-rounded text-xs me-1 align-middle">verified</i>FASYA Terakreditasi
                        </span>
                    </div>
                    <h3 class="text-white font-weight-bolder mb-1">Fakultas Ilmu Syari'ah (FASYA)</h3>
                    <p class="text-white opacity-8 text-sm mb-0">Panel kendali akademik hukum islam, program studi HKI & HES, data pengajar, sentra laboratorium peradilan, dan publikasi ilmiah.</p>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.portal.edit', 'syariah') }}" class="btn btn-warning text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1">edit_document</i>
                        <span>Edit Isi Web Portal</span>
                    </a>
                    <a href="{{ route('frontend.fakultas.syariah') }}" target="_blank" class="btn btn-white text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1 text-danger">open_in_new</i>
                        <span>Lihat Web</span>
                    </a>
                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-outline-light btn-sm mb-0 font-weight-bold d-inline-flex align-items-center">
                        <i class="material-symbols-rounded text-sm me-1">tune</i>
                        <span>Prodi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 1: 4 KARTU STATISTIK SYARIAH
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4 pt-2">
    {{-- PROGRAM STUDI --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Program Studi S1</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countProdi }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #8B0000 0%, #630000 100%); box-shadow: 0 4px 14px rgba(139, 0, 0, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">school</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.study-programs.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="font-weight-bolder me-1" style="color: #8B0000;">HKI & HES</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Jenjang Sarjana</span>
            </div>
        </div>
    </div>

    {{-- DOSEN PENGANJAR SYARIAH --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Dosen Pengajar</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countLecturers }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #b8860b 0%, #d4af37 100%); box-shadow: 0 4px 14px rgba(212, 175, 55, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">groups</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.lecturers.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="font-weight-bolder me-1" style="color: #b8860b;">Daftar Dosen</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Pakar Hukum</span>
            </div>
        </div>
    </div>

    {{-- BERITA & ARTIKEL SYARIAH --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Warta & Publikasi</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countNews }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">feed</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.news.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-info font-weight-bolder me-1">Kelola Berita</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Terpublikasi</span>
            </div>
        </div>
    </div>

    {{-- BANNER & SENTRA LAB --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Lab & Sentra</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">4</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-success shadow-success text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">gavel</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="#sentra-lab-syariah" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-success font-weight-bolder me-1">Moot Court & Falak</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Aktif Praktik</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 2: CHARTS ANALITIK SYARIAH
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Distribusi Kurikulum & Mata Kuliah</h6>
                    <span class="badge text-xxs font-weight-bold" style="background: rgba(139, 0, 0, 0.1); color: #8B0000;">HKI vs HES</span>
                </div>
                <p class="text-xs text-secondary mb-3">Sebaran bobot SKS Teori, Praktik Peradilan Semu, dan Riset Falakiyah</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-syariah-kurikulum" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-success">check_circle</i>Kurikulum Berbasis OBE Sesuai Diktis</span>
                    <a href="{{ route('admin.curriculum.index') }}" class="font-weight-bold" style="color: #8B0000;">Lihat Kurikulum &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Aktivitas Praktik & Konsultasi Syariah</h6>
                    <span class="badge bg-gradient-info text-white text-xxs font-weight-bold">Semester Berjalan</span>
                </div>
                <p class="text-xs text-secondary mb-3">Tren sidang semu mahasiswa, hisab rukyat, dan konsultasi waris/keluarga</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-syariah-aktivitas" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-info">trending_up</i>Rata-rata 18 sesi praktik per bulan</span>
                    <a href="{{ route('admin.schedule.index') }}" class="font-weight-bold text-info">Jadwal Kuliah &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 3: TABEL PRODI SYARIAH & SENTRA LAB
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    {{-- DAFTAR PROGRAM STUDI SYARIAH --}}
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0 font-weight-bolder text-dark">Program Studi di Bawah Fakultas Syari'ah</h6>
                    <p class="text-xs text-secondary mb-0">Status akreditasi dan kepemimpinan program studi</p>
                </div>
                <a href="{{ route('admin.study-programs.create') }}" class="btn btn-sm text-white mb-0 text-xs py-1.5 px-3" style="background: #8B0000;">
                    <i class="material-symbols-rounded text-xs me-1 align-middle">add</i>Tambah Prodi
                </a>
            </div>
            <div class="card-body px-0 pb-2 pt-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Program Studi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenjang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Akreditasi</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($studyPrograms as $prodi)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #8B0000;">
                                            <i class="material-symbols-rounded text-sm">school</i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">{{ $prodi->name }}</h6>
                                            <span class="text-xxs text-secondary">Kaprodi: {{ $prodi->head_of_program ?? 'Ketua Prodi' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border text-xxs font-weight-bold">{{ $prodi->degree ?? 'S1' }}</span>
                                </td>
                                <td>
                                    <span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(212, 175, 55, 0.2); color: #8B0000; border: 1px solid rgba(212, 175, 55, 0.5);">
                                        {{ $prodi->accreditation ?? 'Baik Sekali' }}
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.study-programs.edit', $prodi->id) }}" class="btn btn-link text-dark px-2 mb-0" title="Edit Data">
                                        <i class="material-symbols-rounded text-sm">edit</i>
                                    </a>
                                    <a href="{{ route('frontend.prodi.index', $prodi->slug ?? 'hki') }}" target="_blank" class="btn btn-link text-secondary px-2 mb-0" title="Web Publik">
                                        <i class="material-symbols-rounded text-sm">visibility</i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            {{-- Fallback Mock Rows --}}
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #8B0000;">
                                            <i class="material-symbols-rounded text-sm">gavel</i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">S1 Hukum Keluarga Islam (Ahwal Syakhshiyyah)</h6>
                                            <span class="text-xxs text-secondary">Gelar: Sarjana Hukum (S.H.)</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border text-xxs font-weight-bold">S1</span></td>
                                <td><span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(212, 175, 55, 0.2); color: #8B0000;">Baik Sekali</span></td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-xs btn-outline-dark mb-0 py-1 px-2">Kelola</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #8B0000;">
                                            <i class="material-symbols-rounded text-sm">account_balance</i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">S1 Hukum Ekonomi Syariah (Muamalah)</h6>
                                            <span class="text-xxs text-secondary">Gelar: Sarjana Hukum (S.H.)</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border text-xxs font-weight-bold">S1</span></td>
                                <td><span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(212, 175, 55, 0.2); color: #8B0000;">Baik Sekali</span></td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-xs btn-outline-dark mb-0 py-1 px-2">Kelola</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- SENTRA & LABORATORIUM SYARIAH --}}
    <div class="col-lg-5" id="sentra-lab-syariah">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0">
                <h6 class="mb-0 font-weight-bolder text-dark">Sentra Inovasi & Laboratorium Syari'ah</h6>
                <p class="text-xs text-secondary mb-0">Fasilitas penunjang keahlian praktisi hukum syari'ah</p>
            </div>
            <div class="card-body pt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white" style="background: #8B0000;">
                                <i class="material-symbols-rounded text-sm">gavel</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Laboratorium Peradilan Semu</h6>
                                <span class="text-xxs text-secondary">Simulasi Sidang PA, PN & Mediasi</span>
                            </div>
                        </div>
                        <span class="badge bg-success text-white rounded-pill px-2.5 py-1 text-xxs">Operasional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white" style="background: #b8860b;">
                                <i class="material-symbols-rounded text-sm">support_agent</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Klinik Konsultasi Syari'ah</h6>
                                <span class="text-xxs text-secondary">Layanan Fatwa Waris, Zakat & Keluarga</span>
                            </div>
                        </div>
                        <span class="badge bg-success text-white rounded-pill px-2.5 py-1 text-xxs">Buka</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-info text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">routine</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Lab Falakiyah & Astronomi Islam</h6>
                                <span class="text-xxs text-secondary">Observasi Hilal & Penentuan Kiblat</span>
                            </div>
                        </div>
                        <span class="badge bg-info text-white rounded-pill px-2.5 py-1 text-xxs">Aktif Riset</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-dark text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">balance</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Lembaga Bantuan Hukum (LBH)</h6>
                                <span class="text-xxs text-secondary">Advokasi Pro-Bono Masyarakat</span>
                            </div>
                        </div>
                        <span class="badge bg-dark text-white rounded-pill px-2.5 py-1 text-xxs">Terpadu</span>
                    </li>
                </ul>

                <hr class="horizontal dark my-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-outline-dark btn-sm mb-0 d-flex align-items-center justify-content-center">
                        <i class="material-symbols-rounded text-sm me-1">post_add</i>
                        <span>Tulis Berita / Agenda Syari'ah</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 4: PINTASAN DOKUMEN & PENGURUS
     ════════════════════════════════════════════════ --}}
<div class="row g-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h6 class="font-weight-bolder text-dark mb-0 text-sm">Pintasan Dokumen & Administrasi Fakultas Syari'ah</h6>
                    <p class="text-xs text-secondary mb-0">Akses langsung ke arsip modul kurikulum, jadwal sidang munaqasyah, dan kalender kegiatan</p>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.curriculum.index') }}" class="btn btn-sm btn-outline-secondary mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">menu_book</i>Kurikulum Syari'ah
                    </a>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-sm btn-outline-secondary mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">calendar_month</i>Jadwal Munaqasyah
                    </a>
                    <a href="{{ route('admin.document.index') }}" class="btn btn-sm btn-outline-secondary mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">folder_open</i>Bank Dokumen
                    </a>
                    <a href="{{ route('admin.lecturers.index') }}" class="btn btn-sm text-white mb-0 text-xs" style="background: #8B0000;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">person_add</i>Tambah Dosen Syari'ah
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Chart Kurikulum Syariah
    var ctxK = document.getElementById("chart-syariah-kurikulum");
    if (ctxK) {
        new Chart(ctxK.getContext("2d"), {
            type: "bar",
            data: {
                labels: ["Teori Hukum Islam", "Peradilan Semu", "Muamalah Kontemporer", "Falakiyah", "Skripsi/Tesis"],
                datasets: [
                    {
                        label: "HKI (SKS)",
                        backgroundColor: "#8B0000",
                        borderRadius: 4,
                        data: [42, 16, 24, 18, 12],
                        maxBarThickness: 16
                    },
                    {
                        label: "HES (SKS)",
                        backgroundColor: "#D4AF37",
                        borderRadius: 4,
                        data: [38, 14, 36, 10, 12],
                        maxBarThickness: 16
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { boxWidth: 12, font: { size: 11, family: "Inter" } }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [4, 4], color: '#e5e5e5' },
                        ticks: { font: { size: 11 } }
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });
    }

    // 2. Chart Aktivitas Praktik
    var ctxA = document.getElementById("chart-syariah-aktivitas");
    if (ctxA) {
        new Chart(ctxA.getContext("2d"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"],
                datasets: [{
                    label: "Sesi Praktik / Konsultasi",
                    tension: 0.35,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointBackgroundColor: "#8B0000",
                    borderColor: "#8B0000",
                    backgroundColor: "rgba(139, 0, 0, 0.08)",
                    fill: true,
                    data: [12, 16, 14, 22, 28, 24, 30]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [4, 4], color: '#e5e5e5' },
                        ticks: { font: { size: 11 } }
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 11 } } }
                }
            }
        });
    }
});
</script>
@endpush
