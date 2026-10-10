@extends('layouts_admin.admin')

@section('title','Galeri')
@section('page-title','Galeri')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.galleries.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Album

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

            <tr>

                <th>Cover</th>

                <th>Album</th>

                <th>Fakultas</th>

                <th>Prodi</th>

                <th>Status</th>

                <th width="180">
                    Aksi
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($galleries as $gallery)

                <tr>

                    <td width="120">

                        @if($gallery->cover_image)

                            <img
                                src="{{ asset('storage/'.$gallery->cover_image) }}"
                                width="100">

                        @endif

                    </td>

                    <td>
                        {{ $gallery->title }}
                    </td>

                    <td>
                        {{ $gallery->faculty?->name ?? '-' }}
                    </td>

                    <td>
                        {{ $gallery->studyProgram?->name ?? '-' }}
                    </td>

                    <td>

                        <span class="badge badge-success">

                            {{ ucfirst($gallery->status) }}

                        </span>

                    </td>

                    <td>

                        <a href="{{ route('admin.galleries.show',$gallery) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('admin.galleries.edit',$gallery) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form
                            action="{{ route('admin.galleries.destroy',$gallery) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus data?')"
                                class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center">

                        Tidak ada data

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        {{ $galleries->links() }}

    </div>

</div>

@endsection
