@extends('layouts_admin.admin')

@section('title','Edit Dosen')
@section('page-title','Edit Dosen')

@section('content')

<div class="card card-warning">

    <form action="{{ route('admin.lecturers.update',$lecturer->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.lecturers.form')

        <div class="card-footer">

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.lecturers.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
