@extends('frontend.layouts.app')

@section('title', 'Program Studi ' . $data['name'] . ' - INDAFA Bondowoso')

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
        --pro-gradient: {{ $data['bg_gradient'] }};
    }
    .pro-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)),
                    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
        background-size: cover;
        height: 60vh;
        min-height: 400px;
        display: flex;
        align-items: center;
        text-align: center;
        color: #fff;
    }
    .btn-pro {
        background: var(--pro-color);
        color: #fff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-pro:hover {
        background: #fff;
        color: var(--pro-color);
        transform: translateY(-2px);
    }
</style>

<!-- Hero Section -->
<section class="pro-hero">
    <div class="container mt-5">
        <span class="text-uppercase fw-bold tracking-wider text-warning" style="font-size:0.9rem;">Program Studi</span>
        <h1 class="display-4 fw-bold my-3 text-uppercase">{{ $data['name'] }}</h1>
        <p class="lead mx-auto mb-4" style="max-width:700px;">
            Mencetak alumni yang kompeten dan professional di bidangnya dengan dilandasi nilai keislaman yang kuat.
        </p>
        <a href="#tentang" class="btn btn-pro">Selengkapnya</a>
    </div>
</section>

<!-- Tentang Prodi -->
<section class="py-5 bg-light" id="tentang">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="page-section-eyebrow">Profil Singkat</span>
                <h2 class="fw-bold mb-3" style="color:var(--pro-color)">Mengenal Program Studi</h2>
                <div class="mb-4" style="width:50px; height:3px; background:var(--pro-color)"></div>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    {{ $data['sejarah'] }}
                </p>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-circle" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Kurikulum Mutakhir</h6>
                                <p class="small text-muted mb-0">Integrasi keilmuan yang responsif terhadap dunia kerja digital.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-circle" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                                <i class="bi bi-person-fill-check"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Karier Cemerlang</h6>
                                <p class="small text-muted mb-0">Peluang kerja luas di sektor perbankan, peradilan, dan pendidikan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-card text-center p-4" style="border-top: 4px solid var(--pro-color)">
                    <img src="{{ asset('assets/img/user.png') }}" alt="Kaprodi" class="rounded-circle mb-3 img-thumbnail" style="width:140px; height:140px; object-fit:cover;">
                    <h5 class="fw-bold mb-1" style="color:var(--pro-color)">{{ $data['head'] }}</h5>
                    <p class="text-muted small mb-3">Ketua Program Studi</p>
                    <p class="small text-secondary italic">"Komitmen kami adalah mendidik dan mendampingi mahasiswa agar siap berkontribusi bagi nusa, bangsa, dan agama."</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
