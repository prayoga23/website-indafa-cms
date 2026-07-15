@extends('layouts_admin.admin')

@section('title','Berita')
@section('page-title','Data Berita')

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Judul</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($news as $item)

                <tr>

                    <td>
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/'.$item->thumbnail) }}"
                                 width="70">
                        @endif
                    </td>

                    <td>{{ $item->title }}</td>

                    <td>{{ $item->faculty->name ?? 'Umum' }}</td>

                    <td>{{ $item->studyProgram->name ?? 'Umum' }}</td>

                    <td>
                        @if($item->status == 'publish')
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>

                    <td>{{ $item->views }}</td>

                    <td>

                        <a href="{{ route('admin.news.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <a href="{{ route('admin.news.show', $item->id) }}"
                        class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>

                        <form action="{{ route('admin.news.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus berita?')"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Belum ada berita
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $news->links() }}
        </div>

    </div>

</div>

@endsection
