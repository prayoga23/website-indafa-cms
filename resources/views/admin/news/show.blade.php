@extends('layouts_admin.admin')

@section('title','Detail Berita')
@section('page-title','Detail Berita')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>{{ $news->title }}</h3>

        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">
            Kembali
        </a>
    </div>

    <div class="card-body">

        @if($news->image)
            <img src="{{ asset('storage/'.$news->image) }}"
                 class="img-fluid mb-3"
                 style="max-height:300px;">
        @endif

        <div class="content">
            {!! $news->content !!}
        </div>

    </div>
</div>

@endsection
