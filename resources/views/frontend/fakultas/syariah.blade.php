@extends('frontend.layouts.app')

@section('title', 'Dashboard Fakultas Ilmu Syariah (FASYA) - INDAFA Bondowoso')

@section('content')
{{-- ==============================================
     THEME VARIABLES & CUSTOM DASHBOARD STYLES
=============================================== --}}
<style>
    :root {
        --syariah-primary: #7a1515;
        --syariah-primary-dark: #490c0c;
        --syariah-primary-light: #9e1f1f;
        --syariah-gold: #c28b26;
        --syariah-gold-light: #e5b34e;
        --syariah-gold-soft: rgba(194, 139, 38, 0.12);
        --syariah-dark-bg: #1c0606;
        --syariah-surface: #ffffff;
        --syariah-surface-soft: #fcf9f9;
        --syariah-border: rgba(122, 21, 21, 0.12);
    }

    /* Hero Section */
    .syariah-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(73, 12, 12, 0.94) 0%, rgba(28, 6, 6, 0.92) 100%),
                    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
        min-height: 560px;
        display: flex;
        align-items: center;
        padding: 130px 0 80px;
        color: #fff;
        overflow: hidden;
    }

    .syariah-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 80% 20%, rgba(194, 139, 38, 0.25) 0%, transparent 60%);
        pointer-events: none;
    }

    .syariah-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(194, 139, 38, 0.2);
        border: 1px solid rgba(229, 179, 78, 0.4);
        backdrop-filter: blur(8px);
        color: var(--syariah-gold-light);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 0.45rem 1.25rem;
        border-radius: 50px;
        margin-bottom: 1.25rem;
    }

    .syariah-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.3rem, 4.5vw, 3.8rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.02em;
        margin-bottom: 1.25rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }

    .syariah-hero .lead {
        font-size: clamp(1rem, 1.3vw, 1.2rem);
        color: rgba(255, 255, 255, 0.88);
        max-width: 720px;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    /* Buttons */
    .btn-syariah-gold {
        background: linear-gradient(135deg, var(--syariah-gold-light) 0%, var(--syariah-gold) 100%);
        color: #2a0808 !important;
        font-weight: 700;
        border: none;
        padding: 0.85rem 2rem;
        border-radius: 50px;
        box-shadow: 0 10px 25px rgba(194, 139, 38, 0.35);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-syariah-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(194, 139, 38, 0.5);
        background: #fff;
        color: var(--syariah-primary) !important;
    }

    .btn-syariah-outline {
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

    .btn-syariah-outline:hover {
        background: #fff;
        color: var(--syariah-primary) !important;
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
        box-shadow: 0 15px 35px rgba(73, 12, 12, 0.08);
        border: 1px solid var(--syariah-border);
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
        background: linear-gradient(90deg, var(--syariah-primary), var(--syariah-gold));
        opacity: 0;
        transition: opacity 0.3s;
    }

    .stat-dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(73, 12, 12, 0.14);
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
        background: var(--syariah-gold-soft);
        color: var(--syariah-primary);
    }

    .stat-dashboard-number {
        font-size: 2.1rem;
        font-weight: 800;
        color: var(--syariah-primary);
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
        color: var(--syariah-gold);
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
        color: var(--syariah-primary);
        line-height: 1.25;
    }

    .section-divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--syariah-gold), var(--syariah-primary));
        border-radius: 4px;
        margin: 1rem 0 1.75rem;
    }

    .section-divider.center {
        margin-left: auto;
        margin-right: auto;
    }

    /* Dean Bento Card */
    .dean-card {
        background: #fff;
        border-radius: 1.5rem;
        border: 1px solid var(--syariah-border);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .dean-img-container {
        position: relative;
        overflow: hidden;
        border-radius: 1.25rem;
    }

    .dean-quote-badge {
        background: var(--syariah-gold-soft);
        border-left: 4px solid var(--syariah-gold);
        padding: 1rem 1.25rem;
        border-radius: 0 0.75rem 0.75rem 0;
        font-style: italic;
        color: #333;
    }

    /* Prodi Cards */
    .prodi-dashboard-card {
        background: #fff;
        border-radius: 1.5rem;
        border: 1px solid rgba(122, 21, 21, 0.12);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        padding: 2.25rem 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.35s ease;
        position: relative;
    }

    .prodi-dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(122, 21, 21, 0.15);
        border-color: var(--syariah-gold);
    }

    .prodi-tag {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 0.35rem 0.9rem;
        border-radius: 50px;
        background: var(--syariah-gold-soft);
        color: var(--syariah-gold);
        display: inline-block;
        margin-bottom: 1rem;
    }

    /* Feature Lab Cards */
    .lab-card {
        background: var(--syariah-surface-soft);
        border: 1px solid var(--syariah-border);
        border-radius: 1.25rem;
        padding: 1.75rem 1.5rem;
        transition: all 0.3s ease;
        height: 100%;
    }

    .lab-card:hover {
        background: #fff;
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(122, 21, 21, 0.1);
        border-color: var(--syariah-primary);
    }

    .lab-icon {
        width: 52px;
        height: 52px;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, var(--syariah-primary) 0%, var(--syariah-primary-dark) 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
    }

    /* Quick Service Grid */
    .quick-service-btn {
        background: #fff;
        border: 1px solid var(--syariah-border);
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
        background: var(--syariah-primary);
        color: #fff !important;
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(122, 21, 21, 0.2);
    }

    .quick-service-btn:hover i {
        color: var(--syariah-gold-light) !important;
    }

    /* CTA Box */
    .cta-syariah {
        background: linear-gradient(135deg, var(--syariah-primary-dark) 0%, var(--syariah-primary) 50%, #5c1010 100%);
        border-radius: 2rem;
        padding: 4rem 2.5rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(73, 12, 12, 0.3);
    }
</style>

{{-- ==============================================
     1. HERO DASHBOARD SECTION
=============================================== --}}
<section class="syariah-hero">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="syariah-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>Portal Resmi Fakultas Ilmu Syariah (FASYA)</span>
                </div>
                <h1 class="text-white">
                    {{ $data['name'] ?? 'Pusat Keunggulan Hukum Islam & Muamalah Kontemporer' }}
                </h1>
                <p class="lead">
                    {{ $data['hero_tagline'] ?? 'Mengintegrasikan khazanah fikih Islam klasik, hukum nasional, dan praktik regulasi bisnis modern berlandaskan adab kepesantrenan untuk mencetak yuris andal berkelas nasional.' }}
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#prodi-section" class="btn btn-syariah-gold">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Pilihan Program Studi</span>
                    </a>
                    <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'dokumen']) }}" class="btn btn-syariah-outline">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Layanan Akademik</span>
                    </a>
                    <a href="{{ route('frontend.fakultas.kontak', 'syariah') }}" class="btn btn-syariah-outline">
                        <i class="bi bi-telephone-inbound"></i>
                        <span>Kontak Fakultas</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.06); backdrop-filter: blur(12px); border: 1px solid rgba(229,179,78,0.3);">
                    <div class="p-3 bg-white rounded-circle d-inline-block shadow-lg mb-3">
                        <img src="{{ asset('storage/website/logo/qNo3J9f51iIJFy6rtAy6D5qJ4mWabrh54q1nSmnp.png') }}" alt="Logo Kampus" style="height: 90px; width: auto;" onerror="this.src='{{ asset('template-dashboard/assets/img/logo-ct-dark.png') }}'">
                    </div>
                    <h5 class="text-white fw-bold mb-1">IAI DARUL FALAH</h5>
                    <p class="text-gold mb-0 small fw-bold text-uppercase" style="color: var(--syariah-gold-light);">Fakultas Ilmu Syariah</p>
                    <hr style="border-color: rgba(255,255,255,0.2);">
                    <div class="d-flex justify-content-around text-start text-white-50 small">
                        <div><i class="bi bi-geo-alt-fill text-warning me-1"></i> Bondowoso</div>
                        <div><i class="bi bi-patch-check-fill text-warning me-1"></i> Terakreditasi</div>
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
                    <i class="bi bi-mortarboard"></i>
                </div>
                <div class="stat-dashboard-number">{{ $data['stats']['prodi'] ?? '2' }}</div>
                <div class="stat-dashboard-label">{{ $data['stats_labels']['prodi'] ?? 'Program Studi Sarjana' }}</div>
                <p class="stat-dashboard-sub">S1 HKI &amp; S1 Hukum Ekonomi Syariah</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-dashboard-number">{{ $data['stats']['dosen'] ?? '28+' }}</div>
                <div class="stat-dashboard-label">{{ $data['stats_labels']['dosen'] ?? 'Dosen &amp; Pakar Hukum' }}</div>
                <p class="stat-dashboard-sub">Magister, Doktor &amp; Praktisi Peradilan</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-patch-check-fill"></i>
                </div>
                <div class="stat-dashboard-number">{{ $data['stats']['akreditasi'] ?? 'Baik Sekali' }}</div>
                <div class="stat-dashboard-label">{{ $data['stats_labels']['akreditasi'] ?? 'Akreditasi BAN-PT' }}</div>
                <p class="stat-dashboard-sub">Standar Mutu Nasional Terverifikasi</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-dashboard-card">
                <div class="stat-icon-wrapper">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
                <div class="stat-dashboard-number">{{ $data['stats']['serapan'] ?? '96%' }}</div>
                <div class="stat-dashboard-label">{{ $data['stats_labels']['serapan'] ?? 'Serapan Lulusan' }}</div>
                <p class="stat-dashboard-sub">Pengadilan, KUA, Bank Syariah &amp; Firma</p>
            </div>
        </div>
    </div>
