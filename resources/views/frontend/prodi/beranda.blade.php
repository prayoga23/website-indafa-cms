@extends('frontend.layouts.app')

@section('title', 'Program Studi ' . $data['name'] . ' - INDAFA Bondowoso')

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
        --pro-gradient: {{ $data['bg_gradient'] }};
    }

    .btn-pro-gold {
        background-color: #cca43b;
        color: #111;
        font-weight: 700;
        border: none;
        padding: 0.75rem 2.25rem;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    .btn-pro-gold:hover {
        background-color: #e5b842;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(204, 164, 59, 0.4);
    }
</style>

{{-- ═══════════════════════════════════════════════
     1. HERO BANNER FULL SCREEN (seperti HOME)
════════════════════════════════════════════════ --}}
<div class="container-fluid carousel-header px-0">
    <div id="prodiCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}"
                     alt="{{ $data['name'] }}"
                     loading="eager">
            </div>
        </div>
    </div>
</div>


{{-- ═══════════════════════════════════════════════
     2. SAMBUTAN KETUA PROGRAM STUDI
════════════════════════════════════════════════ --}}
<section class="py-5 bg-white" id="sambutan-kaprodi">
    <div class="container py-4">
        <div class="row align-items-center g-5">

            {{-- Foto Kaprodi --}}
            <div class="col-lg-5 col-10 col-sm-8 col-md-6 mx-auto mx-md-0">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden text-center p-4" style="border-top: 5px solid var(--pro-color) !important;">
                    <img src="{{ asset('assets/img/user.png') }}"
                         alt="{{ $data['head'] }}"
                         class="rounded-circle mx-auto mb-3 img-thumbnail shadow-sm"
                         style="width:170px; height:170px; object-fit:cover;">
                    <h4 class="fw-bold mb-1" style="color:var(--pro-color)">{{ $data['head'] }}</h4>
                    <p class="text-muted small mb-0 fw-semibold text-uppercase" style="letter-spacing:1px;">Ketua Program Studi {{ $data['name'] }}</p>
                </div>
            </div>

            {{-- Quotes & Sambutan --}}
            <div class="col-lg-7 col-12">
                <span class="text-uppercase text-warning fw-bold small tracking-wider" style="letter-spacing:1.5px;">Sambutan Kaprodi</span>
                <h2 class="fw-bold mb-3 text-dark display-6">Prakata Ketua Program Studi</h2>
                <div class="mb-4" style="width:60px; height:4px; background:#cca43b; border-radius:2px;"></div>

                <blockquote class="p-4 rounded-4 bg-light border-start border-4 border-success text-secondary mb-4 fs-5 fst-italic shadow-sm" style="line-height:1.7;">
                    "Komitmen kami adalah mendidik dan mendampingi mahasiswa agar siap berkontribusi bagi nusa, bangsa, dan agama."
                </blockquote>

                <p class="text-secondary" style="line-height:1.85; font-size:1rem; text-align:justify;">
                    Selamat datang di {{ $data['name'] }} INDAFA Bondowoso. Kami berkomitmen untuk terus meningkatkan mutu pendidikan, keilmuan integratif, serta pengabdian masyarakat guna mencetak lulusan unggul yang berakhlakul karimah.
                </p>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     3. PROFIL SINGKAT - MENGENAL PROGRAM STUDI
     (Ditaruh setelah Ketua Program Studi)
════════════════════════════════════════════════ --}}
<section class="py-5 bg-light" id="tentang">
    <div class="container py-3">
        <div class="row align-items-center g-5">
            <div class="col-lg-12">
                <span class="text-uppercase text-warning fw-bold small tracking-wider" style="letter-spacing:1.5px;">Profil Singkat</span>
                <h2 class="fw-bold mb-3 display-6" style="color:var(--pro-color)">Mengenal Program Studi</h2>
                <div class="mb-4" style="width:60px; height:4px; background:var(--pro-color); border-radius:2px;"></div>
                
                <p class="text-secondary fs-5 mb-5" style="line-height:1.85; text-align:justify;">
                    {{ $data['sejarah'] }}
                </p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-4 p-4 bg-white rounded-4 shadow-sm h-100">
                            <div class="icon-circle p-3 rounded-circle text-white shadow" style="background:var(--pro-color); min-width:55px; height:55px; display:flex; align-items:center; justify-content:center;">
                                <i class="bi bi-mortarboard-fill fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2" style="color:var(--pro-color)">Kurikulum Mutakhir</h5>
                                <p class="small text-muted mb-0" style="line-height:1.6;">Integrasi keilmuan yang responsif terhadap tuntutan dunia kerja dan era digital.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-4 p-4 bg-white rounded-4 shadow-sm h-100">
                            <div class="icon-circle p-3 rounded-circle text-white shadow" style="background:var(--pro-color); min-width:55px; height:55px; display:flex; align-items:center; justify-content:center;">
                                <i class="bi bi-person-fill-check fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2" style="color:var(--pro-color)">Karier Cemerlang</h5>
                                <p class="small text-muted mb-0" style="line-height:1.6;">Peluang kerja luas di sektor perbankan, peradilan, instansi pemerintah, dan lembaga pendidikan.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     4. INFORMASI BERITA TERBARU
