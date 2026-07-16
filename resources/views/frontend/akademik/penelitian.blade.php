@extends('frontend.layouts.app')

@section('title', 'Penelitian & Pengabdian | INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)), url('{{ (isset($page) && $page->featured_image) ? asset('storage/' . $page->featured_image) : asset('assets/img/carousel-3.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Akademik</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ isset($page) ? $page->title : 'Penelitian & Pengabdian' }}</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <span class="page-section-eyebrow">Dharma Riset</span>
                <h2 class="page-section-title mb-2">Penelitian Dosen & Mahasiswa</h2>
                <div class="page-section-divider mb-4"></div>
                @if(isset($page) && trim(strip_tags($page->content)) != '')
                    <div class="text-secondary" style="line-height:1.8; text-align:justify;">
                        {!! $page->content !!}
                    </div>
                @else
                    <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                        Sebagai salah satu pilar Tri Dharma Perguruan Tinggi, INDAFA terus berupaya mendorong iklim riset yang dinamis, solutif, dan inovatif di kalangan dosen maupun mahasiswa. Fokus riset diarahkan pada pengembangan integrasi keilmuan Islam, hukum keluarga, ekonomi bisnis syariah, serta pendidikan Islam berbasis kemasyarakatan.
                    </p>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=600&auto=format&fit=crop" alt="Penelitian" class="w-100" style="height:320px; object-fit:cover;">
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Daftar Publikasi</span>
            <h2 class="page-section-title">Publikasi Riset Terkini</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-card p-4 border-0 shadow-sm" style="border-left: 5px solid #0a6666 !important;">
                    <span class="badge bg-gold mb-3 px-3 py-1.5 rounded-pill" style="background-color:#cca43b !important;">Jurnal Sinta 3</span>
                    <h5 class="fw-bold text-dark-green">Analisis Efektivitas Mediasi Pengadilan Agama Bondowoso dalam Mengurangi Angka Perceraian</h5>
                    <p class="small text-muted mb-3"><i class="bi bi-person me-1"></i> Ahmad Fauzi, M.H.I. (Dosen Hukum Keluarga Islam)</p>
                    <a href="#" class="btn btn-sm btn-outline-dark-green rounded-pill">Baca Jurnal <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card p-4 border-0 shadow-sm" style="border-left: 5px solid #0a6666 !important;">
                    <span class="badge bg-gold mb-3 px-3 py-1.5 rounded-pill" style="background-color:#cca43b !important;">Prosiding Nasional</span>
                    <h5 class="fw-bold text-dark-green">Pengembangan Media Pembelajaran Fiqh Interaktif Berbasis Android di Madrasah Tsanawiyah</h5>
                    <p class="small text-muted mb-3"><i class="bi bi-person me-1"></i> Dr. H. Mulyadi, M.Pd. (Dosen Pendidikan Agama Islam)</p>
                    <a href="#" class="btn btn-sm btn-outline-dark-green rounded-pill">Baca Jurnal <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
