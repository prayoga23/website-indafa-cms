@extends('frontend.layouts.app')

@section('title', $faculty->name)

@section('content')
{{-- HERO BANNER FAKULTAS --}}
<section class="faculty-banner py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="fw-bold mb-3">{{ $faculty->name }}</h1>
                <p class="lead text-muted">{{ $faculty->short_description }}</p>
            </div>
            <div class="col-lg-5 text-center">
                @if($faculty->image)
                    <img src="{{ asset('storage/'.$faculty->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $faculty->name }}">
                @endif
            </div>
        </div>
    </div>
</section>

{{-- PROFIL --}}
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Profil Fakultas</h2>
        <div class="content-body">
            {!! $faculty->description !!}
        </div>
    </div>
</section>

{{-- PROGRAM STUDI --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold mb-4">Program Studi</h2>
        <div class="row">
            @foreach($faculty->studyPrograms as $program)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $program->name }}</h5>
                            <p class="text-muted">{{ $program->degree }}</p>
                            <a href="{{ route('programs.show', $program->slug) }}" class="btn btn-outline-success">
                                Detail Program Studi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- DOSEN --}}
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Daftar Dosen Pengajar</h2>
        <div class="row">
            @foreach($faculty->studyPrograms as $program)
                @foreach($program->lecturers as $lecturer)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            @if($lecturer->photo)
                                <img src="{{ asset('storage/'.$lecturer->photo) }}" class="card-img-top" alt="{{ $lecturer->name }}" style="height: 240px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h6 class="fw-bold mb-1">{{ $lecturer->name }}</h6>
                                <small class="text-muted">{{ $program->name }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>

{{-- BERITA FAKULTAS --}}
@if($faculty->news && $faculty->news->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold mb-4">Berita Fakultas</h2>
        <div class="row">
            @foreach($faculty->news as $news)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($news->thumbnail)
                            <img src="{{ asset('storage/'.$news->thumbnail) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $news->title }}</h5>
                            <a href="{{ route('news.show', $news->slug) }}" class="btn btn-success btn-sm mt-2">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- GALERI FAKULTAS --}}
@if($faculty->galleries && $faculty->galleries->count() > 0)
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Galeri Fakultas</h2>
        <div class="row">
            @foreach($faculty->galleries as $gallery)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($gallery->cover_image)
                            <img src="{{ asset('storage/'.$gallery->cover_image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h6 class="fw-semibold mb-0">{{ $gallery->title }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

