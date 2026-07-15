@extends('frontend.layouts.app')

@section('title', 'Visi & Misi - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Profil</h5>
        <h1 class="display-4 fw-bold text-uppercase">Visi & Misi</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--pro-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="info-card text-center p-5" style="border-top: 4px solid var(--pro-color)">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                        <i class="bi bi-eye-fill fs-3"></i>
                    </div>
                    <h3 class="fw-bold mb-3" style="color:var(--pro-color)">VISI PROGRAM STUDI</h3>
                    <p class="lead text-secondary mx-auto" style="max-width:800px; line-height:1.8;">
                        "{{ $data['visi'] }}"
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="info-card p-5" style="border-top: 4px solid var(--pro-color)">
                    <div class="d-flex align-items-center gap-3 mb-4 justify-content-center">
                        <div class="icon-circle icon-circle-gold" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                            <i class="bi bi-bullseye fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-0" style="color:var(--pro-color)">MISI PROGRAM STUDI</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <ol class="list-group list-group-numbered list-group-flush text-secondary" style="line-height:2;">
                                @foreach($data['misi'] as $misiItem)
                                    <li class="list-group-item bg-transparent border-0 py-2 fs-5" style="color:#555;">{{ $misiItem }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
