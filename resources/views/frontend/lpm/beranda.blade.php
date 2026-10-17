@extends('frontend.layouts.app')

@section('title', 'Dashboard Lembaga Penjaminan Mutu (LPM) - INDAFA Bondowoso')

@section('content')
{{-- ==============================================
     THEME VARIABLES & CUSTOM DASHBOARD STYLES (LPM)
=============================================== --}}
<style>
    :root {
        --lpm-primary: #064e3b;
        --lpm-primary-dark: #022c22;
        --lpm-primary-light: #0d7357;
        --lpm-gold: #d97706;
        --lpm-gold-light: #fbbf24;
        --lpm-gold-soft: rgba(217, 119, 6, 0.12);
        --lpm-surface: #ffffff;
        --lpm-surface-soft: #f2f8f5;
        --lpm-border: rgba(6, 78, 59, 0.12);
    }

    /* Hero Section */
    .lpm-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(2, 44, 34, 0.95) 0%, rgba(6, 78, 59, 0.90) 100%),
                    url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') center/cover no-repeat;
        min-height: 560px;
        display: flex;
        align-items: center;
        padding: 130px 0 80px;
        color: #fff;
        overflow: hidden;
    }

    .lpm-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 80% 20%, rgba(251, 191, 36, 0.22) 0%, transparent 60%);
        pointer-events: none;
    }

    .lpm-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(217, 119, 6, 0.25);
        border: 1px solid rgba(251, 191, 36, 0.45);
        backdrop-filter: blur(8px);
        color: var(--lpm-gold-light);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 0.45rem 1.25rem;
        border-radius: 50px;
        margin-bottom: 1.25rem;
    }

    .lpm-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.3rem, 4.5vw, 3.8rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.02em;
        margin-bottom: 1.25rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }

    .lpm-hero .lead {
        font-size: clamp(1rem, 1.3vw, 1.2rem);
        color: rgba(255, 255, 255, 0.88);
        max-width: 740px;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    /* Buttons */
    .btn-lpm-gold {
        background: linear-gradient(135deg, var(--lpm-gold-light) 0%, var(--lpm-gold) 100%);
        color: #022c22 !important;
        font-weight: 700;
        border: none;
        padding: 0.85rem 2rem;
        border-radius: 50px;
        box-shadow: 0 10px 25px rgba(217, 119, 6, 0.35);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-lpm-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(217, 119, 6, 0.5);
        background: #fff;
        color: var(--lpm-primary) !important;
    }

    .btn-lpm-outline {
        border: 2px solid rgba(255, 255, 255, 0.6);
        color: #fff !important;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(8px);
        font-weight: 600;
        padding: 0.85rem 1.8rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-lpm-outline:hover {
        background: #fff;
        color: var(--lpm-primary) !important;
        border-color: #fff;
        transform: translateY(-3px);
    }

    /* Quick Dashboard Stats Bar */
    .dashboard-stats-strip {
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }

    .stat-dashboard-card {
        background: #ffffff;
        border-radius: 1.25rem;
        padding: 1.75rem 1.5rem;
        box-shadow: 0 15px 35px rgba(6, 78, 59, 0.08);
        border: 1px solid var(--lpm-border);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--lpm-primary), var(--lpm-gold));
        opacity: 0;
        transition: opacity 0.3s;
    }

    .stat-dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(6, 78, 59, 0.14);
    }

    .stat-dashboard-card:hover::before {
        opacity: 1;
    }

    .stat-icon-wrapper {
        width: 54px;
        height: 54px;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 1rem;
        background: var(--lpm-gold-soft);
        color: var(--lpm-primary);
    }

    .stat-dashboard-number {
        font-size: 2.1rem;
        font-weight: 800;
        color: var(--lpm-primary);
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .stat-dashboard-label {
        font-size: 0.88rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #212529;
        margin-bottom: 0.25rem;
    }

    .stat-dashboard-sub {
        font-size: 0.78rem;
        color: #6c757d;
        margin-bottom: 0;
    }

    /* Section Styling */
    .section-eyebrow {
        color: var(--lpm-gold);
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        display: block;
        margin-bottom: 0.5rem;
    }

    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.8rem, 2.5vw, 2.4rem);
        font-weight: 800;
        color: var(--lpm-primary);
        line-height: 1.25;
    }

    .section-divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--lpm-gold), var(--lpm-primary));
        border-radius: 4px;
        margin: 1rem 0 1.75rem;
    }

    .section-divider.center {
        margin-left: auto;
        margin-right: auto;
    }

    /* PPEPP Cycle Cards */
    .ppepp-step-card {
        background: #fff;
        border-radius: 1.25rem;
        padding: 1.5rem 1.25rem;
        border: 1px solid var(--lpm-border);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
        position: relative;
        transition: all 0.3s ease;
        height: 100%;
    }

    .ppepp-step-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(6, 78, 59, 0.12);
        border-color: var(--lpm-gold);
    }

    .ppepp-badge-number {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--lpm-primary);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    /* Quick Service Grid */
    .quick-service-btn {
        background: #fff;
        border: 1px solid var(--lpm-border);
        border-radius: 1rem;
        padding: 1.25rem 1rem;
        text-align: center;
        transition: all 0.25s ease;
        text-decoration: none;
        color: #212529;
        display: block;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .quick-service-btn:hover {
        background: var(--lpm-primary);
        color: #fff !important;
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(6, 78, 59, 0.2);
    }

    .quick-service-btn:hover i {
        color: var(--lpm-gold-light) !important;
    }

    /* CTA Box */
    .cta-lpm {
        background: linear-gradient(135deg, var(--lpm-primary-dark) 0%, var(--lpm-primary) 50%, #0a5240 100%);
        border-radius: 2rem;
        padding: 4rem 2.5rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(6, 78, 59, 0.3);
    }
</style>

{{-- ==============================================
     1. HERO DASHBOARD SECTION (LPM)
=============================================== --}}
<section class="lpm-hero">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="lpm-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>Portal Resmi Penjaminan Mutu Internal (LPM)</span>
                </div>
                <h1 class="text-white">
                    {{ $pageData['title'] ?? 'Pusat Pengawasan Mutu & Akreditasi Berkelanjutan' }}
                </h1>
                <p class="lead">
                    {{ $pageData['tagline'] ?? 'Mengawal siklus mutu Penetapan, Pelaksanaan, Evaluasi, Pengendalian, dan Peningkatan (PPEPP) untuk memastikan seluruh proses Tridharma Perguruan Tinggi memenuhi Standar Nasional Pendidikan Tinggi (SN-Dikti).' }}
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="btn btn-lpm-gold">
                        <i class="bi bi-journal-check"></i>
                        <span>Sistem Dokumen SPMI</span>
                    </a>
                    <a href="{{ route('frontend.lpm.penjaminan', 'ami') }}" class="btn btn-lpm-outline">
                        <i class="bi bi-search"></i>
                        <span>Audit Mutu Internal (AMI)</span>
                    </a>
                    <a href="{{ route('frontend.lpm.pengawasan', 'pedoman') }}" class="btn btn-lpm-outline">
                        <i class="bi bi-file-earmark-ruled"></i>
                        <span>Pedoman Institut</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.06); backdrop-filter: blur(12px); border: 1px solid rgba(251,191,36,0.3);">
                    <div class="p-3 bg-white rounded-circle d-inline-block shadow-lg mb-3">
                        <img src="{{ asset('storage/website/logo/qNo3J9f51iIJFy6rtAy6D5qJ4mWabrh54q1nSmnp.png') }}" alt="Logo Kampus" style="height: 90px; width: auto;" onerror="this.src='{{ asset('template-dashboard/assets/img/logo-ct-dark.png') }}'">
                    </div>
                    <h5 class="text-white fw-bold mb-1">IAI DARUL FALAH</h5>
                    <p class="text-gold mb-0 small fw-bold text-uppercase" style="color: var(--lpm-gold-light);">Lembaga Penjaminan Mutu</p>
                    <hr style="border-color: rgba(255,255,255,0.2);">
                    <div class="d-flex justify-content-around text-start text-white-50 small">
                        <div><i class="bi bi-check2-all text-warning me-1"></i> Standar SN-Dikti</div>
                        <div><i class="bi bi-arrow-repeat text-warning me-1"></i> Siklus PPEPP</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     2. QUICK KPI METRIC CARDS (DASHBOARD STRIP)
=============================================== --}}
<div class="container dashboard-stats-strip">
    <div class="row g-3">
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val1'] ?? 'PPEPP' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label1'] ?? 'Siklus Mutu Aktif' }}</div>
                <p class="stat-dashboard-sub">5 Tahapan Pengendalian Berkelanjutan</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-patch-check-fill"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val2'] ?? '100%' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label2'] ?? 'Prodi Terakreditasi' }}</div>
                <p class="stat-dashboard-sub">Terverifikasi Resmi BAN-PT &amp; LAM</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val3'] ?? '18' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label3'] ?? 'Auditor Internal' }}</div>
                <p class="stat-dashboard-sub">Auditor AMI Bersertifikat Nasional</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-stars"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val4'] ?? '4.62' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label4'] ?? 'Indeks Kepuasan (EDOM)' }}</div>
                <p class="stat-dashboard-sub">Skala 5.00 Survei Mahasiswa &amp; Dosen</p>
            </div>
        </div>
    </div>
