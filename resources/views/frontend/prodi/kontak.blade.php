@extends('frontend.layouts.app')

@section('title', 'Hubungi Kami - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h1 class="display-4 fw-bold text-uppercase">Kontak</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="row g-5">
            <!-- Left Info Panel -->
            <div class="col-lg-5">
                <h3 class="fw-bold mb-3" style="color:var(--pro-color)">Hubungi Kami</h3>
                <p class="text-secondary small mb-4">Silakan hubungi kami atau datang langsung ke ruang sekretariat program studi untuk layanan kemahasiswaan dan akademik.</p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="contact-info-card d-flex align-items-start gap-3 bg-white p-3 rounded-4 shadow-sm" style="border-left:4px solid var(--pro-color);">
                        <div class="contact-icon-box rounded-3 p-2.5 flex-shrink-0" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                            <i class="bi bi-geo-alt fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:var(--pro-color)">Alamat Kantor</h6>
                            <span class="text-secondary small">{{ $data['office_address'] ?? 'Gedung Kampus, Lantai 2, Kampus INDAFA Bondowoso' }}</span>
                        </div>
                    </div>

                    <div class="contact-info-card d-flex align-items-start gap-3 bg-white p-3 rounded-4 shadow-sm" style="border-left:4px solid var(--pro-color);">
                        <div class="contact-icon-box rounded-3 p-2.5 flex-shrink-0" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                            <i class="bi bi-envelope fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:var(--pro-color)">Email Resmi</h6>
                            <span class="text-secondary small">
                                <a href="mailto:{{ $data['email'] ?? ($data['id'] . '@iaidafa.ac.id') }}" class="text-secondary text-decoration-none">
                                    {{ $data['email'] ?? ($data['id'] . '@iaidafa.ac.id') }}
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="contact-info-card d-flex align-items-start gap-3 bg-white p-3 rounded-4 shadow-sm" style="border-left:4px solid var(--pro-color);">
                        <div class="contact-icon-box rounded-3 p-2.5 flex-shrink-0" style="background:rgba(0,0,0,0.05); color:var(--pro-color)">
                            <i class="bi bi-whatsapp fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:var(--pro-color)">No. WhatsApp</h6>
                            <span class="text-secondary small">
                                @php
                                    $waNumber = $data['whatsapp'] ?? ($setting->whatsapp ?? '+62 821-3933-6236');
                                    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);
                                @endphp
                                <a href="https://wa.me/{{ $cleanWa }}" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none fw-semibold">
                                    {{ $waNumber }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Message Form -->
            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    <h4 class="fw-bold mb-4" style="color:var(--pro-color)">Kirim Pesan</h4>
                    <form action="#" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small text-secondary">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-secondary">Alamat Email</label>
                                <input type="email" class="form-control" placeholder="Surel Anda" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-secondary">Subjek</label>
                                <input type="text" class="form-control" placeholder="Subjek Pesan" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-secondary">Isi Pesan</label>
                                <textarea class="form-control" rows="4" placeholder="Tulis pesan Anda..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn text-white w-100 py-2.5 fw-semibold" style="background-color: var(--pro-color); border-radius:50px;">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
