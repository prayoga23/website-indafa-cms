<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->paginate(10);

        return view(
            'admin.announcements.index',
            compact('announcements')
        );
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(StoreAnnouncementRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] =
            Str::slug($validated['title']) . '-' . time();

        Announcement::create($validated);

        return redirect()
            ->route('admin.announcements.index')
            ->with(
                'success',
                'Pengumuman berhasil ditambahkan.'
            );
    }

    public function show(Announcement $announcement)
    {
        return view(
            'admin.announcements.show',
            compact('announcement')
        );
    }

    public function edit(Announcement $announcement)
    {
        return view(
            'admin.announcements.edit',
            compact('announcement')
        );
    }

    public function update(
        UpdateAnnouncementRequest $request,
        Announcement $announcement
    ) {
        $validated = $request->validated();

        if (
            $announcement->title != $validated['title']
        ) {
            $validated['slug'] =
                Str::slug($validated['title']) . '-' . time();
        }

        $announcement->update($validated);

        return redirect()
            ->route('admin.announcements.index')
            ->with(
                'success',
                'Pengumuman berhasil diperbarui.'
            );
    }

    public function destroy(
        Announcement $announcement
    ) {
        $announcement->delete();

        return redirect()
            ->route('admin.announcements.index')
            ->with(
                'success',
                'Pengumuman berhasil dihapus.'
            );
    }
};
