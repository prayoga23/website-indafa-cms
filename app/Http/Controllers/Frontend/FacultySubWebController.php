<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Announcement;
use App\Models\News;
use App\Models\Agenda;
use App\Models\StudyProgram;
use App\Models\Lecturer;
use App\Models\Page;

class FacultySubWebController extends Controller
{
    private function getFacultyData($faculty)
    {
        $slug = $faculty === 'syariah' ? 'fakultas-ilmu-syariah' : 'fakultas-tarbiyah';
        $pageSlug = $faculty === 'syariah' ? 'fakultas-syariah' : 'fakultas-ebit';

        $dbFaculty = Faculty::where('slug', $slug)->first();
        $page = Page::where('slug', $pageSlug)->first();

        $stored = [];
        if ($page && !empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $stored = $decoded;
            }
        }

        if ($faculty === 'syariah') {
            $mission = !empty($stored['mission'])
                ? (is_array($stored['mission']) ? $stored['mission'] : array_filter(array_map('trim', explode("\n", $stored['mission']))))
                : [
                    'Menyelenggarakan pendidikan dan pengajaran di bidang syariah dan hukum Islam yang integratif berbasis nilai kepesantrenan.',
                    'Melaksanakan penelitian ilmiah guna memecahkan masalah hukum keluarga kontemporer dan regulasi ekonomi syariah.',
                    'Melaksanakan pengabdian kepada masyarakat melalui penyuluhan hukum, bimbingan keluarga sakinah, dan advokasi keagamaan.',
                    'Membangun tata kelola fakultas yang akuntabel, transparan, profesional, dan berorientasi mutu berkelanjutan.'
                ];

            return [
                'id' => 'syariah',
                'name' => ($page && $page->title) ? $page->title : 'Fakultas Ilmu Syariah (FASYA)',
                'dean' => $stored['leader_name'] ?? ($dbFaculty->dean ?? 'Dr. H. Abu Bakar, M.H.I.'),
                'dean_title' => $stored['leader_title'] ?? 'Dekan Fakultas Ilmu Syariah',
                'dean_image' => !empty($stored['leader_image']) ? 'storage/' . $stored['leader_image'] : (($dbFaculty && $dbFaculty->logo) ? 'storage/' . $dbFaculty->logo : 'assets/img/user.png'),
                'dean_message' => $stored['leader_message'] ?? 'Selamat datang di Portal Resmi Fakultas Ilmu Syariah IAI Darul Falah. Kami berkomitmen menyelenggarakan pendidikan hukum Islam berkualitas, menggabungkan kajian turats kitab kuning dengan hukum positif kontemporer.',
                'short_name' => 'FASYA',
                'color' => '#8c1d1d',
                'color_secondary' => '#c28b26',
                'bg_gradient' => 'linear-gradient(135deg, #781717 0%, #4a0d0d 100%)',
                'hero_tagline' => $stored['tagline'] ?? 'Mencetak Praktisi Hukum Islam, Hakim Peradilan Agama, dan Pakar Regulasi Bisnis Syariah Berintegritas.',
                'hero_banner' => ($page && $page->featured_image) ? 'storage/' . $page->featured_image : null,
                'stats' => [
                    'prodi' => $stored['stats']['val1'] ?? '2',
                    'dosen' => $stored['stats']['val2'] ?? '28+',
                    'akreditasi' => $stored['stats']['val3'] ?? 'Baik Sekali',
                    'serapan' => $stored['stats']['val4'] ?? '96%'
                ],
                'stats_labels' => [
                    'prodi' => $stored['stats']['label1'] ?? 'Program Studi S1',
                    'dosen' => $stored['stats']['label2'] ?? 'Dosen Pengajar',
                    'akreditasi' => $stored['stats']['label3'] ?? 'Akreditasi',
                    'serapan' => $stored['stats']['label4'] ?? 'Serapan Kerja'
                ],
                'prodies' => [
                    [
                        'name' => 'Hukum Keluarga Islam (HKI)',
                        'jenjang' => 'S1 (Sarjana Hukum - S.H.)',
                        'slug' => 'hki',
                        'akreditasi' => 'Baik Sekali (BAN-PT)',
                        'icon' => 'bi-balance-scale',
                        'desc' => 'Mencetak sarjana hukum Islam yang ahli di bidang hukum perkawinan, waris, advokasi, peradilan agama, kepenghuluan, dan mediasi sengketa keluarga.',
                        'prospek' => 'Hakim Pengadilan Agama, Penghulu KUA, Advokat Syariah, Konsultan Hukum Keluarga, Peneliti.'
                    ],
                    [
                        'name' => 'Hukum Ekonomi Syariah (HES)',
                        'jenjang' => 'S1 (Sarjana Hukum - S.H.)',
                        'slug' => 'hes',
                        'akreditasi' => 'Baik Sekali (BAN-PT)',
                        'icon' => 'bi-bank',
                        'desc' => 'Menghasilkan praktisi dan konsultan hukum bisnis syariah, perbankan syariah, pasar modal syariah, fintech Islam, dan arbiter bisnis.',
                        'prospek' => 'Legal Officer Perbankan Syariah, Dewan Pengawas Syariah (DPS), Notaris Muamalah, Arbiter Basyarnas.'
                    ]
                ],
                'sejarah' => $stored['description'] ?? ($dbFaculty->description ?? 'Fakultas Ilmu Syariah (FASYA) IAI Darul Falah didirikan dengan komitmen teguh untuk melahirkan cendekiawan dan praktisi hukum Islam yang profesional, berintegritas tinggi, serta responsif terhadap dinamika keumatan dan regulasi modern.'),
                'visi' => $stored['vision'] ?? 'Menjadi Fakultas Syariah yang unggul, kompetitif, dan bereputasi nasional dalam pengembangan keilmuan syariah dan hukum Islam kontemporer yang berlandaskan nilai-nilai kepesantrenan pada tahun 2030.',
                'misi' => $mission,
                'phone' => $stored['phone'] ?? null,
                'email' => $stored['email'] ?? null,
                'address' => $stored['address'] ?? null,
                'additional_content' => $page ? $page->content : null
            ];
        } else {
            $mission = !empty($stored['mission'])
                ? (is_array($stored['mission']) ? $stored['mission'] : array_filter(array_map('trim', explode("\n", $stored['mission']))))
                : [
                    'Menyelenggarakan pendidikan ekonomi syariah dan pedagogi Islam yang adaptif terhadap revolusi industri dan teknologi.',
                    'Mengembangkan riset inovatif di bidang bisnis Islam, keuangan syariah, dan metode pembelajaran pendidikan agama.',
                    'Menerapkan iptek berbasis nilai Islam untuk pemberdayaan ekonomi masyarakat dan peningkatan mutu pendidikan madrasah.',
                    'Menjalin kemitraan strategis dengan industri keuangan syariah, instansi pemerintah, dan lembaga pendidikan nasional.'
                ];

            return [
                'id' => 'ebit',
                'name' => ($page && $page->title) ? $page->title : 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
                'dean' => $stored['leader_name'] ?? ($dbFaculty->dean ?? 'Dr. Hj. Siti Rahmah, M.E.I.'),
                'dean_title' => $stored['leader_title'] ?? 'Dekan Fakultas Ekonomi Bisnis dan Tarbiyah',
                'dean_image' => !empty($stored['leader_image']) ? 'storage/' . $stored['leader_image'] : (($dbFaculty && $dbFaculty->logo) ? 'storage/' . $dbFaculty->logo : 'assets/img/user.png'),
                'dean_message' => $stored['leader_message'] ?? 'Selamat datang di Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT). Kami mengintegrasikan profesionalitas perbankan dan bisnis syariah dengan kompetensi pedagogik kependidikan Islam.',
                'short_name' => 'FEBIT',
                'color' => '#103454',
                'color_secondary' => '#c28b26',
                'bg_gradient' => 'linear-gradient(135deg, #0e2a44 0%, #06192a 100%)',
                'hero_tagline' => $stored['tagline'] ?? 'Integrasi Keunggulan Bisnis Syariah, Manajemen Modern, dan Pedagogi Pendidikan Islam Berkualitas.',
                'hero_banner' => ($page && $page->featured_image) ? 'storage/' . $page->featured_image : null,
                'stats' => [
                    'prodi' => $stored['stats']['val1'] ?? '3',
                    'dosen' => $stored['stats']['val2'] ?? '35+',
                    'mitra' => $stored['stats']['val3'] ?? '15+',
                    'kepuasan' => $stored['stats']['val4'] ?? '98%'
                ],
                'stats_labels' => [
                    'prodi' => $stored['stats']['label1'] ?? 'Program Studi S1',
                    'dosen' => $stored['stats']['label2'] ?? 'Dosen Pengajar',
                    'mitra' => $stored['stats']['label3'] ?? 'Mitra Kerjasama',
                    'kepuasan' => $stored['stats']['label4'] ?? 'Tingkat Kepuasan'
                ],
                'prodies' => [
                    [
                        'name' => 'Manajemen Bisnis Syariah (MBS)',
                        'jenjang' => 'S1 (Sarjana Manajemen - S.M.)',
                        'slug' => 'mbs',
                        'akreditasi' => 'Baik Sekali (LAMEMBA)',
                        'icon' => 'bi-briefcase-fill',
                        'desc' => 'Mencetak manajer profesional, entrepreneur muslim kreatif, konsultan pemasaran syariah, dan praktisi tata kelola bisnis berbasis etika Islam.',
                        'prospek' => 'Manajer Operasional Bisnis, Business Development, Analis SDM Syariah, Wirausahawan Mandiri.'
                    ],
                    [
                        'name' => 'Ekonomi Syariah (EKOS)',
                        'jenjang' => 'S1 (Sarjana Ekonomi - S.E.)',
                        'slug' => 'ekos',
                        'akreditasi' => 'Baik Sekali (LAMEMBA)',
                        'icon' => 'bi-graph-up-arrow',
                        'desc' => 'Membentuk analis ekonomi moneter dan fiskal Islam, praktisi perbankan syariah, pengelola lembaga zakat-wakaf (ZISWAF), dan perencana keuangan syariah.',
                        'prospek' => 'Account Officer Bank Syariah, Analis Keuangan Syariah, Manajer Lembaga ZISWAF, Peneliti Ekonomi Islam.'
                    ],
                    [
                        'name' => 'Pendidikan Agama Islam (PAI)',
                        'jenjang' => 'S1 (Sarjana Pendidikan - S.Pd.)',
                        'slug' => 'pai',
                        'akreditasi' => 'Unggul (LAMDIK)',
                        'icon' => 'bi-mortarboard-fill',
                        'desc' => 'Menghasilkan tenaga pendidik dan guru PAI yang profesional, inovator kurikulum pembelajaran Islam multimedia, serta konselor pendidikan berakhlak mulia.',
                        'prospek' => 'Guru PAI di Sekolah/Madrasah, Pengembang Kurikulum PAI, Edupreneur Islam, Pendidik di Pesantren Modern.'
                    ]
                ],
                'sejarah' => $stored['description'] ?? ($dbFaculty->description ?? 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT) didirikan untuk menyatukan dua pilar kekuatan peradaban Islam: kemandirian ekonomi umat dan penguatan pendidikan karakter generasi muda.'),
                'visi' => $stored['vision'] ?? 'Menjadi Fakultas Ekonomi Bisnis dan Tarbiyah terkemuka yang unggul dalam integrasi ilmu bisnis syariah dan kependidikan Islam berkarakter kepesantrenan pada tahun 2030.',
                'misi' => $mission,
                'phone' => $stored['phone'] ?? null,
                'email' => $stored['email'] ?? null,
                'address' => $stored['address'] ?? null,
                'additional_content' => $page ? $page->content : null
            ];
        }
    }

    public function index($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        $pageSlug = $faculty === 'syariah' ? 'fakultas-syariah' : 'fakultas-ebit';
        $page = Page::where('slug', $pageSlug)->first();

        $announcements = Announcement::where('status', 'publish')->latest()->take(3)->get();
        $news = News::where('status', 'published')->latest()->take(3)->get();
        $agendas = Agenda::latest()->take(3)->get();

        if ($faculty === 'syariah') {
            return view('frontend.fakultas.syariah', compact('data', 'page', 'announcements', 'news', 'agendas'));
        } elseif ($faculty === 'ebit') {
            return view('frontend.fakultas.ebit', compact('data', 'page', 'announcements', 'news', 'agendas'));
        }

        return view('frontend.fakultas.beranda', compact('data', 'page', 'announcements', 'news', 'agendas'));
    }

    public function sejarah($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        return view('frontend.fakultas.sejarah', compact('data'));
    }

    public function visiMisi($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        return view('frontend.fakultas.visi-misi', compact('data'));
    }

    public function pimpinan($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        return view('frontend.fakultas.pimpinan', compact('data'));
    }

    public function akademik($faculty, $page)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        $titles = [
            'dokumen' => 'Dokumen Akademik',
            'persuratan' => 'Formulir Persuratan',
            'turnitin' => 'Layanan Cek Turnitin',
            'kalender' => 'Kalender Akademik',
            'jadwal' => 'Jadwal Kuliah',
            'kelulusan' => 'Alur Kelulusan',
            'akreditasi' => 'Sertifikat Akreditasi'
        ];
        $title = $titles[$page] ?? 'Akademik';
        return view('frontend.fakultas.akademik', compact('data', 'page', 'title'));
    }

    public function pengumuman($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        return view('frontend.fakultas.pengumuman', compact('data'));
    }

    public function berita($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        return view('frontend.fakultas.berita', compact('data'));
    }

    public function kontak($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        return view('frontend.fakultas.kontak', compact('data'));
    }
}
