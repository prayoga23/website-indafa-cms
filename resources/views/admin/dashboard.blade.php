@extends('layouts_admin.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard Ringkasan Sistem')

@section('content')

{{-- ═══════════════════════════════════════════════
     HEADER BANNER
     ════════════════════════════════════════════════ --}}
<div class="row mb-2">
    <div class="col-12">
        <div class="card bg-gradient-dark p-4 text-white border-0 shadow-dark position-relative overflow-hidden mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="badge bg-white text-dark mb-2 px-3 py-1 text-xxs font-weight-bolder text-uppercase">Admin Control Center</span>
                    <h3 class="text-white font-weight-bolder mb-1">Selamat Datang, {{ auth()->user()->name ?? 'Administrator' }}!</h3>
                    <p class="text-white opacity-8 text-sm mb-0">Kelola seluruh informasi kampus, fakultas, program studi, publikasi berita, dan aspirasi secara terpusat.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-white text-dark btn-sm mb-0 font-weight-bold shadow-sm d-inline-flex align-items-center">
                        <i class="material-symbols-rounded text-sm me-1">visibility</i>
                        <span>Lihat Website Depan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 1: 4 KARTU STATISTIK (MATERIAL DASHBOARD CARDS)
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4 pt-2">
    {{-- FAKULTAS --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Total Fakultas</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countFaculty }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">account_balance</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.faculties.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-dark font-weight-bolder me-1">Kelola Fakultas</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Fakultas Aktif</span>
            </div>
        </div>
    </div>

    {{-- PRODI --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Program Studi</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countStudyProgram }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-success shadow-success text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">school</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.study-programs.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-success font-weight-bolder me-1">Kelola Prodi</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Jenjang S1</span>
            </div>
        </div>
    </div>

    {{-- DOSEN & STAF --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Dosen & Staf</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countLecturer }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">groups</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.lecturers.index') }}" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-info font-weight-bolder me-1">Daftar Pengajar</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Civitas</span>
            </div>
        </div>
    </div>

    {{-- KOTAK MASUK / ASPIRASI --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm" style="overflow: visible;">
            <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-xs mb-1 text-uppercase text-secondary font-weight-bolder">Pesan & Aspirasi</p>
                        <h4 class="mb-0 text-dark font-weight-bolder">{{ $countMessage }}</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-danger shadow-danger text-center border-radius-lg d-flex align-items-center justify-content-center stat-card-icon">
                        <i class="material-symbols-rounded opacity-10 text-white">mark_email_unread</i>
                    </div>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3 d-flex align-items-center justify-content-between">
                <a href="#tabel-aspirasi" class="text-xs text-secondary font-weight-bold d-flex align-items-center">
                    <span class="text-danger font-weight-bolder me-1">Kotak Aspirasi</span>
                    <i class="material-symbols-rounded text-xs">arrow_forward</i>
                </a>
                <span class="badge bg-light text-dark text-xxs border">Total Masuk</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 2: 3 CHART STATISTIK (MATERIAL CHARTS)
     ════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">
    {{-- CHART 1 --}}
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="mb-0 font-weight-bolder text-dark">Statistik Publikasi Konten</h6>
                <p class="text-xs text-secondary mb-3">Total Berita, Pengumuman, dan Agenda Terbit</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center text-xs text-secondary">
                    <i class="material-symbols-rounded text-sm me-1">schedule</i>
                    <span>Diperbarui otomatis secara real-time</span>
                </div>
            </div>
        </div>
    </div>

    {{-- CHART 2 --}}
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="mb-0 font-weight-bolder text-dark">Aktivitas & Aspirasi Masuk</h6>
                <p class="text-xs text-secondary mb-3"><span class="text-success font-weight-bolder">+{{ $countMessage }}</span> pesan tercatat di database</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center text-xs text-secondary">
                    <i class="material-symbols-rounded text-sm me-1">chat</i>
                    <span>Tingkat interaksi publik kampus</span>
                </div>
            </div>
        </div>
    </div>

    {{-- CHART 3 --}}
    <div class="col-lg-4 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="mb-0 font-weight-bolder text-dark">Kesiapan Layanan Akademik</h6>
                <p class="text-xs text-secondary mb-3">Kurikulum, Jadwal, Kalender, dan Dokumen</p>
                <div class="pe-2">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
                <hr class="dark horizontal my-3">
                <div class="d-flex align-items-center text-xs text-secondary">
                    <i class="material-symbols-rounded text-sm me-1">check_circle</i>
                    <span>Status modul akademik terkonfigurasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     ROW 3: TABEL ASPIRASI & RINGKASAN PUBLIKASI
     ════════════════════════════════════════════════ --}}
<div class="row g-3">
    {{-- TABEL PESAN MASUK --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" id="tabel-aspirasi">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0 font-weight-bolder text-dark">Aspirasi & Pesan Terbaru</h6>
                    <p class="text-xs text-secondary mb-0">5 interaksi terakhir dari pengunjung website</p>
                </div>
                <span class="badge bg-gradient-danger text-white px-3 py-1 text-xxs font-weight-bold">
                    {{ $countMessage }} Total Pesan
                </span>
            </div>
            <div class="card-body px-0 pb-2 pt-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Pengirim</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kontak / Identitas</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subjek Pesan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestMessages as $msg)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm bg-gradient-dark rounded-circle text-white text-xs font-weight-bold me-3 d-flex align-items-center justify-content-center shadow-xs">
                                            {{ strtoupper(substr($msg->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm font-weight-bold text-dark">{{ $msg->name ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary font-weight-normal mb-0">{{ $msg->identity ?? ($msg->email ?? '-') }}</p>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2.5 py-1 text-xxs font-weight-bold rounded-pill">
                                        {{ $msg->subject ?? 'Pesan Masuk' }}
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-normal">
                                        <i class="material-symbols-rounded text-xs me-1 align-middle">schedule</i>{{ isset($msg->created_at) && is_object($msg->created_at) ? $msg->created_at->diffForHumans() : '-' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="material-symbols-rounded fs-1 d-block mb-2 text-secondary opacity-5">mark_email_read</i>
                                    <p class="text-sm text-secondary mb-0">Belum ada pesan atau aspirasi masuk dari halaman kontak.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- RINGKASAN PUBLIKASI & PINTASAN --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header pb-0">
                <h6 class="mb-0 font-weight-bolder text-dark">Ringkasan Publikasi</h6>
                <p class="text-xs text-secondary mb-0">Arsip konten yang telah dipublikasikan</p>
            </div>
            <div class="card-body pt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-info shadow-info text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">newspaper</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Artikel Berita</h6>
                                <span class="text-xxs text-secondary">Portal Warta Kampus</span>
                            </div>
                        </div>
                        <span class="badge bg-info text-white rounded-pill px-3 py-1.5 text-xs">{{ $countNews }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-warning shadow-warning text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">campaign</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Pengumuman</h6>
                                <span class="text-xxs text-secondary">Informasi Resmi Civitas</span>
                            </div>
                        </div>
                        <span class="badge bg-warning text-white rounded-pill px-3 py-1.5 text-xs">{{ $countAnnouncement }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2.5 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm bg-gradient-success shadow-success text-center border-radius-md me-3 d-flex align-items-center justify-content-center text-white">
                                <i class="material-symbols-rounded text-sm">calendar_today</i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm font-weight-bold text-dark">Agenda Kegiatan</h6>
                                <span class="text-xxs text-secondary">Jadwal & Event Kampus</span>
                            </div>
                        </div>
                        <span class="badge bg-success text-white rounded-pill px-3 py-1.5 text-xs">{{ $countAgenda }}</span>
                    </li>
                </ul>

                <hr class="horizontal dark my-3">

                <h6 class="text-xs font-weight-bolder text-uppercase text-secondary mb-2">Aksi Cepat</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-outline-dark btn-sm mb-0 d-flex align-items-center justify-content-center">
                        <i class="material-symbols-rounded text-sm me-1">add_circle</i>
                        <span>Tulis Berita Baru</span>
                    </a>
                    <a href="{{ route('admin.announcements.create') }}" class="btn btn-outline-dark btn-sm mb-0 d-flex align-items-center justify-content-center">
                        <i class="material-symbols-rounded text-sm me-1">add_alert</i>
                        <span>Buat Pengumuman</span>
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
        var totalNews = {{ $countNews }};
        var totalAnnounce = {{ $countAnnouncement }};
        var totalAgenda = {{ $countAgenda }};
        var totalMessage = {{ $countMessage }};
        var totalFaculty = {{ $countFaculty }};
        var totalProdi = {{ $countStudyProgram }};

        // 1. Chart Bars (Publikasi Konten)
        var ctx1 = document.getElementById("chart-bars");
        if (ctx1) {
            new Chart(ctx1.getContext("2d"), {
                type: "bar",
                data: {
                    labels: ["Berita", "Pengumuman", "Agenda", "Fakultas", "Prodi"],
                    datasets: [{
                        label: "Jumlah Data",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#43A047",
                        data: [totalNews, totalAnnounce, totalAgenda, totalFaculty, totalProdi],
                        maxBarThickness: 18
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 10,
                                beginAtZero: true,
                                padding: 10,
                                font: { size: 12, family: "Inter" },
                                color: "#737373"
                            },
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 11, family: "Inter" },
                                color: "#737373"
                            },
                        },
                    },
                },
            });
        }

        // 2. Chart Line (Aspirasi & Interaksi)
        var ctx2 = document.getElementById("chart-line");
        if (ctx2) {
            new Chart(ctx2.getContext("2d"), {
                type: "line",
                data: {
                    labels: ["Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt"],
                    datasets: [{
                        label: "Aspirasi Masuk",
                        tension: 0.35,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointBackgroundColor: "#1a73e8",
                        borderColor: "#1a73e8",
                        backgroundColor: "transparent",
                        fill: true,
                        data: [1, 2, 4, 3, 5, 2, totalMessage || 6],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                beginAtZero: true,
                                padding: 10,
                                font: { size: 12, family: "Inter" },
                                color: "#737373"
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 12, family: "Inter" },
                                color: "#737373"
                            }
                        },
                    },
                },
            });
        }

        // 3. Chart Line Tasks (Kesiapan Layanan)
        var ctx3 = document.getElementById("chart-line-tasks");
        if (ctx3) {
            new Chart(ctx3.getContext("2d"), {
                type: "line",
                data: {
                    labels: ["Sem 1", "Sem 2", "Sem 3", "Sem 4", "Sem 5", "Sem 6"],
                    datasets: [{
                        label: "Indeks Kelengkapan",
                        tension: 0.35,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointBackgroundColor: "#42424a",
                        borderColor: "#42424a",
                        backgroundColor: "transparent",
                        fill: true,
                        data: [80, 85, 90, 88, 95, 98],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                suggestedMin: 50,
                                suggestedMax: 100,
                                padding: 10,
                                font: { size: 12, family: "Inter" },
                                color: "#737373"
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 12, family: "Inter" },
                                color: "#737373"
                            }
                        },
                    },
                },
            });
        }
    });
</script>
@endpush
