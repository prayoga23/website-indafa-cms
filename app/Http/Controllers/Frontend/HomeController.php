<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Model sesuai dengan database Anda
use App\Models\Banner;
use App\Models\WelcomeMessage;
use App\Models\News;
use App\Models\Agenda;
use App\Models\CampusStatistic;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();

        // 1. Ambil data sambutan ketua prodi
        $sambutan = WelcomeMessage::first();

        // 2. Ambil 1 berita utama terbaru yang berstatus 'published' (atau aktif)
        $featuredNews = News::where('status', 'publish') // sesuaikan string status di DB Anda (e.g., 'published' / 1)
                            ->latest()
                            ->first();

        // 3. Ambil 4 berita terbaru lainnya (kecuali berita utama)
        $featuredId = $featuredNews ? $featuredNews->id : null;
        $news = News::where('status', 'publish')
                    ->where('id', '!=', $featuredId)
                    ->latest()
                    ->take(4)
                    ->get();

        // 4. Ambil 6 agenda terdekat berdasarkan kolom 'event_date'
        $agendas = Agenda::where('event_date', '>=', now()->toDateString())
                         ->orderBy('event_date', 'asc')
                         ->take(6)
                         ->get();

        // 5. Ambil data statistik kampus
        $stats = CampusStatistic::first();

        return view('frontend.home.index', compact(
            'banners',
            'sambutan',
            'featuredNews',
            'news',
            'agendas',
            'stats'
        ));
    }
}
