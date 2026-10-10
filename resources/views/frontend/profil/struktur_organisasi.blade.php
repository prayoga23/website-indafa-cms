@extends('frontend.layouts.app')

@section('title', 'Struktur Organisasi - Prodi Hukum Keluarga Islam')

@section('content')
<section class="struktur-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        {{-- <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Manajemen Kepengurusan</h5> --}}
        <h1 class="display-4 fw-bold text-uppercase">Struktur Organisasi</h1>
        <div class="struktur-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-4">
        <div class="text-center max-w-md mx-auto mb-5">
            <h2 class="fw-bold text-dark-green text-uppercase tracking-wide">Pengelola Program Studi</h2>
            {{-- <p class="text-muted">Sinergi kepemimpinan dan profesionalisme akademik Hukum Keluarga Islam.</p> --}}
        </div>

        {{-- ═══════════════════════════════════════════════
             Jajaran Pengelola Utama (Struktural Card)
             ════════════════════════════════════════════════ --}}
        <div class="row g-4 justify-content-center mb-5">
            @if(isset($managers) && $managers->count() > 0)
                @foreach($managers as $manager)
                    {{-- Cek jika perannya adalah Kaprodi untuk membedakan style warna hijau premium --}}
                    @php
                        $isKaprodi = Str::contains(Str::lower($manager->role), ['kaprodi', 'ketua prodi', 'ketua program studi']);
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="premium-org-card text-center shadow-sm {{ $isKaprodi ? 'featured-prodi' : '' }}">
                            <div class="{{ $isKaprodi ? 'card-banner-green' : 'card-banner-gold' }}"></div>
                            <div class="avatar-wrapper">
                                <img src="{{ $manager->photo ? asset('storage/' . $manager->photo) : 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=256' }}"
                                     alt="{{ $manager->name }}"
                                     class="profile-img">
                            </div>
                            <div class="card-body-content">
                                <span class="{{ $isKaprodi ? 'role-badge-green' : 'role-badge-gold' }}">
                                    {{ $manager->role }}
                                </span>
                                <h5 class="staff-name {{ $isKaprodi ? 'text-white' : '' }}">
                                    {{ $manager->name }}
                                </h5>
                                @if($manager->nip)
                                    <p class="{{ $isKaprodi ? 'text-light-green' : 'text-muted' }} small">
                                        NUPTK. {{ $manager->nip }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">Data struktur pengelola belum diunggah.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             Rumpun Dosen Utama & Staf Administrasi (Mini Card)
             ════════════════════════════════════════════════ --}}
        <div class="row">
            <div class="col-12 mb-4">
                <h4 class="text-center fw-bold text-dark-green text-uppercase tracking-wider fs-5 mb-0">Dosen Utama & Staf Administrasi</h4>
                <div class="small-divider mx-auto"></div>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @if(isset($staffs) && $staffs->count() > 0)
                @foreach($staffs as $staff)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="premium-org-card mini text-center shadow-sm">
                            <h6 class="staff-name mb-1">{{ $staff->name }}</h6>
                            <span class="text-gold small fw-semibold text-uppercase tracking-wider">
                                {{ $staff->role }}
                            </span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">Data dosen dan staf administrasi belum tersedia.</p>
                </div>
            @endif
        </div>

    </div>
</section>

<style>
/* Reset & Base Elements */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }

/* Hero Section Style */
.struktur-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.9), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1606857521015-7f9fcf423740?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.struktur-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}
.small-divider {
    width: 40px;
    height: 3px;
    background-color: #cca43b;
    margin-top: 10px;
    margin-bottom: 20px;
}

/* Premium Card Main Mechanics */
.premium-org-card {
    background: #ffffff;
    border-radius: 16px;
    position: relative;
    overflow: hidden;
    padding: 0 0 30px 0;
    transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.3s ease;
    border: 1px solid rgba(11, 83, 69, 0.05);
}

.premium-org-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(11, 83, 69, 0.08) !important;
}

/* Accent Card Headings */
.card-banner-gold {
    height: 90px;
    background: linear-gradient(135deg, #cca43b 0%, #b38f32 100%);
}
.card-banner-green {
    height: 90px;
    background: linear-gradient(135deg, #0b5345 0%, #063129 100%);
}

/* Avatar Border Frame */
.avatar-wrapper {
    width: 110px;
    height: 110px;
    margin: -55px auto 15px auto;
    position: relative;
    z-index: 2;
    border-radius: 50%;
    padding: 5px;
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

/* Card Typography & Details */
.card-body-content {
    padding: 0 20px;
}

.staff-name {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-top: 12px;
    margin-bottom: 4px;
}

.staff-nip {
    letter-spacing: 0.5px;
}
.text-light-green {
    color: rgba(255, 255, 255, 0.7) !important;
}

/* Elegant Role Badges */
.role-badge-gold {
    display: inline-block;
    padding: 5px 16px;
    background-color: rgba(204, 164, 59, 0.1);
    color: #b38f32;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 30px;
    border: 1px solid rgba(204, 164, 59, 0.2);
}

.role-badge-green {
    display: inline-block;
    padding: 5px 16px;
    background-color: rgba(255, 255, 255, 0.15);
    color: #cca43b;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 30px;
    border: 1px solid rgba(254, 254, 254, 0.2);
}

/* Featured Prodi (Kaprodi Center Card Styling) */
.featured-prodi {
    background-color: #0b5345;
    border: 1px solid #cca43b;
}
.featured-prodi .avatar-wrapper {
    background: #0b5345;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

/* Mini Card Configuration for Bottom Rows */
.premium-org-card.mini {
    padding: 20px;
    border-radius: 12px;
    border-bottom: 3px solid #cca43b;
}
.premium-org-card.mini .staff-name {
    margin-top: 0;
    font-size: 1rem;
}

/* Max Width Constraint Helper */
.max-w-md {
    max-width: 550px;
}
</style>
@endsection
