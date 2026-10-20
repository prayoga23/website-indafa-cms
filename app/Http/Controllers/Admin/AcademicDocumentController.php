<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        // Sanitasi link jika user lupa memasukkan http/https
        $link = trim($request->input('file_path', ''));
        if (!empty($link) && !Str::startsWith($link, ['http://', 'https://'])) {
            $link = 'https://' . $link;
            $request->merge(['file_path' => $link]);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|url|max:2048',
            'year' => 'required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
            'file_extension' => 'nullable|string|max:50',
        ], [
            'name.required' => 'Nama / Judul Dokumen wajib diisi.',
            'file_path.required' => 'Link Tautan Dokumen (Google Drive / Docs) wajib diisi.',
            'file_path.url' => 'Format link dokumen tidak valid. Pastikan diawali dengan https://',
            'year.required' => 'Tahun terbit / berlaku dokumen wajib diisi.',
        ]);

        // Deteksi format/ekstensi otomatis jika tidak dipilih secara manual
        $format = $request->input('file_extension');
        if (empty($format)) {
            $lowerLink = strtolower($link);
            if (str_contains($lowerLink, 'docs.google.com/document')) {
                $format = 'docs';
            } elseif (str_contains($lowerLink, 'docs.google.com/spreadsheets')) {
                $format = 'xlsx';
            } elseif (str_contains($lowerLink, 'docs.google.com/presentation')) {
                $format = 'pptx';
            } elseif (str_contains($lowerLink, 'drive.google.com')) {
                $format = 'gdrive';
            } elseif (str_ends_with($lowerLink, '.pdf')) {
                $format = 'pdf';
            } elseif (str_ends_with($lowerLink, '.docx') || str_ends_with($lowerLink, '.doc')) {
                $format = 'docx';
            } elseif (str_ends_with($lowerLink, '.xlsx') || str_ends_with($lowerLink, '.xls')) {
                $format = 'xlsx';
            } else {
                $format = 'gdrive';
            }
        }

        AcademicDocument::create([
            'name' => $request->name,
            'file_path' => $link,
            'file_extension' => strtolower($format),
            'year' => $request->year,
        ]);

        return redirect()->back()->with('success', 'Tautan dokumen Google Drive berhasil disimpan dan dihubungkan!');
    }

    public function destroy(AcademicDocument $document)
    {
        // Hapus berkas fisik lokal hanya jika dokumen lama tersimpan di disk lokal (bukan link)
        if (!Str::startsWith($document->file_path, ['http://', 'https://']) && Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();
        return redirect()->back()->with('success', 'Dokumen berhasil dihapus dari sistem.');
    }
}
