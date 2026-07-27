@extends('frontend.layouts.app')

@section('title', 'Berita - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h1 class="display-4 fw-bold text-uppercase">Berita & Kegiatan</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row g-4">
            <!-- News Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="achievement-card border-0 shadow-sm">
                    <div class="achievement-thumb">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=600&auto=format&fit=crop" alt="News 1">
                    </div>
                    <div class="achievement-body d-flex flex-column p-4">
                        <span class="text-muted small mb-2"><i class="bi bi-calendar3"></i> 08 Juli 2026</span>
                        <h5 class="fw-bold mb-3 text-dark-green">Kunjungan Studi Lapangan ke Lembaga Hukum & Keuangan</h5>
                        <p class="text-secondary small mb-4 flex-grow-1">Untuk memperkaya wawasan praktis, mahasiswa {{ $data['name'] }} melakukan kunjungan studi lapangan komprehensif...</p>
                        <a href="#" class="btn btn-sm text-white mt-auto w-100" style="background-color: var(--pro-color); border-radius:50px;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- News Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="achievement-card border-0 shadow-sm">
                    <div class="achievement-thumb">
                        <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?q=80&w=600&auto=format&fit=crop" alt="News 2">
                    </div>
                    <div class="achievement-body d-flex flex-column p-4">
                        <span class="text-muted small mb-2"><i class="bi bi-calendar3"></i> 04 Juli 2026</span>
                        <h5 class="fw-bold mb-3 text-dark-green">Prestasi Mahasiswa Meraih Medali di Kompetisi Nasional</h5>
                        <p class="text-secondary small mb-4 flex-grow-1">Dua mahasiswa program studi {{ $data['name'] }} berhasil mengukir prestasi membanggakan tingkat nasional...</p>
                        <a href="#" class="btn btn-sm text-white mt-auto w-100" style="background-color: var(--pro-color); border-radius:50px;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
