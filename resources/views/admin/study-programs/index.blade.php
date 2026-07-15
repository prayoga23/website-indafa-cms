@extends('layouts_admin.admin')

@section('title', 'Program Studi')
@section('page-title', 'Data Program Studi')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.study-programs.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Program Studi

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

                <tr>
                    <th width="80">Logo</th>
                    <th>Program Studi</th>
                    <th>Fakultas</th>
                    <th>Jenjang</th>
                    <th>Akreditasi</th>
                    <th>Ketua Prodi</th>
                    <th width="180">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($studyPrograms as $studyProgram)

                    <tr>

                        <td>

                            @if($studyProgram->logo)

                                <img src="{{ asset('storage/'.$studyProgram->logo) }}"
                                     width="60">

                            @endif

                        </td>

                        <td>
                            {{ $studyProgram->name }}
                        </td>

                        <td>
                            {{ $studyProgram->faculty->name ?? '-' }}
                        </td>

                        <td>
                            {{ $studyProgram->degree }}
                        </td>

                        <td>
                            {{ $studyProgram->accreditation }}
                        </td>

                        <td>
                            {{ $studyProgram->head_of_program }}
                        </td>

                        <td>

                            <a href="{{ route('admin.study-programs.edit', $studyProgram->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('admin.study-programs.destroy', $studyProgram->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7"
                            class="text-center">

                            Belum ada data

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $studyPrograms->links() }}
        </div>

    </div>

</div>

@endsection
