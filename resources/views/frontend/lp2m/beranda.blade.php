@extends('frontend.layouts.app')

@section('title', 'Dashboard Lembaga Penelitian & Pengabdian Masyarakat (LP2M) - INDAFA Bondowoso')

@section('content')
{{-- ==============================================
     THEME VARIABLES & CUSTOM DASHBOARD STYLES (LP2M)
=============================================== --}}
<style>
    :root {
        --lp2m-primary: #103b60;
        --lp2m-primary-dark: #071e33;
        --lp2m-primary-light: #185a94;
        --lp2m-teal: #0d5c75;
        --lp2m-gold: #d97706;
        --lp2m-gold-light: #fbbf24;
        --lp2m-gold-soft: rgba(217, 119, 6, 0.12);
        --lp2m-surface: #ffffff;
        --lp2m-surface-soft: #f2f7fb;
        --lp2m-border: rgba(16, 59, 96, 0.12);
    }

    /* Hero Section */
    .lp2m-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(7, 30, 51, 0.95) 0%, rgba(16, 59, 96, 0.90) 100%),
                    url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') center/cover no-repeat;
        min-height: 560px;
        display: flex;
        align-items: center;
        padding: 130px 0 80px;
        color: #fff;
        overflow: hidden;
    }

    .lp2m-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 80% 20%, rgba(251, 191, 36, 0.22) 0%, transparent 60%);
        pointer-events: none;
    }

    .lp2m-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(217, 119, 6, 0.25);
        border: 1px solid rgba(251, 191, 36, 0.45);
        backdrop-filter: blur(8px);
        color: var(--lp2m-gold-light);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 0.45rem 1.25rem;
        border-radius: 50px;
        margin-bottom: 1.25rem;
    }

    .lp2m-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.3rem, 4.5vw, 3.8rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.02em;
        margin-bottom: 1.25rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }

    .lp2m-hero .lead {
        font-size: clamp(1rem, 1.3vw, 1.2rem);
        color: rgba(255, 255, 255, 0.88);
        max-width: 740px;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    /* Buttons */
    .btn-lp2m-gold {
        background: linear-gradient(135deg, var(--lp2m-gold-light) 0%, var(--lp2m-gold) 100%);
        color: #071e33 !important;
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

    .btn-lp2m-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(217, 119, 6, 0.5);
        background: #fff;
        color: var(--lp2m-primary) !important;
    }

    .btn-lp2m-outline {
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

    .btn-lp2m-outline:hover {
        background: #fff;
        color: var(--lp2m-primary) !important;
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
        box-shadow: 0 15px 35px rgba(16, 59, 96, 0.08);
        border: 1px solid var(--lp2m-border);
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
        background: linear-gradient(90deg, var(--lp2m-primary), var(--lp2m-gold));
        opacity: 0;
        transition: opacity 0.3s;
    }

    .stat-dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(16, 59, 96, 0.14);
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
        background: var(--lp2m-gold-soft);
        color: var(--lp2m-primary);
    }

    .stat-dashboard-number {
        font-size: 2.1rem;
        font-weight: 800;
        color: var(--lp2m-primary);
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
        color: var(--lp2m-gold);
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
        color: var(--lp2m-primary);
        line-height: 1.25;
    }

    .section-divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--lp2m-gold), var(--lp2m-primary));
        border-radius: 4px;
        margin: 1rem 0 1.75rem;
    }

    .section-divider.center {
        margin-left: auto;
        margin-right: auto;
    }

    /* Pillars Cards */
    .pillar-dashboard-card {
        background: #fff;
        border-radius: 1.5rem;
        border: 1px solid var(--lp2m-border);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        padding: 2.25rem 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.35s ease;
        position: relative;
    }

    .pillar-dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(16, 59, 96, 0.15);
        border-color: var(--lp2m-gold);
    }

    /* Quick Service Grid */
    .quick-service-btn {
        background: #fff;
        border: 1px solid var(--lp2m-border);
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
        background: var(--lp2m-primary);
        color: #fff !important;
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(16, 59, 96, 0.2);
    }

    .quick-service-btn:hover i {
        color: var(--lp2m-gold-light) !important;
    }

    /* CTA Box */
    .cta-lp2m {
        background: linear-gradient(135deg, var(--lp2m-primary-dark) 0%, var(--lp2m-primary) 50%, var(--lp2m-teal) 100%);
        border-radius: 2rem;
        padding: 4rem 2.5rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(7, 30, 51, 0.35);
    }
