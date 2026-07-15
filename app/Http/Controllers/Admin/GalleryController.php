<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with([
            'faculty',
            'studyProgram'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'admin.galleries.index',
            compact('galleries')
        );
    }

    public function create()
    {
        $faculties = Faculty::orderBy('name')->get();

        $studyPrograms = StudyProgram::orderBy('name')->get();

        return view(
            'admin.galleries.create',
            compact(
                'faculties',
                'studyPrograms'
            )
        );
    }

    public function store(
        StoreGalleryRequest $request
    ) {
        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {

            $validated['cover_image'] =
                $request->file('cover_image')
                    ->store(
                        'galleries',
                        'public'
                    );
        }

        $validated['slug'] =
            Str::slug($validated['title'])
            . '-' .
            time();

        Gallery::create($validated);

        return redirect()
            ->route('admin.galleries.index')
            ->with(
                'success',
                'Album berhasil ditambahkan'
            );
    }

    public function show(
    Gallery $gallery
) {

    $gallery->load([
        'faculty',
        'studyProgram',
        'photos'
    ]);

    return view(
        'admin.galleries.show',
        compact('gallery')
    );
}

    public function edit(
        Gallery $gallery
    ) {
        $faculties =
            Faculty::orderBy('name')->get();

        $studyPrograms =
            StudyProgram::orderBy('name')->get();

        return view(
            'admin.galleries.edit',
            compact(
                'gallery',
                'faculties',
                'studyPrograms'
            )
        );
    }

    public function update(
        UpdateGalleryRequest $request,
        Gallery $gallery
    ) {
        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {

            if ($gallery->cover_image) {

                Storage::disk('public')
                    ->delete(
                        $gallery->cover_image
                    );
            }

            $validated['cover_image'] =
                $request->file('cover_image')
                    ->store(
                        'galleries',
                        'public'
                    );
        }

        if (
            $gallery->title !=
            $validated['title']
        ) {

            $validated['slug'] =
                Str::slug(
                    $validated['title']
                ) . '-' . time();
        }

        $gallery->update($validated);

        return redirect()
            ->route('admin.galleries.index')
            ->with(
                'success',
                'Album berhasil diperbarui'
            );
    }

    public function destroy(
        Gallery $gallery
    ) {
        if ($gallery->cover_image) {

            Storage::disk('public')
                ->delete(
                    $gallery->cover_image
                );
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with(
                'success',
                'Album berhasil dihapus'
            );
    }
}
