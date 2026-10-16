<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Fakultas</label>
        <select name="faculty_id" class="form-control">
            <option value="">Umum (Semua Fakultas)</option>
            @foreach($faculties as $f)
                <option value="{{ $f->id }}" @selected(old('faculty_id', $news->faculty_id ?? '') == $f->id)>
                    {{ $f->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Program Studi</label>
        <select name="study_program_id" class="form-control">
            <option value="">Umum (Semua Prodi)</option>
            @foreach($studyPrograms as $s)
                <option value="{{ $s->id }}" @selected(old('study_program_id', $news->study_program_id ?? '') == $s->id)>
                    {{ $s->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Judul Berita</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}" placeholder="Masukkan judul berita" required>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Thumbnail Berita</label>
    @if(isset($news) && $news->thumbnail)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $news->thumbnail) }}" width="140" class="img-thumbnail rounded" style="object-fit: cover;" alt="Thumbnail">
        </div>
    @endif
    <input type="file" name="thumbnail" class="form-control" accept="image/*">
    <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Kosongkan jika tidak ingin mengubah thumbnail.</small>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Konten Berita</label>
    <textarea name="content" id="editor" class="form-control" rows="12" placeholder="Tuliskan isi berita di sini...">{{ old('content', $news->content ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Status Publikasi</label>
    <select name="status" class="form-control">
        <option value="publish" @selected(old('status', $news->status ?? 'publish') == 'publish')>Publish</option>
        <option value="draft" @selected(old('status', $news->status ?? '') == 'draft')>Draft</option>
    </select>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                const formData = new FormData();
                formData.append('upload', file);

                fetch("{{ route('ckeditor.upload') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    resolve({
                        default: result.url
                    });
                })
                .catch(error => {
                    reject(error);
                });
            }));
    }

    abort() {}
}

function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}

if (document.querySelector('#editor')) {
    ClassicEditor
        .create(document.querySelector('#editor'), {
            extraPlugins: [MyCustomUploadAdapterPlugin]
        })
        .catch(error => {
            console.error(error);
        });
}
</script>
@endpush
