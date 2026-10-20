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

        @if($news->thumbnail_url)
            <img src="{{ $news->thumbnail_url }}"
                 alt="{{ $news->title }}"
                 class="img-fluid rounded-3 mb-4 shadow-sm border border-slate-200"
                 style="max-height: 400px; width: 100%; object-fit: cover;">
        @endif

        <div class="content">
            {!! $news->content !!}
        </div>

    </div>
</div>

@endsection
