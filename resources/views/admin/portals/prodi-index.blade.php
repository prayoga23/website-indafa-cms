@extends('layouts_admin.admin')

@section('title', 'Kelola Website Program Studi')
@section('page-title', 'Website Program Studi (Prodi)')

@section('content')

{{-- HEADER UTAMA --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-3 p-md-4 text-white position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0c4a6e 100%); border-radius: 1rem;">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 position-relative" style="z-index: 2;">
                <div>
                    <span class="badge text-white px-3 py-1.5 mb-2 text-xxs font-weight-bold" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(8px);">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">auto_awesome</i> Portal Mandiri Prodi
                    </span>
                    <h3 class="text-white font-weight-bolder mb-1">
                        Pembaruan Website Program Studi Tanpa Coding
                    </h3>
                    <p class="text-slate-300 text-sm mb-0" style="max-width: 680px;">
                        Setiap Kaprodi dan Dosen dapat memperbarui foto pimpinan, visi misi, kutipan sambutan, banner hero, status akreditasi, serta informasi akademik prodi masing-masing secara langsung dan instan.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-sm btn-outline-light mb-0">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">list</i> Data Master Prodi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- GRID 5 PROGRAM STUDI --}}
<div class="row g-4">
    @foreach($prodis as $prodi)
        <div class="col-md-6 col-xl-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all" style="border-radius: 1rem; overflow: hidden; border-top: 4px solid {{ $prodi['color'] }} !important;">
                
                {{-- Banner Preview / Header Card --}}
                <div class="p-3 text-white position-relative" style="background: linear-gradient(135deg, {{ $prodi['color'] }} 0%, #0f172a 100%);">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge text-white text-xxs font-weight-bold px-2.5 py-1" style="background: rgba(255,255,255,0.25);">
                            Jenjang {{ $prodi['degree'] }}
                        </span>
                        <span class="badge bg-warning text-dark text-xxs font-weight-bold px-2 py-0.5">
                            Akreditasi: {{ $prodi['accreditation'] }}
                        </span>
                    </div>
                    <h5 class="text-white font-weight-bolder mb-1" style="font-size: 1.15rem; line-height: 1.3;">
                        {{ $prodi['name'] }}
                    </h5>
                    <p class="text-xs text-white opacity-8 mb-0">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">school</i> {{ $prodi['faculty_name'] }}
                    </p>
                </div>

                {{-- Body Info --}}
                <div class="card-body p-3 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded-3 bg-slate-50 border">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0"
                                 style="width: 38px; height: 38px; background: {{ $prodi['color'] }}; font-size: 1rem;">
                                <i class="material-symbols-rounded">person</i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="text-xxs text-secondary d-block font-weight-bold">Ketua Program Studi (Kaprodi):</span>
                                <span class="text-xs font-weight-bold text-dark text-truncate d-block">
                                    {{ $prodi['head_name'] }}
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between text-xxs text-secondary mb-3">
                            <span><i class="material-symbols-rounded text-xs me-1 align-middle">link</i> URL Publik:</span>
                            <code class="text-xs font-weight-bold" style="color: {{ $prodi['color'] }};">/prodi-{{ $prodi['code'] }}</code>
                        </div>

                        <div class="d-flex align-items-center justify-content-between text-xxs text-secondary mb-2">
                            <span><i class="material-symbols-rounded text-xs me-1 align-middle">schedule</i> Pembaruan Terakhir:</span>
                            <span class="font-weight-bold text-dark">{{ $prodi['last_updated'] }}</span>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="pt-3 border-top d-flex align-items-center gap-2 mt-2">
                        <a href="{{ route('admin.portal-prodi.edit', $prodi['code']) }}"
                           class="btn btn-sm text-white mb-0 flex-grow-1 font-weight-bold d-inline-flex align-items-center justify-content-center py-2"
                           style="background: {{ $prodi['color'] }}; border-radius: 0.5rem;">
                            <i class="material-symbols-rounded text-xs me-1">edit_document</i> Edit Konten Web
                        </a>
                        <a href="{{ $prodi['public_url'] }}"
                           target="_blank"
                           class="btn btn-sm btn-outline-dark mb-0 px-2.5 py-2 font-weight-bold d-inline-flex align-items-center justify-content-center"
                           title="Lihat Website Publik"
                           style="border-radius: 0.5rem;">
                            <i class="material-symbols-rounded text-xs">open_in_new</i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

@endsection
