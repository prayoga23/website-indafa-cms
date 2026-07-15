<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    /**
     * Menampilkan Halaman Galeri Foto Publik
     */
    public function fotoGallery(Request $request)
    {
        $query = PhotoGallery::query()->orderBy('activity_date', 'desc');

        // Ambil filter kategori dari URL query string
        $currentCategory = $request->get('category', 'all');

        if ($currentCategory !== 'all') {
            $query->where('category', $currentCategory);
        }

        // Ambil data dengan sistem pagination (6 item per halaman)
        $photos = $query->paginate(6)->withQueryString();

        return view('frontend.galeri.foto', compact('photos', 'currentCategory'));
    }

    /**
     * (Opsional) Persiapan Method untuk Galeri Video Mendatang
     */
    public function videoGallery(Request $request)
    {
        // 1. Ambil 1 video utama yang ditandai sebagai featured (paling baru)
        $featuredVideo = VideoGallery::where('is_featured', true)
                                      ->orderBy('created_at', 'desc')
                                      ->first();

        // 2. Jika tidak ada yang ditandai featured, ambil video paling baru secara acak sebagai fallback
        if (!$featuredVideo) {
            $featuredVideo = VideoGallery::orderBy('created_at', 'desc')->first();
        }

        // 3. Ambil sisa video reguler untuk grid di bawah (kecuali video utama)
        $query = VideoGallery::query()->orderBy('created_at', 'desc');
        if ($featuredVideo) {
            $query->where('id', '!=', $featuredVideo->id);
        }

        // Batasi 6 video reguler per halaman
        $videos = $query->paginate(6);

        return view('frontend.galeri.video', compact('featuredVideo', 'videos'));
    }
}
