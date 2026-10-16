@extends('layouts_admin.admin')

@section('title', 'Detail Dosen: ' . $lecturer->name)
@section('page-title', 'Detail Data Dosen')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Profil Dosen</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.lecturers.edit', $lecturer->id) }}" class="btn btn-warning btn-sm mr-2 text-white">
                        <i class="fas fa-edit mr-1"></i> Edit Data
                    </a>
                    <a href="{{ route('admin.lecturers.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body text-center py-4">
                @if($lecturer->photo)
                    <img src="{{ asset('storage/' . $lecturer->photo) }}" width="140" height="140" class="rounded-circle shadow-sm border mb-3" style="object-fit: cover;" alt="{{ $lecturer->name }}">
                @else
                    <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow-sm mb-3" style="width: 140px; height: 140px; font-size: 3rem;">
                        <i class="fas fa-user"></i>
                    </div>
                @endif

                <h3 class="font-weight-bold mb-1">{{ $lecturer->name }}</h3>
                <p class="text-primary font-weight-bold mb-1">{{ $lecturer->position ?? 'Dosen' }}</p>
                <p class="text-muted mb-3">
                    <i class="fas fa-graduation-cap mr-1"></i> {{ $lecturer->studyProgram->name ?? '-' }} &bull;
                    <i class="fas fa-university mr-1"></i> {{ $lecturer->faculty->name ?? '-' }}
                </p>

                <div class="row text-start text-md-left border rounded p-3 mb-3 bg-light">
                    <div class="col-md-6 mb-2">
                        <span class="text-muted d-block small">NIDN:</span>
                        <strong>{{ $lecturer->nidn ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-2">
                        <span class="text-muted d-block small">Pendidikan Terakhir:</span>
                        <strong>{{ $lecturer->education ?? '-' }}</strong>
                    </div>
                </div>

                @if($lecturer->bio)
                    <div class="text-start text-md-left border-top pt-3">
                        <h6 class="font-weight-bold mb-2">Biografi & Keahlian:</h6>
                        <div class="text-muted">{!! nl2br(e($lecturer->bio)) !!}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
