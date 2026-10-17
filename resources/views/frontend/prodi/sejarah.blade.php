@extends('frontend.layouts.app')

@section('title', 'Sejarah - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Profil</h5>
        <h1 class="display-4 fw-bold text-uppercase">Sejarah Program Studi</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    @php
        $histImg = !empty($data['sejarah_image'])
            ? (\Illuminate\Support\Str::startsWith($data['sejarah_image'], ['http://', 'https://']) ? $data['sejarah_image'] : asset('storage/' . $data['sejarah_image']))
            : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&auto=format&fit=crop';
    @endphp

    <div class="container py-3">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
              
                <h2 class="page-section-title mb-2" style="color:var(--pro-color)">Perjalanan Kami</h2>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    {{ $data['sejarah'] }}
                </p>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    Kami terus bertransformasi seiring perkembangan ipteks dengan terus bersandar pada nilai-nilai tradisi keislaman. Berbagai sarana dan prasarana penunjang praktikum mahasiswa terus disempurnakan demi menjamin mutu lulusan yang berkompeten secara teori dan piawai secara praktik.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ $histImg }}" alt="Sejarah {{ $data['name'] }}" class="w-100" style="height:350px; object-fit:cover;">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
