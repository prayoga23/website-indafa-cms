@extends('frontend.layouts.app')

@section('title', $faculty->name)

@section('content')

<section class="faculty-banner">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <h1>
                    {{ $faculty->name }}
                </h1>

                <p>
                    {{ $faculty->short_description }}
                </p>

            </div>

            <div class="col-lg-5">

                <img src="{{ asset('storage/'.$faculty->image) }}"
                     class="img-fluid">

            </div>

        </div>

    </div>

</section>

{{-- PROFIL --}}

<section class="py-5">

    <div class="container">

        <h2>Profil Fakultas</h2>

        {!! $faculty->description !!}

    </div>

</section>

{{-- PROGRAM STUDI --}}

<section class="section-gray">

    <div class="container">

        <h2 class="mb-4">
            Program Studi
        </h2>

        <div class="row">

            @foreach($faculty->studyPrograms as $program)

                <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-body">

                            <h5>
                                {{ $program->name }}
                            </h5>

                            <p>
                                {{ $program->degree }}
                            </p>

                            <a href="{{ route('programs.show',$program->slug) }}"
                               class="btn btn-outline-success">

                                Detail

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

        <h2>Dosen</h2>

        <div class="row">

            @foreach($faculty->studyPrograms as $program)

                @foreach($program->lecturers as $lecturer)

                    <div class="col-lg-3 mb-4">

                        <div class="card">

                            <img src="{{ asset('storage/'.$lecturer->photo) }}"
                                 class="card-img-top">

                            <div class="card-body text-center">

                                <h6>
                                    {{ $lecturer->name }}
                                </h6>

                                <small>
                                    {{ $program->name }}
                                </small>

                            </div>

                        </div>

                    </div>

                @endforeach

            @endforeach

        </div>

    </div>

</section>

{{-- BERITA --}}

<section class="section-gray">

    <div class="container">

        <h2>Berita Fakultas</h2>

        <div class="row">

            @foreach($faculty->news as $news)

                <div class="col-lg-4 mb-4">

                    <div class="card">

                        <img src="{{ asset('storage/'.$news->thumbnail) }}"
                             class="card-img-top">

                        <div class="card-body">

                            <h5>
                                {{ $news->title }}
                            </h5>

                            <a href="{{ route('news.show',$news->slug) }}"
                               class="btn btn-success">

                                Baca

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

{{-- GALERI --}}

<section class="py-5">

    <div class="container">

        <h2>Galeri Fakultas</h2>

        <div class="row">

            @foreach($faculty->galleries as $gallery)

                <div class="col-lg-3 mb-4">

                    <div class="card">

                        <img src="{{ asset('storage/'.$gallery->cover_image) }}"
                             class="card-img-top">

                        <div class="card-body">

                            {{ $gallery->title }}

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
