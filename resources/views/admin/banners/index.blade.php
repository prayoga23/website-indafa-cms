@extends('layouts_admin.admin')

@section('title','Banner Homepage')
@section('page-title','Banner Homepage')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.banners.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Banner

        </a>

    </div>

    <div class="card-body p-0">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>
                <th width="50">No</th>
                <th width="180">Banner</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aktif</th>
                <th>Urutan</th>
                <th>Periode</th>
                <th width="180">Aksi</th>
            </tr>

            </thead>

            <tbody>

            @forelse($banners as $banner)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        <img src="{{ asset('storage/'.$banner->image) }}"
                             class="img-fluid img-thumbnail">

                    </td>

                    <td>

                        <strong>{{ $banner->title }}</strong>

                        @if($banner->subtitle)
                            <br>
                            <small>{{ $banner->subtitle }}</small>
                        @endif

                    </td>

                    <td>

                        @if($banner->status == 'publish')

                            <span class="badge badge-success">
                                Publish
                            </span>

                        @else

                            <span class="badge badge-secondary">
                                Draft
                            </span>

                        @endif

                         @if($banner->faculty)
                            <span class="badge badge-info">
                                Fakultas: {{ $banner->faculty->name }}
                            </span>
                        @endif

                        @if($banner->studyProgram)
                            <span class="badge badge-warning">
                                Prodi: {{ $banner->studyProgram->name }}
                            </span>
                        @endif

                        @if(!$banner->faculty && !$banner->studyProgram)
                            <span class="badge badge-secondary">
                                Kampus Umum
                            </span>
                        @endif

                    </td>

                    <td>

                        @if($banner->is_active)

                            <span class="badge badge-primary">
                                Aktif
                            </span>

                        @else

                            <span class="badge badge-danger">
                                Nonaktif
                            </span>

                        @endif

                    </td>

                    <td>{{ $banner->sort_order }}</td>

                    <td>

                        {{ $banner->start_date?->format('d M Y') }}
                        <br>
                        s/d
                        <br>
                        {{ $banner->end_date?->format('d M Y') }}

                    </td>

                    <td>

                        <a href="{{ route('admin.banners.show',$banner->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('admin.banners.edit',$banner->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form action="{{ route('admin.banners.destroy',$banner->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus banner?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        Belum ada banner

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="card-footer">

        {{ $banners->links() }}

    </div>

</div>

@endsection
