<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicDocumentController extends Controller
{
    public function index()
    {
        // Menampilkan daftar dokumen di halaman admin
        $documents = AcademicDocument::latest()->paginate(10);
        return view('admin.gallery.document', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5120', // Maksimal 5MB
            'year' => 'required|digits:4|integer|min:2020|max:'.date('Y'),
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());

            // Simpan ke storage/app/public/documents
            $path = $file->storeAs('documents', $filename, 'public');

            AcademicDocument::create([
                'name' => $request->name,
                'file_path' => $path,
                'file_extension' => $extension,
                'year' => $request->year,
            ]);

            return redirect()->back()->with('success', 'Dokumen akademik baru berhasil diunggah!');
        }

        return redirect()->back()->withErrors(['file' => 'Gagal mengunggah berkas.']);
    }

    public function destroy(AcademicDocument $document)
    {
        // Hapus file fisik dari storage
        if (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();
        return redirect()->back()->with('success', 'Dokumen berhasil dihapus dari sistem.');
    }
}
