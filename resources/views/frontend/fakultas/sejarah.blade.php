@extends('frontend.layouts.app')

@section('title', 'Sejarah - ' . $data['name'])

@section('content')
<style>
    :root {
        --fac-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Profil</h5>
        <h1 class="display-4 fw-bold text-uppercase">Sejarah Fakultas</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--fac-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="page-section-eyebrow">Lintas Waktu</span>
                <h2 class="page-section-title mb-2" style="color:var(--fac-color)">Perjalanan Akademik Kami</h2>
                <div class="page-section-divider mb-4" style="background-color: var(--fac-color)"></div>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    {{ $data['sejarah'] }}
                </p>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    Sejak pendiriannya, fakultas ini telah berkomitmen mencetak alumni yang berkontribusi nyata
                    dalam lingkup praktis dan teoretis. Kurikulum dikembangkan secara dinamis dengan memadukan 
                    khazanah keislaman klasik yang bersumber dari kitab-kitab muktabar dan perkembangan ilmu 
                    serta teknologi modern.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=600&auto=format&fit=crop" alt="Sejarah" class="w-100" style="height:350px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
