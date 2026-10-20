<div class="container-fluid causes py-5">
    <div class="container py-5">

        {{-- HEADER SECTION SESUAI TEMA --}}
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h5 class="text-uppercase text-primary">Informasi</h5>
            <h1 class="mb-4">Berita Terbaru</h1>
            <p class="mb-0">Ikuti perkembangan aktivitas, kontribusi, dan perlindungan lingkungan hidup melalui artikel terbaru kami.</p>
        </div>

        {{-- LOOPING DAFTAR BERITA --}}
        <div class="row g-4">
            @foreach($news as $item)
                <div class="col-lg-6 col-xl-3">
                    <div class="causes-item card h-100 border-0 shadow-sm">

                        {{-- THUMBNAIL BERITA --}}
                        <div class="causes-img position-relative overflow-hidden">
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/'.$item->thumbnail) }}" class="img-fluid w-100" alt="{{ $item->title }}" style="height: 220px; object-fit: cover;" onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
                            @else
                                <img src="{{ asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100" alt="No Image" style="height: 220px; object-fit: cover;">
                            @endif

                            {{-- METADATA TANGGAL DI ATAS GAMBAR (Gaya Khas Tema) --}}
                            <div class="causes-link pb-2 px-3">
                                <small class="text-white">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>{{ $item->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>

                        {{-- KONTEN CARD --}}
                        <div class="causes-content p-4 d-flex flex-column justify-content-between">
                            <div>
                                {{-- JUDUL BERITA (Dibatasi maks 2 baris agar rapi) --}}
                                <h5 class="mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 48px;">
                                    {{ $item->title }}
                                </h5>

                                {{-- RINGKASAN ISI BERITA (Opsional) --}}
                                <p class="mb-4 small text-muted" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 90) }}
                                </p>
                            </div>

                            {{-- TOMBOL BACA --}}
                            <div class="mt-auto">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-3 w-100 text-center" href="{{ route('news.show', $item->slug) }}">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
