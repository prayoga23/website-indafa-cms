@extends('layouts_admin.admin')

@section('title', 'Tambah Fakultas')
@section('page-title', 'Tambah Fakultas')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0">
        <h6 class="font-weight-bolder text-dark mb-0">Form Tambah Fakultas</h6>
    </div>

    <form action="{{ route('admin.faculties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.faculties.form')

        <div class="card-footer pt-0 d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.faculties.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

