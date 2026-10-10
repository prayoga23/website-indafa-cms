@extends('layouts_admin.admin')

@section('title','Detail Dosen')

@section('content')

<div class="card">

    <div class="card-body text-center">

        @if($lecturer->photo)
            <img src="{{ asset('storage/'.$lecturer->photo) }}"
                 width="150"
                 class="img-circle">
        @endif

        <h3>{{ $lecturer->name }}</h3>

        <p>{{ $lecturer->position }}</p>

        <p>{{ $lecturer->studyProgram->name }}</p>

        <hr>

        <p>{!! $lecturer->bio !!}</p>

    </div>

</div>

@endsection
