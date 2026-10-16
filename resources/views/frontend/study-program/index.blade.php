@extends('frontend.layouts.app')

@section('title', 'Program Studi')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Program Studi</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($programs as $program)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <small class="text-success">
                                {{ $program->faculty->name ?? '' }}
                            </small>
                            <h4>
                                {{ $program->name }}
                            </h4>
                            <a href="{{ route('programs.show', $program->slug) }}" class="btn btn-success">
                                Detail Prodi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $programs->links() }}
    </div>
</section>
@endsection

