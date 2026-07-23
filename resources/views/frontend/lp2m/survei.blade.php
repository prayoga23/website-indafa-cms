@extends('frontend.layouts.app')

@section('title', $title . ' - Survei LP2M')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penelitian & Pengabdian Masyarakat</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">{{ $title }}</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <div class="row g-4">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px; z-index: 10;">
                    <div class="card-header bg-dark-green text-white fw-bold py-3 rounded-top-4">
                        <i class="bi bi-bar-chart-line me-2"></i> Menu Survei
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lp2m.survei', $key) }}"
                               class="list-group-item list-group-item-action py-3 d-flex align-items-center justify-content-between {{ $page === $key ? 'active bg-success text-white border-success fw-bold' : 'text-dark' }}">
                                <span><i class="bi bi-chevron-right me-2 small"></i>{{ $label }}</span>
                                @if($page === $key)<i class="bi bi-check-circle-fill"></i>@endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">

                    @if($page === 'indeks-kepuasan')
                        <h3 class="fw-bold text-dark-green mb-3">Indeks Kepuasan Pelanggan LP2M</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Hasil ukur berkala indeks kepuasan dosen, peneliti, mitra industri, dan mahasiswa terhadap kualitas layanan pendampingan hibah riset dan pengabdian LP2M:
                        </p>

                        <div class="row g-4 my-4">
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 text-center border-start border-4 border-success">
                                    <h1 class="display-4 fw-bold text-success mb-1">3.84</h1>
                                    <p class="small fw-semibold text-dark mb-0">Skala 4.00 (Kategori: Sangat Baik)</p>
                                    <span class="text-muted small">Kepuasan Layanan Hibah Riset</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 text-center border-start border-4 border-warning">
                                    <h1 class="display-4 fw-bold text-warning text-dark mb-1">3.78</h1>
                                    <p class="small fw-semibold text-dark mb-0">Skala 4.00 (Kategori: Sangat Baik)</p>
                                    <span class="text-muted small">Kepuasan Fasilitasi Sentra HKI</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white border rounded-4">
                            <h5 class="fw-bold text-dark mb-3">Isi Survei Kepuasan Online</h5>
                            <p class="small text-secondary mb-3">Bantu kami meningkatkan kualitas layanan dengan mengisi instrumen kuesioner singkat berikut:</p>
                            <a href="#" target="_blank" class="btn btn-success rounded-pill px-4 fw-bold"><i class="bi bi-pencil-square me-2"></i>Buka Kuesioner Kepuasan</a>
                        </div>

                    @elseif($page === 'kolaborasi')
                        <h3 class="fw-bold text-dark-green mb-3">Survei Penelitian & PKM Kolaborasi</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Survei evaluasi dampak dan kepuasan pelaksanaan kegiatan penelitian dan pengabdian masyarakat (PKM) yang diselenggarakan secara berkolaborasi dengan Perguruan Tinggi mitra nasional / internasional serta pihak ketiga.
                        </p>

                        <div class="alert alert-success rounded-4 border-0 p-4 mt-4">
                            <h6 class="fw-bold mb-2"><i class="bi bi-handshake me-2"></i>Mitra Kolaborasi Riset Utama</h6>
                            <ul class="small mb-0 lh-lg">
                                <li>Konsorsium Perguruan Tinggi Keagamaan Islam Swasta (PTKIS) Jawa Timur</li>
                                <li>Dinas Pemberdayaan Masyarakat dan Desa (DPMD) Kab. Bondowoso</li>
                                <li>Lembaga Riset dan Pengabdian Perguruan Tinggi Mitra Luar Negeri</li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
