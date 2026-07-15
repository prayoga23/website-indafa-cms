@extends('layouts_admin.admin')

@section('title','Edit Berita')
@section('page-title','Edit Berita')

@section('content')

<div class="card card-warning">

    <form action="{{ route('admin.news.update',$news->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.news.form')

        <div class="card-footer">

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.news.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>
@push('js')
<script src="https://cdn.ckeditor.com/4.25.1-lts/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>
@endpush

@endsection