</style>

{{-- ==============================================
     1. HERO DASHBOARD SECTION (LP2M)
=============================================== --}}
<section class="lp2m-hero">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="lp2m-badge">
                    <i class="bi bi-lightbulb-fill"></i>
                    <span>Portal Resmi Riset &amp; Pengabdian Masyarakat (LP2M)</span>
                </div>
                <h1 class="text-white">
                    {{ $pageData['title'] ?? 'Pusat Hilirisasi Riset & Pengabdian Berbasis Pesantren' }}
                </h1>
                <p class="lead">
                    {{ $pageData['tagline'] ?? 'Mengakselerasi publikasi ilmiah bereputasi, pengembangan sentra HKI, fasilitasi hibah Litapdimas Kemenag, serta pemberdayaan masyarakat desa berkelanjutan.' }}
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('frontend.lp2m.riset', 'penelitian') }}" class="btn btn-lp2m-gold">
                        <i class="bi bi-journal-text"></i>
                        <span>Portal Riset Litapdimas</span>
                    </a>
                    <a href="{{ route('frontend.lp2m.riset', 'jurnal') }}" class="btn btn-lp2m-outline">
                        <i class="bi bi-book-half"></i>
                        <span>Rumah Jurnal INDAFA</span>
                    </a>
                    <a href="{{ route('frontend.lp2m.pusat', 'pengabdian') }}" class="btn btn-lp2m-outline">
                        <i class="bi bi-people-fill"></i>
                        <span>Program KKN Tematik</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.06); backdrop-filter: blur(12px); border: 1px solid rgba(251,191,36,0.3);">
                    <div class="p-3 bg-white rounded-circle d-inline-block shadow-lg mb-3">
                        <img src="{{ asset('storage/website/logo/qNo3J9f51iIJFy6rtAy6D5qJ4mWabrh54q1nSmnp.png') }}" alt="Logo Kampus" style="height: 90px; width: auto;" onerror="this.src='{{ asset('template-dashboard/assets/img/logo-ct-dark.png') }}'">
                    </div>
                    <h5 class="text-white fw-bold mb-1">IAI DARUL FALAH</h5>
                    <p class="text-gold mb-0 small fw-bold text-uppercase" style="color: var(--lp2m-gold-light);">Lembaga Penelitian &amp; Pengabdian (LP2M)</p>
                    <hr style="border-color: rgba(255,255,255,0.2);">
                    <div class="d-flex justify-content-around text-start text-white-50 small">
                        <div><i class="bi bi-journal-bookmark-fill text-warning me-1"></i> E-Journal OJS</div>
                        <div><i class="bi bi-shield-check text-warning me-1"></i> Sentra HKI</div>
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
                    <i class="bi bi-journal-code"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val1'] ?? '65+' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label1'] ?? 'Judul Riset Ilmiah' }}</div>
                <p class="stat-dashboard-sub">Litapdimas Kemenag &amp; Hibah Internal</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-book-half"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val2'] ?? '4' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label2'] ?? 'Jurnal OJS Aktif' }}</div>
                <p class="stat-dashboard-sub">Terindeks Nasional SINTA &amp; Moraref</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-patch-check-fill"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val3'] ?? '42+' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label3'] ?? 'Sertifikat HKI &amp; Paten' }}</div>
                <p class="stat-dashboard-sub">Terdaftar Resmi di Ditjen KI Kemenkumham</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div class="stat-dashboard-number">{{ $pageData['stats']['val4'] ?? '25+' }}</div>
                <div class="stat-dashboard-label">{{ $pageData['stats']['label4'] ?? 'Desa Binaan KKN' }}</div>
                <p class="stat-dashboard-sub">Pemberdayaan Posdaya Berbasis Pesantren</p>
            </div>
        </div>
    </div>
