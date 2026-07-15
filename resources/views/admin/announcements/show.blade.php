@extends('layouts_admin.admin')

@section('title','Detail Pengumuman')
@section('page-title','Detail Pengumuman')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>
            {{ $announcement->title }}
        </h4>

    </div>

    <div class="card-body">

        <div class="mb-3">

            <strong>Status :</strong>

            @if($announcement->status == 'publish')

                <span class="badge badge-success">
                    Publish
                </span>

            @else

                <span class="badge badge-secondary">
                    Draft
                </span>

            @endif

        </div>

        <div class="mb-3">

            <strong>Tanggal Publish :</strong>

            {{ $announcement->publish_date }}

        </div>

        <div class="mb-3">

            <strong>Views :</strong>

            {{ $announcement->views }}

        </div>

        <hr>

        {!! $announcement->content !!}

    </div>

</div>

@endsection
