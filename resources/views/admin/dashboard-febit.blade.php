@extends('layouts_admin.admin')

@section('title', 'Dashboard Fakultas FEBIT')

@section('page-title', 'Dashboard Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)')

@section('content')

{{-- ═══════════════════════════════════════════════
     DASHBOARD SWITCHER TABS
     ════════════════════════════════════════════════ --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-2 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center">
                    <span class="badge text-white me-2 px-2.5 py-1.5 text-xxs font-weight-bold" style="background: #0f2b48;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">trending_up</i>Panel Fakultas FEBIT
                    </span>
                    <span class="text-xs text-secondary font-weight-bold d-none d-md-inline">Pindah Panel Admin:</span>
                </div>
                <div class="d-flex flex-wrap gap-1">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">space_dashboard</i>
                        <span>Dashboard Utama</span>
                    </a>
                    <a href="{{ route('admin.dashboard.syariah') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none" style="border-color: #8B0000; color: #8B0000;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">balance</i>
                        <span>Fakultas Syari'ah</span>
                    </a>
                    <a href="{{ route('admin.dashboard.febit') }}" class="btn btn-sm text-white mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-xs" style="background: #0f2b48;">
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
     HEADER BANNER FAKULTAS FEBIT
     ════════════════════════════════════════════════ --}}
