<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicGuidebook;
use App\Models\AcademicProcedureStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicGuideController extends Controller
{
    public function index()
    {
        $books = AcademicGuidebook::all();
        $steps = AcademicProcedureStep::orderBy('step_number', 'asc')->get();

        $krsSteps = $steps->where('flow_type', 'krs');
        $skripsiSteps = $steps->where('flow_type', 'skripsi');

        return view('admin.guide.index', compact('books', 'krsSteps', 'skripsiSteps'));
    }

    // Aksi Simpan Buku Pedoman Utama
    public function storeBook(Request $request)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'badge_text'         => 'required|string|max:50',
            'badge_class'        => 'required|string',
            'icon_class'         => 'required|string',
            'icon_wrapper_class' => 'required|string',
            'description'        => 'required|string',
            'pdf_file'           => 'required|mimes:pdf|max:10240', // Maksimal 10MB
        ]);

        $data = $request->all();

        if ($request->hasFile('pdf_file')) {
            $data['file_path'] = $request->file('pdf_file')->store('guidebooks', 'public');
        }

        AcademicGuidebook::create($data);
        return redirect()->back()->with('success_book', 'Buku pedoman baru berhasil diterbitkan!');
    }

    // Aksi Tambah Langkah Alur Prosedur
    public function storeStep(Request $request)
    {
        $request->validate([
            'flow_type'   => 'required|in:krs,skripsi',
            'step_number' => 'required|integer|min:1',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        AcademicProcedureStep::create($request->all());
        return redirect()->back()->with('success_step', 'Tahapan prosedur baru berhasil ditambahkan!');
    }

    // Aksi Hapus Buku
    public function destroyBook(AcademicGuidebook $guidebook)
    {
        if (Storage::disk('public')->exists($guidebook->file_path)) {
            Storage::disk('public')->delete($guidebook->file_path);
        }
        $guidebook->delete();
        return redirect()->back()->with('success_book', 'Buku pedoman telah berhasil dihapus.');
    }

    // Aksi Hapus Langkah Prosedur
    public function destroyStep(AcademicProcedureStep $procedureStep)
    {
        $procedureStep->delete();
        return redirect()->back()->with('success_step', 'Tahapan alur prosedur telah berhasil dihapus.');
    }
}
