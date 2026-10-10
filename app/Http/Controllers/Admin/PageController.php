<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Faculty;
use App\Models\Page;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with([
                'faculty',
                'studyProgram'
            ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.pages.index',
            compact('pages')
        );
    }

    public function create()
    {
        $faculties = Faculty::orderBy('name')->get();
        $studyPrograms = StudyProgram::orderBy('name')->get();

        return view(
            'admin.pages.create',
            compact(
                'faculties',
                'studyPrograms'
            )
        );
    }

    public function store(StorePageRequest $request)
    {
        $validated = $request->validated();

        // slug otomatis
        $validated['slug'] =
            Str::slug($validated['title']) . '-' . time();

        // upload featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] =
                $request->file('featured_image')
                    ->store('pages', 'public');
        }

        Page::create($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Halaman berhasil ditambahkan');
    }

    public function show(Page $page)
    {
        return view(
            'admin.pages.show',
            compact('page')
        );
    }

    public function edit(Page $page)
    {
        $faculties = Faculty::orderBy('name')->get();
        $studyPrograms = StudyProgram::orderBy('name')->get();

        return view(
            'admin.pages.edit',
            compact(
                'page',
                'faculties',
                'studyPrograms'
            )
        );
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $validated = $request->validated();

        // slug jika judul berubah
        if ($page->title !== $validated['title']) {
            $validated['slug'] =
                Str::slug($validated['title']) . '-' . time();
        }

        // update featured image
        if ($request->hasFile('featured_image')) {

            if ($page->featured_image) {
                Storage::disk('public')
                    ->delete($page->featured_image);
            }

            $validated['featured_image'] =
                $request->file('featured_image')
                    ->store('pages', 'public');
        }

        $page->update($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Halaman berhasil diperbarui');
    }

    public function destroy(Page $page)
    {
        if ($page->featured_image) {
            Storage::disk('public')
                ->delete($page->featured_image);
        }

        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Halaman berhasil dihapus');
    }
}
