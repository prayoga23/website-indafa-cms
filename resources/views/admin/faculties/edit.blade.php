@extends('layouts_admin.admin')

@section('title', 'Edit Fakultas')
@section('page-title', 'Edit Fakultas')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0">
        <h6 class="font-weight-bolder text-dark mb-0">Form Edit Fakultas</h6>
    </div>

    <form action="{{ route('admin.faculties.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.faculties.form')

        <div class="card-footer pt-0 d-flex gap-2">
            <button type="submit" class="btn btn-warning text-white">
                <i class="fas fa-save me-1"></i> Perbarui
            </button>
            <a href="{{ route('admin.faculties.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

