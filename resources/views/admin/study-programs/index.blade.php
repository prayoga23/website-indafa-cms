@extends('layouts_admin.admin')

@section('title', 'Program Studi')
@section('page-title', 'Data Program Studi')

@section('content')

<div class="card">

    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">

        <a href="{{ route('admin.study-programs.create') }}"
           class="btn btn-primary mb-0">

            <i class="fas fa-plus"></i>
            Tambah Program Studi

        </a>

        <a href="{{ route('admin.portal-prodi.index') }}"
           class="btn btn-success mb-0 text-white font-weight-bold">
            <i class="fas fa-globe me-1"></i> Kelola Tampilan Website Prodi (Tanpa Coding)
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

                            @php
                                $prodiCode = match($studyProgram->slug) {
                                    'hukum-keluarga-islam' => 'hki',
                                    'hukum-ekonomi-syariah' => 'hes',
                                    'manajemen-bisnis-syariah' => 'mbs',
                                    'ekonomi-syariah' => 'ekos',
                                    'pendidikan-agama' => 'pai',
                                    default => null
                                };
                            @endphp

                            @if($prodiCode)
                                <a href="{{ route('admin.portal-prodi.edit', $prodiCode) }}"
                                   class="btn btn-info btn-sm text-white"
                                   title="Edit Isi Website Prodi (Tanpa Coding)">
                                    <i class="fas fa-globe"></i>
                                </a>
                            @endif

                            <a href="{{ route('admin.study-programs.edit', $studyProgram->id) }}"
                               class="btn btn-warning btn-sm"
                               title="Edit Data Master">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('admin.study-programs.destroy', $studyProgram->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus">

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
