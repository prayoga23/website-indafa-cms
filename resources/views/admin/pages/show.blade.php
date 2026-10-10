@extends('layouts_admin.admin')

@section('title',$page->title)
@section('page-title',$page->title)

@section('content')

<div class="card">

    <div class="card-body">

        <h2>{{ $page->title }}</h2>

        <p class="text-muted">
            {{ $page->excerpt }}
        </p>

        <hr>

        @if($page->featured_image)

            <img src="{{ asset('storage/'.$page->featured_image) }}"
                 class="img-fluid mb-3">

        @endif

        <div>
            {!! $page->content !!}
        </div>

    </div>

</div>

@endsection
