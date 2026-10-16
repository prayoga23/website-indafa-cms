<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::latest()->paginate(12);

        return view('frontend.faculty.index', compact('faculties'));
    }

    public function show($slug)
    {
        $cleanSlug = str_replace(['fakultas-', 'fakultas_'], '', strtolower($slug));

        $faculty = Faculty::query()
            ->with([
                'studyPrograms',
                'studyPrograms.lecturers',
                'news' => function ($query) {
                    $query->latest()->limit(6);
                },
                'galleries' => function ($query) {
                    $query->latest()->limit(8);
                }
            ])
            ->where('slug', $slug)
            ->orWhere('slug', 'fakultas-' . $cleanSlug)
            ->orWhere('slug', $cleanSlug)
            ->first();

        if (!$faculty) {
            $aliasMap = [
                'fakultas-syariah' => ['fakultas-ilmu-syariah', 'syariah'],
                'fakultas-ilmu-syariah' => ['fakultas-syariah', 'syariah'],
                'fakultas-ebit' => ['fakultas-tarbiyah', 'tarbiyah'],
                'fakultas-tarbiyah' => ['fakultas-ebit', 'tarbiyah'],
                'syariah' => ['fakultas-ilmu-syariah', 'fakultas-syariah'],
                'tarbiyah' => ['fakultas-tarbiyah', 'fakultas-ebit'],
            ];

            if (isset($aliasMap[$slug])) {
                $faculty = Faculty::query()
                    ->with(['studyPrograms', 'studyPrograms.lecturers', 'news', 'galleries'])
                    ->whereIn('slug', $aliasMap[$slug])
                    ->first();
            }
        }

        if (!$faculty) {
            if (str_contains($cleanSlug, 'syariah')) {
                $faculty = Faculty::where('name', 'like', '%syariah%')->first();
            } elseif (str_contains($cleanSlug, 'tarbiyah') || str_contains($cleanSlug, 'ebit')) {
                $faculty = Faculty::where('name', 'like', '%tarbiyah%')->orWhere('name', 'like', '%ebit%')->first();
            }
        }

        if (!$faculty) {
            abort(404);
        }

        return view(
            'frontend.faculty.show',
            compact('faculty')
        );
    }
}
