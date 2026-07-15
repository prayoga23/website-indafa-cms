@extends('frontend.layouts.app')

@section('title', $title . ' - ' . $data['name'])

@section('content')
<style>
    :root {
        --fac-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Akademik</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ $title }}</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--fac-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        @if($page === 'dokumen')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">File & Arsip</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Unduhan Dokumen</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark" style="background: var(--fac-color) !important;">
                                    <tr>
                                        <th scope="col" class="py-3 px-4">Nama Dokumen</th>
                                        <th scope="col" class="py-3">Kategori</th>
                                        <th scope="col" class="py-3 text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Panduan Akademik Fakultas PDF</td>
                                        <td>Buku Panduan</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm btn-fac" style="background:var(--fac-color); color:#fff; border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Formulir Pengajuan Judul Skripsi</td>
                                        <td>Formulir</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm btn-fac" style="background:var(--fac-color); color:#fff; border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Kalender Kegiatan Akademik Tahun Ini</td>
                                        <td>Kalender</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm btn-fac" style="background:var(--fac-color); color:#fff; border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Mutu & Reputasi</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Akreditasi Program Studi</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($data['prodies'] as $prodi)
                    <div class="col-md-6 col-lg-5">
                        <div class="card fac-card h-100 p-4 border-0 shadow-sm" style="border-top: 4px solid var(--fac-color) !important;">
                            <div class="card-body text-center">
                                <div class="icon-circle mx-auto mb-3" style="background:rgba(0,0,0,0.05); color:var(--fac-color)">
                                    <i class="bi bi-patch-check-fill fs-3"></i>
                                </div>
                                <h4 class="fw-bold mb-2">{{ $prodi['name'] }}</h4>
                                <p class="text-muted mb-3">Terakreditasi BAN-PT</p>
                                <span class="badge bg-gold px-4 py-2 text-uppercase fw-bold rounded-pill" style="font-size:1.1rem; background-color:#cca43b !important;">Baik Sekali</span>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-fac" style="background:var(--fac-color); color:#fff; border-radius:50px;"><i class="bi bi-eye"></i> Lihat Sertifikat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
