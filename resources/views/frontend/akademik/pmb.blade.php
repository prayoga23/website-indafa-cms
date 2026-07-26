@extends('frontend.layouts.app')

@section('title', 'Penerimaan Mahasiswa Baru (PMB) | INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)), url('{{ asset('storage/gallery/2.png') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">PMB</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ isset($page) ? $page->title : 'Penerimaan Mahasiswa Baru' }}</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <!-- Pengantar PMB -->
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <span class="page-section-eyebrow">Mari Bergabung</span>
                <h2 class="page-section-title mb-2">Mengapa Kuliah di INDAFA?</h2>
                <div class="page-section-divider mb-4"></div>
                @if(isset($page) && trim(strip_tags($page->content)) != '')
                    <div class="text-secondary" style="line-height:1.8; text-align:justify;">
                        {!! $page->content !!}
                    </div>
                @else
                    <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                        INDAFA Bondowoso berkomitmen melahirkan intelektual muslim yang unggul, profesional, berdaya saing global, dan berjiwa wirausaha berlandaskan akhlakul karimah. Kami menyediakan ekosistem perkuliahan berkualitas dengan fasilitas lengkap, dosen kompeten, dan program beasiswa bervariasi.
                    </p>
                @endif
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="btn btn-dark-green px-4 py-2.5 rounded-pill"><i class="bi bi-pencil-square me-2"></i> Daftar Online</a>
                    <a href="#" class="btn btn-outline-dark-green px-4 py-2.5 rounded-pill"><i class="bi bi-download me-2"></i> Unduh Brosur</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/gallery/2.png') }}" alt="Kuliah di indafa" class="w-100" style="height:320px; object-fit:cover;">
                </div>
            </div>
        </div>

        <!-- Jalur Pendaftaran -->
        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Pilihan Masuk</span>
            <h2 class="page-section-title">Jalur Pendaftaran</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3"><i class="bi bi-award"></i></div>
                    <h5 class="fw-bold text-dark-green">Jalur Prestasi</h5>
                    <p class="small text-secondary mb-0">Seleksi berbasis nilai rapor sekolah dan prestasi akademik/non-akademik tanpa tes tulis.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3"><i class="bi bi-book-half"></i></div>
                    <h5 class="fw-bold text-dark-green">Jalur Mandiri</h5>
                    <p class="small text-secondary mb-0">Seleksi masuk reguler melalui ujian seleksi potensi akademik dan tes kemampuan dasar daring.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3"><i class="bi bi-person-hearts"></i></div>
                    <h5 class="fw-bold text-dark-green">Jalur Beasiswa Tahfidz</h5>
                    <p class="small text-secondary mb-0">Jalur khusus beasiswa penuh bagi calon mahasiswa penghafal Al-Qur'an (minimal 10 Juz).</p>
                </div>
            </div>
        </div>

        <!-- Alur Pendaftaran -->
        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Langkah-langkah</span>
            <h2 class="page-section-title">Alur Pendaftaran Online</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex flex-column gap-4">
                    <div class="step-card bg-white p-4 rounded-4 shadow-sm">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h5>Registrasi Akun</h5>
                            <p>Buat akun pendaftaran di portal resmi PMB INDAFA menggunakan alamat email aktif.</p>
                        </div>
                    </div>
                    <div class="step-card bg-white p-4 rounded-4 shadow-sm">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h5>Pembayaran Biaya Pendaftaran</h5>
                            <p>Melakukan pembayaran biaya seleksi pendaftaran melalui transfer bank ke rekening resmi INDAFA.</p>
                        </div>
                    </div>
                    <div class="step-card bg-white p-4 rounded-4 shadow-sm">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h5>Unggah Berkas & Isi Data</h5>
                            <p>Masuk kembali ke portal PMB untuk mengunggah dokumen persyaratan (rapor, ijazah/SKL, foto) dan mengisi profil lengkap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
