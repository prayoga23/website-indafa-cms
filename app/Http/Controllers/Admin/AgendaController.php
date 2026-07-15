<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // 1. Tampilkan Daftar Agenda (Index)
    public function index()
    {
        // Urutkan berdasarkan tanggal terdekat yang akan datang
        $agendas = Agenda::orderBy('event_date', 'desc')->paginate(10);
        return view('admin.agenda.index', compact('agendas'));
    }

    // 2. Tampilkan Form Tambah Agenda
    public function create()
    {
        return view('admin.agenda.create');
    }

    // 3. Proses Simpan Agenda Baru
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'nullable',
            'location'   => 'required|string|max:255',
            'tag'        => 'required|string|in:Seminar,Workshop,Wisuda,Lainnya',
        ]);

        Agenda::create($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda baru berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit Agenda
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    // 5. Proses Update Agenda
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'nullable',
            'location'   => 'required|string|max:255',
            'tag'        => 'required|string|in:Seminar,Workshop,Wisuda,Lainnya',
        ]);

        $agenda->update($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Data agenda berhasil diperbarui!');
    }

    // 6. Proses Hapus Agenda
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
}
