@extends('frontend.layouts.app')

@section('title', 'Prestasi Mahasiswa | INDAFA Bondowoso')

@section('content')
<section class="page-hero">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Akademik</h5>
        <h1 class="display-4 fw-bold text-uppercase">Prestasi Mahasiswa</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Kebanggaan Kampus</span>
            <h2 class="page-section-title">Puncak Penghargaan Mahasiswa</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="achievement-card">
                    <div class="achievement-thumb">
                        <img src="{{ asset('assets/img/events-1.jpg') }}" alt="Juara 1 Debat">
                    </div>
                    <div class="achievement-body p-4">
                        <span class="badge bg-gold mb-2"><i class="bi bi-trophy-fill"></i> Juara 1</span>
                        <h5 class="fw-bold text-dark-green">Lomba Debat Hukum Islam Tingkat Jawa Timur</h5>
                        <p class="small text-secondary mb-0"><i class="bi bi-person-circle"></i> Ahmad Fauzi & Tim (Hukum Keluarga Islam)</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="achievement-card">
                    <div class="achievement-thumb">
                        <img src="{{ asset('assets/img/events-2.jpg') }}" alt="Juara 2 Paper">
                    </div>
                    <div class="achievement-body p-4">
                        <span class="badge bg-gold mb-2"><i class="bi bi-trophy-fill"></i> Juara 2</span>
                        <h5 class="fw-bold text-dark-green">Islamic Paper Competition Tingkat Nasional</h5>
                        <p class="small text-secondary mb-0"><i class="bi bi-person-circle"></i> Siti Nurhaliza (Ekonomi Syariah)</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="achievement-card">
                    <div class="achievement-thumb">
                        <img src="{{ asset('assets/img/events-3.jpg') }}" alt="Juara 3 MTQ">
                    </div>
                    <div class="achievement-body p-4">
                        <span class="badge bg-gold mb-2"><i class="bi bi-trophy-fill"></i> Juara 3</span>
                        <h5 class="fw-bold text-dark-green">Musabaqah Tilawatil Qur'an Nasional 2025</h5>
                        <p class="small text-secondary mb-0"><i class="bi bi-person-circle"></i> Muhammad Rizki (Pendidikan Agama Islam)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