</div>

{{-- ==============================================
     3. DEAN EXECUTIVE MESSAGE & VISI MISI BENTO
=============================================== --}}
<section class="py-5 mt-4">
    <div class="container py-3">
        <div class="row g-4 align-items-stretch">
            {{-- Profil Dekan --}}
            <div class="col-lg-5">
                <div class="dean-card p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                @php
                                    $deanPhoto = !empty($data['dean_image']) && $data['dean_image'] !== 'assets/img/user.png'
                                        ? asset($data['dean_image'])
                                        : asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png');
                                @endphp
                                <img src="{{ $deanPhoto }}"
                                     alt="Dekan Fakultas Syariah"
                                     class="rounded-circle shadow-sm img-thumbnail"
                                     style="width: 150px; height: 150px; object-fit: cover; border: 4px solid var(--syariah-gold);"
                                     onerror="this.src='{{ asset('template-dashboard/assets/img/bruce-mars.jpg') }}'">
                                <span class="badge position-absolute bottom-0 end-0 rounded-pill p-2" style="background: var(--syariah-primary); color: #fff;">
                                    <i class="bi bi-check2-circle"></i>
                                </span>
                            </div>
                            <h4 class="fw-bold mt-3 mb-1" style="color: var(--syariah-primary);">{{ $data['dean'] ?? 'Dr. H. Abu Bakar, M.H.I.' }}</h4>
                            <p class="text-muted small mb-0 fw-semibold">{{ $data['dean_title'] ?? 'Dekan Fakultas Ilmu Syariah (FASYA)' }}</p>
                        </div>
                        <div class="dean-quote-badge mb-3">
                            <p class="mb-0 small">
                                "{{ $data['dean_message'] ?? 'Menegakkan hukum dengan keadilan dan ruh syariat menuntut kecakapan intelektual, ketajaman hati nurani, serta loyalitas penuh kepada kebenaran.' }}"
                            </p>
                        </div>
                        <p class="text-secondary small" style="line-height: 1.7; text-align: justify;">
                            Fakultas Syariah membekali para mahasiswa dengan penguasaan Fiqh-Ushul Fiqh mendalam yang dikontekstualisasikan ke dalam sistem hukum positif Indonesia dan regulasi perbankan syariah global.
                        </p>
                    </div>
                    <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                        <span class="text-xs text-muted">Periode Kepemimpinan 2024–2028</span>
                        <a href="{{ route('frontend.fakultas.pimpinan', 'syariah') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold" style="border-color: var(--syariah-primary); color: var(--syariah-primary);">
                            Struktur Pimpinan <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Visi Misi & Pilar Fakultas --}}
            <div class="col-lg-7">
                <div class="p-4 p-md-5 bg-white rounded-4 border h-100 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <span class="section-eyebrow">Arah Kebijakan</span>
                        <h2 class="section-heading mb-2">Visi &amp; Misi Fakultas Syariah</h2>
                        <div class="section-divider"></div>
                        <div class="p-3 mb-4 rounded-3" style="background: var(--syariah-surface-soft); border-left: 4px solid var(--syariah-primary);">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-compass-fill me-2" style="color: var(--syariah-primary);"></i>Visi Utama 2030</h6>
                            <p class="small text-secondary mb-0">
                                {{ $data['visi'] ?? 'Menjadi Fakultas Syariah yang unggul, kompetitif, dan bereputasi nasional dalam pengembangan keilmuan syariah dan hukum Islam kontemporer yang berlandaskan nilai-nilai kepesantrenan pada tahun 2030.' }}
                            </p>
                        </div>

                        <h6 class="fw-bold text-dark mb-3">Pilar Misi Strategis:</h6>
                        <div class="row g-3">
                            @foreach($data['misi'] as $idx => $m)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2 p-2.5 rounded-3 bg-light h-100">
                                    <div class="badge rounded-circle p-2 mt-1" style="background: var(--syariah-primary); color: #fff;">
                                        0{{ $idx + 1 }}
                                    </div>
                                    <p class="small text-secondary mb-0" style="line-height: 1.5;">
                                        {{ $m }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-top d-flex gap-3 flex-wrap">
                        <a href="{{ route('frontend.fakultas.visi-misi', 'syariah') }}" class="btn btn-sm text-white fw-bold rounded-pill px-4" style="background: var(--syariah-primary);">
                            Selengkapnya Visi &amp; Misi
                        </a>
                        <a href="{{ route('frontend.fakultas.sejarah', 'syariah') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-4">
                            Sejarah Fakultas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     4. PROGRAM STUDI PILIHAN (INTERACTIVE SHOWCASE)
=============================================== --}}
<section class="py-5" id="prodi-section" style="background: #fbf7f7;">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="section-eyebrow">Pendidikan Akademik</span>
            <h2 class="section-heading">Program Studi Unggulan</h2>
            <div class="section-divider center"></div>
            <p class="text-secondary small">
                Dirancang khusus dengan kurikulum berbasis Outcome-Based Education (OBE) dan integrasi keilmuan fiqh muamalah aplikatif.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($data['prodies'] as $prodi)
            <div class="col-lg-6">
                <div class="prodi-dashboard-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="prodi-tag">
                            <i class="bi bi-patch-check-fill me-1"></i> {{ $prodi['akreditasi'] ?? 'Terakreditasi BAN-PT' }}
                        </div>
                        <span class="badge bg-dark text-white rounded-pill px-3 py-1.5 text-xs font-weight-bold">
                            {{ $prodi['jenjang'] ?? 'Jenjang S1' }}
                        </span>
                    </div>

                    <h3 class="fw-bold mb-2" style="color: var(--syariah-primary); font-size: 1.55rem;">
                        {{ $prodi['name'] }}
                    </h3>

                    <p class="text-secondary small mb-3 flex-grow-1" style="line-height: 1.7;">
                        {{ $prodi['desc'] }}
                    </p>

                    <div class="p-3 rounded-3 mb-4" style="background: var(--syariah-surface-soft); border-left: 3px solid var(--syariah-gold);">
                        <strong class="d-block text-xs text-uppercase text-dark mb-1">
                            <i class="bi bi-star-fill text-warning me-1"></i> Prospek Karir Utama:
                        </strong>
                        <span class="text-xs text-muted">
                            {{ $prodi['prospek'] ?? 'Hakim, Advokat, Legal Officer Bank Syariah, Konsultan Muamalah.' }}
                        </span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('frontend.prodi.index', $prodi['slug']) }}" class="btn btn-syariah-gold w-100 justify-content-center">
                            <span>Masuk Portal Prodi {{ strtoupper($prodi['slug']) }}</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==============================================
     5. LABORATORIUM & SENTRA KEUNGGULAN FASYA
