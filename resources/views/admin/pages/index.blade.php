@extends('layouts_admin.admin')

@section('title','Halaman CMS')
@section('page-title','Halaman CMS')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.pages.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Halaman

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">

            <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Scope</th>
                <th>Status</th>
                <th width="180">Aksi</th>
            </tr>
            </thead>

            <tbody>

            @forelse($pages as $page)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $page->title }}
                        <br>
                        <small class="text-muted">
                            {{ $page->slug }}
                        </small>
                    </td>

                    <td>

                        @if($page->faculty)
                            <span class="badge badge-info">
                                Fakultas: {{ $page->faculty->name }}
                            </span>
                        @endif

                        @if($page->studyProgram)
                            <span class="badge badge-warning">
                                Prodi: {{ $page->studyProgram->name }}
                            </span>
                        @endif

                        @if(!$page->faculty && !$page->studyProgram)
                            <span class="badge badge-secondary">
                                Kampus Umum
                            </span>
                        @endif

                    </td>

                    <td>

                        @if($page->status == 'publish')
                            <span class="badge badge-success">Publish</span>
                        @else
                            <span class="badge badge-secondary">Draft</span>
                        @endif

                    </td>

                    <td>

                        <a href="{{ route('admin.pages.show',$page) }}"
                           class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('admin.pages.edit',$page) }}"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.pages.destroy',$page) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus halaman ini?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        Data kosong
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $pages->links() }}
        </div>

    </div>

</div>

@endsection
