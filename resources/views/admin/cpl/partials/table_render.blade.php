<table class="table table-striped table-hover mb-0 align-middle">
    <thead class="table-light small">
        <tr>
            <th class="text-center" width="10%">Urut</th>
            <th class="text-center" width="15%">Kode</th>
            <th width="65%">Uraian Rumusan Capaian</th>
            <th class="text-center" width="10%">Hapus</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dataCollection as $item)
        <tr class="small">
            <td class="text-center text-secondary fw-semibold">{{ $item->order_position }}</td>
            <td class="text-center"><span class="badge bg-secondary px-2 py-1">{{ $item->code_label }}</span></td>
            <td class="text-dark lh-base">{{ $item->description }}</td>
            <td class="text-center">
                <form action="{{ route('admin.cpl.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus rumusan butir CPL ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm text-danger p-0"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-3 small">Belum ada rincian data ranah kompetensi ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>