=============================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="section-eyebrow">Fasilitas &amp; Praktik</span>
            <h2 class="section-heading">Laboratorium &amp; Sentra Unggulan</h2>
            <div class="section-divider center"></div>
            <p class="text-secondary small">
                Menunjang penguasaan keterampilan litigasi, riset astronomi Islam, dan mediasi sengketa secara nyata.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="bi bi-bank"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--syariah-primary);">Peradilan Semu (Moot Court)</h5>
                    <p class="small text-secondary mb-0">
                        Ruang simulasi persidangan lengkap dengan toga, meja majelis hakim, panitera, dan saksi untuk melatih kemahiran litigasi perdata Islam.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--syariah-primary);">Klinik Konsultasi Syariah</h5>
                    <p class="small text-secondary mb-0">
                        Pusat layanan advokasi dan konsultasi hukum keluarga sakinah, hukum waris Islam (faraidh), serta audit kepatuhan muamalah bagi warga.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="bi bi-moon-stars-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--syariah-primary);">Laboratorium Falakiyah</h5>
                    <p class="small text-secondary mb-0">
                        Fasilitas teleskop digital dan hisab rukyatul hilal untuk penentuan awal bulan kamariah, arah kiblat masjid, serta jadwal waktu salat.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="bi bi-shield-shaded"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--syariah-primary);">LBH Syariah Darul Falah</h5>
                    <p class="small text-secondary mb-0">
                        Lembaga Bantuan Hukum untuk pendampingan probono masyarakat rentan sekaligus wadah magang advokasi mahasiswa tingkat akhir.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     6. PORTAL LAYANAN AKADEMIK & PERSURATAN CEPAT
