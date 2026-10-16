@extends('layouts_admin.admin')

@section('title', 'Edit Album Galeri')
@section('page-title', 'Edit Album Galeri')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card card-warning">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Edit Album: {{ $gallery->title }}</h5>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>
            <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('admin.galleries._form')
                </div>
                <div class="card-footer bg-light d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="fas fa-save mr-1"></i> Perbarui Album
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