</div>

{{-- ==============================================
     3. KETUA LP2M & VISI STRATEGIS
=============================================== --}}
<section class="py-5 mt-4">
    <div class="container py-3">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <div class="stat-dashboard-card text-center p-4">
                    @php
                        $leaderImg = !empty($pageData['leader_image']) && $pageData['leader_image'] !== 'assets/img/user.png'
                            ? asset($pageData['leader_image'])
                            : asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png');
                    @endphp
                    <img src="{{ $leaderImg }}"
                         alt="{{ $pageData['leader_name'] ?? 'Ketua LP2M' }}"
                         class="rounded-circle shadow-sm img-thumbnail mb-3"
                         style="width: 140px; height: 140px; object-fit: cover; border: 4px solid var(--lp2m-gold);"
                         onerror="this.src='{{ asset('template-dashboard/assets/img/team-3.jpg') }}'">
                    <h4 class="fw-bold mb-1" style="color: var(--lp2m-primary);">{{ $pageData['leader_name'] ?? 'Dr. Muhammad Ridwan, M.H.I' }}</h4>
                    <p class="text-muted small mb-3">{{ $pageData['leader_title'] ?? 'Ketua LP2M IAI Darul Falah' }}</p>
                    <div class="p-3 rounded-3" style="background: var(--lp2m-gold-soft); border-left: 3px solid var(--lp2m-gold);">
                        <p class="small text-dark fst-italic mb-0">
                            "{{ $pageData['leader_message'] ?? 'Riset yang bermakna adalah penelitian yang membumi, menjawab persoalan nyata masyarakat, serta mengantarkan kejayaan peradaban Islam dan iptek kontemporer.' }}"
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <span class="section-eyebrow">Arah Kebijakan</span>
                <h2 class="section-heading mb-3">Mendorong Ekosistem Riset Transdisipliner &amp; Pengabdian Keumatan</h2>
                <div class="section-divider"></div>
                <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                    LP2M mengkoordinasikan kegiatan riset ilmiah, penerbitan jurnal bereputasi, pendaftaran hak kekayaan intelektual (HKI), dan program Kuliah Kerja Nyata (KKN) Tematik. Kami terus memfasilitasi para dosen dan mahasiswa untuk menerbitkan publikasi di jurnal SINTA/Scopus serta melakukan aksi nyata pengabdian di tengah masyarakat.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-award-fill text-primary me-1"></i> Hibah Litapdimas</h6>
                            <p class="small text-muted mb-0">Pendanaan penelitian terstruktur Kemenag RI.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-warning">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-flower1 text-warning me-1"></i> Desa Binaan</h6>
                            <p class="small text-muted mb-0">Pengembangan ekonomi umat dan literasi syariah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     4. 4 PILAR UTAMA LAYANAN LP2M