=============================================== --}}
<section class="py-5" style="background: #fbf7f7;">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <span class="section-eyebrow">One-Stop Services</span>
                <h2 class="section-heading mb-0">Layanan Digital Mahasiswa</h2>
                <div class="section-divider mb-0"></div>
            </div>
            <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'dokumen']) }}" class="btn btn-sm btn-outline-danger fw-bold rounded-pill px-3" style="color: var(--syariah-primary); border-color: var(--syariah-primary);">
                Semua Layanan Akademik <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'turnitin']) }}" class="quick-service-btn">
                    <i class="bi bi-file-earmark-check fs-2 text-danger mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Cek Turnitin</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Uji Plagiarisme</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'persuratan']) }}" class="quick-service-btn">
                    <i class="bi bi-envelope-paper-fill fs-2 text-warning mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Persuratan</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Izin Riset &amp; Aktif</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'kalender']) }}" class="quick-service-btn">
                    <i class="bi bi-calendar-event-fill fs-2 text-primary mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Kalender</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Jadwal Semester</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'jadwal']) }}" class="quick-service-btn">
                    <i class="bi bi-clock-history fs-2 text-success mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Jadwal Kuliah</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Ruang &amp; Dosen</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'kelulusan']) }}" class="quick-service-btn">
                    <i class="bi bi-award-fill fs-2 text-info mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Alur Kelulusan</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Sidang &amp; Yudisium</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('frontend.fakultas.akademik', ['syariah', 'akreditasi']) }}" class="quick-service-btn">
                    <i class="bi bi-patch-check-fill fs-2 text-secondary mb-2 d-block"></i>
                    <span class="fw-bold small d-block">Sertifikat</span>
                    <span class="text-muted" style="font-size: 0.72rem;">Akreditasi BAN-PT</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     7. BERITA & PENGUMUMAN TERBARU
