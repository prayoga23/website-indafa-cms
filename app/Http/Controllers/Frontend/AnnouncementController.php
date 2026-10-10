<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::query()
            ->latest()
            ->paginate(10);

        return view(
            'frontend.announcement.index',
            compact('announcements')
        );
    }

    public function show($slug)
    {
        $announcement = Announcement::where('slug', $slug)
            ->firstOrFail();

        $latestAnnouncements = Announcement::query()
            ->where('id', '!=', $announcement->id)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'frontend.announcement.show',
            compact(
                'announcement',
                'latestAnnouncements'
            )
        );
    }
}