════════════════════════════════════════════════ --}}
<section class="py-5 bg-white">
    <div class="container py-3">

        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5">
            <div>
                <span class="text-uppercase text-warning fw-bold small tracking-wider" style="letter-spacing:1.5px;">Informasi</span>
                <h2 class="fw-bold mb-1 text-dark display-6">Berita Terbaru</h2>
                <div class="mt-2" style="width:60px; height:4px; background:#cca43b; border-radius:2px;"></div>
            </div>
            <a href="{{ route('frontend.prodi.berita', $data['id']) }}" class="btn btn-outline-success rounded-pill px-4 font-semibold">
                Semua Berita &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @if(isset($news) && count($news) > 0)
                @foreach($news as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top" style="height:210px; object-fit:cover;" alt="{{ $item->title }}">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="text-muted small mb-2"><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</span>
                            <h5 class="card-title fw-bold mb-3"><a href="{{ url('berita/' . $item->slug) }}" class="text-dark text-decoration-none">{{ $item->title }}</a></h5>
                            <p class="card-text text-secondary small mt-auto" style="line-height:1.6;">{{ Str::limit(strip_tags($item->content), 110) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="p-4 bg-light text-center" style="height:210px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-newspaper fs-1 text-success opacity-50"></i>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="text-muted small mb-2"><i class="bi bi-calendar3 me-1 text-success"></i>23 Juli 2026</span>
                            <h5 class="card-title fw-bold mb-3"><a href="#" class="text-dark text-decoration-none">Kegiatan Perkuliahan dan Orientasi Akademik {{ $data['name'] }}</a></h5>
                            <p class="card-text text-secondary small mt-auto" style="line-height:1.6;">Pelaksanaan kegiatan akademik prodi yang mengedepankan mutu dan keilmuan integratif...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="p-4 bg-light text-center" style="height:210px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-award fs-1 text-warning opacity-75"></i>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="text-muted small mb-2"><i class="bi bi-calendar3 me-1 text-warning"></i>20 Juli 2026</span>
                            <h5 class="card-title fw-bold mb-3"><a href="#" class="text-dark text-decoration-none">Prestasi Mahasiswa {{ $data['name'] }} Tingkat Nasional</a></h5>
                            <p class="card-text text-secondary small mt-auto" style="line-height:1.6;">Mahasiswa prodi berhasil meraih kejuaraan dalam kompetisi keilmuan nasional...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="p-4 bg-light text-center" style="height:210px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-briefcase fs-1 text-primary opacity-50"></i>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="text-muted small mb-2"><i class="bi bi-calendar3 me-1 text-primary"></i>15 Juli 2026</span>
                            <h5 class="card-title fw-bold mb-3"><a href="#" class="text-dark text-decoration-none">Workshop dan Sertifikasi Keahlian Mahasiswa</a></h5>
                            <p class="card-text text-secondary small mt-auto" style="line-height:1.6;">Pelatihan kompetensi siap kerja untuk membekali calon lulusan profesional...</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</section>
@endsection
