@extends('frontend.layouts.app')

@section('title',$album->title)

@section('content')

<section class="page-header">

    <div class="container">

        <h1>

            {{ $album->title }}

        </h1>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row">

            @foreach($album->images as $image)

                <div class="col-lg-3 col-md-4 col-6 mb-4">

                    <a href="{{ asset('storage/'.$image->image) }}"
                       target="_blank">

                        <img src="{{ asset('storage/'.$image->image) }}"
                             class="img-fluid rounded shadow-sm">

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
