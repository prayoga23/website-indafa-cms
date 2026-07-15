<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Agenda;
use Carbon\Carbon;

class InformasiController extends Controller
{
    public function berita(Request $request)
    {
        // Query dasar untuk berita yang aktif/dipublikasikan
        $query = News::where('status', 'publish')->with('user')->orderBy('created_at', 'desc');

        // Ambil 1 berita paling terbaru untuk dijadikan Berita Utama (Featured)
        // copy() digunakan agar query dasar tidak terganggu untuk list berita reguler di bawahnya
        $featuredNews = (clone $query)->first();

        // Filter kategori jika dipilih oleh user (Menggunakan pencarian konten/judul sebagai contoh kategori)
        if ($request->has('category') && $request->category != 'Semua Kategori') {
            $query->where('content', 'like', '%' . $request->category . '%')
                  ->orWhere('title', 'like', '%' . $request->category . '%');
        }

        // Jika ada berita utama, kecualikan dari list berita reguler agar tidak double
        if ($featuredNews) {
            $query->where('id', '!=', $featuredNews->id);
        }

        // Ambil berita reguler dengan pagination (misal 6 item per halaman)
        $regularNews = $query->paginate(6)->withQueryString();

        return view('frontend.informasi.berita', compact('featuredNews', 'regularNews'));
    }
    public function pengumuman(Request $request)
    {
        // Query dasar untuk pengumuman aktif, diurutkan dari tanggal rilis terbaru
        $query = Announcement::where('status', 'publish')->orderBy('publish_date', 'desc');

        // 1. Logika Fitur Pencarian (Search)
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        // 2. Logika Fitur Filter Kategori
        if ($request->has('category') && in_array($request->category, ['Penting', 'Pendaftaran'])) {
            $category = $request->category;
            $query->where(function($q) use ($category) {
                $q->where('title', 'like', '%' . $category . '%')
                  ->orWhere('content', 'like', '%' . $category . '%');
            });
        }

        // Ambil data dengan sistem pagination (misal 10 item per halaman)
        $announcements = $query->paginate(10)->withQueryString();

        return view('frontend.informasi.pengumuman', compact('announcements'));
    }

    public function detailPengumuman($slug)
    {
        // Cari pengumuman berdasarkan slug, jika tidak ada tampilkan halaman 404
        $announcement = Announcement::where('slug', $slug)
                                    ->where('status', 'publish')
                                    ->firstOrFail();

        // Tambah jumlah views secara otomatis setiap kali pengumuman dibaca
        $announcement->increment('views');

        // Kembalikan ke halaman view detail (pastikan file view-nya nanti dibuat)
        return view('frontend.informasi.detail_pengumuman', compact('announcement'));
    }

    public function agenda(Request $request)
    {
        $today = Carbon::today()->toDateString();

        // Ambil tipe status filter dari URL parameter, defaultnya adalah 'akan-datang'
        $status = $request->get('status', 'akan-datang');

        $query = Agenda::query();

        // Logika pembagian agenda berdasarkan tanggal hari ini
        if ($status === 'selesai') {
            $query->where('event_date', '<', $today)->orderBy('event_date', 'desc');
        } else {
            // Default: 'akan-datang' (Hari ini atau ke depan)
            $query->where('event_date', '>=', $today)->orderBy('event_date', 'asc');
        }

        // Ambil data dengan pagination (misal 5 item per halaman)
        $agendas = $query->paginate(5)->withQueryString();

        return view('frontend.informasi.agenda', compact('agendas', 'status'));
    }
}
