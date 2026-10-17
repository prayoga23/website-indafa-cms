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
        $page = Page::where('slug', 'lp2m')->first();
        $stored = [];
        if ($page && !empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $stored = $decoded;
            }
        }

        $mission = !empty($stored['mission'])
            ? (is_array($stored['mission']) ? $stored['mission'] : array_filter(array_map('trim', explode("\n", $stored['mission']))))
            : [
                'Mendorong dan memfasilitasi penelitian dosen dan mahasiswa yang bereputasi nasional dan internasional.',
                'Menyelenggarakan pengabdian kepada masyarakat berbasis riset (PAR/ABCD) yang aplikatif dan memberdayakan potensi lokal.',
                'Mengelola dan mengembangkan jurnal-jurnal ilmiah kampus menuju akreditasi SINTA.',
                'Memfasilitasi perolehan Hak Kekayaan Intelektual (HKI) dan hilirisasi produk riset bagi kemaslahatan masyarakat.'
            ];

        $pageData = [
            'title' => ($page && $page->title) ? $page->title : 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M)',
            'tagline' => $stored['tagline'] ?? 'Pusat Hilirisasi Riset Keislaman Terapan dan Pengabdian Transformatif Pesantren.',
            'hero_banner' => ($page && $page->featured_image) ? 'storage/' . $page->featured_image : null,
            'leader_name' => $stored['leader_name'] ?? 'Dr. Muhammad Shodiq, M.Ag.',
            'leader_title' => $stored['leader_title'] ?? 'Ketua LP2M IAI Darul Falah',
            'leader_image' => !empty($stored['leader_image']) ? 'storage/' . $stored['leader_image'] : 'assets/img/user.png',
            'leader_message' => $stored['leader_message'] ?? 'LP2M mendedikasikan seluruh daya riset dan pengabdian civitas akademika untuk menjawab persoalan riil umat, memberdayakan masyarakat pedesaan, serta memajukan khazanah ilmu pengetahuan Islam.',
            'vision' => $stored['vision'] ?? 'Menjadi pusat riset keislaman dan pengabdian masyarakat yang transformatif, inovatif, dan berdaya guna tinggi bagi kemaslahatan umat dan peradaban pada tahun 2030.',
            'mission' => $mission,
            'description' => $stored['description'] ?? 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M) merupakan wadah koordinasi pelaksanaan riset inovatif, hilirisasi keilmuan, KKN tematik, dan pengelolaan jurnal ilmiah OJS terakreditasi.',
            'stats' => [
                'val1' => $stored['stats']['val1'] ?? '65 Judul',
                'label1' => $stored['stats']['label1'] ?? 'Riset Litapdimas',
                'val2' => $stored['stats']['val2'] ?? '4 Jurnal',
                'label2' => $stored['stats']['label2'] ?? 'Rumah Jurnal SINTA',
                'val3' => $stored['stats']['val3'] ?? '42 Sertifikat',
                'label3' => $stored['stats']['label3'] ?? 'Sertifikat HKI',
                'val4' => $stored['stats']['val4'] ?? '25 Desa',
                'label4' => $stored['stats']['label4'] ?? 'Desa Binaan KKN',
            ],
            'phone' => $stored['phone'] ?? '+62 812-3456-7890',
            'email' => $stored['email'] ?? 'lp2m@iaidatulfalah.ac.id',
            'address' => $stored['address'] ?? 'Gedung Rektorat Lt. 2',
            'content' => $page ? $page->content : ''
        ];

        $announcements = Announcement::where('status', 'publish')->latest()->take(3)->get();
        $news = News::where('status', 'published')->latest()->take(3)->get();
        $agendas = Agenda::latest()->take(3)->get();

        return view('frontend.lp2m.beranda', compact('page', 'pageData', 'announcements', 'news', 'agendas'));
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
