@extends('layouts_admin.admin')

@section('title', 'Edit Program Studi')
@section('page-title', 'Edit Program Studi')

@section('content')

<div class="card card-warning">

    <div class="card-header">
        <h3 class="card-title">Form Edit Program Studi</h3>
    </div>

    <form action="{{ route('admin.study-programs.update', $studyProgram->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.study-programs.form')

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">

                <i class="fas fa-save"></i>
                Update

            </button>

            <a href="{{ route('admin.study-programs.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection
