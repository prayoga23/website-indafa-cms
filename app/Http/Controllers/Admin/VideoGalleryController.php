<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        // Ambil semua video untuk dimanajeri di dashboard admin
        $videos = VideoGallery::latest()->paginate(10);
        return view('admin.gallery.video', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|string',
            'category' => 'required|in:Edukasi,Aktivitas,Seminar',
            'duration' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        // Ekstraksi ID dari URL YouTube (Mendukung format share link, short url, dan standar)
        $youtubeId = $this->parseYoutubeId($request->youtube_url);

        if (!$youtubeId) {
            return redirect()->back()->withErrors(['youtube_url' => 'Format URL YouTube tidak valid.']);
        }

        // Jika user mencentang 'Jadikan Video Utama', matikan status featured video lama terlebih dahulu
        if ($request->has('is_featured')) {
            VideoGallery::where('is_featured', true)->update(['is_featured' => false]);
        }

        VideoGallery::create([
            'title' => $request->title,
            'youtube_id' => $youtubeId,
            'category' => $request->category,
            'duration' => $request->duration ?? '5 Menit',
            'description' => $request->description,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->back()->with('success', 'Video dokumentasi berhasil ditambahkan!');
    }

    public function destroy(VideoGallery $video)
    {
        $video->delete();
        return redirect()->back()->with('success', 'Video dokumentasi berhasil dihapus!');
    }

    // Helper Function untuk mengambil ID Video dari tautan teks kiriman user
    private function parseYoutubeId($url) {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }
}
