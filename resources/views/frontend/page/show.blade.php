@extends('frontend.layouts.app')

@section('title', $page->meta_title ?: $page->title)

@section('meta_description', $page->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($page->content), 160))

@section('content')

    {{-- HERO BANNER / BREADCRUMB --}}
    <div class="container-fluid bg-breadcrumb py-5"
         style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ $page->featured_image ? asset('storage/'.$page->featured_image) : asset('img/default-banner.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">{{ $page->title }}</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active text-white">{{ $page->title }}</li>
            </ol>
        </div>
    </div>

    {{-- MAIN CONTENT SECTION --}}
    <div class="container-fluid causes py-5">
        <div class="container py-5">
            <div class="row g-5">

                {{-- KONTEN UTAMA (Kiri) --}}
                <div class="col-lg-8">
                    <article class="news-detail-wrapper">
                        @if($page->featured_image)
                            <div class="main-news-img mb-4">
                                <img src="{{ asset('storage/'.$page->featured_image) }}" class="img-fluid w-100 rounded" alt="{{ $page->title }}">
                            </div>
                        @endif

                        <div class="news-content entry-content fs-5 lh-lg">
                            {!! $page->content !!}
                        </div>
                    </article>
                </div>

                {{-- SIDEBAR HALAMAN LAIN (Kanan) --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 text-white">Profil Kampus</h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach($otherPages as $menu)
                                <div class="mb-3 pb-3 border-bottom last-border-0">
                                    <a href="{{ route('page.show', $menu->slug) }}" class="text-dark d-block fw-bold text-decoration-none hover-primary">
                                        {{ $menu->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
