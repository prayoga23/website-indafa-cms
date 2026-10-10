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

            ->firstOrFail();

        return view(
            'frontend.faculty.show',
            compact('faculty')
        );
    }
}
