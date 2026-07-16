@extends('layouts_admin.admin')

@section('title', 'Pengaturan Beranda')
@section('page-title', 'Pengaturan Beranda')

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="{{ route('admin.homepage-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- SECTION 1: CTA PMB (Penerimaan Mahasiswa Baru) --}}
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-graduation-cap mr-2"></i> Pengaturan Section CTA PMB</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul CTA PMB</label>
                        <input type="text" name="cta_pmb_title" class="form-control" 
                               value="{{ old('cta_pmb_title', $setting->cta_pmb_title ?? 'Bergabunglah Bersama Institut Agama Islam Darul Falah') }}">
                        <small class="form-text text-muted">Judul utama yang muncul di bagian ajakan PMB halaman beranda.</small>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi/Teks CTA PMB</label>
                        <textarea name="cta_pmb_text" class="form-control" rows="4">{{ old('cta_pmb_text', $setting->cta_pmb_text ?? 'Wujudkan masa depan terbaik Anda. Daftarkan diri di INDAFA Bondowoso dan jadilah bagian dari generasi unggul yang berlandaskan ilmu dan iman.') }}</textarea>
                        <small class="form-text text-muted">Teks penjelasan singkat yang muncul di bawah judul CTA PMB.</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Pendaftaran (Daftar Sekarang)</label>
                                <input type="text" name="cta_pmb_link_register" class="form-control" 
                                       value="{{ old('cta_pmb_link_register', $setting->cta_pmb_link_register ?? '#') }}">
                                <small class="form-text text-muted">Link URL tujuan untuk tombol "Daftar Sekarang" (misal: link Google Form / SIAKAD).</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Informasi PMB</label>
                                <input type="text" name="cta_pmb_link_info" class="form-control" 
                                       value="{{ old('cta_pmb_link_info', $setting->cta_pmb_link_info ?? '#') }}">
                                <small class="form-text text-muted">Link URL tujuan untuk tombol "Informasi PMB" (misal: halaman pengumuman PMB / brosur).</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan Perubahan Beranda
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- SIDEBAR JALAN PINTAS --}}
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-link mr-2"></i> Kelola Bagian Beranda Lainnya</h3>
            </div>
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.banners.index') }}" class="nav-link py-3">
                            <i class="fas fa-images text-primary mr-2"></i> Kelola Banner Slide / Hero Image
                            <span class="float-right"><i class="fas fa-chevron-right text-muted"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sambutan.index') }}" class="nav-link py-3">
                            <i class="fas fa-quote-left text-success mr-2"></i> Kelola Sambutan Rektor
                            <span class="float-right"><i class="fas fa-chevron-right text-muted"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.statistic.index') }}" class="nav-link py-3">
                            <i class="fas fa-chart-bar text-warning mr-2"></i> Kelola Statistik Kampus (Angka Bicara)
                            <span class="float-right"><i class="fas fa-chevron-right text-muted"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.news.index') }}" class="nav-link py-3">
                            <i class="fas fa-newspaper text-info mr-2"></i> Kelola Berita Terbaru
                            <span class="float-right"><i class="fas fa-chevron-right text-muted"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.agenda.index') }}" class="nav-link py-3">
                            <i class="fas fa-calendar-alt text-danger mr-2"></i> Kelola Agenda & Event
                            <span class="float-right"><i class="fas fa-chevron-right text-muted"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
