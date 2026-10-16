<?php

namespace App\Providers;

use App\Models\Faculty;
use App\Models\Page;
use App\Models\StudyProgram;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        View::composer('*', function ($view) {
            // 1. Ambil data setting global
            $setting = WebsiteSetting::first();

            // 2. Ambil data menu default untuk dropdown
            $facultiesMenu = Faculty::with('studyPrograms')->orderBy('name')->get();
            $programsMenu = StudyProgram::orderBy('name')->get();

            // 3. Deteksi Context (Fakultas / Prodi) dari Route atau Query String (?prodi=...)
            $currentProgram = null;
            $currentFaculty = null;

            // Ambil parameter dari route ataupun query string URL
            $programId = request()->route('program_id') ?? request()->get('program_id');
            $facultyId = request()->route('faculty_id') ?? request()->get('faculty_id');

            // Mencari slug prodi dari parameter route ({program}/{prodi}/{slug}) atau via ?prodi=slug-nama-prodi
            $programSlug = request()->route('program') ?? request()->route('prodi') ?? request()->route('slug') ?? request()->query('prodi');
            $facultySlug = request()->route('faculty') ?? request()->route('fakultas') ?? request()->query('fakultas');

            // Proses pencarian Program Studi Aktif
            if ($programId) {
                $currentProgram = StudyProgram::find($programId);
            } elseif ($programSlug) {
                $currentProgram = $programSlug instanceof StudyProgram ? $programSlug : StudyProgram::where('slug', $programSlug)->first();
            }

            // Proses pencarian Fakultas Aktif (bisa otomatis dari prodi atau manual dari parameter)
            if ($currentProgram && $currentProgram->faculty_id) {
                $currentFaculty = Faculty::find($currentProgram->faculty_id);
            } elseif ($facultyId) {
                $currentFaculty = Faculty::find($facultyId);
            } elseif ($facultySlug) {
                $currentFaculty = $facultySlug instanceof Faculty ? $facultySlug : Faculty::where('slug', $facultySlug)->first();
            }

            // 4. KUNCI UTAMA: Ambil data menu profil ($pagesMenu) secara dinamis sesuai context halaman
            if ($currentProgram) {
                // Jika sedang di lingkup prodi, ambil halaman/profil khusus prodi tersebut
                $pagesMenu = Page::where('study_program_id', $currentProgram->id)
                                ->orderBy('title')
                                ->get();
            } elseif ($currentFaculty) {
                // Jika sedang di lingkup fakultas, ambil halaman/profil khusus fakultas tersebut
                $pagesMenu = Page::where('faculty_id', $currentFaculty->id)
                                ->orderBy('title')
                                ->get();
            } else {
                // Jika di halaman utama/global, ambil halaman yang tidak terikat prodi maupun fakultas (null)
                $pagesMenu = Page::where('study_program_id', null)
                                ->where('faculty_id', null)
                                ->orderBy('title')
                                ->get();
            }

            // 5. Kirim semua variabel ke seluruh view/blade
            $view->with([
                'setting' => $setting,
                'pagesMenu' => $pagesMenu,
                'facultiesMenu' => $facultiesMenu,
                'programsMenu' => $programsMenu,
                'currentProgram' => $currentProgram,
                'currentFaculty' => $currentFaculty,
            ]);
        });
    }
}