=============================================== --}}
<section class="py-5" style="background: #f2f7fb;">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="section-eyebrow">Layanan Strategis</span>
            <h2 class="section-heading">4 Pilar Pengelolaan LP2M</h2>
            <div class="section-divider center"></div>
            <p class="text-secondary small">
                Ekosistem terintegrasi dari hulu hingga hilir: perencanaan riset, publikasi jurnal, fasilitasi paten HKI, hingga pengabdian langsung di desa.
            </p>
        </div>

        <div class="row g-4">
            {{-- Pilar 1: Pusat Riset Litapdimas --}}
            <div class="col-md-6 col-lg-3">
                <div class="pillar-dashboard-card">
                    <div class="stat-icon-wrapper mb-3" style="background: rgba(16, 59, 96, 0.1); color: var(--lp2m-primary);">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--lp2m-primary);">Pusat Penelitian</h5>
                    <p class="small text-secondary mb-3 flex-grow-1">
                        Klinik penulisan proposal, monitoring hibah penelitian kompetitif Kemenag, dan pembentukan cluster riset integrasi Islam-Iptek.
                    </p>
                    <a href="{{ route('frontend.lp2m.riset', 'penelitian') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold w-100" style="border-color: var(--lp2m-primary); color: var(--lp2m-primary);">
                        Portal Litapdimas <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- Pilar 2: Pusat Pengabdian Masyarakat --}}
            <div class="col-md-6 col-lg-3">
                <div class="pillar-dashboard-card">
                    <div class="stat-icon-wrapper mb-3" style="background: var(--lp2m-gold-soft); color: var(--lp2m-gold);">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--lp2m-primary);">Pengabdian (KKN)</h5>
                    <p class="small text-secondary mb-3 flex-grow-1">
                        Penyelenggaraan KKN Tematik posdaya pesantren, penyuluhan hukum keluarga sakinah, dan pendampingan sertifikasi halal UMKM.
                    </p>
                    <a href="{{ route('frontend.lp2m.pusat', 'pengabdian') }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold w-100 text-dark" style="border-color: var(--lp2m-gold);">
                        KKN Tematik <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- Pilar 3: Rumah Jurnal INDAFA --}}
            <div class="col-md-6 col-lg-3">
                <div class="pillar-dashboard-card">
                    <div class="stat-icon-wrapper mb-3" style="background: rgba(13, 92, 117, 0.1); color: var(--lp2m-teal);">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--lp2m-primary);">Rumah Jurnal OJS</h5>
                    <p class="small text-secondary mb-3 flex-grow-1">
                        Pengelolaan 4 E-Journal berkala ilmiah terakreditasi SINTA bidang hukum Islam, ekonomi syariah, dan kependidikan (JRCE).
                    </p>
                    <a href="{{ route('frontend.lp2m.riset', 'jurnal') }}" class="btn btn-sm btn-outline-info rounded-pill px-3 fw-bold w-100 text-dark">
                        E-Journal OJS <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- Pilar 4: Sentra HKI & Publikasi --}}
            <div class="col-md-6 col-lg-3">
                <div class="pillar-dashboard-card">
                    <div class="stat-icon-wrapper mb-3" style="background: rgba(30, 58, 138, 0.1); color: #1e3a8a;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--lp2m-primary);">Sentra HKI &amp; Paten</h5>
                    <p class="small text-secondary mb-3 flex-grow-1">
                        Layanan pendaftaran hak cipta buku, modul ajar, aplikasi, dan paten karya ilmiah dosen &amp; mahasiswa ke Ditjen KI Kemenkumham.
                    </p>
                    <a href="{{ route('frontend.lp2m.riset', 'hki') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-bold w-100">
                        Layanan HKI <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     5. AKSES LAYANAN & UNDUHAN PEDOMAN CEPAT
=============================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <span class="section-eyebrow">Dokumen &amp; Template</span>
                <h2 class="section-heading mb-0">Akses Cepat Layanan Riset &amp; Pengabdian</h2>
                <div class="section-divider mb-0"></div>
            </div>
            <a href="{{ route('frontend.lp2m.layanan', 'panduan-pedoman') }}" class="btn btn-sm btn-outline-primary fw-bold rounded-pill px-3" style="color: var(--lp2m-primary); border-color: var(--lp2m-primary);">
                Semua Pedoman &amp; Template <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lp2m.layanan', 'panduan-pedoman') }}" class="quick-service-btn">
                    <i class="bi bi-file-earmark-code-fill fs-2 text-primary mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Proposal Riset</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Template Litapdimas</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lp2m.pusat', 'pengabdian') }}" class="quick-service-btn">
                    <i class="bi bi-book fs-2 text-warning mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Buku Saku KKN</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Panduan Tematik</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lp2m.riset', 'hki') }}" class="quick-service-btn">
                    <i class="bi bi-shield-lock-fill fs-2 text-success mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Form HKI</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Pendaftaran Hak Cipta</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lp2m.riset', 'jurnal') }}" class="quick-service-btn">
                    <i class="bi bi-journal-check fs-2 text-info mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Template Jurnal</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Format OJS SINTA</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lp2m.layanan', 'surat-online') }}" class="quick-service-btn">
                    <i class="bi bi-envelope-check-fill fs-2 text-danger mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Surat Online</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Izin Pengabdian</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.lp2m.layanan', 'sop') }}" class="quick-service-btn">
                    <i class="bi bi-gear-wide-connected fs-2 text-secondary mb-2 d-block"></i>
                    <span class="fw-bold small d-block">SOP Layanan</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Standar Pelayanan</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     6. BERITA, CALL FOR PAPERS & PENGUMUMAN LP2M
