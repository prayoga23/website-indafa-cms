@extends('layouts_admin.admin')

@section('title', 'Kelola Statistik Kampus')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Statistik Kampus (Angka Bicara)</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Statistik</li>
    </ol>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-chart-bar me-1"></i> Perbarui Data Statistik Utama
        </div>
        <div class="card-body">
            <form action="{{ route('admin.statistic.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Jumlah Mahasiswa Aktif --}}
                    <div class="col-md-6 mb-4">
                        <label for="students_count" class="form-label fw-semibold">
                            <i class="fas fa-user-graduate text-primary me-1"></i> Jumlah Mahasiswa Aktif <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control form-control-lg @error('students_count') is-invalid @enderror"
                               id="students_count" name="students_count"
                               value="{{ old('students_count', $statistic->students_count ?? 0) }}" min="0" required>
                        @error('students_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah Dosen / Pengajar --}}
                    <div class="col-md-6 mb-4">
                        <label for="lecturers_count" class="form-label fw-semibold">
                            <i class="fas fa-chalkboard-teacher text-success me-1"></i> Jumlah Dosen & Staf <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control form-control-lg @error('lecturers_count') is-invalid @enderror"
                               id="lecturers_count" name="lecturers_count"
                               value="{{ old('lecturers_count', $statistic->lecturers_count ?? 0) }}" min="0" required>
                        @error('lecturers_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Jumlah Alumni --}}
                    <div class="col-md-6 mb-4">
                        <label for="alumni_count" class="form-label fw-semibold">
                            <i class="fas fa-users text-warning me-1"></i> Jumlah Alumni Terdata <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control form-control-lg @error('alumni_count') is-invalid @enderror"
                               id="alumni_count" name="alumni_count"
                               value="{{ old('alumni_count', $statistic->alumni_count ?? 0) }}" min="0" required>
                        @error('alumni_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah Program Studi --}}
                    <div class="col-md-6 mb-4">
                        <label for="programs_count" class="form-label fw-semibold">
                            <i class="fas fa-book-open text-info me-1"></i> Jumlah Program Studi <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control form-control-lg @error('programs_count') is-invalid @enderror"
                               id="programs_count" name="programs_count"
                               value="{{ old('programs_count', $statistic->programs_count ?? 0) }}" min="0" required>
                        @error('programs_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                        <i class="fas fa-save me-1"></i> Simpan Data Statistik
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
