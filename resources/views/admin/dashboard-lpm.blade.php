@extends('layouts_admin.admin')

@section('title', 'Dashboard Lembaga Penjaminan Mutu (LPM)')

@section('page-title', 'Dashboard Lembaga Penjaminan Mutu (LPM)')

@section('content')

{{-- ═══════════════════════════════════════════════
     DASHBOARD SWITCHER TABS
     ════════════════════════════════════════════════ --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-2 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center">
                    <span class="badge text-white me-2 px-2.5 py-1.5 text-xxs font-weight-bold" style="background: #059669;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">verified</i>Panel Penjaminan Mutu
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
                    <a href="{{ route('admin.dashboard.febit') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none" style="border-color: #0f2b48; color: #0f2b48;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">trending_up</i>
                        <span>Fakultas FEBIT</span>
                    </a>
                    <a href="{{ route('admin.dashboard.lpm') }}" class="btn btn-sm text-white mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-xs" style="background: #059669;">
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
     HEADER BANNER LPM
     ════════════════════════════════════════════════ --}}
<div class="row mb-2">
    <div class="col-12">
        <div class="card p-4 text-white border-0 position-relative overflow-hidden mb-4" style="background: linear-gradient(135deg, #044e37 0%, #059669 50%, #0f766e 100%); box-shadow: 0 10px 30px rgba(5, 150, 105, 0.25);">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-white text-dark px-3 py-1 text-xxs font-weight-bolder text-uppercase me-2">Control Center Mutu</span>
                        <span class="badge px-3 py-1 text-xxs font-weight-bolder text-uppercase" style="background: rgba(255, 255, 255, 0.25); color: #fff;">
                            <i class="material-symbols-rounded text-xs me-1 align-middle">verified_user</i>SPMI PPEPP Aktif
                        </span>
                    </div>
                    <h3 class="text-white font-weight-bolder mb-1">Lembaga Penjaminan Mutu (LPM)</h3>
                    <p class="text-white opacity-8 text-sm mb-0">Pengawasan standar akademik, audit mutu internal (AMI), evaluasi dosen oleh mahasiswa (EDOM), dan repositori dokumen akreditasi LAM-KEMENAG / BAN-PT.</p>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.portal.edit', 'lpm') }}" class="btn btn-warning text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1">edit_document</i>
                        <span>Edit Isi Web Portal</span>
                    </a>
                    <a href="{{ route('frontend.lpm.index') }}" target="_blank" class="btn btn-white text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1 text-success">open_in_new</i>
                        <span>Lihat Web</span>
                    </a>
                    <a href="{{ route('admin.document.index') }}" class="btn btn-outline-light btn-sm mb-0 font-weight-bold d-inline-flex align-items-center">
                        <i class="material-symbols-rounded text-sm me-1">upload_file</i>
                        <span>Dokumen</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 1: 4 KARTU STATISTIK LPM
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4 pt-2">
    {{-- SIKLUS PPEPP --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Siklus PPEPP</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">5 Fase</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">sync</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-success">Penetapan s.d. Peningkatan</span>
                <span class="badge bg-light text-dark text-xxs border">Terkontrol</span>
            </div>
        </div>
    </div>

    {{-- AUDIT MUTU INTERNAL --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Auditor Internal</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">18 Orang</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">fact_check</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-info">Auditor Tersertifikasi</span>
                <span class="badge bg-light text-dark text-xxs border">AMI 2026</span>
            </div>
        </div>
    </div>

    {{-- DOKUMEN STANDAR MUTU --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Dokumen Mutu</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ count($documents) ?: 24 }} Dokumen</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #d97706 0%, #b45309 100%); box-shadow: 0 4px 14px rgba(217, 119, 6, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">folder_shared</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.document.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-warning font-weight-bolder me-1">Bank SPMI</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Terkodifikasi</span>
            </div>
        </div>
    </div>

    {{-- EDOM KEPUASAN --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Skor EDOM Dosen</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">4.62 / 5.0</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">star</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-dark">Sangat Memuaskan</span>
                <span class="badge bg-light text-dark text-xxs border">96% Responden</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 2: CHARTS ANALITIK KEPATUHAN STANDAR & EDOM
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Kepatuhan Standar SPMI (Audit Internal)</h6>
                    <span class="badge bg-gradient-success text-white text-xxs font-weight-bold">Status 9 Kriteria</span>
                </div>
                <p class="text-xs text-secondary mb-3">Persentase capaian standar mutu di lingkungan fakultas & prodi</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-lpm-kepatuhan" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-success">task_alt</i>Target Akreditasi Unggul Institusi</span>
                    <a href="{{ route('admin.document.index') }}" class="font-weight-bold text-success">Kelola Instrumen &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Indeks Kepuasan Pemangku Kepentingan</h6>
                    <span class="badge text-xxs font-weight-bold" style="background: rgba(5, 150, 105, 0.1); color: #059669;">Survey Terbuka</span>
                </div>
                <p class="text-xs text-secondary mb-3">Hasil survey mahasiswa, dosen, tenaga kependidikan, dan pengguna lulusan</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-lpm-kepuasan" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-success">sentiment_very_satisfied</i>94.5% Tingkat Kepuasan Keseluruhan</span>
                    <a href="{{ route('frontend.lpm.index') }}" target="_blank" class="font-weight-bold text-dark">Lihat Laporan &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 3: ALUR SIKLUS PPEPP & REPOSITORI MUTU
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0 font-weight-bolder text-dark">Monitoring 5 Tahap Siklus PPEPP</h6>
                    <p class="text-xs text-secondary mb-0">Pelaksanaan siklus penjaminan mutu berkelanjutan</p>
                </div>
                <span class="badge bg-success text-white px-2.5 py-1 text-xxs">Tahun 2026/2027</span>
            </div>
            <div class="card-body pt-3">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="p-3 border rounded-3 bg-light text-center h-100">
                            <div class="badge rounded-pill bg-success text-white mb-2">Fase 1</div>
                            <h6 class="text-xs font-weight-bold mb-1">Penetapan</h6>
                            <p class="text-xxs text-secondary mb-0">Kebijakan & 24 Standar Mutu</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="p-3 border rounded-3 bg-light text-center h-100">
                            <div class="badge rounded-pill bg-info text-white mb-2">Fase 2</div>
                            <h6 class="text-xs font-weight-bold mb-1">Pelaksanaan</h6>
                            <p class="text-xxs text-secondary mb-0">Penerapan SOP Tridharma</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="p-3 border rounded-3 bg-light text-center h-100">
                            <div class="badge rounded-pill bg-warning text-white mb-2">Fase 3</div>
                            <h6 class="text-xs font-weight-bold mb-1">Evaluasi</h6>
                            <p class="text-xxs text-secondary mb-0">Audit Mutu Internal & EDOM</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="p-3 border rounded-3 bg-light text-center h-100">
                            <div class="badge rounded-pill bg-danger text-white mb-2">Fase 4</div>
                            <h6 class="text-xs font-weight-bold mb-1">Pengendalian</h6>
                            <p class="text-xxs text-secondary mb-0">Rapat Tinjauan Manajemen (RTM)</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="p-3 border rounded-3 bg-light text-center h-100">
                            <div class="badge rounded-pill bg-dark text-white mb-2">Fase 5</div>
                            <h6 class="text-xs font-weight-bold mb-1">Peningkatan</h6>
                            <p class="text-xxs text-secondary mb-0">Benchmarking & Kaizen</p>
                        </div>
                    </div>
                </div>

                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="text-xs text-secondary">Kelola arsip dokumen SOP & instrumen audit secara berkala.</span>
                    <a href="{{ route('admin.document.index') }}" class="btn btn-sm btn-outline-dark mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">folder</i>Buka Repositori Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0">
                <h6 class="mb-0 font-weight-bolder text-dark">Aksi Cepat LPM</h6>
                <p class="text-xs text-secondary mb-0">Pintasan operasional pengawasan mutu</p>
            </div>
            <div class="card-body pt-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.document.index') }}" class="btn btn-outline-success btn-sm mb-0 d-flex align-items-center justify-content-center text-xs">
                        <i class="material-symbols-rounded text-sm me-2">upload_file</i>
                        <span>Upload Dokumen Standar Baru</span>
                    </a>
                    <a href="{{ route('admin.announcements.create') }}" class="btn btn-outline-dark btn-sm mb-0 d-flex align-items-center justify-content-center text-xs">
                        <i class="material-symbols-rounded text-sm me-2">campaign</i>
                        <span>Buat Pengumuman Jadwal AMI</span>
                    </a>
                    <a href="{{ route('admin.pages.edit-by-slug', 'lpm') }}" class="btn btn-outline-secondary btn-sm mb-0 d-flex align-items-center justify-content-center text-xs">
                        <i class="material-symbols-rounded text-sm me-2">edit_note</i>
                        <span>Edit Halaman Profil LPM</span>
                    </a>
                    <a href="{{ route('frontend.lpm.index') }}" target="_blank" class="btn text-white btn-sm mb-0 d-flex align-items-center justify-content-center text-xs" style="background: #059669;">
                        <i class="material-symbols-rounded text-sm me-2">public</i>
                        <span>Buka Portal Publik LPM</span>
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
    // 1. Chart Kepatuhan Standar
    var ctxK = document.getElementById("chart-lpm-kepatuhan");
    if (ctxK) {
        new Chart(ctxK.getContext("2d"), {
            type: "bar",
            data: {
                labels: ["Tata Pamong", "Mahasiswa", "SDM Dosen", "Keuangan", "Pendidikan", "Penelitian", "Pengabdian"],
                datasets: [{
                    label: "% Kepatuhan",
                    backgroundColor: "#059669",
                    borderRadius: 4,
                    data: [96, 92, 94, 90, 98, 88, 92],
                    maxBarThickness: 16
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: { borderDash: [4, 4], color: '#e5e5e5' },
                        ticks: { font: { size: 11 } }
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });
    }

    // 2. Chart Kepuasan
    var ctxS = document.getElementById("chart-lpm-kepuasan");
    if (ctxS) {
        new Chart(ctxS.getContext("2d"), {
            type: "radar",
            data: {
                labels: ["Kehandalan Dosen", "Fasilitas Lab", "Pelayanan Akademik", "Sistem Informasi", "Sarana Prasarana"],
                datasets: [{
                    label: "Skor Kepuasan",
                    data: [4.7, 4.4, 4.6, 4.8, 4.5],
                    backgroundColor: "rgba(5, 150, 105, 0.2)",
                    borderColor: "#059669",
                    pointBackgroundColor: "#059669"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    r: {
                        min: 3,
                        max: 5,
                        ticks: { stepSize: 0.5, font: { size: 10 } }
                    }
                }
            }
        });
    }
});
</script>
@endpush
