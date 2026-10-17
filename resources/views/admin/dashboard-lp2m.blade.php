@extends('layouts_admin.admin')

@section('title', 'Dashboard LP2M')

@section('page-title', 'Dashboard LP2M (Penelitian & Pengabdian Masyarakat)')

@section('content')

{{-- ═══════════════════════════════════════════════
     DASHBOARD SWITCHER TABS
     ════════════════════════════════════════════════ --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-2 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center">
                    <span class="badge text-white me-2 px-2.5 py-1.5 text-xxs font-weight-bold" style="background: #4f46e5;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">biotech</i>Panel Riset & Pengabdian
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
                    <a href="{{ route('admin.dashboard.lpm') }}" class="btn btn-sm btn-outline-dark mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-none" style="border-color: #059669; color: #059669;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">verified</i>
                        <span>LPM Mutu</span>
                    </a>
                    <a href="{{ route('admin.dashboard.lp2m') }}" class="btn btn-sm text-white mb-0 py-1.5 px-3 text-xs font-weight-bold shadow-xs" style="background: #4f46e5;">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">biotech</i>
                        <span>LP2M Riset</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     HEADER BANNER LP2M
     ════════════════════════════════════════════════ --}}
<div class="row mb-2">
    <div class="col-12">
        <div class="card p-4 text-white border-0 position-relative overflow-hidden mb-4" style="background: linear-gradient(135deg, #2e1065 0%, #4f46e5 50%, #4338ca 100%); box-shadow: 0 10px 30px rgba(79, 70, 229, 0.25);">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-white text-dark px-3 py-1 text-xxs font-weight-bolder text-uppercase me-2">Control Center Riset</span>
                        <span class="badge px-3 py-1 text-xxs font-weight-bolder text-uppercase" style="background: rgba(255, 255, 255, 0.25); color: #fff;">
                            <i class="material-symbols-rounded text-xs me-1 align-middle">science</i>Tridharma Penelitian & PkM
                        </span>
                    </div>
                    <h3 class="text-white font-weight-bolder mb-1">LP2M (Penelitian & Pengabdian Masyarakat)</h3>
                    <p class="text-white opacity-8 text-sm mb-0">Pengelolaan proposal hibah Litapdimas, pengelolaan rumah jurnal Open Journal System (OJS), pelaksanaan KKN Tematik, dan perolehan Hak Cipta / HKI Kemenkumham.</p>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.portal.edit', 'lp2m') }}" class="btn btn-warning text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1">edit_document</i>
                        <span>Edit Isi Web Portal</span>
                    </a>
                    <a href="{{ route('frontend.lp2m.index') }}" target="_blank" class="btn btn-white text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center me-2">
                        <i class="material-symbols-rounded text-sm me-1 text-primary">open_in_new</i>
                        <span>Lihat Web</span>
                    </a>
                    <a href="{{ route('admin.document.index') }}" class="btn btn-outline-light btn-sm mb-0 font-weight-bold d-inline-flex align-items-center">
                        <i class="material-symbols-rounded text-sm me-1">folder</i>
                        <span>Dokumen</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 1: 4 KARTU STATISTIK LP2M
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4 pt-2">
    {{-- RISET LITAPDIMAS --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Riset Litapdimas</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">65 Judul</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%); box-shadow: 0 4px 14px rgba(79, 70, 229, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">science</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-primary">Kemenag RI & Mandiri</span>
                <span class="badge bg-light text-dark text-xxs border">Terbiayai</span>
            </div>
        </div>
    </div>

    {{-- JURNAL ILMIAH OJS --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Rumah Jurnal OJS</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">4 Jurnal</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); box-shadow: 0 4px 14px rgba(13, 148, 136, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">menu_book</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-teal">Terakreditasi SINTA</span>
                <span class="badge bg-light text-dark text-xxs border">Peer-Reviewed</span>
            </div>
        </div>
    </div>

    {{-- HKI KEMENKUMHAM --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Sertifikat HKI</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">42 Sertifikat</h4>
                    </div>
                    <div class="icon icon-md icon-shape text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon" style="background: linear-gradient(135deg, #d97706 0%, #b45309 100%); box-shadow: 0 4px 14px rgba(217, 119, 6, 0.3);">
                        <i class="material-symbols-rounded opacity-10 text-white">military_tech</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-warning">Kemenkumham RI</span>
                <span class="badge bg-light text-dark text-xxs border">Hak Cipta</span>
            </div>
        </div>
    </div>

    {{-- DESA BINAAN KKN --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Desa Binaan KKN</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">25 Lokasi</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-success shadow-success text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">holiday_village</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <span class="text-xs font-weight-bolder text-success">KKN PAR & Tematik</span>
                <span class="badge bg-light text-dark text-xxs border">Aktif PkM</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 2: CHARTS ANALITIK LP2M
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Tren Publikasi Artikel & Sitasi Ilmiah</h6>
                    <span class="badge bg-gradient-primary text-white text-xxs font-weight-bold">Google Scholar & SINTA</span>
                </div>
                <p class="text-xs text-secondary mb-3">Produktivitas publikasi karya ilmiah dosen dan mahasiswa per tahun</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-lp2m-publikasi" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-primary">trending_up</i>Peningkatan 35% sitasi tahun ini</span>
                    <a href="{{ route('admin.document.index') }}" class="font-weight-bold text-primary">Arsip Jurnal &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 font-weight-bolder text-dark">Distribusi Skema Pengabdian (PkM)</h6>
                    <span class="badge text-xxs font-weight-bold" style="background: rgba(79, 70, 229, 0.1); color: #4f46e5;">Kemitraan Masyarakat</span>
                </div>
                <p class="text-xs text-secondary mb-3">Persentase fokus program pemberdayaan desa binaan</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-lp2m-pkm" class="chart-canvas" height="180"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between text-xs text-secondary">
                    <span><i class="material-symbols-rounded text-sm me-1 align-middle text-success">eco</i>Fokus pada digitalisasi desa & sertifikasi halal</span>
                    <a href="{{ route('frontend.lp2m.index') }}" target="_blank" class="font-weight-bold text-dark">Web LP2M &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 3: 4 PILAR UTAMA & PINTASAN LP2M
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0 font-weight-bolder text-dark">Sentra Kerja LP2M IAI Darul Falah</h6>
                    <p class="text-xs text-secondary mb-0">Divisi operasional riset, pengabdian, jurnal, dan kekayaan intelektual</p>
                </div>
                <span class="badge bg-dark text-white px-2.5 py-1 text-xxs">Terpadu</span>
            </div>
            <div class="card-body pt-3">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon icon-xs rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2">
                                    <i class="material-symbols-rounded text-xs">biotech</i>
                                </div>
                                <h6 class="text-sm font-weight-bold mb-0">Pusat Penelitian & Penerbitan</h6>
                            </div>
                            <p class="text-xs text-secondary mb-0">Klinik proposal Litapdimas, reviu etik penelitian, dan pendanaan riset kolaboratif.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon icon-xs rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-2">
                                    <i class="material-symbols-rounded text-xs">groups</i>
                                </div>
                                <h6 class="text-sm font-weight-bold mb-0">Pusat Pengabdian & KKN</h6>
                            </div>
                            <p class="text-xs text-secondary mb-0">KKN Tematik Desa Binaan, program sertifikasi halal UMKM, dan pemberdayaan pesantren.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon icon-xs rounded-circle bg-info text-white d-flex align-items-center justify-content-center me-2">
                                    <i class="material-symbols-rounded text-xs">auto_stories</i>
                                </div>
                                <h6 class="text-sm font-weight-bold mb-0">Rumah Jurnal Kampus (OJS)</h6>
                            </div>
                            <p class="text-xs text-secondary mb-0">Asistensi akreditasi SINTA, DOI Crossref, dan standarisasi peer-review internasional.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon icon-xs rounded-circle bg-warning text-white d-flex align-items-center justify-content-center me-2">
                                    <i class="material-symbols-rounded text-xs">verified</i>
                                </div>
                                <h6 class="text-sm font-weight-bold mb-0">Sentra Hak Cipta & HKI</h6>
                            </div>
                            <p class="text-xs text-secondary mb-0">Layanan pendaftaran hak cipta buku, modul, aplikasi, dan paten sederhana Kemenkumham.</p>
                        </div>
                    </div>
                </div>

                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="text-xs text-secondary">Akses panduan proposal dan buku pedoman KKN.</span>
                    <a href="{{ route('admin.document.index') }}" class="btn btn-sm btn-outline-dark mb-0 text-xs">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">description</i>Kelola Panduan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0">
                <h6 class="mb-0 font-weight-bolder text-dark">Aksi Cepat LP2M</h6>
                <p class="text-xs text-secondary mb-0">Pintasan operasional penelitian & PkM</p>
            </div>
            <div class="card-body pt-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.document.index') }}" class="btn btn-outline-primary btn-sm mb-0 d-flex align-items-center justify-content-center text-xs">
                        <i class="material-symbols-rounded text-sm me-2">upload_file</i>
                        <span>Upload Panduan Riset / KKN</span>
                    </a>
                    <a href="{{ route('admin.agenda.create') }}" class="btn btn-outline-dark btn-sm mb-0 d-flex align-items-center justify-content-center text-xs">
                        <i class="material-symbols-rounded text-sm me-2">event</i>
                        <span>Jadwalkan Seminar / Monev</span>
                    </a>
                    <a href="{{ route('admin.pages.edit-by-slug', 'lp2m') }}" class="btn btn-outline-secondary btn-sm mb-0 d-flex align-items-center justify-content-center text-xs">
                        <i class="material-symbols-rounded text-sm me-2">edit_note</i>
                        <span>Edit Profil LP2M</span>
                    </a>
                    <a href="{{ route('frontend.lp2m.index') }}" target="_blank" class="btn text-white btn-sm mb-0 d-flex align-items-center justify-content-center text-xs" style="background: #4f46e5;">
                        <i class="material-symbols-rounded text-sm me-2">public</i>
                        <span>Buka Portal Publik LP2M</span>
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
    // 1. Chart Publikasi LP2M
    var ctxP = document.getElementById("chart-lp2m-publikasi");
    if (ctxP) {
        new Chart(ctxP.getContext("2d"), {
            type: "line",
            data: {
                labels: ["2022", "2023", "2024", "2025", "2026"],
                datasets: [
                    {
                        label: "Artikel Jurnal",
                        data: [18, 28, 42, 55, 68],
                        borderColor: "#4f46e5",
                        backgroundColor: "rgba(79, 70, 229, 0.1)",
                        fill: true,
                        tension: 0.35,
                        pointRadius: 4
                    },
                    {
                        label: "Sitasi Ilmiah",
                        data: [45, 90, 160, 240, 320],
                        borderColor: "#0d9488",
                        backgroundColor: "transparent",
                        borderDash: [5, 5],
                        tension: 0.35,
                        pointRadius: 4
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
                    x: { grid: { display: false }, ticks: { font: { size: 11 } } }
                }
            }
        });
    }

    // 2. Chart Skema PkM
    var ctxM = document.getElementById("chart-lp2m-pkm");
    if (ctxM) {
        new Chart(ctxM.getContext("2d"), {
            type: "pie",
            data: {
                labels: ["Pemberdayaan Desa", "Pendampingan UMKM Halal", "Pendidikan Masyarakat", "Kesehatan & Sanitasi"],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ["#4f46e5", "#0d9488", "#f59e0b", "#ec4899"],
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
                }
            }
        });
    }
});
</script>
@endpush
