@extends('layouts_admin.admin')

@section('title', 'Tambah Agenda Baru')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Agenda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.agenda.index') }}">Agenda</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">
            <i class="fas fa-plus me-1"></i> Form Tambah Agenda Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.agenda.store') }}" method="POST">
                @csrf

                {{-- Judul Agenda --}}
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Agenda <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    {{-- Tanggal Agenda --}}
                    <div class="col-md-4 mb-3">
                        <label for="event_date" class="form-label fw-semibold">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date') }}" required>
                        @error('event_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jam Mulai --}}
                    <div class="col-md-4 mb-3">
                        <label for="start_time" class="form-label fw-semibold">Jam Mulai <span class="text-danger">*</span></label>
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jam Selesai --}}
                    <div class="col-md-4 mb-3">
                        <label for="end_time" class="form-label fw-semibold">Jam Selesai (Opsional)</label>
                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time') }}">
                        @error('end_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Lokasi / Tempat --}}
                    <div class="col-md-8 mb-3">
                        <label for="location" class="form-label fw-semibold">Lokasi / Tempat Pelaksanaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="Contoh: Aula Utama lt.3" required>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori Tag --}}
                    <div class="col-md-4 mb-3">
                        <label for="tag" class="form-label fw-semibold">Kategori / Tag <span class="text-danger">*</span></label>
                        <select class="form-select @error('tag') is-invalid @enderror" id="tag" name="tag" required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            <option value="Seminar" {{ old('tag') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="Workshop" {{ old('tag') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="Wisuda" {{ old('tag') == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
                            <option value="Lainnya" {{ old('tag') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('tag')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary px-3">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-1"></i> Simpan Agenda
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
