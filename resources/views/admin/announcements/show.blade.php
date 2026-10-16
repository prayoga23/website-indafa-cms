@extends('layouts_admin.admin')

@section('title', 'Detail Pengumuman')
@section('page-title', 'Detail Pengumuman')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">{{ $announcement->title }}</h5>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary btn-sm mb-0">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <strong>Status:</strong>
            @if($announcement->status == 'publish')
                <span class="badge bg-success">Publish</span>
            @else
                <span class="badge bg-secondary">Draft</span>
            @endif
        </div>

        <div class="mb-3">
            <strong>Tanggal Publish:</strong>
            <span>{{ $announcement->publish_date }}</span>
        </div>

        <div class="mb-3">
            <strong>Views:</strong>
            <span>{{ $announcement->views }}</span>
        </div>

        <hr>

        <div class="announcement-content">
            {!! $announcement->content !!}
        </div>
    </div>
</div>
@endsection

