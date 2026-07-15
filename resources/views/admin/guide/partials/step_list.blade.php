<ul class="list-group list-group-flush border mb-2 rounded">
    @forelse($stepsCollection as $step)
    <li class="list-group-item d-flex justify-content-between align-items-start p-2 small">
        <div class="ms-1 me-auto text-truncate" style="max-width: 85%;">
            <div class="fw-bold text-dark">Langkah {{ $step->step_number }}: {{ $step->title }}</div>
            <span class="text-muted d-block text-truncate">{{ $step->description }}</span>
        </div>
        <form action="{{ route('admin.guide.step.destroy', $step->id) }}" method="POST" onsubmit="return confirm('Hapus tahapan ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-link text-danger p-0 m-0"><i class="fas fa-trash-alt"></i></button>
        </form>
    </li>
    @empty
    <li class="list-group-item text-muted text-center py-2 bg-light small">Belum ada tahapan alur yang dibuat.</li>
    @endforelse
</ul>
