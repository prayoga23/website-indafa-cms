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
        $page = Page::where('slug', 'lpm')->first();
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
                'Mengembangkan dan memutakhirkan dokumen Sistem Penjaminan Mutu Internal (SPMI) sesuai standar nasional.',
                'Melaksanakan audit mutu internal (AMI) secara konsisten dan independen di seluruh unit.',
                'Mengawal proses akreditasi program studi dan institusi menuju predikat Unggul.',
                'Membangun budaya mutu berkelanjutan (continuous quality improvement) bagi civitas akademika.'
            ];

        $pageData = [
            'title' => ($page && $page->title) ? $page->title : 'Lembaga Penjaminan Mutu (LPM)',
            'tagline' => $stored['tagline'] ?? 'Pengawalan Mutu Berkelanjutan Berbasis Siklus PPEPP Menuju Akreditasi Unggul.',
            'hero_banner' => ($page && $page->featured_image) ? 'storage/' . $page->featured_image : null,
            'leader_name' => $stored['leader_name'] ?? 'Dr. H. Ahmad Fauzi, M.Pd.I.',
            'leader_title' => $stored['leader_title'] ?? 'Ketua Lembaga Penjaminan Mutu (LPM)',
            'leader_image' => !empty($stored['leader_image']) ? 'storage/' . $stored['leader_image'] : 'assets/img/user.png',
            'leader_message' => $stored['leader_message'] ?? 'Lembaga Penjaminan Mutu (LPM) berkomitmen memastikan setiap proses pendidikan, penelitian, dan pengabdian masyarakat berjalan sesuai standar mutu tertinggi demi menghasilkan lulusan berkompeten dan berdaya saing.',
            'vision' => $stored['vision'] ?? 'Menjadi Lembaga Penjaminan Mutu yang profesional, terpercaya, dan bereputasi dalam mewujudkan budaya mutu akademik serta tata kelola perguruan tinggi yang unggul dan berkelanjutan.',
            'mission' => $mission,
            'description' => $stored['description'] ?? 'Lembaga Penjaminan Mutu (LPM) IAI Darul Falah bertugas mengawal, mengendalikan, dan meningkatkan standar mutu akademik serta tata kelola tridharma perguruan tinggi sesuai siklus PPEPP.',
            'stats' => [
                'val1' => $stored['stats']['val1'] ?? '5 Fase',
                'label1' => $stored['stats']['label1'] ?? 'Siklus PPEPP',
                'val2' => $stored['stats']['val2'] ?? '100%',
                'label2' => $stored['stats']['label2'] ?? 'Akreditasi Prodi',
                'val3' => $stored['stats']['val3'] ?? '18 Orang',
                'label3' => $stored['stats']['label3'] ?? 'Auditor Internal',
                'val4' => $stored['stats']['val4'] ?? '4.62 / 5.0',
                'label4' => $stored['stats']['label4'] ?? 'Skor EDOM Dosen',
            ],
            'phone' => $stored['phone'] ?? '+62 812-3456-7890',
            'email' => $stored['email'] ?? 'lpm@iaidatulfalah.ac.id',
            'address' => $stored['address'] ?? 'Gedung Rektorat Lt. 2',
            'content' => $page ? $page->content : ''
        ];

        $announcements = Announcement::where('status', 'publish')->latest()->take(3)->get();
        $news = News::where('status', 'published')->latest()->take(3)->get();
        $agendas = Agenda::latest()->take(3)->get();

        return view('frontend.lpm.beranda', compact('page', 'pageData', 'announcements', 'news', 'agendas'));
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
