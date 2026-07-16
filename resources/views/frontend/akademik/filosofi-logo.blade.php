@extends('frontend.layouts.app')

@section('title', 'Filosofi Logo | INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)), url('{{ (isset($page) && $page->featured_image) ? asset('storage/' . $page->featured_image) : asset('assets/img/carousel-3.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Akademik</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ isset($page) ? $page->title : 'Filosofi Logo' }}</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-5 text-center">
                <div class="bg-white p-4 rounded-4 shadow-sm inline-block">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo INDAFA" class="img-fluid" style="max-height: 280px; width: auto;">
                </div>
            </div>
            <div class="col-lg-7">
                <span class="page-section-eyebrow">Identitas Utama</span>
                <h2 class="page-section-title mb-2">Makna Lambang INDAFA</h2>
                <div class="page-section-divider mb-4"></div>
                @if(isset($page) && trim(strip_tags($page->content)) != '')
                    <div class="text-secondary" style="line-height:1.8; text-align:justify;">
                        {!! $page->content !!}
                    </div>
                @else
                    <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                        Lambang Institut Agama Islam Darul Falah (INDAFA) Bondowoso melambangkan komitmen luhur lembaga dalam mewujudkan integrasi ilmu pengetahuan, keluhuran akhlak, dan pengabdian tanpa batas bagi umat. Setiap elemen dalam logo ini dirancang dengan penuh makna filosofis keislaman dan keilmuan.
                    </p>
                @endif
            </div>
        </div>

        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Simbolisme</span>
            <h2 class="page-section-title">Arti Elemen Logo</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="info-card">
                    <div class="icon-circle icon-circle-primary mb-3">
                        <i class="bi bi-book"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Kitab Terbuka</h5>
                    <p class="small text-secondary mb-0">Melambangkan sumber keilmuan yang luas, keterbukaan pikiran, serta kewajiban menuntut ilmu sepanjang hayat.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card">
                    <div class="icon-circle icon-circle-gold mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pilar Kubah</h5>
                    <p class="small text-secondary mb-0">Menggambarkan kokohnya tiang-tiang agama Islam (Rukun Islam) dan tradisi kepesantrenan yang menaungi.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card">
                    <div class="icon-circle icon-circle-primary mb-3">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Warna Hijau & Emas</h5>
                    <p class="small text-secondary mb-0">Warna hijau melambangkan kesuburan, kedamaian, dan nilai keislaman. Warna emas melambangkan kemuliaan, kejayaan akademik, dan keagungan budi pekerti.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
