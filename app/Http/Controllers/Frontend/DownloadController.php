<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicDocument;

class DownloadController extends Controller
{
    /**
     * Menampilkan daftar dokumen akademik dengan fitur pencarian
     */
    public function index(Request $request)
    {
        $query = AcademicDocument::query()->orderBy('year', 'desc')->orderBy('name', 'asc');

        // Fitur Pencarian Berdasarkan Nama Dokumen
        $search = $request->get('search');
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Ambil data dengan pagination (10 item per halaman agar pas untuk struktur tabel)
        $documents = $query->paginate(10)->withQueryString();

        return view('frontend.dokumen.index', compact('documents', 'search'));
    }
}
