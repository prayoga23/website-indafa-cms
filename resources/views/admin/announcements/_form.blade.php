<div class="form-group mb-3">
    <label class="form-label font-weight-bold">Judul Pengumuman <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control border px-3 py-2" value="{{ old('title', $announcement->title ?? '') }}" placeholder="Masukkan judul pengumuman" required>
</div>

<div class="form-group mb-3">
    <label class="form-label font-weight-bold">Ringkasan (Excerpt)</label>
    <textarea name="excerpt" rows="3" class="form-control border px-3 py-2" placeholder="Ringkasan singkat pengumuman">{{ old('excerpt', $announcement->excerpt ?? '') }}</textarea>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label font-weight-bold">Tanggal Publish</label>
            <input type="date" name="publish_date" class="form-control border px-3 py-2" value="{{ old('publish_date', $announcement->publish_date ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label font-weight-bold">Status</label>
            <select name="status" class="form-control border px-3 py-2">
                <option value="draft" @selected(old('status', $announcement->status ?? '') == 'draft')>Draft</option>
                <option value="publish" @selected(old('status', $announcement->status ?? '') == 'publish')>Publish</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label font-weight-bold">Isi Pengumuman</label>
    <textarea name="content" id="editor" rows="10" class="form-control border px-3 py-2">{{ old('content', $announcement->content ?? '') }}</textarea>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    if (document.querySelector('#editor')) {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    }
</script>
@endpush

