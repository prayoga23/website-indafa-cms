@extends('frontend.layouts.app')

@section('title', 'LPM - Lembaga Penjaminan Mutu | INDAFA')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penjaminan Mutu</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">{{ isset($page) ? $page->title : 'Lembaga Penjaminan Mutu' }}</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <!-- Tentang LPM -->
        <div class="row mb-5 align-items-center g-4">
            <div class="col-lg-6">
                <span class="page-section-eyebrow">Tentang LPM</span>
                <h2 class="page-section-title mb-2">Menjamin Mutu Pendidikan Tinggi</h2>
                <div class="page-section-divider mb-3"></div>
                @if(isset($page) && trim(strip_tags($page->content)) != '')
                    <div class="text-secondary" style="line-height:1.8;">
                        {!! $page->content !!}
                    </div>
                @else
                    <p class="text-secondary" style="line-height:1.8;">
                        Lembaga Penjaminan Mutu (LPM) INDAFA Bondowoso bertanggung jawab dalam menyelenggarakan
                        Sistem Penjaminan Mutu Internal (SPMI) yang mencakup penetapan standar, pelaksanaan,
                        evaluasi, pengendalian, dan peningkatan mutu pendidikan tinggi secara berkelanjutan.
                    </p>
                    <p class="text-secondary" style="line-height:1.8;">
                        LPM menjadi motor penggerak budaya mutu di seluruh unit kerja dan program studi,
                        dengan tujuan utama mewujudkan institusi pendidikan Islam yang berkualitas dan berdaya saing.
                    </p>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Kegiatan LPM" class="w-100"
                         style="height: 340px; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- Visi & Misi LPM -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="info-card h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="icon-circle icon-circle-primary">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h4 class="fw-bold text-dark-green mb-0">Visi LPM</h4>
                    </div>
                    <p class="text-secondary" style="line-height: 1.8;">
                        Menjadi lembaga penjaminan mutu yang profesional, terpercaya, dan Islami dalam rangka
                        mendukung terwujudnya INDAFA sebagai institusi pendidikan Islam yang bermutu dan berdaya saing.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="icon-circle icon-circle-gold">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h4 class="fw-bold text-dark-green mb-0">Misi LPM</h4>
                    </div>
                    <ul class="text-secondary" style="line-height: 2;">
                        <li>Mengembangkan dan menerapkan Sistem Penjaminan Mutu Internal (SPMI)</li>
                        <li>Melaksanakan audit mutu internal secara berkala</li>
                        <li>Mendampingi program studi dalam persiapan akreditasi</li>
                        <li>Membangun budaya mutu di seluruh civitas akademika</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tugas & Fungsi -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Peran</span>
            <h2 class="page-section-title mb-1">Tugas & Fungsi</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Penetapan Standar</h5>
                    <p class="small text-secondary">Menyusun dan menetapkan standar mutu pendidikan, penelitian, dan pengabdian masyarakat.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-search"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Audit Internal</h5>
                    <p class="small text-secondary">Melaksanakan audit mutu internal secara berkala untuk memastikan kepatuhan terhadap standar.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Peningkatan Mutu</h5>
                    <p class="small text-secondary">Memberikan rekomendasi perbaikan berkelanjutan berdasarkan hasil evaluasi dan monitoring.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-award"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pendampingan Akreditasi</h5>
                    <p class="small text-secondary">Mendampingi program studi dan institusi dalam proses akreditasi nasional (BAN-PT).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pelatihan SDM</h5>
                    <p class="small text-secondary">Menyelenggarakan workshop dan pelatihan peningkatan kapasitas dosen dan tenaga kependidikan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-database-check"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pengelolaan Data</h5>
                    <p class="small text-secondary">Mengelola data dan dokumen mutu sebagai basis pengambilan keputusan strategis.</p>
                </div>
            </div>
        </div>

        <!-- Pimpinan -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Struktur</span>
            <h2 class="page-section-title mb-1">Pimpinan LPM</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="leader-card">
                    <div class="leader-card-img">
                        <img src="{{ asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png') }}" alt="Ketua LPM">
                    </div>
                    <div class="leader-card-body">
                        <h5>Dr. H. Ahmad Syafii, M.Pd.I</h5>
                        <p>Ketua LPM</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="leader-card">
                    <div class="leader-card-img">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Sekretaris LPM">
                    </div>
                    <div class="leader-card-body">
                        <h5>Ustadzah Nuriyah, M.A.</h5>
                        <p>Sekretaris LPM</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
