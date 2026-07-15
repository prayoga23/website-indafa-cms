@extends('layouts_admin.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Dokumen Akademik</h1>
    <p class="text-muted">Unggah regulasi, buku pedoman, formulir, atau berkas unduhan penting bagi mahasiswa dan dosen.</p>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show py-2 small" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.5rem 0.75rem;"></button>
        </div>
    @endif

    {{-- Notifikasi Error --}}
    @if($errors->any())
        <div class="alert alert-danger py-1 small">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold small py-2">
                    <i class="bi bi-file-earmark-arrow-up-fill me-2"></i> + Unggah Dokumen Baru
                </div>
                <div class="card-body small p-3">
                    <form action="{{ route('admin.document.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Nama / Judul Dokumen</label>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="Contoh: Buku Pedoman Akademik 2026" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tahun Terbit / Berlaku</label>
                            <input type="number" name="year" class="form-control form-control-sm" value="{{ date('Y') }}" min="2020" max="{{ date('Y') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih Berkas Dokumen</label>
                            <input type="file" name="file" class="form-control form-control-sm" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required>
                            <div class="form-text" style="font-size: 11px;">Format diizinkan: PDF, DOCX, XLSX, PPTX. Maksimal 5MB.</div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success w-100">Simpan & Unggah Berkas</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light text-dark fw-bold small py-2 border-bottom">
                    <i class="bi bi-folder-fill me-1"></i> Berkas Terunggah di Server
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped align-middle border small">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 50px;">Tipe</th>
                                    <th>Nama Berkas</th>
                                    <th class="text-center" style="width: 80px;">Tahun</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $doc)
                                <tr>
                                    <td class="text-center">
                                        {{-- Logika Penentuan Ikon Otomatis Berdasarkan Ekstensi --}}
                                        @if($doc->file_extension == 'pdf')
                                            <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                                        @elseif(in_array($doc->file_extension, ['doc', 'docx']))
                                            <i class="bi bi-file-earmark-word-fill text-primary fs-4"></i>
                                        @elseif(in_array($doc->file_extension, ['xls', 'xlsx']))
                                            <i class="bi bi-file-earmark-excel-fill text-success fs-4"></i>
                                        @else
                                            <i class="bi bi-file-earmark-text-fill text-secondary fs-4"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <strong class="text-dark-green d-block">{{ $doc->name }}</strong>
                                        <span class="text-muted" style="font-size: 11px;">Path: /storage/{{ $doc->file_path }}</span>
                                    </td>
                                    <td class="text-center font-monospace">{{ $doc->year }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Tombol Cek Download Fisik --}}
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-link btn-sm text-primary p-0 m-0" title="Unduh Berkas">
                                                <i class="bi bi-cloud-arrow-down-fill fs-5"></i>
                                            </a>
                                            {{-- Form Hapus --}}
                                            <form action="{{ route('admin.document.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini secara permanen?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-link btn-sm text-danger p-0 m-0" title="Hapus Berkas"><i class="fa fa-trash fs-5"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Belum ada berkas dokumen akademik yang diunggah.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
