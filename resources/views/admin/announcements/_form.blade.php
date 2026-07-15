<div class="form-group">

    <label>Judul</label>

    <input
        type="text"
        name="title"
        class="form-control"
        value="{{ old('title',$announcement->title ?? '') }}"
        required>

</div>

<div class="form-group">

    <label>Ringkasan</label>

    <textarea
        name="excerpt"
        rows="3"
        class="form-control">{{ old('excerpt',$announcement->excerpt ?? '') }}</textarea>

</div>

<div class="form-group">

    <label>Tanggal Publish</label>

    <input
        type="date"
        name="publish_date"
        class="form-control"
        value="{{ old('publish_date',$announcement->publish_date ?? '') }}">

</div>

<div class="form-group">

    <label>Status</label>

    <select
        name="status"
        class="form-control">

        <option value="draft"
            @selected(old('status',$announcement->status ?? '') == 'draft')>

            Draft

        </option>

        <option value="publish"
            @selected(old('status',$announcement->status ?? '') == 'publish')>

            Publish

        </option>

    </select>

</div>

<div class="form-group">

    <label>Isi Pengumuman</label>

    <textarea
        name="content"
        id="editor"
        rows="10"
        class="form-control">{{ old('content',$announcement->content ?? '') }}</textarea>

</div>

@push('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

</script>

@endpush
