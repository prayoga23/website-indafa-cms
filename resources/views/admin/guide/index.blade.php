@extends('layouts_admin.admin')

@section('title', 'Kelola Panduan Akademik')
@section('page-title', 'Buku Pedoman & Alur Prosedur')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-book-reader text-warning"></i> Manajemen Panduan Akademik & Prosedur</h4>
                <p>Kelola berkas unduhan buku pedoman akademik (PDF) dan tahapan alur prosedur KRS / Skripsi.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Panduan Mahasiswa
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        <div class="row g-4">

            {{-- KIRI: MANAJEMEN BUKU PEDOMAN UTAMA --}}
            <div class="col-xl-6">

                {{-- FORM UPLOAD BUKU PEDOMAN --}}
                <div class="form-section-card mb-4">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Upload Buku Pedoman Baru (PDF)</h5>
                            <p class="form-section-desc">Unggah buku panduan akademik, pedoman skripsi, atau tata tertib.</p>
                        </div>
                    </div>

                    @if(session('success_book'))
                        <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                            <i class="fas fa-check-circle me-1"></i> {{ session('success_book') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.guide.book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Judul Buku / Pedoman</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control-custom"
                                   placeholder="Contoh: Buku Pedoman Penulisan Skripsi 2026"
                                   required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Teks Label Badge</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="text"
                                       name="badge_text"
                                       class="form-control-custom"
                                       value="Edisi Terbaru"
                                       placeholder="Contoh: Edisi Terbaru"
                                       required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Warna Tampilan Badge</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <select name="badge_class" class="form-select-custom">
                                    <option value="bg-gold-badge">Emas (Gold Theme)</option>
                                    <option value="bg-dark-green text-white">Hijau Tua (Emerald Theme)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Ikon Tampilan</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <select name="icon_class" class="form-select-custom">
                                    <option value="bi-book-half">📖 Buku / Pedoman (bi-book-half)</option>
                                    <option value="bi-file-earmark-pdf">📄 Berkas PDF (bi-file-earmark-pdf)</option>
                                    <option value="bi-journal-check">📝 Jurnal / Tugas Akhir (bi-journal-check)</option>
                                    <option value="bi-mortarboard">🎓 Akademik / Wisuda (bi-mortarboard)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Warna Latar Ikon</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <select name="icon_wrapper_class" class="form-select-custom">
                                    <option value="bg-light-green text-dark-green">Nuansa Hijau Lembut</option>
                                    <option value="bg-light-gold text-gold">Nuansa Emas Lembut</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Ringkasan Deskripsi Buku</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <textarea name="description"
                                      class="form-control-custom"
                                      rows="2"
                                      placeholder="Ringkasan aturan atau isi pedoman..."
                                      required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">
                                <span>File Dokumen PDF</span>
                                <span class="badge-req">* Wajib (.pdf)</span>
                            </label>
                            <div class="file-dropzone-wrapper py-3">
                                <input type="file"
                                       name="pdf_file"
                                       accept="application/pdf"
                                       required>
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-file-pdf text-rose-600"></i>
                                </div>
                                <div class="text-xs font-semibold text-slate-700">
                                    Klik atau seret file PDF buku pedoman
                                </div>
                                <div class="text-xxs text-slate-500 mt-1">
                                    Format: <strong>PDF saja</strong> &bull; Maks. 10MB
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Buku Pedoman
                        </button>
                    </form>
                </div>

                {{-- LIST BUKU YANG SUDAH DI-UPLOAD --}}
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-book text-emerald-600"></i> Daftar Buku Pedoman Aktif
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ count($books) }} Dokumen</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                <tr>
                                    <th class="ps-3" width="60%">Judul Buku</th>
                                    <th width="25%">Badge</th>
                                    <th class="text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <td class="ps-3 font-semibold text-slate-800 text-xs">{{ $book->title }}</td>
                                    <td><span class="badge {{ $book->badge_class }} text-xxs">{{ $book->badge_text }}</span></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.guide.book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-slate-400 py-4 text-xs">Belum ada buku panduan diunggah.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            {{-- KANAN: MANAJEMEN ALUR PROSEDUR TIMELINE --}}
            <div class="col-xl-6">

                {{-- FORM TAMBAH LANGKAH ALUR --}}
                <div class="form-section-card mb-4">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Tambah Tahapan Alur Prosedur</h5>
                            <p class="form-section-desc">Tambahkan langkah berurutan untuk alur KRS atau pendaftaran skripsi.</p>
                        </div>
                    </div>

                    @if(session('success_step'))
                        <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                            <i class="fas fa-check-circle me-1"></i> {{ session('success_step') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.guide.step.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-7">
                                <label class="form-label-custom">
                                    <span>Kategori Alur Prosedur</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <select name="flow_type" class="form-select-custom" required>
                                    <option value="krs">Alur KRS Online</option>
                                    <option value="skripsi">Pengajuan Skripsi / Tugas Akhir</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label-custom">
                                    <span>Langkah Ke- (Urutan)</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="number"
                                       name="step_number"
                                       class="form-control-custom"
                                       value="1"
                                       min="1"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Nama / Judul Langkah Prosedur</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control-custom"
                                   placeholder="Contoh: Konsultasi Dosen Pembimbing Akademik"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Uraian Lengkap Langkah</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <textarea name="description"
                                      class="form-control-custom"
                                      rows="3"
                                      placeholder="Tuliskan petunjuk lengkap bagi mahasiswa untuk langkah ini..."
                                      required></textarea>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2">
                            <i class="fas fa-plus-circle"></i> Tambah Langkah Prosedur
                        </button>
                    </form>
                </div>

                {{-- PREVIEW DAFTAR DATA TIMELINE ALUR --}}
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-list-ol text-blue-600"></i> Data Langkah Prosedur Aktif
                        </span>
                    </div>

                    <div class="p-3" style="max-height: 380px; overflow-y: auto;">
                        <h6 class="font-bold text-emerald-800 text-xs mb-2 d-flex align-items-center gap-1">
                            <i class="fas fa-chevron-right text-emerald-600"></i> Alur KRS Online
                        </h6>
                        @include('admin.guide.partials.step_list', ['stepsCollection' => $krsSteps])

                        <h6 class="font-bold text-blue-800 text-xs mt-3 mb-2 d-flex align-items-center gap-1">
                            <i class="fas fa-chevron-right text-blue-600"></i> Alur Pengajuan Skripsi
                        </h6>
                        @include('admin.guide.partials.step_list', ['stepsCollection' => $skripsiSteps])
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
