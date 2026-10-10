@extends('layouts_admin.admin')

@section('title','Tambah Berita')
@section('page-title','Tambah Berita')

@section('content')

<div class="card card-primary">

    <form action="{{ route('admin.news.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.news.form')

        <div class="card-footer">

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('admin.news.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@push('js')
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

ClassicEditor
    .create(document.querySelector('#editor'), {
        extraPlugins: [MyCustomUploadAdapterPlugin]
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endpush

@endsection
