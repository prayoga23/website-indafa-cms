@extends('layouts_admin.admin')

@section('title', 'Edit Program Studi')
@section('page-title', 'Edit Program Studi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0">
        <h6 class="font-weight-bolder text-dark mb-0">Form Edit Program Studi</h6>
    </div>

    <form action="{{ route('admin.study-programs.update', $studyProgram->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.study-programs.form')

        <div class="card-footer pt-0 d-flex gap-2">
            <button type="submit" class="btn btn-warning text-white">
                <i class="fas fa-save me-1"></i> Perbarui
            </button>
            <a href="{{ route('admin.study-programs.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

