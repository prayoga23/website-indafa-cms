<table class="table table-sm table-striped table-hover mb-4 align-middle bg-white border rounded">
    <thead class="table-light small">
        <tr>
            <th class="text-center" width="10%">Posisi</th>
            <th width="50%">Nama Kegiatan Akademik</th>
            <th width="30%">Rentang Tanggal</th>
            <th class="text-center" width="10%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($agendasCollection as $agenda)
        <tr class="small">
            <td class="text-center fw-semibold text-secondary">{{ $agenda->order_position }}</td>
            <td>
                <span class="fw-bold text-dark">{{ $agenda->activity_name }}</span>
                @if($agenda->color_class)
                    <br><small class="badge bg-light text-dark border py-0 px-1 font-monospace" style="font-size: 10px;">{{ $agenda->color_class }}</small>
                @endif
            </td>
            <td><span class="badge bg-secondary px-2 py-1">{{ $agenda->date_range }}</span></td>
            <td class="text-center">
                <form action="{{ route('admin.calendar.agenda.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Hapus baris agenda kegiatan akademik ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm text-danger p-0"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-3 small">Belum ada agenda kegiatan yang didaftarkan untuk semester ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>
