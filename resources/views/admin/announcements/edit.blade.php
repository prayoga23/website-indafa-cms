@extends('layouts_admin.admin')

@section('title', 'Edit Pengumuman')
@section('page-title', 'Edit Pengumuman')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0">
        <h6 class="font-weight-bolder text-dark mb-0">Form Edit Pengumuman</h6>
    </div>

    <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
            @include('admin.announcements._form')
        </div>

        <div class="card-footer pt-0 d-flex gap-2">
            <button type="submit" class="btn btn-warning text-white">
                <i class="fas fa-save me-1"></i> Perbarui
            </button>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

