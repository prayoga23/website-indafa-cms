@extends('frontend.layouts.app')

@section('title', $news->title)

@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($news->content), 160))

@section('content')

    <div class="container-fluid bg-breadcrumb py-5"
     style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ $news->thumbnail ? asset('storage/'.$news->thumbnail) : asset('img/default-banner.jpg') }}'); background-size: cover; background-position: center;">

    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $news->title }}</h3>
        <p class="fs-5 text-white mb-4">
            <i class="bi bi-calendar me-2"></i> {{ $news->created_at->format('d F Y') }}
        </p>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">News</a></li>
            <li class="breadcrumb-item active text-white">Detail</li>
        </ol>
    </div>
</div>
    <div class="container-fluid causes py-5">
        <div class="container py-5">
            <div class="row g-5">

                {{-- KONTEN UTAMA BERITA (Kiri) --}}
                <div class="col-lg-8">
                    <article class="news-detail-wrapper">
                        @if($news->thumbnail)
                            <div class="main-news-img mb-4">
                                <img src="{{ asset('storage/'.$news->thumbnail) }}" class="img-fluid w-100 rounded" alt="{{ $news->title }}">
                            </div>
                        @endif

                        <div class="news-content entry-content fs-5 lh-lg">
                            {!! $news->content !!}
                        </div>
                    </article>

                    <hr class="my-5">

                    {{-- RELATED NEWS (Berita Terkait) --}}
                    <div class="related-news">
                        <div class="pb-4">
                            <h5 class="text-uppercase text-primary">Rekomendasi</h5>
                            <h2 class="mb-0">Berita Terkait</h2>
                        </div>

                        <div class="row g-4">
                            @foreach($relatedNews as $item)
                                <div class="col-md-6 col-xl-4">
                                    <div class="causes-item card h-100 border-0 shadow-sm">
                                        <div class="causes-img position-relative overflow-hidden">
                                            @if($item->thumbnail)
                                                <img src="{{ asset('storage/'.$item->thumbnail) }}" class="img-fluid w-100" alt="{{ $item->title }}">
                                            @else
                                                <img src="{{ asset('img/placeholder.jpg') }}" class="img-fluid w-100" alt="No Image">
                                            @endif
                                        </div>
                                        <div class="causes-content p-4">
                                            <h5 class="mb-3 line-clamp-2">
                                                {{ $item->title }}
                                            </h5>
                                            <p class="mb-3 small text-muted">
                                                {{ $item->created_at->format('d M Y') }}
                                            </p>
                                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-3" href="{{ route('news.show', $item->slug) }}">
                                                Baca Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR BERITA TERBARU (Kanan) --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 text-white">Berita Terbaru</h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach($latestNews as $item)
                                <div class="mb-3 pb-3 border-bottom last-border-0">
                                    <a href="{{ route('news.show', $item->slug) }}" class="text-dark d-block fw-bold text-decoration-none hover-primary">
                                        {{ $item->title }}
                                    </a>
                                    <small class="text-muted d-block mt-1">
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
