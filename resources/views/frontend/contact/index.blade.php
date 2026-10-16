@extends('frontend.layouts.app')

@section('title', 'Kontak')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Kontak Kami</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">Informasi Kampus</h4>
                        <hr>
                        <p class="mb-3">
                            <strong class="d-block text-secondary small">Alamat :</strong>
                            {{ $setting->address ?? 'Jl. Raya Kampus' }}
                        </p>
                        <p class="mb-3">
                            <strong class="d-block text-secondary small">Telepon :</strong>
                            {{ $setting->phone ?? '-' }}
                        </p>
                        <p class="mb-0">
                            <strong class="d-block text-secondary small">Email :</strong>
                            {{ $setting->email ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-2">
                        <div class="ratio ratio-16x9">
                            {!! $setting->google_maps ?? '<div class="d-flex align-items-center justify-content-center bg-light text-muted">Peta Lokasi Belum Diatur</div>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

