@csrf

<div class="row">

    <div class="col-md-8">

        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Informasi Banner</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <div class="row">

        <div class="col-md-6">
            <label>Fakultas</label>
            <select name="faculty_id" class="form-control">
                <option value="">Umum</option>

                @foreach($faculties as $f)
                    <option value="{{ $f->id }}"
                        {{ old('faculty_id', $banner->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                        {{ $f->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label>Program Studi</label>
            <select name="program_studi_id" class="form-control">
                <option value="">Umum</option>

                @foreach($studyPrograms as $s)
                    <option value="{{ $s->id }}"
                        {{ old('program_studi_id', $banner->program_studi_id ?? '') == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

                <div class="form-group">
                    <label>Judul Banner</label>

                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $banner->title ?? '') }}"
                           placeholder="Masukkan judul banner">

                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Sub Judul</label>

                    <input type="text"
                           name="subtitle"
                           class="form-control"
                           value="{{ old('subtitle', $banner->subtitle ?? '') }}"
                           placeholder="Masukkan sub judul">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>

                    <textarea name="description"
                              rows="5"
                              class="form-control">{{ old('description', $banner->description ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Teks Tombol CTA</label>

                    <input type="text"
                           name="button_text"
                           class="form-control"
                           value="{{ old('button_text', $banner->button_text ?? '') }}"
                           placeholder="Contoh: Daftar Sekarang">
                </div>

                <div class="form-group">
                    <label>Link Tujuan</label>

                    <input type="text"
                           name="button_link"
                           class="form-control"
                           value="{{ old('button_link', $banner->button_link ?? '') }}"
                           placeholder="https://example.com">
                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-success">

            <div class="card-header">
                <h3 class="card-title">Pengaturan Banner</h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Gambar Banner</label>

                    <input type="file"
                           name="image"
                           class="form-control">

                    @if(isset($banner) && $banner->image)

                        <div class="mt-3 text-center">
                            <img src="{{ asset('storage/'.$banner->image) }}"
                                 class="img-fluid img-thumbnail">
                        </div>

                    @endif

                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select name="status" class="form-control">
                        <option value="draft"
                            {{ old('status', $banner->status ?? '') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="publish"
                            {{ old('status', $banner->status ?? '') == 'publish' ? 'selected' : '' }}>
                            Publish
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Banner Aktif</label>

                    <select name="is_active" class="form-control">

                        <option value="1"
                            {{ old('is_active', $banner->is_active ?? 1) == 1 ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="0"
                            {{ old('is_active', $banner->is_active ?? 1) == 0 ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Urutan Banner</label>

                    <input type="number"
                           name="sort_order"
                           class="form-control"
                           value="{{ old('sort_order', $banner->sort_order ?? 0) }}">
                </div>

                <div class="form-group">
                    <label>Mulai Tayang</label>

                    <input type="date"
                           name="start_date"
                           class="form-control"
                           value="{{ old('start_date', isset($banner->start_date) ? $banner->start_date->format('Y-m-d') : '') }}">
                </div>

                <div class="form-group">
                    <label>Selesai Tayang</label>

                    <input type="date"
                           name="end_date"
                           class="form-control"
                           value="{{ old('end_date', isset($banner->end_date) ? $banner->end_date->format('Y-m-d') : '') }}">
                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> Simpan Banner
                </button>

            </div>

        </div>

    </div>

</div>
