<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Fakultas</label>
        <select name="faculty_id" class="form-control">
            <option value="">Kampus Umum</option>
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}" @selected(old('faculty_id', $gallery->faculty_id ?? '') == $faculty->id)>
                    {{ $faculty->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Program Studi</label>
        <select name="study_program_id" class="form-control">
            <option value="">Semua Prodi</option>
            @foreach($studyPrograms as $prodi)
                <option value="{{ $prodi->id }}" @selected(old('study_program_id', $gallery->study_program_id ?? '') == $prodi->id)>
                    {{ $prodi->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Judul Album</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}" placeholder="Masukkan judul album" required>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Deskripsi</label>
    <textarea name="description" rows="4" class="form-control" placeholder="Deskripsi singkat album foto...">{{ old('description', $gallery->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Cover Album</label>
    @if(isset($gallery) && $gallery->cover_image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $gallery->cover_image) }}" alt="{{ $gallery->title }}" class="img-thumbnail rounded" style="max-height: 140px; object-fit: cover;">
        </div>
    @endif
    <input type="file" name="cover_image" class="form-control" accept="image/*">
    <small class="text-muted">Format file: JPG, JPEG, PNG. Biarkan kosong bila tidak ingin mengubah cover.</small>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Status</label>
    <select name="status" class="form-control">
        <option value="publish" @selected(old('status', $gallery->status ?? 'publish') == 'publish')>Publish</option>
        <option value="draft" @selected(old('status', $gallery->status ?? '') == 'draft')>Draft</option>
    </select>
</div>
