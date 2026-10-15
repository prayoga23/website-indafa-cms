@extends('frontend.layouts.app')

@section('title', 'LP2M - Lembaga Penelitian & Pengabdian Masyarakat | INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penelitian & Pengabdian Masyarakat</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">LP2M INDAFA</h1>
        <p class="lead mx-auto text-light mb-4" style="max-width: 750px;">
            Mengabdi untuk Masyarakat, Meneliti untuk Kejayaan Peradaban Islam dan Perkembangan Iptek Kontemporer.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('frontend.lp2m.riset', 'penelitian') }}" class="btn btn-warning text-dark fw-bold px-4 py-2 rounded-pill">Portal Litapdimas</a>
            <a href="{{ route('frontend.lp2m.pusat', 'penelitian') }}" class="btn btn-outline-light fw-bold px-4 py-2 rounded-pill">Pusat Studi & Riset</a>
        </div>
    </div>
</section>

<!-- Overview & Section -->
<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7">
                <span class="page-section-eyebrow">Tentang LP2M</span>
                <h2 class="page-section-title mb-3">Riset Berkualitas & Pengabdian Bernilai Kebajikan</h2>
                <div class="page-section-divider mb-4"></div>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M) INDAFA Bondowoso mengordinasikan seluruh riset keilmuan, publikasi jurnal, fasilitasi Hak Kekayaan Intelektual (HKI), dan program pengabdian masyarakat (PKM) berwawasan kepesantrenan.
                </p>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    Dengan sinergi antara dosen dan mahasiswa, LP2M menjadi garda terdepan dalam menghasilkan hilirisasi riset, pendampingan masyarakat, serta publikasi jurnal ilmiah terindeks nasional dan internasional.
                </p>

                <div class="row g-4 mt-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-sm border-start border-4 border-success">
                            <div class="icon-circle icon-circle-primary me-2">
                                <i class="bi bi-journal-text fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Riset & Jurnal</h6>
                                <p class="small text-muted mb-0">Litapdimas, Jurnal JRCE, E-Journal & HKI.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-sm border-start border-4 border-warning">
                            <div class="icon-circle icon-circle-gold me-2">
                                <i class="bi bi-building fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Pusat Studi</h6>
                                <p class="small text-muted mb-0">PSGA, Moderasi Agama, Islam & Sains, Kerjasama.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-card text-center p-4 shadow-sm border-top border-4 border-success">
                    <img src="{{ asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png') }}" alt="Ketua LP2M" class="rounded-circle mb-3 img-thumbnail" style="width: 140px; height: 140px; object-fit: cover;">
                    <h5 class="fw-bold text-dark-green mb-1">Dr. Muhammad Ridwan, M.H.I</h5>
                    <p class="text-muted small mb-3">Ketua LP2M INDAFA</p>
                    <p class="small text-secondary fst-italic">"Penelitian yang baik adalah riset yang memberi kemaslahatan nyata bagi masyarakat, agama, dan kemajuan ilmu pengetahuan."</p>
                </div>
            </div>
        </div>

        <!-- Quick Access Feature Cards -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Pilar Utama</span>
            <h2 class="page-section-title mb-1">Layanan & Sub-Fokus LP2M</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-journal-bookmark fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Rumah Jurnal INDAFA</h5>
                    <p class="small text-secondary mb-3">Fasilitas penerbitan dan indeksasi karya ilmiah dosen dan peneliti (JRCE, dll).</p>
                    <a href="{{ route('frontend.lp2m.riset', 'jurnal') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Lihat Jurnal</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-flower1 fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pengabdian Litapdimas</h5>
                    <p class="small text-secondary mb-3">Sistem informasi pengabdian masyarakat (Simapel & Sipemas) serta kerjasama lintas instansi.</p>
                    <a href="{{ route('frontend.lp2m.riset', 'pengabdian') }}" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3">Lihat Pengabdian</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-patch-check fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Sentra HKI & Hak Cipta</h5>
                    <p class="small text-secondary mb-3">Fasilitasi pendaftaran Hak Cipta, Paten, dan Rekapitulasi Karya HKI civitas akademika.</p>
                    <a href="{{ route('frontend.lp2m.riset', 'hki') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Layanan HKI</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-diagram-2 fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Pusat Studi Gender & Anak</h5>
                    <p class="small text-secondary mb-3">Pusat Studi Gender dan Anak (PSGA) berfokus pada kesetaraan gender dan perlindungan anak.</p>
                    <a href="{{ route('frontend.lp2m.pusat', 'psga') }}" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3">Pusat Studi</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-file-earmark-text fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Layanan Surat Online & SOP</h5>
                    <p class="small text-secondary mb-3">Pengajuan persuratan riset, rekomendasi penelitian, notulensi rapat, dan panduan SOP.</p>
                    <a href="{{ route('frontend.lp2m.layanan', 'surat-online') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Layanan Surat</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-globe-americas fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Riset & SDGs</h5>
                    <p class="small text-secondary mb-3">Korelasi dan peta kontribusi penelitian & pengabdian masyarakat dengan indikator SDGs.</p>
                    <a href="{{ route('frontend.lp2m.riset', 'sdgs') }}" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3">Lihat SDGs</a>
                </div>
            </div>
        </div>

        <!-- Latest Announcements & News Section -->
        <div class="row g-4 mt-4" id="pengumuman">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold text-dark-green mb-0"><i class="bi bi-megaphone me-2 text-warning"></i>Pengumuman LP2M</h4>
                    <a href="{{ route('frontend.lp2m.index') }}" class="small fw-semibold text-success text-decoration-none">Update Terkini</a>
                </div>
                @forelse($announcements as $item)
                    <div class="card border-0 shadow-sm mb-3 rounded-3 hover-lift">
                        <div class="card-body p-3">
                            <span class="badge bg-success-subtle text-success mb-2">{{ $item->created_at ? $item->created_at->format('d M Y') : 'Terbaru' }}</span>
                            <h6 class="fw-bold text-dark mb-1">
                                <a href="{{ route('announcements.show', $item->slug ?? '#') }}" class="text-dark text-decoration-none">{{ $item->title }}</a>
                            </h6>
                            <p class="small text-muted mb-0">{!! Str::limit(strip_tags($item->content), 90) !!}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light border text-center text-muted">Belum ada pengumuman khusus LP2M.</div>
                @endforelse
            </div>

            <div class="col-lg-6" id="berita">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold text-dark-green mb-0"><i class="bi bi-newspaper me-2 text-success"></i>Berita LP2M</h4>
                    <a href="{{ route('frontend.lp2m.index') }}" class="small fw-semibold text-success text-decoration-none">Update Terkini</a>
                </div>
                @forelse($news as $item)
                    <div class="card border-0 shadow-sm mb-3 rounded-3 hover-lift">
                        <div class="card-body p-3">
                            <span class="badge bg-warning-subtle text-dark mb-2">{{ $item->created_at ? $item->created_at->format('d M Y') : 'Terbaru' }}</span>
                            <h6 class="fw-bold text-dark mb-1">
                                <a href="{{ route('news.show', $item->slug ?? '#') }}" class="text-dark text-decoration-none">{{ $item->title }}</a>
                            </h6>
                            <p class="small text-muted mb-0">{!! Str::limit(strip_tags($item->content), 90) !!}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light border text-center text-muted">Belum ada berita kegiatan LP2M.</div>
                @endforelse
            </div>
        </div>

    </div>
</section>
@endsection
