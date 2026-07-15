@extends('frontend.layouts.app')

@section('title', $data['name'] . ' - INDAFA Bondowoso')

@section('content')
<!-- Faculty Theme CSS Override -->
<style>
    :root {
        --fac-color: {{ $data['color'] }};
        --fac-gradient: {{ $data['bg_gradient'] }};
    }
    .fac-hero {
        background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.85)),
                    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
        background-size: cover;
        height: 60vh;
        min-height: 400px;
        display: flex;
        align-items: center;
        text-align: center;
        color: #fff;
    }
    .btn-fac {
        background: var(--fac-color);
        color: #fff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-fac:hover {
        background: #fff;
        color: var(--fac-color);
        transform: translateY(-2px);
    }
    .fac-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    .fac-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
</style>

<!-- Hero Section -->
<section class="fac-hero">
    <div class="container mt-5">
        <span class="text-uppercase fw-bold tracking-wider text-warning" style="font-size:0.9rem;">Selamat Datang di</span>
        <h1 class="display-3 fw-bold my-3 text-uppercase">{{ $data['name'] }}</h1>
        <p class="lead mx-auto mb-4" style="max-width:700px;">
            Mencetak sarjana yang unggul, profesional, dan berakhlakul karimah berlandaskan nilai-nilai keislaman.
        </p>
        <a href="#prodi" class="btn btn-fac">Jelajahi Program Studi</a>
    </div>
</section>

<!-- Profil Singkat -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="page-section-eyebrow">Pengantar</span>
                <h2 class="fw-bold mb-3" style="color:var(--fac-color)">Tentang Fakultas</h2>
                <div class="mb-4" style="width:50px; height:3px; background:var(--fac-color)"></div>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    {{ $data['sejarah'] }}
                </p>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-circle icon-circle-primary" style="background:rgba(0,0,0,0.05); color:var(--fac-color)">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Pendidikan Islami</h6>
                                <p class="small text-muted mb-0">Integrasi keilmuan kontemporer dengan nilai-nilai kepesantrenan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-circle icon-circle-primary" style="background:rgba(0,0,0,0.05); color:var(--fac-color)">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Dosen Kompeten</h6>
                                <p class="small text-muted mb-0">Dibimbing oleh tenaga pengajar lulusan universitas ternama.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-card text-center p-4" style="border-top: 4px solid var(--fac-color)">
                    <img src="{{ asset($data['dean_image']) }}" alt="Dekan" class="rounded-circle mb-3 img-thumbnail" style="width:140px; height:140px; object-fit:cover;">
                    <h5 class="fw-bold mb-1" style="color:var(--fac-color)">{{ $data['dean'] }}</h5>
                    <p class="text-muted small mb-3">Dekan {{ $data['name'] }}</p>
                    <p class="small text-secondary italic">"Budaya akademik yang unggul akan melahirkan generasi yang bertakwa, berilmu, dan mandiri."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Studi -->
<section class="py-5" id="prodi">
    <div class="container">
        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Program Akademik</span>
            <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Program Studi Pilihan</h2>
            <div class="page-section-divider mx-auto mt-2" style="background:var(--fac-color)"></div>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($data['prodies'] as $prodi)
                <div class="col-md-6 col-lg-5">
                    <div class="card fac-card h-100 p-4">
                        <div class="card-body d-flex flex-column">
                            <div class="icon-circle mb-3" style="background:rgba(0,0,0,0.05); color:var(--fac-color)">
                                <i class="bi bi-book-half fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-2">{{ $prodi['name'] }}</h4>
                            <p class="text-secondary small mb-4 flex-grow-1" style="line-height:1.7;">
                                {{ $prodi['desc'] }}
                            </p>
                            <div>
                                <a href="{{ route('frontend.prodi.index', $prodi['slug']) }}" class="btn btn-fac w-100 text-center">
                                    Kunjungi Website Prodi <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
