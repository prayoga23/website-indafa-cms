@extends('frontend.layouts.app')

@section('title', 'Pimpinan - ' . $data['name'])

@section('content')
<style>
    :root {
        --fac-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Profil</h5>
        <h1 class="display-4 fw-bold text-uppercase">Pimpinan Fakultas</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--fac-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Struktur Organisasi</span>
            <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Dekanat Fakultas</h2>
            <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Dekan -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="leader-card p-3" style="border-top: 3px solid var(--fac-color)">
                    <div class="leader-card-img rounded-3 overflow-hidden" style="height:250px;">
                        <img src="{{ asset($data['dean_image']) }}" alt="Dekan" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div class="leader-card-body text-center mt-3">
                        <h5 class="fw-bold mb-1" style="color:var(--fac-color)">{{ $data['dean'] }}</h5>
                        <p class="text-muted small">Dekan Fakultas</p>
                    </div>
                </div>
            </div>

            <!-- Wakil Dekan -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="leader-card p-3" style="border-top: 3px solid var(--fac-color)">
                    <div class="leader-card-img rounded-3 overflow-hidden" style="height:250px;">
                        <img src="{{ asset('assets/img/user.png') }}" alt="Wakil Dekan" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div class="leader-card-body text-center mt-3">
                        <h5 class="fw-bold mb-1" style="color:var(--fac-color)">Drs. H. Mahrus, M.A.</h5>
                        <p class="text-muted small">Wakil Dekan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
