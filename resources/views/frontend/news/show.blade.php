@extends('frontend.layouts.app')

@section('title', $news->title)

@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($news->content), 160))

@section('content')

    <div class="container-fluid py-5" style="background-color: #07522fff; margin-top: 56px;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white mb-4" style="font-size: 3rem; font-weight: 700;">{{ $news->title }}</h3>
            <p class="fs-5 text-white mb-4">
                <i class="bi bi-calendar me-2"></i> {{ $news->created_at->format('d F Y') }}
            </p>
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
                      

                        <div class="row g-4">
                            @foreach($relatedNews as $item)
                                <div class="col-md-6 col-xl-4">
                                    <div class="causes-item card h-100 border-0 shadow-sm">
                                        <div class="causes-img position-relative overflow-hidden">
                                            @if($item->thumbnail)
                                                <img src="{{ asset('storage/'.$item->thumbnail) }}" class="img-fluid w-100" alt="{{ $item->title }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
                                            @else
                                                <img src="{{ asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100" alt="No Image">
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

            </div>
        </div>
    </div>
    @endsection
