@extends('frontend.layouts.app')

@section('title', $title . ' - Pusat & Pusat Studi LP2M')

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
                        <i class="bi bi-building me-2"></i> Menu Pusat LP2M
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lp2m.pusat', $key) }}"
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

                    @if($page === 'penelitian')
                        <h3 class="fw-bold text-dark-green mb-3">Pusat Penelitian</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Pusat Penelitian mengordinasikan perencanaan agenda riset institusi, pengelolaan skema hibah riset internal, serta supervisi mutu hasil penelitian dosen dan mahasiswa.
                        </p>

                    @elseif($page === 'pengabdian')
                        <h3 class="fw-bold text-dark-green mb-3">Pusat Pengabdian Masyarakat</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Pusat Pengabdian Masyarakat berfokus pada perancangan KKN Tematik, penyuluhan hukum dan ekonomi syariah bagi warga, serta pendampingan UMKM berbasis keumatan.
                        </p>

                    @elseif($page === 'publikasi')
                        <h3 class="fw-bold text-dark-green mb-3">Pusat Publikasi Ilmiah</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Menyelenggarakan workshop penulisan artikel ilmiah, fasilitasi pendampingan submit jurnal internasional Scopus/WoS, dan peningkatan peringkat SINTA jurnal institusi.
                        </p>



                    @elseif($page === 'psga')
                        <h3 class="fw-bold text-dark-green mb-3">Pusat Studi Gender dan Anak (PSGA)</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            PSGA berfokus pada riset kesetaraan gender dalam hukum Islam, pencegahan kekerasan seksual di lingkungan pendidikan, serta perlindungan hak-hak anak dan perempuan.
                        </p>
                        <div class="card bg-light border-0 p-4 rounded-4 mt-3">
                            <h6 class="fw-bold text-dark-green mb-2"><i class="bi bi-heart me-2 text-danger"></i>Fokus Kajian PSGA:</h6>
                            <ul class="text-secondary mb-0 small lh-lg">
                                <li>Hukum Perkawinan & Kesejahteraan Keluarga Sakinah</li>
                                <li>Pendampingan Pencegahan Kekerasan Pada Anak & Perempuan</li>
                                <li>Penerbitan Publikasi & Buletin Ilmiah PSGA</li>
                            </ul>
                        </div>

                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