=============================================== --}}
<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            {{-- Kolom Berita --}}
            <div class="col-lg-7">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="section-eyebrow">Kabar Kampus</span>
                        <h3 class="fw-bold mb-0" style="color: var(--syariah-primary);">Warta &amp; Berita Fakultas</h3>
                    </div>
                    <a href="{{ route('frontend.fakultas.berita', 'syariah') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        Semua Berita <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="row g-3">
                    @forelse($news as $item)
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 180px; object-fit: cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 180px;">
                                    <i class="bi bi-newspaper fs-1 text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body p-3 d-flex flex-column">
                                <span class="badge mb-2 text-xxs align-self-start" style="background: var(--syariah-gold-soft); color: var(--syariah-gold);">
                                    {{ $item->category->name ?? 'Akademik Syariah' }}
                                </span>
                                <h6 class="fw-bold mb-2">
                                    <a href="{{ route('frontend.news.show', $item->slug) }}" class="text-dark text-decoration-none">
                                        {{ Str::limit($item->title, 55) }}
                                    </a>
                                </h6>
                                <p class="text-secondary small mb-3 flex-grow-1">
                                    {{ Str::limit(strip_tags($item->content), 80) }}
                                </p>
                                <div class="text-xs text-muted border-top pt-2 d-flex justify-content-between">
                                    <span><i class="bi bi-calendar3 me-1"></i>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->isoFormat('D MMMM Y') : $item->created_at->isoFormat('D MMMM Y') }}</span>
                                    <a href="{{ route('frontend.news.show', $item->slug) }}" class="fw-bold" style="color: var(--syariah-primary);">Baca</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="p-4 bg-light rounded-4 text-center text-muted">
                            <i class="bi bi-newspaper fs-2 d-block mb-2 text-secondary opacity-5"></i>
                            <p class="mb-0 small">Belum ada berita yang dipublikasikan khusus Fakultas Syariah.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Kolom Pengumuman & Agenda --}}
            <div class="col-lg-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="section-eyebrow">Info Resmi</span>
                        <h3 class="fw-bold mb-0" style="color: var(--syariah-primary);">Pengumuman</h3>
                    </div>
                    <a href="{{ route('frontend.fakultas.pengumuman', 'syariah') }}" class="btn btn-sm btn-outline-warning rounded-pill px-3" style="color: var(--syariah-gold); border-color: var(--syariah-gold);">
                        Semua Info <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse($announcements as $ann)
                    <div class="p-3 bg-white rounded-3 border shadow-xs d-flex align-items-start gap-3">
                        <div class="p-2.5 rounded-3 text-white text-center" style="background: var(--syariah-primary); min-width: 50px;">
                            <span class="d-block fw-bold fs-6">{{ $ann->created_at->format('d') }}</span>
                            <span class="d-block text-xxs text-uppercase">{{ $ann->created_at->format('M') }}</span>
                        </div>
                        <div>
                            <span class="badge bg-light text-danger text-xxs mb-1 border">Pengumuman Penting</span>
                            <h6 class="fw-bold mb-1 text-dark">
                                <a href="{{ route('announcements.show', $ann->slug) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($ann->title, 60) }}
                                </a>
                            </h6>
                            <p class="small text-muted mb-0">
                                {{ Str::limit(strip_tags($ann->content), 75) }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 bg-light rounded-4 text-center text-muted">
                        <i class="bi bi-bell-slash fs-2 d-block mb-2 text-secondary opacity-5"></i>
                        <p class="mb-0 small">Tidak ada pengumuman baru saat ini.</p>
                    </div>
                    @endforelse

                    {{-- Agenda Tambahan --}}
                    @if(isset($agendas) && count($agendas) > 0)
                    <div class="mt-2 p-3 rounded-4" style="background: var(--syariah-surface-soft); border: 1px dashed var(--syariah-gold);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fw-bold text-xs text-uppercase" style="color: var(--syariah-primary);">
                                <i class="bi bi-calendar-event me-1"></i> Agenda Akademik Terdekat
                            </span>
                            <span class="badge bg-warning text-dark text-xxs">Terjadwal</span>
                        </div>
                        @foreach($agendas as $agenda)
                        <div class="d-flex align-items-center justify-content-between py-1.5 border-bottom border-light">
                            <span class="small text-dark fw-semibold text-truncate" style="max-width: 220px;">
                                {{ $agenda->title }}
                            </span>
                            <span class="text-xxs text-muted">
                                {{ \Carbon\Carbon::parse($agenda->event_date)->isoFormat('D MMM Y') }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==============================================
     8. CALL TO ACTION (PMB & KONSULTASI)
=============================================== --}}
<section class="py-5">
    <div class="container">
        <div class="cta-syariah text-center">
            <span class="badge bg-white text-dark mb-3 px-3 py-1.5 text-xs font-weight-bold rounded-pill text-uppercase">
                Penerimaan Mahasiswa Baru
            </span>
            <h2 class="display-6 fw-bold text-white mb-3">
                Siap Menjadi Sarjana Hukum Islam yang Unggul &amp; Amanah?
            </h2>
            <p class="lead text-white-50 mx-auto mb-4" style="max-width: 680px;">
                Daftarkan diri Anda di Fakultas Ilmu Syariah IAI Darul Falah. Tersedia beasiswa prestasi, jalur tahfidz, dan program kemitraan peradilan.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('frontend.akademik.pmb') }}" class="btn btn-syariah-gold px-4 py-3">
                    <i class="bi bi-pencil-square"></i>
                    <span>Daftar Mahasiswa Baru Sekarang</span>
                </a>
                <a href="{{ route('frontend.fakultas.kontak', 'syariah') }}" class="btn btn-syariah-outline px-4 py-3">
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Konsultasi Jurusan Syariah</span>
                </a>
            </div>
        </div>
    </div>
</section>

@if(!empty($data['additional_content']))
{{-- ==============================================
     INFORMASI / KONTEN TAMBAHAN FAKULTAS (CMS)
=============================================== --}}
<section class="py-5 bg-white border-top border-bottom">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="section-eyebrow">Informasi Terkini</span>
            <h2 class="section-heading">{{ $data['name'] ?? 'Fakultas Ilmu Syariah' }}</h2>
            <div class="section-divider center"></div>
        </div>
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <div class="rich-cms-content text-secondary" style="font-size: 1.05rem; line-height: 1.85;">
                {!! $data['additional_content'] !!}
            </div>
        </div>
    </div>
</section>
@endif
@endsection
