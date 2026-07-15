@extends('frontend.layouts.app')

@section('title', 'Hubungi Kami - Prodi Hukum Keluarga Islam')

@section('content')
<!-- Hero Section Kontak -->
<section class="kontak-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Hubungi Kami</h5>
        <h1 class="display-4 fw-bold text-uppercase">Kontak & Hubungan</h1>
        <div class="kontak-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">
        <div class="row g-5">

            {{-- ═══════════════════════════════════════════════
                 SISI KIRI: INFORMASI DETIL & GOOGLE MAPS
                 ════════════════════════════════════════════════ --}}
            <div class="col-lg-5">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div>
                        <h3 class="fw-bold text-dark-green mb-2 text-uppercase tracking-wide fs-4">Sekretariat Prodi</h3>
                        <p class="text-secondary small mb-4">Silakan datang atau hubungi kami melalui saluran resmi di bawah ini untuk layanan administrasi, kemahasiswaan, dan kemitraan.</p>

                        <div class="d-flex flex-column gap-3 mb-4">

                            <div class="contact-info-card d-flex align-items-start gap-3 bg-white p-3 rounded-4 shadow-sm">
                                <div class="contact-icon-box bg-green-light rounded-3 p-2.5 text-dark-green flex-shrink-0">
                                    <i class="bi bi-geo-alt fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark-green mb-1">Alamat Kampus</h6>
                                    <span class="text-secondary small">
                                        {{ $setting->address ?? 'Jl. KHR. As\'ad Syamsul Arifin, Prajekan, Bondowoso, Jawa Timur' }}
                                    </span>
                                </div>
                            </div>

                            <div class="contact-info-card d-flex align-items-start gap-3 bg-white p-3 rounded-4 shadow-sm">
                                <div class="contact-icon-box bg-gold-light rounded-3 p-2.5 text-gold-style flex-shrink-0">
                                    <i class="bi bi-envelope fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark-green mb-1">Email Resmi</h6>
                                    <span class="text-secondary small">
                                        {{ $setting->email ?? 'hki@iaidafa.ac.id' }}
                                    </span>
                                </div>
                            </div>

                            <div class="contact-info-card d-flex align-items-start gap-3 bg-white p-3 rounded-4 shadow-sm">
                                <div class="contact-icon-box bg-green-light rounded-3 p-2.5 text-dark-green flex-shrink-0">
                                    <i class="bi bi-telephone fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark-green mb-1">Telepon / WhatsApp</h6>
                                    <span class="text-secondary small">
                                        @if(!empty($setting->whatsapp))
                                            {{ $setting->whatsapp }} (WhatsApp)
                                        @elseif(!empty($setting->phone))
                                            {{ $setting->phone }}
                                        @else
                                            +62 812-3456-7890
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="map-wrapper rounded-4 overflow-hidden shadow-sm border bg-white p-2">
                        @if(!empty($setting->google_maps))
                            {{-- Jika data google_maps di DB berbentuk full tag <iframe> --}}
                            @if(Str::contains($setting->google_maps, '<iframe'))
                                {!! $setting->google_maps !!}
                            @else
                                {{-- Jika data google_maps di DB hanya link URL src nya saja --}}
                                <iframe src="{{ $setting->google_maps }}" class="w-100 rounded-3" height="230" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            @endif
                        @else
                            {{-- Fallback Default Map Sandbox Frame --}}
                            <iframe src="https://maps.google.com/maps?q=Prajekan%20Bondowoso&t=&z=13&ie=UTF8&iwloc=&output=embed" class="w-100 rounded-3" height="230" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SISI KANAN: FORMULIR PESAN & ASPIRASI
                 ════════════════════════════════════════════════ --}}
            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold text-dark-green mb-2 text-uppercase tracking-wide fs-4">Kirim Pesan atau Aspirasi</h3>
                    <p class="text-secondary small mb-4">Punya pertanyaan seputar perkuliahan atau keluhan layanan akademik? Sampaikan langsung kepada tim administrasi kami.</p>

                    {{-- Balasan Interaksi Flash Message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 small mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('frontend.kontak.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label small fw-bold text-dark-green">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control rounded-3 py-2.5 small" placeholder="Masukkan nama Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label small fw-bold text-dark-green">NIM / Surel</label>
                                    <input type="text" name="identity" class="form-control rounded-3 py-2.5 small" placeholder="NIM (jika mahasiswa) atau Email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-custom">
                                    <label class="form-label small fw-bold text-dark-green">Subjek Kepentingan</label>
                                    <select name="subject" class="form-select rounded-3 py-2.5 small text-secondary" required>
                                        <option value="" selected disabled>Pilih kategori hal...</option>
                                        <option value="Layanan Akademik & KRS">Layanan Akademik & KRS</option>
                                        <option value="Pendaftaran & Mahasiswa Baru">Pendaftaran & Mahasiswa Baru</option>
                                        <option value="Aspirasi / Kritik & Saran">Aspirasi / Kritik & Saran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-custom">
                                    <label class="form-label small fw-bold text-dark-green">Isi Pesan / Pengaduan</label>
                                    <textarea name="message" class="form-control rounded-3 py-2.5 small" rows="5" placeholder="Tuliskan detail pertanyaan atau laporan Anda secara lengkap..." required></textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-dark-green rounded-pill px-5 py-2.5 fw-semibold tracking-wide shadow-sm w-100 w-md-auto">
                                    <i class="bi bi-send-fill me-2 small"></i> Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Pastikan styling peta <iframe> dari CMS dipaksa responsif 100% --}}
<style>
    .map-wrapper iframe {
        width: 100% !important;
    }
</style>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK HALAMAN KONTAK)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.text-gold-style { color: #b38f32 !important; }
.bg-premium-light { background-color: #f4f7f6; }

/* Hero Section Style */
.kontak-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.kontak-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Contact Info Item Mechanics */
.contact-info-card {
    border: 1px solid rgba(11, 83, 69, 0.03);
}
.contact-icon-box {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bg-gold-light { background-color: rgba(204, 164, 59, 0.12); }
.bg-green-light { background-color: rgba(11, 83, 69, 0.08); }

/* Form Controls Premium Styling */
.form-group-custom .form-control,
.form-group-custom .form-select {
    border: 1px solid #e1e7e4;
    background-color: #fbfdfc;
    color: #333;
    transition: all 0.2s ease;
}
.form-group-custom .form-control:focus,
.form-group-custom .form-select:focus {
    border-color: #0b5345;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(11, 83, 69, 0.08);
}
.form-group-custom label {
    margin-bottom: 6px;
    font-size: 0.82rem;
    letter-spacing: 0.2px;
}

/* Call to Action Button */
.btn-dark-green {
    background-color: #0b5345;
    color: #ffffff;
    border: none;
    font-size: 0.88rem;
    transition: all 0.2s ease;
}
.btn-dark-green:hover {
    background-color: #cca43b;
    color: #ffffff;
    transform: translateY(-1px);
}

/* Map frame handling */
.map-wrapper iframe {
    display: block;
}

@media (max-width: 767.98px) {
    .w-md-auto {
        width: 100% !important;
    }
}
</style>
@endsection
