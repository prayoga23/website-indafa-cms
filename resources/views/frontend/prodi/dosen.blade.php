@extends('frontend.layouts.app')

@section('title', 'Profil Dosen - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }

    .dosen-prodi-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.08);
        transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.35s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .dosen-prodi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 30px rgba(0, 0, 0, 0.12) !important;
        border-color: var(--pro-color);
    }

    .dosen-img-wrapper {
        position: relative;
        width: 100%;
        height: 280px;
        overflow: hidden;
        background-color: #f1f5f9;
    }

    .dosen-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.5s ease;
    }

    .dosen-prodi-card:hover .dosen-img-wrapper img {
        transform: scale(1.05);
    }

    .dosen-badge-position {
        position: absolute;
        bottom: 12px;
        left: 12px;
        right: 12px;
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(8px);
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 8px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .dosen-info-body {
        padding: 1.5rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .dosen-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.35rem;
    }

    .dosen-specialization {
        display: inline-block;
        color: var(--pro-color);
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .dosen-nidn {
        font-size: 0.8rem;
        color: #64748b;
        margin-bottom: 1rem;
    }

    .dosen-divider-line {
        width: 40px;
        height: 3px;
        background-color: var(--pro-color);
        margin: 0 auto 1rem auto;
        border-radius: 2px;
        opacity: 0.8;
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Profil</h5>
        <h1 class="display-4 fw-bold text-uppercase">Dosen {{ $data['name'] }}</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-4">
        @if(isset($lecturers) && $lecturers->count() > 0)
            <div class="row g-4 justify-content-center">
                @foreach($lecturers as $lecturer)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="dosen-prodi-card shadow-sm">
                        <div class="dosen-img-wrapper">
                            <img src="{{ $lecturer->photo ? asset('storage/' . $lecturer->photo) : asset('assets/img/user.png') }}"
                                 alt="{{ $lecturer->name }}">
                            @if($lecturer->position)
                                <div class="dosen-badge-position">{{ $lecturer->position }}</div>
                            @else
                                <div class="dosen-badge-position">Dosen Pengajar</div>
                            @endif
                        </div>

                        <div class="dosen-info-body">
                            <h5 class="dosen-name">{{ $lecturer->name }}</h5>
                            <span class="dosen-specialization">{{ $lecturer->education ?? 'Dosen Tetap' }}</span>
                            <div class="dosen-divider-line"></div>
                            @if($lecturer->nidn)
                                <p class="dosen-nidn mb-0"><i class="bi bi-card-heading me-1"></i> NUPTK/NIDN: {{ $lecturer->nidn }}</p>
                            @else
                                <p class="dosen-nidn mb-0"><i class="bi bi-card-heading me-1"></i> NUPTK/NIDN: -</p>
                            @endif

                            @if($lecturer->bio)
                                <p class="small text-muted mt-2 mb-0 text-start" style="font-size: 0.8rem; line-height: 1.4;">
                                    {{ Str::limit($lecturer->bio, 80) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row justify-content-center py-5">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="card border-0 shadow-sm rounded-4 p-5" style="background: #ffffff;">
                        <div class="mb-3">
                            <i class="bi bi-person-badge text-muted" style="font-size: 3.5rem; color: var(--pro-color) !important;"></i>
                        </div>
                        <h4 class="fw-bold mb-2 text-dark">Profil Dosen Belum Tersedia</h4>
                        <p class="text-secondary mb-0">
                            Data dewan pengajar untuk <strong>{{ $data['name'] }}</strong> sedang dalam tahap pembaruan data oleh pihak akademis.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
