@extends('layouts_admin.admin')

@section('title', 'Detail Album: ' . $gallery->title)
@section('page-title', 'Detail Album Galeri')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title font-weight-bold mb-1">{{ $gallery->title }}</h4>
                    <span class="badge {{ $gallery->status == 'publish' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($gallery->status) }}
                    </span>
                    <span class="badge bg-info text-white">
                        <i class="fas fa-university mr-1"></i> {{ $gallery->faculty ? $gallery->faculty->name : 'Kampus Umum' }}
                    </span>
                    @if($gallery->studyProgram)
                        <span class="badge bg-primary text-white">
                            <i class="fas fa-graduation-cap mr-1"></i> {{ $gallery->studyProgram->name }}
                        </span>
                    @endif
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm mr-2 text-white">
                        <i class="fas fa-edit mr-1"></i> Edit Album
                    </a>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($gallery->description)
                    <p class="text-muted mb-4">{{ $gallery->description }}</p>
                @endif

                <div class="card bg-light border p-3 mb-4">
                    <h6 class="font-weight-bold mb-2"><i class="fas fa-cloud-upload-alt mr-1"></i> Tambah Foto ke Album</h6>
                    <form action="{{ route('admin.galleries.photos.store', $gallery) }}" method="POST" enctype="multipart/form-data" class="row g-2 align-items-center">
                        @csrf
                        <div class="col-md-9 mb-2 mb-md-0">
                            <input type="file" name="images[]" multiple class="form-control" accept="image/*" required>
                            <small class="text-muted">Bisa memilih lebih dari satu foto sekaligus (format JPG, JPEG, PNG, WEBP).</small>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-upload mr-1"></i> Upload Foto
                            </button>
                        </div>
                    </form>
                </div>

                <h5 class="font-weight-bold mb-3">Daftar Foto ({{ $gallery->photos->count() }})</h5>
                <div class="row">
                    @forelse($gallery->photos as $photo)
                        <div class="col-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100 shadow-sm border">
                                <img src="{{ asset('storage/' . $photo->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Foto Album">
                                <div class="card-body p-2 text-center">
                                    <form action="{{ route('admin.gallery-photos.destroy', $photo) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                            <i class="fas fa-trash mr-1"></i> Hapus Foto
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center py-4">
                                <i class="fas fa-images fa-2x mb-2 d-block"></i>
                                Belum ada foto dalam album ini. Silakan upload foto menggunakan form di atas.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