</div>

{{-- ==============================================
     3. SIKLUS PPEPP INTERACTIVE WORKFLOW
=============================================== --}}
<section class="py-5 mt-4" style="background: #f2f8f5;">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="section-eyebrow">Siklus Penjaminan Mutu</span>
            <h2 class="section-heading">5 Tahapan PPEPP Berkelanjutan</h2>
            <div class="section-divider center"></div>
            <p class="text-secondary small">
                Pondasi tata kelola mutu IAI Darul Falah yang dijalankan secara konsisten di setiap fakultas, prodi, dan unit kerja.
            </p>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg">
                <div class="ppepp-step-card text-center">
                    <div class="ppepp-badge-number mx-auto">1</div>
                    <h5 class="fw-bold mb-2 text-dark">Penetapan</h5>
                    <p class="small text-secondary mb-0">
                        Penyusunan standar mutu akademik, non-akademik, dan manual mutu SPMI institusi.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg">
                <div class="ppepp-step-card text-center">
                    <div class="ppepp-badge-number mx-auto">2</div>
                    <h5 class="fw-bold mb-2 text-dark">Pelaksanaan</h5>
                    <p class="small text-secondary mb-0">
                        Implementasi seluruh standar dalam proses pembelajaran, riset, dan layanan kemahasiswaan.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg">
                <div class="ppepp-step-card text-center">
                    <div class="ppepp-badge-number mx-auto">3</div>
                    <h5 class="fw-bold mb-2 text-dark">Evaluasi</h5>
                    <p class="small text-secondary mb-0">
                        Audit Mutu Internal (AMI), monitoring perkuliahan (Monev PBM), dan survei kepuasan sivitas.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg">
                <div class="ppepp-step-card text-center">
                    <div class="ppepp-badge-number mx-auto">4</div>
                    <h5 class="fw-bold mb-2 text-dark">Pengendalian</h5>
                    <p class="small text-secondary mb-0">
                        Rapat Tinjauan Manajemen (RTM) dan Rapat Tinjauan Lanjutan (RTL) untuk perbaikan temuan audit.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg">
                <div class="ppepp-step-card text-center">
                    <div class="ppepp-badge-number mx-auto">5</div>
                    <h5 class="fw-bold mb-2 text-dark">Peningkatan</h5>
                    <p class="small text-secondary mb-0">
                        Pembaruan tolok ukur standar mutu secara berkala guna melampaui Standar Nasional SN-Dikti.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     4. KETUA LPM & DUA PILAR STRATEGIS
