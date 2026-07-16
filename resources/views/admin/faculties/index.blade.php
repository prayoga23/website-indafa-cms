@extends('layouts_admin.admin')

@section('title', 'Fakultas')
@section('page-title', 'Data Fakultas')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.faculties.create') }}"
           class="btn btn-primary">
            Tambah Fakultas
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Logo</th>
                    
                    <th>Nama Fakultas</th>
                    <th>Dekan</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($faculties as $faculty)

                <tr>

                <td width="80">
                
                        @if($faculty->logo)
                            <img src="{{ asset('storage/'.$faculty->logo) }}"
                                 width="60">
                        @endif

                    </td>

                    <td>{{ $faculty->name }}</td>

                    <td>{{ $faculty->dean }}</td>

                    <td>

                        <a href="{{ route('admin.faculties.edit',$faculty->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.faculties.destroy',$faculty->id) }}"
                              method="POST"
                              style="display:inline">

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
                    <td colspan="4" class="text-center">
                        Data kosong
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $faculties->links() }}
        </div>

    </div>

</div>

@endsection
