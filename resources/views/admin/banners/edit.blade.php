@extends('layouts_admin.admin')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')

@section('content')

<form action="{{ route('admin.banners.update', $banner->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('admin.banners._form')

</form>

@endsection
