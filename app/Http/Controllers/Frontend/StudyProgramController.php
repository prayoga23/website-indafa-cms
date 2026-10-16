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
    $cleanSlug = str_replace('prodi-', '', strtolower($slug));

    $program = StudyProgram::query()
        ->with([
            'faculty',
            'lecturers',
            'galleries'
        ])
        ->where('slug', $slug)
        ->orWhere('slug', 'prodi-' . $cleanSlug)
        ->orWhere('slug', $cleanSlug)
        ->first();

    if (!$program) {
        $aliasMap = [
            'hki' => ['hukum-keluarga-islam', 'prodi-hki'],
            'hes' => ['hukum-ekonomi-syariah', 'prodi-hes'],
            'mbs' => ['manajemen-bisnis-syariah', 'prodi-mbs'],
            'ekos' => ['ekonomi-syariah', 'prodi-ekos'],
            'pai' => ['pendidikan-agama-islam', 'prodi-pai'],
            'hukum-keluarga-islam' => ['prodi-hki', 'hki'],
            'hukum-ekonomi-syariah' => ['prodi-hes', 'hes'],
            'manajemen-bisnis-syariah' => ['prodi-mbs', 'mbs'],
            'ekonomi-syariah' => ['prodi-ekos', 'ekos'],
            'pendidikan-agama-islam' => ['prodi-pai', 'pai'],
            'prodi-hki' => ['hukum-keluarga-islam', 'hki'],
            'prodi-hes' => ['hukum-ekonomi-syariah', 'hes'],
            'prodi-mbs' => ['manajemen-bisnis-syariah', 'mbs'],
            'prodi-ekos' => ['ekonomi-syariah', 'ekos'],
            'prodi-pai' => ['pendidikan-agama-islam', 'pai'],
        ];

        if (isset($aliasMap[$slug])) {
            $program = StudyProgram::query()
                ->with(['faculty', 'lecturers', 'galleries'])
                ->whereIn('slug', $aliasMap[$slug])
                ->first();
        }
    }

    if (!$program) {
        $program = StudyProgram::query()
            ->with(['faculty', 'lecturers', 'galleries'])
            ->where(function($q) use ($cleanSlug) {
                if (str_contains($cleanSlug, 'hki') || str_contains($cleanSlug, 'keluarga')) {
                    $q->where('name', 'like', '%Keluarga%')->orWhere('slug', 'like', '%hki%');
                } elseif (str_contains($cleanSlug, 'hes')) {
                    $q->where('name', 'like', '%Hukum Ekonomi%')->orWhere('slug', 'like', '%hes%');
                } elseif (str_contains($cleanSlug, 'mbs') || str_contains($cleanSlug, 'bisnis')) {
                    $q->where('name', 'like', '%Bisnis%')->orWhere('slug', 'like', '%mbs%');
                } elseif (str_contains($cleanSlug, 'ekos') || (str_contains($cleanSlug, 'ekonomi') && !str_contains($cleanSlug, 'hukum'))) {
                    $q->where('name', 'like', '%Ekonomi Syariah%')->orWhere('slug', 'like', '%ekos%');
                } elseif (str_contains($cleanSlug, 'pai') || str_contains($cleanSlug, 'pendidikan')) {
                    $q->where('name', 'like', '%Pendidikan%')->orWhere('slug', 'like', '%pai%');
                }
            })
            ->first();
    }

    if (!$program) {
        abort(404);
    }

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