<div class="row mb-2">
    <div class="col-12">
        <div class="card p-4 text-white border-0 position-relative overflow-hidden mb-4" style="background: linear-gradient(135deg, #091b2e 0%, #0f2b48 50%, #17385c 100%); box-shadow: 0 10px 30px rgba(15, 43, 72, 0.25);">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-white text-dark px-3 py-1 text-xxs font-weight-bolder text-uppercase me-2">Control Center Fakultas</span>
                        <span class="badge px-3 py-1 text-xxs font-weight-bolder text-uppercase" style="background: rgba(245, 158, 11, 0.25); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.5);">
                            <i class="material-symbols-rounded text-xs me-1 align-middle">workspace_premium</i>FEBIT Unggul & Mandiri
                        </span>
                    </div>
                    <h3 class="text-white font-weight-bolder mb-1">Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)</h3>
                    <p class="text-white opacity-8 text-sm mb-0">Panel kendali terintegrasi program studi Manajemen Bisnis Syariah, Ekonomi Syariah, dan Pendidikan Agama Islam (PAI), inkubator bisnis, serta laboratorium praktikum.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('frontend.fakultas.ebit') }}" target="_blank" class="btn btn-white text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1 text-warning">open_in_new</i>
                        <span>Lihat Web FEBIT</span>
                    </a>
                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-outline-light btn-sm mb-0 font-weight-bold d-inline-flex align-items-center">
                        <i class="material-symbols-rounded text-sm me-1">tune</i>
                        <span>Kelola Prodi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 1: 4 KARTU STATISTIK FEBIT
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
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #0f2b48 0%, #17385c 100%); box-shadow: 0 4px 14px rgba(15, 43, 72, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">school</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.study-programs.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="font-weight-bolder me-1" style="color: #0f2b48;">MBS, EKOS & PAI</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">3 Jurusan</span>
            </div>
        </div>
    </div>

    {{-- DOSEN PENGANJAR FEBIT --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Dosen Pengajar</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countLecturers }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); box-shadow: 0 4px 14px rgba(245, 158, 11, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">groups</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.lecturers.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="font-weight-bolder me-1" style="color: #d97706;">Daftar Dosen</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Praktisi & Akademisi</span>
            </div>
        </div>
    </div>

    {{-- PUBLIKASI & ARTIKEL FEBIT --}}
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
                <span class="badge bg-light text-dark text-xxs border">Terbit</span>
            </div>
        </div>
    </div>

    {{-- INKUBATOR & LAB INOVASI --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Lab & Inkubator</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">4</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-success shadow-success text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">storefront</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="#lab-inovasi-febit" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-success font-weight-bolder me-1">Mini Bank & Tax Center</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Kemitraan DUDI</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 2: CHARTS ANALITIK FEBIT
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Komposisi Mahasiswa Berdasarkan Prodi</h6>
                    <span class="badge text-xxs font-weight-bold" style="background: rgba(15, 43, 72, 0.1); color: #0f2b48;">Tahun Akademik Aktif</span>
                </div>
                <p class="text-xs text-secondary mb-3">Distribusi peserta didik aktif pada 3 program studi unggulan FEBIT</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-febit-prodi" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-success">pie_chart</i>Pendidikan Agama Islam mendominasi 45%</span>
                    <a href="{{ route('admin.study-programs.index') }}" class="font-weight-bold" style="color: #0f2b48;">Data Jurusan &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Aktivitas Inkubasi Bisnis & Tax Corner</h6>
                    <span class="badge bg-gradient-warning text-white text-xxs font-weight-bold">Semester Berjalan</span>
                </div>
                <p class="text-xs text-secondary mb-3">Tren pendampingan UMKM, transaksi mini banking, dan pelatihan micro teaching</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-febit-aktivitas" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-warning">trending_up</i>15+ Unit Usaha Mahasiswa Terbina</span>
                    <a href="{{ route('admin.schedule.index') }}" class="font-weight-bold text-dark">Jadwal Praktikum &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 3: TABEL PRODI FEBIT & INKUBATOR BISNIS
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    {{-- DAFTAR PROGRAM STUDI FEBIT --}}
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0 font-weight-bolder text-dark">Program Studi di Bawah Fakultas FEBIT</h6>
                    <p class="text-xs text-secondary mb-0">Status akreditasi dan konsentrasi keilmuan</p>
                </div>
                <a href="{{ route('admin.study-programs.create') }}" class="btn btn-sm text-white mb-0 text-xs py-1.5 px-3" style="background: #0f2b48;">
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
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #0f2b48;">
                                            <i class="material-symbols-rounded text-sm">trending_up</i>
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
                                    <span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(245, 158, 11, 0.15); color: #b45309; border: 1px solid rgba(245, 158, 11, 0.4);">
                                        {{ $prodi->accreditation ?? 'Baik Sekali' }}
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.study-programs.edit', $prodi->id) }}" class="btn btn-link text-dark px-2 mb-0" title="Edit Data">
                                        <i class="material-symbols-rounded text-sm">edit</i>
                                    </a>
                                    <a href="{{ route('frontend.prodi.index', $prodi->slug ?? 'mbs') }}" target="_blank" class="btn btn-link text-secondary px-2 mb-0" title="Web Publik">
                                        <i class="material-symbols-rounded text-sm">visibility</i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            {{-- Fallback Mock Rows FEBIT --}}
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #0f2b48;">
                                            <i class="material-symbols-rounded text-sm">account_balance_wallet</i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">S1 Manajemen Bisnis Syariah (MBS)</h6>
                                            <span class="text-xxs text-secondary">Gelar: Sarjana Manajemen (S.M.)</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border text-xxs font-weight-bold">S1</span></td>
                                <td><span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(245, 158, 11, 0.15); color: #b45309;">Baik Sekali</span></td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-xs btn-outline-dark mb-0 py-1 px-2">Kelola</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #0f2b48;">
                                            <i class="material-symbols-rounded text-sm">currency_exchange</i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">S1 Ekonomi Syariah (EKOS)</h6>
                                            <span class="text-xxs text-secondary">Gelar: Sarjana Ekonomi (S.E.)</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border text-xxs font-weight-bold">S1</span></td>
                                <td><span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(245, 158, 11, 0.15); color: #b45309;">Baik Sekali</span></td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-xs btn-outline-dark mb-0 py-1 px-2">Kelola</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: #0f2b48;">
                                            <i class="material-symbols-rounded text-sm">menu_book</i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">S1 Pendidikan Agama Islam (PAI)</h6>
                                            <span class="text-xxs text-secondary">Gelar: Sarjana Pendidikan (S.Pd.)</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border text-xxs font-weight-bold">S1</span></td>
                                <td><span class="badge text-xxs font-weight-bold px-2 py-1" style="background: rgba(245, 158, 11, 0.15); color: #b45309;">Baik Sekali</span></td>
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

    {{-- SENTRA & LABORATORIUM INOVASI FEBIT --}}
    <div class="col-lg-5" id="lab-inovasi-febit">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0">
                <h6 class="mb-0 font-weight-bolder text-dark">Sentra Inkubasi & Laboratorium FEBIT</h6>
                <p class="text-xs text-secondary mb-0">Fasilitas terapan bisnis syariah dan keguruan</p>
            </div>
            <div class="card-body pt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white" style="background: #0f2b48;">
                                <i class="material-symbols-rounded text-sm">savings</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Mini Banking Syariah & GIS</h6>
                                <span class="text-xxs text-secondary">Core Banking Sim & Galeri Investasi</span>
                            </div>
                        </div>
                        <span class="badge bg-success text-white rounded-pill px-2.5 py-1 text-xxs">Operasional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white" style="background: #f59e0b;">
                                <i class="material-symbols-rounded text-sm">rocket_launch</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Business Incubator FEBIT</h6>
                                <span class="text-xxs text-secondary">Akselerasi Startup & Wirausaha Halal</span>
                            </div>
                        </div>
                        <span class="badge bg-warning text-white rounded-pill px-2.5 py-1 text-xxs">Aktif Inkubasi</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-info text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">co_present</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Lab Micro Teaching Tarbiyah</h6>
                                <span class="text-xxs text-secondary">Simulasi Mengajar & Smart Classroom</span>
                            </div>
                        </div>
                        <span class="badge bg-info text-white rounded-pill px-2.5 py-1 text-xxs">Smart Class</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-success text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">receipt_long</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Tax & ZISWAF Center</h6>
                                <span class="text-xxs text-secondary">Layanan Pajak & Pengelolaan Zakat</span>
                            </div>
                        </div>
                        <span class="badge bg-success text-white rounded-pill px-2.5 py-1 text-xxs">Konsultasi</span>
                    </li>
                </ul>

                <hr class="horizontal dark my-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-outline-dark btn-sm mb-0 d-flex align-items-center justify-content-center">
                        <i class="material-symbols-rounded text-sm me-1">post_add</i>
                        <span>Tulis Berita / Warta FEBIT</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 4: PINTASAN DOKUMEN & PENGURUS FEBIT
     ════════════════════════════════════════════════ --}}
<div class="row g-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h6 class="font-weight-bolder text-dark mb-0 text-sm">Pintasan Dokumen & Administrasi Fakultas FEBIT</h6>
                    <p class="text-xs text-secondary mb-0">Akses langsung ke kurikulum ekonomi bisnis & PAI, jadwal PPL tarbiyah, dan bank dokumen</p>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.curriculum.index') }}" class="btn btn-sm btn-outline-secondary mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">menu_book</i>Kurikulum FEBIT
                    </a>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-sm btn-outline-secondary mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">calendar_month</i>Jadwal PPL & Sidang
                    </a>
                    <a href="{{ route('admin.document.index') }}" class="btn btn-sm btn-outline-secondary mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">folder_open</i>Bank Dokumen
                    </a>
                    <a href="{{ route('admin.lecturers.index') }}" class="btn btn-sm text-white mb-0 text-xs" style="background: #0f2b48;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">person_add</i>Tambah Dosen FEBIT
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
    // 1. Chart Komposisi Mahasiswa FEBIT
    var ctxP = document.getElementById("chart-febit-prodi");
    if (ctxP) {
        new Chart(ctxP.getContext("2d"), {
            type: "doughnut",
            data: {
                labels: ["S1 PAI (Pendidikan)", "S1 MBS (Manajemen Bisnis)", "S1 EKOS (Ekonomi Syariah)"],
                datasets: [{
                    data: [45, 30, 25],
                    backgroundColor: ["#0f2b48", "#f59e0b", "#10b981"],
                    borderWidth: 2,
                    borderColor: "#ffffff"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11, family: "Inter" } }
                    }
                },
                cutout: '65%'
            }
        });
    }

    // 2. Chart Aktivitas Inkubasi Bisnis & Tax Corner
    var ctxA = document.getElementById("chart-febit-aktivitas");
    if (ctxA) {
        new Chart(ctxA.getContext("2d"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"],
                datasets: [
                    {
                        label: "Klinik UMKM / Bisnis",
                        backgroundColor: "#f59e0b",
                        borderRadius: 4,
                        data: [8, 12, 10, 15, 20, 18, 22],
                        maxBarThickness: 14
                    },
                    {
                        label: "Praktek Mengajar (PPL)",
                        backgroundColor: "#0f2b48",
                        borderRadius: 4,
                        data: [14, 18, 20, 24, 26, 22, 28],
                        maxBarThickness: 14
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
});
</script>
@endpush
