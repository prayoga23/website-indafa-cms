@extends('frontend.layouts.app')

@section('title', 'Fakultas')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Fakultas</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($faculties as $faculty)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/'.$faculty->image) }}" class="card-img-top" alt="{{ $faculty->name }}">
                        <div class="card-body">
                            <h5>{{ $faculty->name }}</h5>
                            <p>{{ Str::limit(strip_tags($faculty->description), 120) }}</p>
                            <a href="{{ route('faculties.show', $faculty->slug) }}" class="btn btn-success">
                                Detail Fakultas
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $faculties->links() }}
    </div>
</section>
@endsection

