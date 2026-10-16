@extends('layouts_admin.admin')

@section('title', 'Tambah Pengumuman')
@section('page-title', 'Tambah Pengumuman')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0">
        <h6 class="font-weight-bolder text-dark mb-0">Form Tambah Pengumuman</h6>
    </div>

    <form action="{{ route('admin.announcements.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @include('admin.announcements._form')
        </div>

        <div class="card-footer pt-0 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