=============================================== --}}
<section class="py-5" style="background: #f2f7fb;">
    <div class="container py-3">
        <div class="row g-4">
            {{-- Kolom Pengumuman Riset --}}
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="section-eyebrow">Informasi Hibah</span>
                        <h3 class="fw-bold mb-0" style="color: var(--lp2m-primary);">Pengumuman &amp; Call for Papers</h3>
                    </div>
                    <a href="{{ route('frontend.lp2m.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse($announcements as $ann)
                    <div class="p-3 bg-white rounded-3 border shadow-xs d-flex align-items-start gap-3">
                        <div class="p-2.5 rounded-3 text-white text-center" style="background: var(--lp2m-primary); min-width: 50px;">
                            <span class="d-block fw-bold fs-6">{{ $ann->created_at->format('d') }}</span>
                            <span class="d-block text-xxs text-uppercase">{{ $ann->created_at->format('M') }}</span>
                        </div>
                        <div>
                            <span class="badge bg-primary-subtle text-primary text-xxs mb-1">Riset &amp; Pengabdian</span>
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
                    <div class="p-4 bg-white rounded-4 text-center text-muted">
                        <i class="bi bi-bell-slash fs-2 d-block mb-2 text-secondary opacity-5"></i>
                        <p class="mb-0 small">Belum ada pengumuman hibah atau call for papers baru.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Kolom Berita Publikasi & KKN --}}
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="section-eyebrow">Hilirisasi Riset</span>
                        <h3 class="fw-bold mb-0" style="color: var(--lp2m-primary);">Warta Penelitian &amp; KKN</h3>
                    </div>
                    <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 text-dark" style="border-color: var(--lp2m-gold);">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse($news as $item)
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
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
                                        <a href="{{ route('news.show', $item->slug) }}" class="text-dark text-decoration-none">
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
                    <div class="p-4 bg-white rounded-4 text-center text-muted">
                        <i class="bi bi-newspaper fs-2 d-block mb-2 text-secondary opacity-5"></i>
                        <p class="mb-0 small">Belum ada berita publikasi riset dan pengabdian.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     7. CALL TO ACTION (KOLABORASI RISET & KKN)
=============================================== --}}
<section class="py-5">
    <div class="container">
        <div class="cta-lp2m text-center">
            <span class="badge bg-white text-dark mb-3 px-3 py-1.5 text-xs font-weight-bold rounded-pill text-uppercase">
                Sinergi Kemitraan &amp; CSR
            </span>
            <h2 class="display-6 fw-bold text-white mb-3">
                Mari Berkolaborasi dalam Riset &amp; Pemberdayaan Masyarakat
            </h2>
            <p class="lead text-white-50 mx-auto mb-4" style="max-width: 680px;">
                LP2M IAI Darul Falah membuka pintu kemitraan bagi instansi pemerintah, BUMN, perbankan syariah, dan lembaga sosial untuk riset kolaboratif dan program bina desa.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('frontend.lp2m.kontak') }}" class="btn btn-lp2m-gold px-4 py-3">
                    <i class="bi bi-handshake-fill"></i>
                    <span>Ajukan Kerjasama Riset &amp; Pengabdian</span>
                </a>
                <a href="{{ route('frontend.lp2m.riset', 'penelitian') }}" class="btn btn-lp2m-outline px-4 py-3">
                    <i class="bi bi-journal-bookmark"></i>
                    <span>Informasi Penelitian Litapdimas</span>
                </a>
            </div>
        </div>
    </div>
</section>

@if(!empty($pageData['content']))
{{-- ==============================================
     INFORMASI / KONTEN TAMBAHAN LP2M (DARI CMS)
=============================================== --}}
<section class="py-5 bg-white border-top border-bottom">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="section-eyebrow">Informasi Riset &amp; Pengabdian</span>
            <h2 class="section-heading">{{ $pageData['title'] ?? 'Pengumuman & Program LP2M' }}</h2>
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
