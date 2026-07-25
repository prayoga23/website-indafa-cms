<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;

class ProdiSubWebController extends Controller
{
    private function getProdiData($prodi)
    {
        $slugs = [
            'hki' => 'hukum-keluarga-islam',
            'hes' => 'hukum-ekonomi-syariah',
            'mbs' => 'manajemen-bisnis-syariah',
            'ekos' => 'ekonomi-syariah',
            'pai' => 'pendidikan-agama'
        ];

        $slug = $slugs[$prodi] ?? $prodi;
        $dbProdi = StudyProgram::where('slug', $slug)->first();

        $cleanStr = function($val, $fallback) {
            if (!$val) return $fallback;
            $trimmed = trim(strtolower($val));
            if (strlen($trimmed) < 15 || str_contains($trimmed, 'tidak ada') || str_contains($trimmed, 'mbg') || in_array($trimmed, ['no', 'baik', 'vil', 'none', '-'])) {
                return $fallback;
            }
            return $val;
        };

        $cleanMission = function($val, array $fallback) {
            if (!$val) return $fallback;
            $lines = array_values(array_filter(array_map('trim', explode("\n", $val))));
            if (empty($lines)) return $fallback;
            $first = strtolower($lines[0]);
            if (count($lines) === 1 && (strlen($first) < 15 || str_contains($first, 'tidak ada') || str_contains($first, 'mbg') || in_array($first, ['no', 'baik', 'vil']))) {
                return $fallback;
            }
            return $lines;
        };

        $prodies = [
            'mbs' => [
                'id' => 'mbs',
                'name' => $dbProdi ? $dbProdi->name : 'Manajemen Bisnis Syariah (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $cleanStr($dbProdi ? $dbProdi->head_of_program : null, 'Ustadz Ahmad Fauzi, M.M.'),
                'color' => '#1d5a8c',
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'sejarah' => $cleanStr($dbProdi ? $dbProdi->description : null, 'Program Studi Manajemen Bisnis Syariah (S1) mencetak lulusan profesional di bidang tata kelola bisnis berbasis syariah.'),
                'visi' => $cleanStr($dbProdi ? $dbProdi->vision : null, 'Menjadi Program Studi Manajemen Bisnis Syariah unggulan di Jawa Timur.'),
                'misi' => $cleanMission($dbProdi ? $dbProdi->mission : null, [
                    'Menyelenggarakan pendidikan manajemen bisnis berbasis tata kelola syariah.',
                    'Pengembangan riset manajemen dan kewirausahaan Islam.',
                    'Pengabdian masyarakat berbasis pendampingan bisnis dan industri halal.'
                ])
            ],
            'hki' => [
                'id' => 'hki',
                'name' => $dbProdi ? $dbProdi->name : 'Hukum Keluarga Islam (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => $cleanStr($dbProdi ? $dbProdi->head_of_program : null, 'Ustadz Ahmad Rofiqi, M.H.I.'),
                'color' => '#0b5345',
                'bg_gradient' => 'linear-gradient(135deg, #0b5345, #052620)',
                'sejarah' => $cleanStr($dbProdi ? $dbProdi->description : null, 'Program Studi Hukum Keluarga Islam (S1) didirikan untuk menyelenggarakan pendidikan tinggi yang berkualitas di bidang hukum keluarga, peradilan agama, dan keperdataan Islam. Melalui kurikulum yang terintegrasi antara keilmuan hukum Islam kontemporer, hukum positif Indonesia, serta nilai-nilai kepesantrenan, Prodi HKI mencetak sarjana hukum yang profesional, berintegritas, dan siap berkontribusi nyata bagi nusa, bangsa, dan agama.'),
                'visi' => $cleanStr($dbProdi ? $dbProdi->vision : null, 'Menjadi Program Studi Hukum Keluarga Islam yang unggul, profesional, dan berdaya saing dalam pengembangan hukum keluarga Islam terintegrasi nilai-nilai keislaman dan kepesantrenan pada tingkat nasional.'),
                'misi' => $cleanMission($dbProdi ? $dbProdi->mission : null, [
                    'Menyelenggarakan pendidikan dan pembelajaran di bidang Hukum Keluarga Islam yang berkualitas, berkarakter, dan berbasis teknologi.',
                    'Melaksanakan penelitian dan kajian ilmiah yang inovatif dalam memecahkan masalah hukum keluarga Islam kontemporer.',
                    'Melaksanakan pengabdian kepada masyarakat melalui layanan bantuan hukum dan penyuluhan keluarga sakinah.',
                    'Menjalin kerja sama strategis dengan instansi pemerintah, lembaga peradilan agama, dan praktisi hukum.'
                ])
            ],
            'hes' => [
                'id' => 'hes',
                'name' => $dbProdi ? $dbProdi->name : 'Hukum Ekonomi Syariah (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => $cleanStr($dbProdi ? $dbProdi->head_of_program : null, 'Ustadz Wildan Baihaqi, M.E.'),
                'color' => '#725114',
                'bg_gradient' => 'linear-gradient(135deg, #725114, #47320b)',
                'sejarah' => $cleanStr($dbProdi ? $dbProdi->description : null, 'Program Studi Hukum Ekonomi Syariah (S1) membekali mahasiswa dengan keahlian hukum bisnis syariah dan regulasi keuangan Islam.'),
                'visi' => $cleanStr($dbProdi ? $dbProdi->vision : null, 'Menjadi pusat rujukan akademik hukum bisnis syariah yang unggul dan integratif.'),
                'misi' => $cleanMission($dbProdi ? $dbProdi->mission : null, [
                    'Pendidikan hukum bisnis syariah yang profesional berlandaskan keilmuan fiqh muamalah kontemporer.',
                    'Mengembangkan kajian ilmiah kritis di bidang regulasi keuangan syariah.',
                    'Mengabdi untuk mengedukasi literasi keuangan syariah di kalangan pelaku UMKM.'
                ])
            ],
            'ekos' => [
                'id' => 'ekos',
                'name' => $dbProdi ? $dbProdi->name : 'Ekonomi Syariah (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $cleanStr($dbProdi ? $dbProdi->head_of_program : null, 'Ustadz Fahmi Azis, M.E.'),
                'color' => '#1d5a8c',
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'sejarah' => $cleanStr($dbProdi ? $dbProdi->description : null, 'Program Studi Ekonomi Syariah (S1) berfokus pada pencetakan wirausahawan dan profesional di bidang industri keuangan syariah.'),
                'visi' => $cleanStr($dbProdi ? $dbProdi->vision : null, 'Menjadi Program Studi Ekonomi Syariah berorientasi kewirausahaan digital dan nilai Islam.'),
                'misi' => $cleanMission($dbProdi ? $dbProdi->mission : null, [
                    'Menyelenggarakan pendidikan ekonomi syariah berbasis pengembangan digital entrepreneurship.',
                    'Riset terapan inovatif di bidang ekonomi, manajemen, dan keuangan mikro syariah.',
                    'Pendampingan usaha mikro berbasis pemberdayaan zakat, infaq, sedekah, dan wakaf (Ziswaf).'
                ])
            ],
            'pai' => [
                'id' => 'pai',
                'name' => $dbProdi ? $dbProdi->name : 'Pendidikan Agama Islam (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $cleanStr($dbProdi ? $dbProdi->head_of_program : null, 'Dr. H. Mulyadi, M.Pd.'),
                'color' => '#0c6628',
                'bg_gradient' => 'linear-gradient(135deg, #0c6628, #053b15)',
                'sejarah' => $cleanStr($dbProdi ? $dbProdi->description : null, 'Program Studi Pendidikan Agama Islam (S1) berkomitmen melahirkan pendidik PAI yang profesional dan berkarakter islami.'),
                'visi' => $cleanStr($dbProdi ? $dbProdi->vision : null, 'Menghasilkan sarjana pendidikan agama Islam yang unggul dan inovatif.'),
                'misi' => $cleanMission($dbProdi ? $dbProdi->mission : null, [
                    'Menyelenggarakan pendidikan keguruan PAI berbasis pembelajaran digital interaktif.',
                    'Riset keilmuan pedagogi dan psikologi perkembangan pendidikan Islam.',
                    'Pemberdayaan guru-guru madrasah dan TPQ di lingkungan sekitar.'
                ])
            ]
        ];

        if (!array_key_exists($prodi, $prodies)) {
            abort(404);
        }

        return $prodies[$prodi];
    }

