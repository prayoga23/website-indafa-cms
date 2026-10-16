<div class="card-body">
    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Nama Fakultas <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control border px-3 py-2" value="{{ old('name', $faculty->name ?? '') }}" placeholder="Masukkan nama fakultas" required>
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Dekan</label>
        <input type="text" name="dean" class="form-control border px-3 py-2" value="{{ old('dean', $faculty->dean ?? '') }}" placeholder="Nama Dekan">
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Logo Fakultas</label>
        <input type="file" name="logo" class="form-control border px-3 py-2" accept="image/*">
        @if(isset($faculty) && $faculty->logo)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$faculty->logo) }}" width="100" class="img-thumbnail rounded" alt="{{ $faculty->name }}">
            </div>
        @endif
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Deskripsi Fakultas</label>
        <textarea name="description" rows="5" class="form-control border px-3 py-2" placeholder="Deskripsi atau visi fakultas">{{ old('description', $faculty->description ?? '') }}</textarea>
    </div>
</div>

