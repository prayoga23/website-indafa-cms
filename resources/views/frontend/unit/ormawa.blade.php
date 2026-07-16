@extends('frontend.layouts.app')

@section('title', 'ORMAWA - Organisasi Mahasiswa | INDAFA')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)), url('{{ (isset($page) && $page->featured_image) ? asset('storage/' . $page->featured_image) : asset('assets/img/carousel-3.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Unit & Lembaga</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ isset($page) ? $page->title : 'Organisasi Mahasiswa' }}</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <!-- Tentang ORMAWA -->
        <div class="row mb-5 align-items-center g-4">
            <div class="col-lg-6">
                <span class="page-section-eyebrow">Tentang ORMAWA</span>
                <h2 class="page-section-title mb-2">Wadah Kreativitas & Kepemimpinan</h2>
                <div class="page-section-divider mb-3"></div>
                @if(isset($page) && trim(strip_tags($page->content)) != '')
                    <div class="text-secondary" style="line-height:1.8;">
                        {!! $page->content !!}
                    </div>
                @else
                    <p class="text-secondary" style="line-height:1.8;">
                        Organisasi Mahasiswa (ORMAWA) merupakan wadah bagi mahasiswa INDAFA untuk
                        mengembangkan potensi diri, kreativitas, dan jiwa kepemimpinan. Melalui berbagai
                        organisasi dan Unit Kegiatan Mahasiswa (UKM), mahasiswa diarahkan untuk menjadi
                        pribadi yang aktif, inovatif, dan berkontribusi bagi masyarakat.
                    </p>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('assets/img/events-1.jpg') }}" alt="Kegiatan ORMAWA" class="w-100"
                         style="height: 340px; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- BEM -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Eksekutif</span>
            <h2 class="page-section-title mb-1">Badan Eksekutif Mahasiswa (BEM)</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="row mb-5 align-items-center g-4">
            <div class="col-lg-8 mx-auto">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-flag"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green mb-2">BEM INDAFA</h5>
                    <p class="text-secondary" style="line-height: 1.8;">
                        BEM INDAFA adalah organisasi eksekutif tertinggi tingkat institut yang berperan sebagai
                        representasi aspirasi mahasiswa, menyelenggarakan kegiatan kemahasiswaan, serta
                        memfasilitasi komunikasi antara mahasiswa dan pimpinan institusi. Program kerja
                        BEM meliputi advokasi, pengembangan minat-bakat, dan kegiatan sosial keagamaan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Unit Kegiatan Mahasiswa -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Komunitas</span>
            <h2 class="page-section-title mb-1">Unit Kegiatan Mahasiswa (UKM)</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-pen"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">UKM Jurnalistik</h5>
                    <p class="small text-secondary">Mengembangkan kemampuan menulis, fotografi, dan media kreatif mahasiswa.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">UKM Dakwah</h5>
                    <p class="small text-secondary">Wadah pengembangan kemampuan dakwah, public speaking, dan syiar Islam.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">UKM Olahraga</h5>
                    <p class="small text-secondary">Menyalurkan bakat olahraga mahasiswa: futsal, badminton, bola voli, dan lainnya.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-music-note-beamed"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">UKM Seni & Budaya</h5>
                    <p class="small text-secondary">Mengembangkan kreativitas seni: kaligrafi, hadroh, rebana, dan kesenian lokal.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-translate"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">UKM Bahasa</h5>
                    <p class="small text-secondary">Peningkatan kemampuan bahasa Arab dan Inggris melalui kursus dan kompetisi.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">UKM PMR / Sosial</h5>
                    <p class="small text-secondary">Kegiatan kemanusiaan, donor darah, bakti sosial, dan tanggap bencana.</p>
                </div>
            </div>
        </div>

        <!-- Galeri Kegiatan -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Dokumentasi</span>
            <h2 class="page-section-title mb-1">Galeri Kegiatan</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="page-gallery-grid">
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/events-1.jpg') }}" alt="Kegiatan 1" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/events-2.jpg') }}" alt="Kegiatan 2" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/events-3.jpg') }}" alt="Kegiatan 3" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
        </div>

    </div>
</section>
@endsection
