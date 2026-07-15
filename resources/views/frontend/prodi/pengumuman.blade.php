@extends('frontend.layouts.app')

@section('title', 'Pengumuman - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Papan Informasi</h5>
        <h1 class="display-4 fw-bold text-uppercase">Pengumuman</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--pro-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6">
                <div class="info-card p-4 border-0 shadow-sm" style="border-left: 5px solid var(--pro-color) !important;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-gold rounded-pill px-3 py-1.5 small" style="background-color:#cca43b !important;"><i class="bi bi-calendar3"></i> 10 Juli 2026</span>
                        <span class="text-muted small fw-bold text-uppercase">PRODI</span>
                    </div>
                    <h5 class="fw-bold mb-2 text-dark-green">Batas Akhir Pengumpulan Revisi Skripsi Mahasiswa Tingkat Akhir</h5>
                    <p class="text-secondary small mb-3">Diberitahukan kepada mahasiswa program studi {{ $data['name'] }} yang telah melangsungkan ujian munaqasyah...</p>
                    <a href="#" class="btn btn-sm text-white" style="background-color: var(--pro-color); border-radius:50px;">Selengkapnya</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6">
                <div class="info-card p-4 border-0 shadow-sm" style="border-left: 5px solid var(--pro-color) !important;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-gold rounded-pill px-3 py-1.5 small" style="background-color:#cca43b !important;"><i class="bi bi-calendar3"></i> 05 Juli 2026</span>
                        <span class="text-muted small fw-bold text-uppercase">PRODI</span>
                    </div>
                    <h5 class="fw-bold mb-2 text-dark-green">Kuliah Tamu Literasi Keuangan Syariah & Era Digitalisasi</h5>
                    <p class="text-secondary small mb-3">Program studi {{ $data['name'] }} akan menyelenggarakan kuliah tamu wajib secara hybrid...</p>
                    <a href="#" class="btn btn-sm text-white" style="background-color: var(--pro-color); border-radius:50px;">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