=============================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-5">
                <div class="stat-dashboard-card text-center p-4">
                    @php
                        $leaderImg = !empty($pageData['leader_image']) && $pageData['leader_image'] !== 'assets/img/user.png'
                            ? asset($pageData['leader_image'])
                            : asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png');
                    @endphp
                    <img src="{{ $leaderImg }}"
                         alt="{{ $pageData['leader_name'] ?? 'Ketua LPM' }}"
                         class="rounded-circle shadow-sm img-thumbnail mb-3"
                         style="width: 140px; height: 140px; object-fit: cover; border: 4px solid var(--lpm-gold);"
                         onerror="this.src='{{ asset('template-dashboard/assets/img/team-3.jpg') }}'">
                    <h4 class="fw-bold mb-1" style="color: var(--lpm-primary);">{{ $pageData['leader_name'] ?? 'Dr. H. Ahmad Syafii, M.Pd.I' }}</h4>
                    <p class="text-muted small mb-3">{{ $pageData['leader_title'] ?? 'Ketua Lembaga Penjaminan Mutu (LPM)' }}</p>
                    <div class="p-3 rounded-3" style="background: var(--lpm-gold-soft); border-left: 3px solid var(--lpm-gold);">
                        <p class="small text-dark fst-italic mb-0">
                            "{{ $pageData['leader_message'] ?? 'Mutu bukanlah sebuah kebetulan, melainkan buah dari komitmen tinggi, kerja cerdas yang terukur, dan kedisiplinan eksekusi di setiap lini.' }}"
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <span class="section-eyebrow">Komitmen Institusi</span>
                <h2 class="section-heading mb-3">Menjaga Standar Akademik &amp; Tata Kelola Berintegritas</h2>
                <div class="section-divider"></div>
                <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                    Lembaga Penjaminan Mutu (LPM) IAI Darul Falah berdedikasi menciptakan ekosistem pembelajaran yang bermutu tinggi, transparan, dan akuntabel. Melalui pengawasan berkala dan audit sistemik, kami memastikan seluruh sivitas akademika bergerak selaras dengan visi institusi menuju universitas Islam terkemuka.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-shield-check text-success me-1"></i> Kepatuhan Regulasi</h6>
                            <p class="small text-muted mb-0">Selaras dengan Permendikbudristek &amp; BAN-PT/LAM.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-warning">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-graph-up-arrow text-warning me-1"></i> Akreditasi Unggul</h6>
                            <p class="small text-muted mb-0">Pendampingan LED dan LKPS secara intensif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dua Bidang Utama LPM --}}
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="section-eyebrow">Struktur Pengelolaan</span>
            <h2 class="section-heading">Dua Pilar Pelayanan LPM</h2>
            <div class="section-divider center"></div>
        </div>

        <div class="row g-4">
            {{-- Pilar 1: Bidang Pengawasan --}}
            <div class="col-lg-6">
                <div class="p-4 rounded-4 border bg-white shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="stat-icon-wrapper mb-0" style="background: rgba(6, 78, 59, 0.1); color: var(--lpm-primary);">
                            <i class="bi bi-clipboard2-check-fill"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0" style="color: var(--lpm-primary);">Bidang Pengawasan</h4>
                            <span class="text-xs text-muted">Monev, Audit Kinerja &amp; Rapat Tinjauan Manajemen</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3">
                        Fokus pada pengawasan kepatuhan standar operasional, monev kinerja dekanat/prodi, serta evaluasi tahunan RTM/RTL.
                    </p>
                    <div class="list-group list-group-flush mb-4 small">
                        <a href="{{ route('frontend.lpm.pengawasan', 'pedoman') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-success me-2"></i>Pedoman &amp; Statuta Institut</span>
                            <span class="badge bg-light text-dark border">Dokumen</span>
                        </a>
                        <a href="{{ route('frontend.lpm.pengawasan', 'monev-kinerja') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-success me-2"></i>Monev Kinerja Pembelajaran (PBM)</span>
                            <span class="badge bg-light text-dark border">Semester</span>
                        </a>
                        <a href="{{ route('frontend.lpm.pengawasan', 'audit-kinerja') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-success me-2"></i>Laporan Audit Kinerja Unit</span>
                            <span class="badge bg-light text-dark border">Tahunan</span>
                        </a>
                        <a href="{{ route('frontend.lpm.pengawasan', 'rtm') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-success me-2"></i>RTM &amp; RTL (Tinjauan Manajemen)</span>
                            <span class="badge bg-light text-dark border">Evaluasi</span>
                        </a>
                    </div>
                    <a href="{{ route('frontend.lpm.pengawasan') }}" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold">
                        Selengkapnya Bidang Pengawasan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            {{-- Pilar 2: Bidang Penjaminan --}}
            <div class="col-lg-6">
                <div class="p-4 rounded-4 border bg-white shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="stat-icon-wrapper mb-0" style="background: var(--lpm-gold-soft); color: var(--lpm-gold);">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0" style="color: var(--lpm-primary);">Bidang Penjaminan</h4>
                            <span class="text-xs text-muted">SPMI, AMI, Akreditasi &amp; Survei Kepuasan</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3">
                        Mengelola perumusan kebijakan mutu, pelaksanaan Audit Mutu Internal (AMI), serta penyusunan instrumen kepuasan sivitas akademika.
                    </p>
                    <div class="list-group list-group-flush mb-4 small">
                        <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-warning me-2"></i>Sistem SPMI &amp; Manual Standar Mutu</span>
                            <span class="badge bg-light text-dark border">24 Standar</span>
                        </a>
                        <a href="{{ route('frontend.lpm.penjaminan', 'ami') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-warning me-2"></i>Audit Mutu Internal (AMI) Terjadwal</span>
                            <span class="badge bg-light text-dark border">Instrumen</span>
                        </a>
                        <a href="{{ route('frontend.lpm.penjaminan', 'data-akreditasi') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-warning me-2"></i>Status &amp; Sertifikat Akreditasi BAN-PT</span>
                            <span class="badge bg-light text-dark border">Publik</span>
                        </a>
                        <a href="{{ route('frontend.lpm.penjaminan', 'laporan-kepuasan-gjm') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="bi bi-chevron-right text-warning me-2"></i>Hasil Survei Kepuasan (GJM / GKM)</span>
                            <span class="badge bg-light text-dark border">Laporan</span>
                        </a>
                    </div>
                    <a href="{{ route('frontend.lpm.penjaminan') }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold text-dark">
                        Selengkapnya Bidang Penjaminan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     5. DOKUMEN MUTU & FORMULIR UNDUHAN CEPAT
