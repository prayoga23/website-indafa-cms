@csrf

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header pb-0">
                <h6 class="font-weight-bolder text-dark mb-0">Informasi Banner</h6>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Fakultas</label>
                            <select name="faculty_id" class="form-control border px-3 py-2">
                                <option value="">Umum</option>
                                @foreach($faculties as $f)
                                    <option value="{{ $f->id }}" {{ old('faculty_id', $banner->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                                        {{ $f->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Program Studi</label>
                            <select name="program_studi_id" class="form-control border px-3 py-2">
                                <option value="">Umum</option>
                                @foreach($studyPrograms as $s)
                                    <option value="{{ $s->id }}" {{ old('program_studi_id', $banner->program_studi_id ?? '') == $s->id ? 'selected' : '' }}>
                                        {{ $s->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Judul Banner <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control border px-3 py-2 @error('title') is-invalid @enderror" value="{{ old('title', $banner->title ?? '') }}" placeholder="Masukkan judul banner" required>
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Sub Judul</label>
                    <input type="text" name="subtitle" class="form-control border px-3 py-2" value="{{ old('subtitle', $banner->subtitle ?? '') }}" placeholder="Masukkan sub judul">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control border px-3 py-2" placeholder="Deskripsi singkat">{{ old('description', $banner->description ?? '') }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Teks Tombol CTA</label>
                            <input type="text" name="button_text" class="form-control border px-3 py-2" value="{{ old('button_text', $banner->button_text ?? '') }}" placeholder="Contoh: Daftar Sekarang">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Link Tujuan</label>
                            <input type="text" name="button_link" class="form-control border px-3 py-2" value="{{ old('button_link', $banner->button_link ?? '') }}" placeholder="https://example.com">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header pb-0">
                <h6 class="font-weight-bolder text-dark mb-0">Pengaturan Banner</h6>
            </div>

            <div class="card-body">
                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Gambar Banner</label>
                    <input type="file" name="image" class="form-control border px-3 py-2" accept="image/*">
                    @if(isset($banner) && $banner->image)
                        <div class="mt-2 text-center">
                            <img src="{{ asset('storage/'.$banner->image) }}" class="img-fluid rounded img-thumbnail" alt="Preview">
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Status</label>
                    <select name="status" class="form-control border px-3 py-2">
                        <option value="draft" {{ old('status', $banner->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status', $banner->status ?? '') == 'publish' ? 'selected' : '' }}>Publish</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Banner Aktif</label>
                    <select name="is_active" class="form-control border px-3 py-2">
                        <option value="1" {{ old('is_active', $banner->is_active ?? 1) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $banner->is_active ?? 1) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Urutan Banner</label>
                    <input type="number" name="sort_order" class="form-control border px-3 py-2" value="{{ old('sort_order', $banner->sort_order ?? 0) }}">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Mulai Tayang</label>
                    <input type="date" name="start_date" class="form-control border px-3 py-2" value="{{ old('start_date', isset($banner->start_date) ? $banner->start_date->format('Y-m-d') : '') }}">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Selesai Tayang</label>
                    <input type="date" name="end_date" class="form-control border px-3 py-2" value="{{ old('end_date', isset($banner->end_date) ? $banner->end_date->format('Y-m-d') : '') }}">
                </div>
            </div>

            <div class="card-footer pt-0 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save me-1"></i> Simpan Banner
                </button>
            </div>
        </div>
    </div>
</div>

