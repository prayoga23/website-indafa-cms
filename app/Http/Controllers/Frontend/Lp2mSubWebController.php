<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\News;
use App\Models\Agenda;
use App\Models\Page;
use Illuminate\Http\Request;

class Lp2mSubWebController extends Controller
{
    /**
     * Beranda LP2M
     */
    public function index()
    {
        $page = Page::where('slug', 'lp2m')->where('status', 'publish')->first();
        $announcements = Announcement::where('status', 'publish')->latest()->take(3)->get();
        $news = News::where('status', 'published')->latest()->take(3)->get();
        $agendas = Agenda::latest()->take(3)->get();

        return view('frontend.lp2m.beranda', compact('page', 'announcements', 'news', 'agendas'));
    }

    /**
     * Profil LP2M
     */
    public function profil($page = 'sejarah')
    {
        $validPages = [
            'sejarah' => 'Sejarah LP2M',
            'visi-misi' => 'Visi, Misi, dan Tujuan',
            'tupoksi' => 'Tugas Pokok dan Fungsi',
            'dokumen-resmi' => 'Dokumen Resmi',
            'struktur-organisasi' => 'Struktur Organisasi',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'sejarah';
        }

        $title = $validPages[$page];
        return view('frontend.lp2m.profil', compact('page', 'title', 'validPages'));
    }

    /**
     * Riset LP2M
     */
    public function riset($page = 'jurnal')
    {
        $validPages = [
            'jurnal' => 'Jurnal & Publikasi',
            'penelitian' => 'Penelitian (Litapdimas)',
            'pengabdian' => 'Pengabdian Litapdimas',
            'hki' => 'Hak Kekayaan Intelektual (HKI)',
            'rekap-penelitian' => 'Rekapitulasi Penelitian',
            'rekap-pengabdian' => 'Rekapitulasi Pengabdian',
            'sdgs' => 'Relevansi Penelitian & Pengabdian dengan SDGs',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'jurnal';
        }

        $title = $validPages[$page];
        return view('frontend.lp2m.riset', compact('page', 'title', 'validPages'));
    }

    /**
     * Pusat LP2M
     */
    public function pusat($page = 'penelitian')
    {
        $validPages = [
            'penelitian' => 'Pusat Penelitian',
            'pengabdian' => 'Pusat Pengabdian Masyarakat',
            'publikasi' => 'Pusat Publikasi Ilmiah',
            'psga' => 'Pusat Studi Gender dan Anak (PSGA)',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'penelitian';
        }

        $title = $validPages[$page];
        return view('frontend.lp2m.pusat', compact('page', 'title', 'validPages'));
    }

    /**
     * Layanan LP2M
     */
    public function layanan($page = 'sop')
    {
        $validPages = [
            'sop' => 'SOP Layanan',
            'motto-maklumat' => 'Motto & Maklumat Pelayanan',
            'panduan-pedoman' => 'Panduan & Pedoman',
            'surat-online' => 'Layanan Pembuatan Surat Online',
            'dokumen-kerjasama' => 'Dokumen Kerjasama Kumpulan SK',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'sop';
        }

        $title = $validPages[$page];
        return view('frontend.lp2m.layanan', compact('page', 'title', 'validPages'));
    }

    /**
     * Survei LP2M
     */
    public function survei($page = 'indeks-kepuasan')
    {
        $validPages = [
            'indeks-kepuasan' => 'Indeks Kepuasan Pelanggan',
            'kolaborasi' => 'Survei Kegiatan Penelitian & PKM Kolaborasi',
        ];

        if (!array_key_exists($page, $validPages)) {
            $page = 'indeks-kepuasan';
        }

        $title = $validPages[$page];
        return view('frontend.lp2m.survei', compact('page', 'title', 'validPages'));
    }

    /**
     * Kontak LP2M
     */
    public function kontak()
    {
        return view('frontend.lp2m.kontak');
    }
}
