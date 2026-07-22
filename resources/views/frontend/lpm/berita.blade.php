@extends('frontend.layouts.app')

@section('title', 'Berita LPM - INDAFA Bondowoso')

@section('content')
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/Q8Fe55EmaxIEh2wLTOBa08cqk2Vsy8ljDEdB0a5i.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penjaminan Mutu</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">Berita & Kegiatan</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <div class="row g-4">
            @forelse($news as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-lift">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/img/carousel-3.jpg') }}" class="card-img-top" alt="News Image" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-warning-subtle text-dark px-3 py-1 rounded-pill small">Berita LPM</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $item->created_at ? $item->created_at->format('d M Y') : 'Terbaru' }}</small>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">
                                <a href="{{ route('news.show', $item->slug ?? '#') }}" class="text-dark text-decoration-none hover-primary">{{ $item->title }}</a>
                            </h5>
                            <p class="text-secondary small mb-4 flex-grow-1" style="line-height:1.7;">
                                {!! Str::limit(strip_tags($item->content), 100) !!}
                            </p>
                            <div>
                                <a href="{{ route('news.show', $item->slug ?? '#') }}" class="btn btn-sm btn-outline-success rounded-pill px-3 w-100">
                                    Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center py-5 border rounded-4">
                        <i class="bi bi-newspaper fs-1 text-muted d-block mb-3"></i>
                        <h5 class="fw-bold text-dark">Belum ada Berita</h5>
                        <p class="text-muted mb-0">Berita dan rilis kegiatan penjaminan mutu LPM akan dipublikasikan di sini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if(method_exists($news, 'links'))
            <div class="mt-4 d-flex justify-content-center">
                {{ $news->links() }}
            </div>
        @endif

    </div>
</section>
@endsection
