@extends('layouts_admin.admin')

@section('title', 'Tambah Banner')
@section('page-title', 'Tambah Banner')

@section('content')

<form action="{{ route('admin.banners.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @include('admin.banners._form')

</form>

@endsection