=============================================== --}}
<section class="py-5" style="background: #f2f8f5;">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <span class="section-eyebrow">Bank Dokumen</span>
                <h2 class="section-heading mb-0">Akses Cepat Dokumen Mutu</h2>
                <div class="section-divider mb-0"></div>
            </div>
            <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="btn btn-sm btn-outline-success fw-bold rounded-pill px-3">
                Semua Dokumen SPMI <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lpm.penjaminan', 'kebijakan-mutu') }}" class="quick-service-btn">
                    <i class="bi bi-journal-text fs-2 text-success mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Kebijakan Mutu</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Buku Pedoman</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="quick-service-btn">
                    <i class="bi bi-file-earmark-check fs-2 text-warning mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Standar SPMI</span>
                    <span class="text-muted" style="font-size: 0.72rem;">24 Standar Dikti</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lpm.penjaminan', 'ami') }}" class="quick-service-btn">
                    <i class="bi bi-ui-checks fs-2 text-primary mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Instrumen AMI</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Audit Internal</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lpm.pengawasan', 'monev-kinerja') }}" class="quick-service-btn">
                    <i class="bi bi-bar-chart-line-fill fs-2 text-info mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Laporan Monev</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Hasil PBM</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lpm.penjaminan', 'laporan-kepuasan-gjm') }}" class="quick-service-btn">
                    <i class="bi bi-emoji-smile fs-2 text-danger mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Survei EDOM</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Evaluasi Dosen</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lpm.penjaminan', 'kalender-mutu') }}" class="quick-service-btn">
                    <i class="bi bi-calendar3 fs-2 text-secondary mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Kalender Mutu</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Agenda Tahunan</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     6. BERITA & PENGUMUMAN LPM
