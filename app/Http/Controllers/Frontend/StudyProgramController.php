<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;
use App\Models\Banner;
use App\Models\News;
use App\Models\Announcement;

class StudyProgramController extends Controller
{
    public function index()
    {
        $programs = StudyProgram::with('faculty')
            ->latest()
            ->paginate(12);

        return view(
            'frontend.study-program.index',
            compact('programs')
        );
    }

 public function show($slug)
{
    // 1. Ambil data prodi utama beserta relasi fakultas, dosen, dan galeri
    $program = StudyProgram::query()
        ->with([
            'faculty',
            'lecturers',
            'galleries'
        ])
        ->where('slug', $slug)
        ->firstOrFail();

    // 2. Ambil SEMUA banner khusus prodi ini, jika kosong ambil banner umum kampus
    $banners = Banner::where('program_studi_id', $program->id)->get();
    if ($banners->isEmpty()) {
        $banners = Banner::whereNull('program_studi_id')->get();
    }

    // 3. FIX BERITA: Ambil berita khusus prodi ini terlebih dahulu
    // (Asumsi: di tabel news ada kolom program_studi_id)
    $news = News::where('study_program_id', $program->id)
        ->latest()
        ->limit(6)
        ->get();

    // FALLBACK: Jika berita khusus prodi belum diinput/kosong,
    // ambil berita umum kampus agar halaman tidak kelihatan melompong
    if ($news->isEmpty()) {
        $news = News::whereNull('study_program_id') // atau sesuaikan filter berita umum kamu
            ->latest()
            ->limit(6)
            ->get();
    }

    // 4. Ambil Pengumuman Global Kampus
    $announcements = Announcement::latest()
        ->limit(3)
        ->get();

    // 5. Kirim semua variabel dengan compact secara aman ke Blade
    return view('frontend.study-program.show', compact('program', 'banners', 'news', 'announcements'));
}
}
