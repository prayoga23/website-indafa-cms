<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\News;
use App\Models\Agenda;
use App\Models\Page;
use Illuminate\Http\Request;

class LpmSubWebController extends Controller
{
    /**
     * Beranda LPM
     */
    public function index()
    {
        $page = Page::where('slug', 'lpm')->where('status', 'publish')->first();
        $announcements = Announcement::where('status', 'publish')->latest()->take(3)->get();
        $news = News::where('status', 'published')->latest()->take(3)->get();
        $agendas = Agenda::latest()->take(3)->get();

        return view('frontend.lpm.beranda', compact('page', 'announcements', 'news', 'agendas'));
    }

    /**
     * Profil LPM
     */
    public function profil($page = 'sejarah')
    {
        $validPages = [
            'sejarah' => 'Sejarah LPM',
            'visi-misi' => 'Visi & Misi LPM',
            'struktur-organisasi' => 'Struktur Organisasi LPM',
            'sdm' => 'Sumber Daya Manusia',
            'tupoksi' => 'Tugas Pokok & Fungsi',
            'rkat' => 'RKAT LPM',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'sejarah';
        }

        $title = $validPages[$page];
        return view('frontend.lpm.profil', compact('page', 'title', 'validPages'));
    }

    /**
     * Bidang Pengawasan LPM
     */
    public function pengawasan($page = 'pedoman')
    {
        $validPages = [
            'pedoman' => 'Pedoman Institut',
            'kalender' => 'Kalender Akademik',
            'kontrak-kinerja' => 'Kontrak Kinerja',
            'monev-kinerja' => 'Monev Kinerja',
            'audit-kinerja' => 'Laporan Audit Kinerja',
            'rtm' => 'RTM (Rapat Tinjauan Tahunan)',
            'rtl' => 'RTL (Rapat Tinjauan Manajemen)',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'pedoman';
        }

        $title = $validPages[$page];
        return view('frontend.lpm.pengawasan', compact('page', 'title', 'validPages'));
    }

    /**
     * Bidang Penjaminan LPM
     */
    public function penjaminan($page = 'kebijakan-mutu')
    {
        if ($page === 'laporan-kepuasan-gjm' || $page === 'laporan-kepuasan-gkm') {
            $page = 'monev-gjm-gkm';
        }

        $validPages = [
            'kebijakan-mutu' => 'Kebijakan Mutu',
            'spmi' => 'Sistem Penjaminan Mutu Internal (SPMI)',
            'ami' => 'Audit Mutu Internal (AMI)',
            'peraturan-akreditasi' => 'Peraturan Akreditasi',
            'data-akreditasi' => 'Data Akreditasi',
            'laporan-kepuasan' => 'Laporan Kepuasan',
            'monev-gjm-gkm' => 'Monev GJM & GKM',
            'kalender-mutu' => 'Kalender Mutu',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'kebijakan-mutu';
        }

        $title = $validPages[$page];
        return view('frontend.lpm.penjaminan', compact('page', 'title', 'validPages'));
    }

    /**
     * Pengumuman LPM
     */
    public function pengumuman()
    {
        $announcements = Announcement::where('status', 'publish')->latest()->paginate(6);
        return view('frontend.lpm.pengumuman', compact('announcements'));
    }

    /**
     * Berita LPM
     */
    public function berita()
    {
        $news = News::where('status', 'published')->latest()->paginate(6);
        return view('frontend.lpm.berita', compact('news'));
    }

    /**
     * Kontak LPM
     */
    public function kontak()
    {
        return view('frontend.lpm.kontak');
    }
}