=============================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            {{-- Kolom Pengumuman Mutu --}}
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="section-eyebrow">Informasi Resmi</span>
                        <h3 class="fw-bold mb-0" style="color: var(--lpm-primary);">Pengumuman Penjaminan Mutu</h3>
                    </div>
                    <a href="{{ route('frontend.lpm.pengumuman') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse($announcements as $ann)
                    <div class="p-3 bg-white rounded-3 border shadow-xs d-flex align-items-start gap-3">
                        <div class="p-2.5 rounded-3 text-white text-center" style="background: var(--lpm-primary); min-width: 50px;">
                            <span class="d-block fw-bold fs-6">{{ $ann->created_at->format('d') }}</span>
                            <span class="d-block text-xxs text-uppercase">{{ $ann->created_at->format('M') }}</span>
                        </div>
                        <div>
                            <span class="badge bg-success-subtle text-success text-xxs mb-1">Pengumuman Mutu</span>
                            <h6 class="fw-bold mb-1 text-dark">
                                <a href="{{ route('announcements.show', $ann->slug) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($ann->title, 65) }}
                                </a>
                            </h6>
                            <p class="small text-muted mb-0">
                                {{ Str::limit(strip_tags($ann->content), 85) }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 bg-light rounded-4 text-center text-muted">
                        <i class="bi bi-bell-slash fs-2 d-block mb-2 text-secondary opacity-5"></i>
                        <p class="mb-0 small">Belum ada pengumuman baru dari LPM.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Kolom Berita & Kegiatan LPM --}}
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="section-eyebrow">Publikasi Mutu</span>
                        <h3 class="fw-bold mb-0" style="color: var(--lpm-primary);">Warta &amp; Kegiatan Audit</h3>
                    </div>
                    <a href="{{ route('frontend.lpm.berita') }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 text-dark" style="border-color: var(--lpm-gold);">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse($news as $item)
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="row g-0 align-items-center">
                            @if($item->image)
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid h-100 object-fit-cover" alt="{{ $item->title }}" style="min-height: 110px;">
                            </div>
                            @endif
                            <div class="{{ $item->image ? 'col-8' : 'col-12' }}">
                                <div class="card-body p-3">
                                    <span class="badge bg-light text-dark border text-xxs mb-1">
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                    <h6 class="fw-bold mb-1 text-dark">
                                        <a href="{{ route('frontend.news.show', $item->slug) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($item->title, 55) }}
                                        </a>
                                    </h6>
                                    <p class="small text-muted mb-0">
                                        {{ Str::limit(strip_tags($item->content), 75) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 bg-light rounded-4 text-center text-muted">
                        <i class="bi bi-newspaper fs-2 d-block mb-2 text-secondary opacity-5"></i>
                        <p class="mb-0 small">Belum ada berita kegiatan penjaminan mutu.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     7. CALL TO ACTION (KOTAK SARAN & PENGADUAN MUTU)
=============================================== --}}
<section class="py-5">
    <div class="container">
        <div class="cta-lpm text-center">
            <span class="badge bg-white text-dark mb-3 px-3 py-1.5 text-xs font-weight-bold rounded-pill text-uppercase">
                Layanan Aspirasi Sivitas
            </span>
            <h2 class="display-6 fw-bold text-white mb-3">
                Memiliki Masukan Terkait Kualitas Layanan Kampus?
            </h2>
            <p class="lead text-white-50 mx-auto mb-4" style="max-width: 680px;">
                LPM INDAFA membuka saluran pengaduan dan aspirasi bagi mahasiswa, dosen, dan tendik guna peningkatan mutu akademik yang berkelanjutan.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('frontend.lpm.kontak') }}" class="btn btn-lpm-gold px-4 py-3">
                    <i class="bi bi-chat-left-dots-fill"></i>
                    <span>Kirim Saran &amp; Pengaduan Mutu</span>
                </a>
                <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="btn btn-lpm-outline px-4 py-3">
                    <i class="bi bi-file-earmark-check"></i>
                    <span>Pelajari Dokumen SPMI</span>
                </a>
            </div>
        </div>
    </div>
</section>

@if(!empty($pageData['content']))
{{-- ==============================================
     INFORMASI / KONTEN TAMBAHAN LPM (DARI CMS)
=============================================== --}}
<section class="py-5 bg-white border-top border-bottom">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="section-eyebrow">Informasi Mutu Terkini</span>
            <h2 class="section-heading">{{ $pageData['title'] ?? 'Pengumuman & Dokumen Lembaga' }}</h2>
            <div class="section-divider center"></div>
        </div>
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <div class="rich-cms-content text-secondary" style="font-size: 1.05rem; line-height: 1.85;">
                {!! $pageData['content'] !!}
            </div>
        </div>
    </div>
</section>
@endif
@endsection
