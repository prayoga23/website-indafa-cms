@extends('layouts_admin.admin')

@section('title', 'Detail Berita: ' . $news->title)
@section('page-title', 'Detail Berita')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title font-weight-bold mb-1">{{ $news->title }}</h5>
                    <div class="d-flex align-items-center gap-2 text-muted small">
                        <span><i class="fas fa-calendar mr-1"></i> {{ $news->created_at ? $news->created_at->format('d M Y H:i') : '-' }}</span> &bull;
                        <span><i class="fas fa-eye mr-1"></i> {{ number_format($news->views) }} views</span> &bull;
                        <span class="badge {{ $news->status == 'publish' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($news->status) }}
                        </span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning btn-sm mr-2 text-white">
                        <i class="fas fa-edit mr-1"></i> Edit Berita
                    </a>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if($news->thumbnail)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" class="img-fluid rounded shadow-sm border" style="max-height: 400px; width: 100%; object-fit: cover;" alt="{{ $news->title }}">
                    </div>
                @endif

                <div class="border rounded p-3 mb-4 bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-muted d-block small">Fakultas:</span>
                            <strong>{{ $news->faculty->name ?? 'Kampus Umum' }}</strong>
                        </div>
                        <div class="col-md-6">
                            <span class="text-muted d-block small">Program Studi:</span>
                            <strong>{{ $news->studyProgram->name ?? 'Semua Prodi' }}</strong>
                        </div>
                    </div>
                </div>

                <div class="news-content lead" style="line-height: 1.8; font-size: 1.05rem;">
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
