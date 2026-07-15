@extends('layouts_admin.admin')

@section('title',$gallery->title)
@section('page-title',$gallery->title)

@section('content')

<div class="card">

    <div class="card-body">

    <h3>
        {{ $gallery->title }}
    </h3>

    <p>
        {{ $gallery->description }}
    </p>

    <hr>

    <h5>
        Upload Foto
    </h5>

    <form
        action="{{ route('admin.galleries.photos.store',$gallery) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <input
                type="file"
                name="images[]"
                multiple
                class="form-control"
                required>

        </div>

        <button
            class="btn btn-success">

            Upload Foto

        </button>

    </form>

    <hr>

    <div class="row">

        @forelse($gallery->photos as $photo)

            <div class="col-md-3">

                <div class="card">

                    <img
                        src="{{ asset('storage/'.$photo->image) }}"
                        class="card-img-top"
                        style="
                            height:200px;
                            object-fit:cover;
                        ">

                    <div class="card-body text-center">

                        <form
                            action="{{ route('admin.gallery-photos.destroy',$photo) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus foto?')">

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">

                    Belum ada foto.

                </div>

            </div>

        @endforelse

    </div>

</div>

</div>

@endsection
