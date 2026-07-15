@extends('layouts_admin.admin')

@section('title','Edit Halaman')
@section('page-title','Edit Halaman')

@section('content')

<div class="card card-warning">

    <form action="{{ route('admin.pages.update',$page) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            @include('admin.pages._form')

        </div>

        <div class="card-footer">

            <button class="btn btn-warning">
                Update
            </button>

        </div>

    </form>

</div>

@endsection
