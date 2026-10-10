<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraduateLearningOutcome;
use Illuminate\Http\Request;

class CplController extends Controller
{
    // Menampilkan halaman pengelolaan dashboard CPL
    public function index()
    {
        // Mengambil dan mengelompokkan data berdasarkan kategori ranah masing-masing
        $cplData = GraduateLearningOutcome::orderBy('order_position', 'asc')->get();

        $sikapData       = $cplData->where('category', 'sikap');
        $pengetahuanData = $cplData->where('category', 'pengetahuan');
        $umumData        = $cplData->where('category', 'umum');
        $khususData      = $cplData->where('category', 'khusus');

        return view('admin.cpl.index', compact('sikapData', 'pengetahuanData', 'umumData', 'khususData'));
    }

    // Menyimpan rumusan poin kompetensi CPL baru
    public function store(Request $request)
    {
        $request->validate([
            'category'       => 'required|in:sikap,pengetahuan,umum,khusus',
            'code_label'     => 'required|string|max:10',
            'description'    => 'required|string',
            'order_position' => 'required|integer|min:0',
        ]);

        GraduateLearningOutcome::create($request->all());

        return redirect()->back()->with('success', 'Rumusan poin CPL baru berhasil didaftarkan!');
    }

    // Menghapus poin CPL dari daftar ranah kompetensi
    public function destroy(GraduateLearningOutcome $graduateLearningOutcome)
    {
        $graduateLearningOutcome->delete();
        return redirect()->back()->with('success', 'Poin kualifikasi CPL berhasil dihapus!');
    }
}
