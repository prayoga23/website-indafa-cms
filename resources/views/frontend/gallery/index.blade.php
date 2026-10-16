@extends('frontend.layouts.app')

@section('title', 'Galeri')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Galeri Kampus</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($albums as $album)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($album->cover_image)
                            <img src="{{ asset('storage/'.$album->cover_image) }}" class="card-img-top" alt="{{ $album->title }}" style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold">{{ $album->title }}</h5>
                            <small class="text-muted mb-3">
                                {{ $album->photos_count ?? 0 }} Foto
                            </small>
                            <div class="mt-auto">
                                <a href="{{ route('gallery.show', $album->slug) }}" class="btn btn-success w-100">
                                    Lihat Album
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $albums->links() }}
    </div>
</section>
@endsection

