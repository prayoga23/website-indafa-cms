@extends('frontend.layouts.app')

@section('title', 'Kontak LP2M - INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penelitian & Pengabdian Masyarakat</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">Kontak LP2M INDAFA</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <div class="row g-5">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 h-100 bg-white">
                    <h4 class="fw-bold text-dark-green mb-3">Lembaga Penelitian & Pengabdian Masyarakat</h4>
                    <div class="page-section-divider mb-4"></div>
                    <p class="text-secondary small mb-4">
                        Untuk konsultasi pengajuan hibah Litapdimas, publikasi jurnal, fasilitasi Hak Cipta/HKI, atau kemitraan KKN dan pengabdian masyarakat, silakan hubungi kami:
                    </p>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="icon-circle icon-circle-primary">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Alamat Kantor</h6>
                            <p class="small text-muted mb-0">Gedung Pusat Riset & Pengabdian Lt. 1, Kampus INDAFA Bondowoso, Jawa Timur.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="icon-circle icon-circle-gold">
                            <i class="bi bi-envelope-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Email Resmi</h6>
                            <p class="small text-muted mb-0">lp2m@indafa.ac.id</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="icon-circle icon-circle-primary">
                            <i class="bi bi-telephone-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Telepon / WhatsApp</h6>
                            <p class="small text-muted mb-0">+62 813-9876-5432 (Sekretariat LP2M)</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="icon-circle icon-circle-gold">
                            <i class="bi bi-clock-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Jam Operasional</h6>
                            <p class="small text-muted mb-0">Senin - Jumat: 08.00 - 15.30 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <h4 class="fw-bold text-dark-green mb-3">Kirim Pesan & Konsultasi LP2M</h4>
                    <div class="page-section-divider mb-4"></div>

                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('frontend.kontak.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control rounded-3" placeholder="Masukkan nama anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Email / No. HP</label>
                                <input type="text" name="email" class="form-control rounded-3" placeholder="Masukkan email atau No. HP" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark">Subjek Layanan / Konsultasi</label>
                                <input type="text" name="subject" class="form-control rounded-3" placeholder="Contoh: Pengajuan HKI / Konsultasi Jurnal / Kemitraan KKN" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark">Pesan / Detail Pertanyaan</label>
                                <textarea name="message" rows="5" class="form-control rounded-3" placeholder="Tuliskan pesan anda..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-success rounded-pill px-4 py-2 fw-bold w-100">
                                    <i class="bi bi-send me-2"></i>Kirim Pesan ke LP2M
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
