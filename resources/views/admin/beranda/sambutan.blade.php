@extends('layouts_admin.admin') {{-- Sesuaikan dengan master layout admin kamu --}}

@section('title', 'Kelola Sambutan Ketua Prodi')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Sambutan Ketua Prodi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Sambutan</li>
    </ol>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-edit me-1"></i> Form Edit Sambutan
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Nama Kaprodi --}}
                    <div class="col-md-6 mb-3">
                        <label for="kaprodi_name" class="form-label fw-semibold">Nama Ketua Prodi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kaprodi_name') is-invalid @enderror"
                               id="kaprodi_name" name="kaprodi_name" value="{{ old('kaprodi_name', $welcome->kaprodi_name ?? '') }}" required>
                        @error('kaprodi_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jabatan / Gelar --}}
                    <div class="col-md-6 mb-3">
                        <label for="kaprodi_title" class="form-label fw-semibold">Jabatan / Gelar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kaprodi_title') is-invalid @enderror"
                               id="kaprodi_title" name="kaprodi_title" value="{{ old('kaprodi_title', $welcome->kaprodi_title ?? 'Ketua Program Studi') }}" required>
                        @error('kaprodi_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Foto Kaprodi --}}
                    <div class="col-md-4 mb-3">
                        <label for="kaprodi_image" class="form-label fw-semibold">Foto Kaprodi</label>
                        <input type="file" class="form-control @error('kaprodi_image') is-invalid @enderror" id="kaprodi_image" name="kaprodi_image">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maks: 2MB</small>
                        @error('kaprodi_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Preview Foto Saat Ini --}}
                        @if($welcome && $welcome->kaprodi_image)
                            <div class="mt-3">
                                <p class="mb-1 text-muted">Foto Saat Ini:</p>
                                <img src="{{ asset('storage/' . $welcome->kaprodi_image) }}" alt="Foto Kaprodi" class="img-thumbnail" style="max-height: 150px;">
                            </div>
                        @endif
                    </div>

                    {{-- Quote Singkat --}}
                    <div class="col-md-8 mb-3">
                        <label for="quote" class="form-label fw-semibold">Quote Utama (Teks Pendek di Blok) <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('quote') is-invalid @enderror" id="quote" name="quote" rows="4" required>{{ old('quote', $welcome->quote ?? '') }}</textarea>
                        @error('quote')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Teks Sambutan Paragraf 1 --}}
                <div class="mb-3">
                    <label for="welcome_text_1" class="form-label fw-semibold">Isi Sambutan (Paragraf 1) <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('welcome_text_1') is-invalid @enderror" id="welcome_text_1" name="welcome_text_1" rows="4" required>{{ old('welcome_text_1', $welcome->welcome_text_1 ?? '') }}</textarea>
                    @error('welcome_text_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Teks Sambutan Paragraf 2 --}}
                <div class="mb-3">
                    <label for="welcome_text_2" class="form-label fw-semibold">Isi Sambutan (Paragraf 2 - Opsional)</label>
                    <textarea class="form-control @error('welcome_text_2') is-invalid @enderror" id="welcome_text_2" name="welcome_text_2" rows="4">{{ old('welcome_text_2', $welcome->welcome_text_2 ?? '') }}</textarea>
                    @error('welcome_text_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    {{-- Link Profil --}}
                    <div class="col-md-6 mb-3">
                        <label for="profile_link" class="form-label fw-semibold">Link Profil Lengkap</label>
                        <input type="text" class="form-control @error('profile_link') is-invalid @enderror"
                               id="profile_link" name="profile_link" value="{{ old('profile_link', $welcome->profile_link ?? '#') }}">
                        @error('profile_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Link Kontak --}}
                    <div class="col-md-6 mb-3">
                        <label for="contact_link" class="form-label fw-semibold">Link Hubungi Kami</label>
                        <input type="text" class="form-control @error('contact_link') is-invalid @enderror"
                               id="contact_link" name="contact_link" value="{{ old('contact_link', $welcome->contact_link ?? '#') }}">
                        @error('contact_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
