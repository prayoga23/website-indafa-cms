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
        if (app()->environment('production') && (request()->server('HTTPS') === 'on' || request()->header('X-Forwarded-Proto') === 'https')) {
            URL::forceScheme('https');
        }

        URL::resolveMissingNamedRoutesUsing(function ($name, $parameters = [], $absolute = true) {
            if ($name === 'frontend.news.index') {
                return route('news.index', $parameters, $absolute);
            }
            if ($name === 'frontend.news.show') {
                return route('news.show', $parameters, $absolute);
            }
            return null;
        });
        View::composer('*', function ($view) {
            if (app()->runningInConsole()) {
                return;
            }

            static $cachedData = null;

            if ($cachedData === null) {
                // 1. Ambil data setting global
                $setting = WebsiteSetting::first() ?? new WebsiteSetting();

                // 2. Ambil data menu default untuk dropdown
                $facultiesMenu = Faculty::orderBy('name')->get();
                $programsMenu = StudyProgram::orderBy('name')->get();

                // 3. Deteksi Context (Fakultas / Prodi) dari Route atau Query String (?prodi=...)
                $currentProgram = null;
                $currentFaculty = null;

                $programId = request()->route('program_id') ?? request()->get('program_id');
                $facultyId = request()->route('faculty_id') ?? request()->get('faculty_id');

                $programSlug = request()->route('program') ?? request()->route('prodi') ?? request()->route('slug') ?? request()->query('prodi');
                $facultySlug = request()->route('faculty') ?? request()->route('fakultas') ?? request()->query('fakultas');

                if ($programId) {
                    $currentProgram = StudyProgram::find($programId);
                } elseif ($programSlug) {
                    $currentProgram = $programSlug instanceof StudyProgram ? $programSlug : StudyProgram::where('slug', $programSlug)->first();
                }

                if ($currentProgram && $currentProgram->faculty_id) {
                    $currentFaculty = Faculty::find($currentProgram->faculty_id);
                } elseif ($facultyId) {
                    $currentFaculty = Faculty::find($facultyId);
                } elseif ($facultySlug) {
                    $currentFaculty = $facultySlug instanceof Faculty ? $facultySlug : Faculty::where('slug', $facultySlug)->first();
                }

                // 4. Ambil data menu profil ($pagesMenu) dinamis
                if ($currentProgram) {
                    $pagesMenu = Page::where('study_program_id', $currentProgram->id)
                                    ->orderBy('title')
                                    ->get();
                } elseif ($currentFaculty) {
                    $pagesMenu = Page::where('faculty_id', $currentFaculty->id)
                                    ->orderBy('title')
                                    ->get();
                } else {
                    $pagesMenu = Page::whereNull('study_program_id')
                                    ->whereNull('faculty_id')
                                    ->orderBy('title')
                                    ->get();
                }

                $cachedData = [
                    'setting' => $setting,
                    'pagesMenu' => $pagesMenu,
                    'facultiesMenu' => $facultiesMenu,
                    'programsMenu' => $programsMenu,
                    'currentProgram' => $currentProgram,
                    'currentFaculty' => $currentFaculty,
                ];
            }

            // Kirim variabel ke view/blade
            $view->with($cachedData);
        });
    }
}