    public function index($prodi)
    {
        $data = $this->getProdiData($prodi);
        $news = \App\Models\News::where('status', 'publish')->latest()->take(3)->get();
        return view('frontend.prodi.beranda', compact('data', 'news'));
    }

    public function sejarah($prodi)
    {
        $data = $this->getProdiData($prodi);
        return view('frontend.prodi.sejarah', compact('data'));
    }

    public function visiMisi($prodi)
    {
        $data = $this->getProdiData($prodi);
        return view('frontend.prodi.visi-misi', compact('data'));
    }

    public function pimpinan($prodi)
    {
        $data = $this->getProdiData($prodi);
        return view('frontend.prodi.pimpinan', compact('data'));
    }

    public function akademik($prodi, $page)
    {
        $data = $this->getProdiData($prodi);
        $titles = [
            'dokumen' => 'Dokumen Akademik',
            'persuratan' => 'Formulir Persuratan',
            'turnitin' => 'Layanan Cek Turnitin',
            'kkn' => 'Pendaftaran KKN',
            'kalender' => 'Kalender Akademik',
            'jadwal' => 'Jadwal Kuliah',
            'kelulusan' => 'Alur Kelulusan',
            'akreditasi' => 'Sertifikat Akreditasi'
        ];
        $title = $titles[$page] ?? 'Akademik';
        return view('frontend.prodi.akademik', compact('data', 'page', 'title'));
    }

    public function pengumuman($prodi)
    {
        $data = $this->getProdiData($prodi);
        return view('frontend.prodi.pengumuman', compact('data'));
    }

    public function berita($prodi)
    {
        $data = $this->getProdiData($prodi);
        return view('frontend.prodi.berita', compact('data'));
    }

    public function kontak($prodi)
    {
        $data = $this->getProdiData($prodi);
        return view('frontend.prodi.kontak', compact('data'));
    }
}
