@extends('layouts_admin.admin')

@section('title','Pengumuman')
@section('page-title','Pengumuman')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.announcements.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Pengumuman

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
                <th width="50">No</th>
                <th>Judul</th>
                <th>Tanggal Publish</th>
                <th>Status</th>
                <th>Views</th>
                <th width="180">Aksi</th>
            </tr>

            </thead>

            <tbody>

            @forelse($announcements as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->title }}
                    </td>

                    <td>
                        {{ $item->publish_date }}
                    </td>

                    <td>

                        @if($item->status == 'publish')

                            <span class="badge badge-success">
                                Publish
                            </span>

                        @else

                            <span class="badge badge-secondary">
                                Draft
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $item->views }}
                    </td>

                    <td>

                        <a href="{{ route('admin.announcements.show',$item) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('admin.announcements.edit',$item) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form
                            action="{{ route('admin.announcements.destroy',$item) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Data kosong
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $announcements->links() }}

        </div>

    </div>

</div>

@endsection
