@extends('frontend.layouts.app')

@section('title', 'Pimpinan - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Profil</h5>
        <h1 class="display-4 fw-bold text-uppercase">Pimpinan Program Studi</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        @php
            $headPhoto = !empty($data['head_photo'])
                ? (\Illuminate\Support\Str::startsWith($data['head_photo'], ['http://', 'https://']) ? $data['head_photo'] : asset('storage/' . $data['head_photo']))
                : asset('assets/img/user.png');

            $secPhoto = !empty($data['secretary_photo'])
                ? (\Illuminate\Support\Str::startsWith($data['secretary_photo'], ['http://', 'https://']) ? $data['secretary_photo'] : asset('storage/' . $data['secretary_photo']))
                : asset('assets/img/user.png');
        @endphp

        <div class="row g-4 justify-content-center">
            <!-- Kaprodi -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="leader-card p-3" style="border-top: 3px solid var(--pro-color)">
                    <div class="leader-card-img rounded-3 overflow-hidden" style="height:250px;">
                        <img src="{{ $headPhoto }}" alt="Kaprodi" style="width:100%; height:100%; object-fit:cover;" onerror="this.src='{{ asset('assets/img/user.png') }}'">
                    </div>
                    <div class="leader-card-body text-center mt-3">
                        <h5 class="fw-bold mb-1" style="color:var(--pro-color)">{{ $data['head'] }}</h5>
                        <p class="text-muted small">{{ $data['head_title'] ?? 'Ketua Program Studi' }}</p>
                    </div>
                </div>
            </div>

            <!-- Sekprodi -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="leader-card p-3" style="border-top: 3px solid var(--pro-color)">
                    <div class="leader-card-img rounded-3 overflow-hidden" style="height:250px;">
                        <img src="{{ $secPhoto }}" alt="Sekprodi" style="width:100%; height:100%; object-fit:cover;" onerror="this.src='{{ asset('assets/img/user.png') }}'">
                    </div>
                    <div class="leader-card-body text-center mt-3">
                        <h5 class="fw-bold mb-1" style="color:var(--pro-color)">{{ $data['secretary_name'] ?? 'Ustadz Rahmat Hidayat, M.A.' }}</h5>
                        <p class="text-muted small">Sekretaris Program Studi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
