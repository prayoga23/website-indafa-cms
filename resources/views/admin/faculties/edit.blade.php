@extends('layouts_admin.admin')

@section('title', 'Edit Fakultas')
@section('page-title', 'Edit Fakultas')

@section('content')

<div class="card">

    <form action="{{ route('admin.faculties.update',$faculty->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.faculties.form')

        <div class="card-footer">

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.faculties.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
