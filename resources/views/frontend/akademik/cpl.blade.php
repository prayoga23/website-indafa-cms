@extends('frontend.layouts.app')

@section('title', 'Capaian Pembelajaran Lulusan (CPL) - Prodi Hukum Keluarga Islam')

@section('content')
<section class="cpl-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Standar Kompetensi</h5>
        <h1 class="display-4 fw-bold text-uppercase">Capaian Pembelajaran Lulusan</h1>
        <div class="cpl-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-4">
        <div class="text-center max-w-md mx-auto mb-5">
            <h2 class="fw-bold text-dark-green text-uppercase tracking-wide">4 Ranah Kompetensi Utama</h2>
            <p class="text-muted">Profil kualifikasi lulusan Prodi Hukum Keluarga Islam yang mengacu pada KKNI dan Standar Nasional Pendidikan Tinggi.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion custom-accordion shadow-sm" id="accordionCPL">

                    @if(isset($cplGroups) && $cplGroups->count() > 0)
                        @foreach($cplGroups as $category => $outcomes)
                            @php
                                // Mengatur konfigurasi teks judul & warna badge berdasarkan nama kategori di database
                                switch(Str::slug($category)) {
                                    case 'sikap':
                                        $title = 'Ranah Sikap & Tata Nilai';
                                        $badgeCode = 'CPL-S';
                                        $badgeBg = 'bg-dark-green';
                                        break;
                                    case 'pengetahuan':
                                        $title = 'Ranah Penguasaan Pengetahuan';
                                        $badgeCode = 'CPL-P';
                                        $badgeBg = 'bg-gold';
                                        break;
                                    case 'keterampilan-umum':
                                    case 'keterampilan_umum':
                                        $title = 'Ranah Keterampilan Umum';
                                        $badgeCode = 'CPL-KU';
                                        $badgeBg = 'bg-dark-green';
                                        break;
                                    case 'keterampilan-khusus':
                                    case 'keterampilan_khusus':
                                        $title = 'Ranah Keterampilan Khusus';
                                        $badgeCode = 'CPL-KK';
                                        $badgeBg = 'bg-gold';
                                        break;
                                    default:
                                        $title = 'Ranah ' . ucfirst($category);
                                        $badgeCode = 'CPL';
                                        $badgeBg = 'bg-dark-green';
                                }

                                // Membuat ID unik untuk komponen collapse Bootstrap
                                $loopId = $loop->iteration;
                            @endphp

                            <div class="accordion-item rounded-3 mb-3 border-0">
                                <h2 class="accordion-header" id="heading{{ $loopId }}">
                                    <button class="accordion-button fw-bold text-dark-green collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $loopId }}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{ $loopId }}">
                                        <span class="cpl-badge text-white {{ $badgeBg }} me-3">{{ $badgeCode }}</span>
                                        {{ $title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $loopId }}"
                                     class="accordion-collapse collapse"
                                     aria-labelledby="heading{{ $loopId }}"
                                     data-bs-parent="#accordionCPL">
                                    <div class="accordion-body bg-white pt-2">
                                        <ul class="list-group list-group-flush cpl-list">
                                            @foreach($outcomes as $outcome)
                                                <li class="list-group-item d-flex align-items-start border-0">
                                                    <span class="cpl-sub-number">{{ $outcome->code_label }}</span>
                                                    <div>{{ $outcome->description }}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5 bg-white rounded-3 shadow-sm">
                            <p class="text-muted mb-0">Data capaian pembelajaran lulusan belum tersedia.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK CPL)
     ========================================================================== -->
<style>
/* Utilities */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-gold { background-color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }
.max-w-md { max-width: 550px; }

/* Hero Section Style */
.cpl-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.9), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1450133064473-71024230f91b?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.cpl-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Pilar Visual Card Styling */
.cpl-pilar-card {
    background-color: #ffffff;
    border-radius: 16px;
    border-bottom: 4px solid #efefef;
    transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), border-color 0.3s ease, box-shadow 0.3s ease;
}
.cpl-pilar-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(11, 83, 69, 0.08) !important;
}
.pilar-sikap:hover { border-bottom-color: #0b5345; }
.pilar-pengetahuan:hover { border-bottom-color: #cca43b; }
.pilar-umum:hover { border-bottom-color: #0b5345; }
.pilar-khusus:hover { border-bottom-color: #cca43b; }

.pilar-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 65px;
    height: 65px;
    border-radius: 14px;
    background-color: #f8faf9;
}

/* Custom Accordion Mechanics */
.custom-accordion .accordion-item {
    box-shadow: 0 4px 12px rgba(0,0,0,0.02);
    overflow: hidden;
    border: 1px solid rgba(11, 83, 69, 0.05) !important;
}
.custom-accordion .accordion-button {
    background-color: #ffffff;
    color: #0b5345;
    padding: 20px 24px;
    font-size: 1.05rem;
    box-shadow: none;
}
.custom-accordion .accordion-button:not(.collapsed) {
    background-color: #f8faf9;
    color: #0b5345;
    box-shadow: inset 0 -1px 0 rgba(11, 83, 69, 0.06);
}
.custom-accordion .accordion-button::after {
    filter: sepia(1) saturate(5) hue-rotate(10deg); /* Menyesuaikan warna arrow ke arah gold/hijau */
}

/* CPL Badges inside Accordion Headers */
.cpl-badge {
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    min-width: 75px;
    text-align: center;
}

/* Inner List Style */
.cpl-list .list-group-item {
    padding: 16px 24px;
    font-size: 0.95rem;
    color: #4a4a4a;
    line-height: 1.6;
}
.cpl-list .list-group-item:hover {
    background-color: #fbfdfc;
}
.cpl-sub-number {
    display: inline-block;
    background-color: #f0f4f3;
    color: #0b5345;
    font-weight: 700;
    font-size: 0.8rem;
    padding: 2px 8px;
    border-radius: 4px;
    margin-right: 15px;
    margin-top: 2px;
    min-width: 38px;
    text-align: center;
}
</style>
@endsection
