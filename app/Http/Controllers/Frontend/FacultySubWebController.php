<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Announcement;
use App\Models\News;
use App\Models\Agenda;
use App\Models\StudyProgram;
use App\Models\Lecturer;

class FacultySubWebController extends Controller
{
    private function getFacultyData($faculty)
    {
        $slug = $faculty === 'syariah' ? 'fakultas-ilmu-syariah' : 'fakultas-tarbiyah';
        $dbFaculty = Faculty::where('slug', $slug)->first();

        if ($faculty === 'syariah') {
            return [
                'id' => 'syariah',
                'name' => 'Fakultas Ilmu Syariah (FASYA)',
                'dean' => $dbFaculty ? ($dbFaculty->dean ?? 'Dr. H. Abu Bakar, M.H.I.') : 'Dr. H. Abu Bakar, M.H.I.',
                'dean_title' => 'Dekan Fakultas Ilmu Syariah',
                'dean_image' => ($dbFaculty && $dbFaculty->logo) ? 'storage/' . $dbFaculty->logo : 'assets/img/user.png',
                'short_name' => 'FASYA',
                'color' => '#8c1d1d', // Deep Islamic maroon for Syariah
                'color_secondary' => '#c28b26', // Gold accent
                'bg_gradient' => 'linear-gradient(135deg, #781717 0%, #4a0d0d 100%)',
                'hero_tagline' => 'Mencetak Praktisi Hukum Islam, Hakim Peradilan Agama, dan Pakar Regulasi Bisnis Syariah Berintegritas.',
                'stats' => [
                    'prodi' => '2',
                    'dosen' => '28+',
                    'akreditasi' => 'Baik Sekali',
                    'serapan' => '96%'
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
                'sejarah' => $dbFaculty ? ($dbFaculty->description ?? 'Fakultas Ilmu Syariah (FASYA) IAI Darul Falah didirikan dengan komitmen teguh untuk melahirkan cendekiawan dan praktisi hukum Islam yang profesional, berintegritas tinggi, serta responsif terhadap dinamika keumatan dan regulasi modern.') : 'Fakultas Ilmu Syariah (FASYA) IAI Darul Falah didirikan dengan komitmen teguh untuk melahirkan cendekiawan dan praktisi hukum Islam yang profesional, berintegritas tinggi, serta responsif terhadap dinamika keumatan dan regulasi modern.',
                'visi' => 'Menjadi Fakultas Syariah yang unggul, kompetitif, dan bereputasi nasional dalam pengembangan keilmuan syariah dan hukum Islam kontemporer yang berlandaskan nilai-nilai kepesantrenan pada tahun 2030.',
                'misi' => [
                    'Menyelenggarakan pendidikan dan pengajaran di bidang syariah dan hukum Islam yang integratif berbasis nilai kepesantrenan.',
                    'Melaksanakan penelitian ilmiah guna memecahkan masalah hukum keluarga kontemporer dan regulasi ekonomi syariah.',
                    'Melaksanakan pengabdian kepada masyarakat melalui penyuluhan hukum, bimbingan keluarga sakinah, dan advokasi keagamaan.',
                    'Membangun tata kelola fakultas yang akuntabel, transparan, profesional, dan berorientasi mutu berkelanjutan.'
                ]
            ];
        } else {
            return [
                'id' => 'ebit',
                'name' => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
                'dean' => $dbFaculty ? ($dbFaculty->dean ?? 'Dr. Hj. Siti Rahmah, M.E.I.') : 'Dr. Hj. Siti Rahmah, M.E.I.',
                'dean_title' => 'Dekan Fakultas Ekonomi Bisnis dan Tarbiyah',
                'dean_image' => ($dbFaculty && $dbFaculty->logo) ? 'storage/' . $dbFaculty->logo : 'assets/img/user.png',
                'short_name' => 'FEBIT',
                'color' => '#103454', // Deep oceanic navy for FEBIT
                'color_secondary' => '#c28b26', // Gold accent
                'bg_gradient' => 'linear-gradient(135deg, #0e2a44 0%, #06192a 100%)',
                'hero_tagline' => 'Integrasi Keunggulan Bisnis Syariah, Manajemen Modern, dan Pedagogi Pendidikan Islam Berkualitas.',
                'stats' => [
                    'prodi' => '3',
                    'dosen' => '35+',
                    'mitra' => '15+',
                    'kepuasan' => '98%'
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
                'sejarah' => $dbFaculty ? ($dbFaculty->description ?? 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT) didirikan untuk menyatukan dua pilar kekuatan peradaban Islam: kemandirian ekonomi umat dan penguatan pendidikan karakter generasi muda.') : 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT) didirikan untuk menyatukan dua pilar kekuatan peradaban Islam: kemandirian ekonomi umat dan penguatan pendidikan karakter generasi muda.',
                'visi' => 'Menjadi Fakultas Ekonomi Bisnis dan Tarbiyah terkemuka yang unggul dalam integrasi ilmu bisnis syariah dan kependidikan Islam berkarakter kepesantrenan pada tahun 2030.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi syariah dan pedagogi Islam yang adaptif terhadap revolusi industri dan teknologi.',
                    'Mengembangkan riset inovatif di bidang bisnis Islam, keuangan syariah, dan metode pembelajaran pendidikan agama.',
                    'Menerapkan iptek berbasis nilai Islam untuk pemberdayaan ekonomi masyarakat dan peningkatan mutu pendidikan madrasah.',
                    'Menjalin kemitraan strategis dengan industri keuangan syariah, instansi pemerintah, dan lembaga pendidikan nasional.'
                ]
            ];
        }
    }

    public function index($faculty)
    {
        if ($faculty !== 'syariah' && $faculty !== 'ebit') {
            abort(404);
        }

        $data = $this->getFacultyData($faculty);
        $announcements = Announcement::where('status', 'publish')->latest()->take(3)->get();
        $news = News::where('status', 'published')->latest()->take(3)->get();
        $agendas = Agenda::latest()->take(3)->get();

        if ($faculty === 'syariah') {
            return view('frontend.fakultas.syariah', compact('data', 'announcements', 'news', 'agendas'));
        } elseif ($faculty === 'ebit') {
            return view('frontend.fakultas.ebit', compact('data', 'announcements', 'news', 'agendas'));
        }

        return view('frontend.fakultas.beranda', compact('data', 'announcements', 'news', 'agendas'));
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
