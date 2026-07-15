@extends('layouts_admin.admin')

@section('title','Dosen')
@section('page-title','Data Dosen')

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('admin.lecturers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Dosen
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>NIDN</th>
                    <th>Jabatan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($lecturers as $lecturer)

                <tr>

                    <td>
                        @if($lecturer->photo)
                            <img src="{{ asset('storage/'.$lecturer->photo) }}"
                                 width="60"
                                 class="img-circle">
                        @endif
                    </td>

                    <td>{{ $lecturer->name }}</td>

                    <td>{{ $lecturer->faculty->name ?? '-' }}</td>

                    <td>{{ $lecturer->studyProgram->name ?? '-' }}</td>

                    <td>{{ $lecturer->nidn }}</td>

                    <td>{{ $lecturer->position }}</td>

                    <td>

                        <a href="{{ route('admin.lecturers.edit',$lecturer->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.lecturers.destroy',$lecturer->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus data?')"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Data belum tersedia
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $lecturers->links() }}
        </div>

    </div>

</div>

@endsection
