@extends('frontend.layouts.app')

@section('title', 'LP2M - Lembaga Penelitian & Pengabdian Masyarakat | INDAFA')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)), url('{{ (isset($page) && $page->featured_image) ? asset('storage/' . $page->featured_image) : asset('assets/img/carousel-3.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Unit & Lembaga</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ isset($page) ? $page->title : 'LP2M' }}</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <!-- Tentang LP2M -->
        <div class="row mb-5 align-items-center g-4">
            <div class="col-lg-6">
                <span class="page-section-eyebrow">Tentang LP2M</span>
                <h2 class="page-section-title mb-2">Penelitian & Pengabdian Masyarakat</h2>
                <div class="page-section-divider mb-3"></div>
                @if(isset($page) && trim(strip_tags($page->content)) != '')
                    <div class="text-secondary" style="line-height:1.8;">
                        {!! $page->content !!}
                    </div>
                @else
                    <p class="text-secondary" style="line-height:1.8;">
                        Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M) INDAFA Bondowoso
                        merupakan unit yang mengelola, mengoordinasikan, dan memfasilitasi kegiatan penelitian
                        serta pengabdian kepada masyarakat yang dilakukan oleh dosen dan mahasiswa.
                    </p>
                    <p class="text-secondary" style="line-height:1.8;">
                        LP2M berperan penting dalam mendorong inovasi dan kontribusi nyata institusi
                        bagi pembangunan masyarakat, khususnya di bidang kajian keislaman dan pemberdayaan umat.
                    </p>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('assets/img/carousel-1.jpg') }}" alt="Kegiatan LP2M" class="w-100"
                         style="height: 340px; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- Program Utama -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Program</span>
            <h2 class="page-section-title mb-1">Program Utama LP2M</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-journal-richtext"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Penelitian Dosen</h5>
                    <p class="small text-secondary">Program hibah penelitian internal untuk dosen dalam mengembangkan keilmuan berbasis keislaman.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-house-heart"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pengabdian Masyarakat</h5>
                    <p class="small text-secondary">Program pemberdayaan masyarakat melalui pelatihan, pendampingan, dan penyuluhan keagamaan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">KKN Tematik</h5>
                    <p class="small text-secondary">Kuliah Kerja Nyata (KKN) tematik untuk mahasiswa sebagai bentuk pengabdian langsung ke masyarakat.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-book"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Publikasi Ilmiah</h5>
                    <p class="small text-secondary">Fasilitasi publikasi artikel ilmiah dosen di jurnal nasional terakreditasi dan internasional.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-building-gear"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Kerjasama Institusi</h5>
                    <p class="small text-secondary">Membangun kemitraan dengan perguruan tinggi, lembaga riset, dan komunitas lokal maupun internasional.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Seminar & Workshop</h5>
                    <p class="small text-secondary">Penyelenggaraan seminar, workshop, dan konferensi ilmiah untuk meningkatkan kapasitas riset.</p>
                </div>
            </div>
        </div>

        <!-- Pimpinan -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Struktur</span>
            <h2 class="page-section-title mb-1">Pimpinan LP2M</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="leader-card">
                    <div class="leader-card-img">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Ketua LP2M">
                    </div>
                    <div class="leader-card-body">
                        <h5>Dr. Muhammad Ridwan, M.H.I</h5>
                        <p>Ketua LP2M</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="leader-card">
                    <div class="leader-card-img">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Kabag Penelitian">
                    </div>
                    <div class="leader-card-body">
                        <h5>Ustadz Fathul Amin, M.Pd.</h5>
                        <p>Kepala Bagian Penelitian</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="leader-card">
                    <div class="leader-card-img">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Kabag PKM">
                    </div>
                    <div class="leader-card-body">
                        <h5>Ustadzah Siti Maryam, M.A.</h5>
                        <p>Kepala Bagian Pengabdian</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
