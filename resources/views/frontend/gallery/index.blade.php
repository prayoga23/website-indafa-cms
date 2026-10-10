@extends('frontend.layouts.app')

@section('title','Galeri')

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

                <div class="col-lg-3 mb-4">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body">

                            <h5>

                                {{ $album->title }}

                            </h5>

                            <small>

                                {{ $album->images_count }} Foto

                            </small>

                            <hr>

                            <a href="{{ route('gallery.show',$album->slug) }}"
                               class="btn btn-success">

                                Lihat Album

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{ $albums->links() }}

    </div>

</section>

@endsection
