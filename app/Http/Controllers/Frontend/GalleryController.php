<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Gallery::withCount('photos')
            ->where('status', 'publish')
            ->latest()
            ->paginate(12);

        return view(
            'frontend.gallery.index',
            compact('albums')
        );
    }

    public function show($slug)
    {
        $album = Gallery::with('photos')
            ->where('slug', $slug)
            ->firstOrFail();

        return view(
            'frontend.gallery.show',
            compact('album')
        );
    }
}
