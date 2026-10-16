@extends('frontend.layouts.app')

@section('title', $album->title)

@section('content')
<section class="page-header">
    <div class="container">
        <h1>{{ $album->title }}</h1>
        @if($album->description)
            <p class="lead text-muted">{{ $album->description }}</p>
        @endif
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            @php
                $photosList = $album->photos ?? $album->images ?? collect();
            @endphp

            @forelse($photosList as $photo)
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <a href="{{ asset('storage/' . ($photo->image ?? $photo->photo ?? '')) }}" target="_blank">
                        <img src="{{ asset('storage/' . ($photo->image ?? $photo->photo ?? '')) }}"
                             class="img-fluid rounded shadow-sm"
                             alt="{{ $photo->caption ?? $album->title }}"
                             style="width: 100%; height: 200px; object-fit: cover;">
                    </a>
                    @if(!empty($photo->caption))
                        <small class="text-muted d-block mt-1 text-center">{{ $photo->caption }}</small>
                    @endif
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <p>Belum ada foto dalam album ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
            </a>
        </div>
    </div>
</section>
@endsection

