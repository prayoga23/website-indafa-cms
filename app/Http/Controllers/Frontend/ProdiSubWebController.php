<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;
use App\Models\Lecturer;

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

        // Ambil data halaman dinamis dari tabel pages (diupdate via admin tanpa coding)
        $page = \App\Models\Page::where('slug', 'portal-prodi-' . $prodi)->first();
        $stored = [];
        if ($page && !empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $stored = $decoded;
            }
        }

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
            if (is_array($val)) return $val;
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
                'name' => $stored['name'] ?? ($dbProdi ? $dbProdi->name : 'Manajemen Bisnis Syariah (S1)'),
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $cleanStr($stored['head_name'] ?? ($dbProdi ? $dbProdi->head_of_program : null), 'Ustadz Ahmad Fauzi, M.M.'),
                'head_title' => $stored['head_title'] ?? 'Ketua Program Studi MBS',
                'head_photo' => $stored['head_photo'] ?? ($dbProdi && $dbProdi->logo ? $dbProdi->logo : null),
                'head_quote' => $cleanStr($stored['head_quote'] ?? null, 'Kami mendidik pebisnis muslim yang cakap mengelola organisasi modern berbasis nilai integritas, keadilan, dan keberkahan syariah.'),
                'secretary_name' => $cleanStr($stored['secretary_name'] ?? null, 'Ustadzah Nurul Hidayah, M.M.'),
                'secretary_photo' => $stored['secretary_photo'] ?? null,
                'color' => '#1d5a8c',
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'hero_image' => $page && $page->featured_image ? $page->featured_image : null,
                'tagline' => $stored['tagline'] ?? 'Mencetak Wirausahawan Muslim, Manajer Profesional, dan Praktisi Bisnis Kreatif Berdaya Saing Global.',
                'sejarah' => $cleanStr($stored['description'] ?? ($dbProdi ? $dbProdi->description : null), 'Program Studi Manajemen Bisnis Syariah (S1) mencetak lulusan profesional di bidang tata kelola bisnis berbasis syariah.'),
                'sejarah_image' => $stored['history_image'] ?? null,
                'visi' => $cleanStr($stored['vision'] ?? ($dbProdi ? $dbProdi->vision : null), 'Menjadi Program Studi Manajemen Bisnis Syariah unggulan di Jawa Timur.'),
                'misi' => $cleanMission($stored['mission'] ?? ($dbProdi ? $dbProdi->mission : null), [
                    'Menyelenggarakan pendidikan manajemen bisnis berbasis tata kelola syariah.',
                    'Pengembangan riset manajemen dan kewirausahaan Islam.',
                    'Pengabdian masyarakat berbasis pendampingan bisnis dan industri halal.'
                ]),
                'degree' => $stored['degree'] ?? ($dbProdi ? $dbProdi->degree : 'S1'),
                'graduate_degree' => $stored['graduate_degree'] ?? 'S.Bns. / S.E.',
                'accreditation' => $stored['accreditation'] ?? ($dbProdi ? $dbProdi->accreditation : 'Baik Sekali'),
                'office_address' => $stored['office_address'] ?? 'Gedung FEBIT Lantai 2, Kampus IAI Darul Falah',
                'email' => $stored['email'] ?? 'mbs@iaidafa.ac.id',
                'whatsapp' => $stored['whatsapp'] ?? '+62 812-3456-7892',
                'content' => $page ? $page->content : ''
            ],
            'hki' => [
                'id' => 'hki',
                'name' => $stored['name'] ?? ($dbProdi ? $dbProdi->name : 'Hukum Keluarga Islam (S1)'),
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => $cleanStr($stored['head_name'] ?? ($dbProdi ? $dbProdi->head_of_program : null), 'Ustadz Ahmad Rofiqi, M.H.I.'),
                'head_title' => $stored['head_title'] ?? 'Ketua Program Studi HKI',
                'head_photo' => $stored['head_photo'] ?? ($dbProdi && $dbProdi->logo ? $dbProdi->logo : null),
                'head_quote' => $cleanStr($stored['head_quote'] ?? null, 'Komitmen utama kami adalah mendidik dan mendampingi mahasiswa agar menjadi sarjana yang unggul, berakhlakul karimah, serta siap berkontribusi nyata bagi nusa, bangsa, dan agama.'),
                'secretary_name' => $cleanStr($stored['secretary_name'] ?? null, 'Ustadz Rahmat Hidayat, M.A.'),
                'secretary_photo' => $stored['secretary_photo'] ?? null,
                'color' => '#0b5345',
                'bg_gradient' => 'linear-gradient(135deg, #0b5345, #052620)',
                'hero_image' => $page && $page->featured_image ? $page->featured_image : null,
                'tagline' => $stored['tagline'] ?? 'Mencetak Sarjana Hukum Islam yang Profesional, Berintegritas, dan Siap Berkiprah di Lembaga Peradilan serta Masyarakat.',
                'sejarah' => $cleanStr($stored['description'] ?? ($dbProdi ? $dbProdi->description : null), 'Program Studi Hukum Keluarga Islam (S1) didirikan untuk menyelenggarakan pendidikan tinggi yang berkualitas di bidang hukum keluarga, peradilan agama, dan keperdataan Islam. Melalui kurikulum yang terintegrasi antara keilmuan hukum Islam kontemporer, hukum positif Indonesia, serta nilai-nilai kepesantrenan, Prodi HKI mencetak sarjana hukum yang profesional, berintegritas, dan siap berkontribusi nyata bagi nusa, bangsa, dan agama.'),
                'sejarah_image' => $stored['history_image'] ?? null,
                'visi' => $cleanStr($stored['vision'] ?? ($dbProdi ? $dbProdi->vision : null), 'Menjadi Program Studi Hukum Keluarga Islam yang unggul, profesional, dan berdaya saing dalam pengembangan hukum keluarga Islam terintegrasi nilai-nilai keislaman dan kepesantrenan pada tingkat nasional.'),
                'misi' => $cleanMission($stored['mission'] ?? ($dbProdi ? $dbProdi->mission : null), [
                    'Menyelenggarakan pendidikan dan pembelajaran di bidang Hukum Keluarga Islam yang berkualitas, berkarakter, dan berbasis teknologi.',
                    'Melaksanakan penelitian dan kajian ilmiah yang inovatif dalam memecahkan masalah hukum keluarga Islam kontemporer.',
                    'Melaksanakan pengabdian kepada masyarakat melalui layanan bantuan hukum dan penyuluhan keluarga sakinah.',
                    'Menjalin kerja sama strategis dengan instansi pemerintah, lembaga peradilan agama, dan praktisi hukum.'
                ]),
                'degree' => $stored['degree'] ?? ($dbProdi ? $dbProdi->degree : 'S1'),
                'graduate_degree' => $stored['graduate_degree'] ?? 'S.H. (Sarjana Hukum)',
                'accreditation' => $stored['accreditation'] ?? ($dbProdi ? $dbProdi->accreditation : 'Baik Sekali'),
                'office_address' => $stored['office_address'] ?? 'Gedung Fakultas Syari\'ah Lantai 2, Kampus IAI Darul Falah',
                'email' => $stored['email'] ?? 'hki@iaidafa.ac.id',
                'whatsapp' => $stored['whatsapp'] ?? '+62 812-3456-7890',
                'content' => $page ? $page->content : ''
            ],
            'hes' => [
                'id' => 'hes',
                'name' => $stored['name'] ?? ($dbProdi ? $dbProdi->name : 'Hukum Ekonomi Syariah (S1)'),
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => $cleanStr($stored['head_name'] ?? ($dbProdi ? $dbProdi->head_of_program : null), 'Ustadz Wildan Baihaqi, M.E.'),
                'head_title' => $stored['head_title'] ?? 'Ketua Program Studi HES',
                'head_photo' => $stored['head_photo'] ?? ($dbProdi && $dbProdi->logo ? $dbProdi->logo : null),
                'head_quote' => $cleanStr($stored['head_quote'] ?? null, 'Program Studi Hukum Ekonomi Syariah membekali mahasiswa dengan keahlian regulasi bisnis syariah, perbankan, dan arbitrase Islam yang aplikatif.'),
                'secretary_name' => $cleanStr($stored['secretary_name'] ?? null, 'Ustadz Ahmad Fauzan, M.E.'),
                'secretary_photo' => $stored['secretary_photo'] ?? null,
                'color' => '#725114',
                'bg_gradient' => 'linear-gradient(135deg, #725114, #47320b)',
                'hero_image' => $page && $page->featured_image ? $page->featured_image : null,
                'tagline' => $stored['tagline'] ?? 'Integrasi Fiqh Muamalah Kontemporer dan Hukum Bisnis Modern Menjawab Tantangan Industri Finansial Syariah.',
                'sejarah' => $cleanStr($stored['description'] ?? ($dbProdi ? $dbProdi->description : null), 'Program Studi Hukum Ekonomi Syariah (S1) membekali mahasiswa dengan keahlian hukum bisnis syariah dan regulasi keuangan Islam.'),
                'sejarah_image' => $stored['history_image'] ?? null,
                'visi' => $cleanStr($stored['vision'] ?? ($dbProdi ? $dbProdi->vision : null), 'Menjadi pusat rujukan akademik hukum bisnis syariah yang unggul dan integratif.'),
                'misi' => $cleanMission($stored['mission'] ?? ($dbProdi ? $dbProdi->mission : null), [
                    'Pendidikan hukum bisnis syariah yang profesional berlandaskan keilmuan fiqh muamalah kontemporer.',
                    'Mengembangkan kajian ilmiah kritis di bidang regulasi keuangan syariah.',
                    'Mengabdi untuk mengedukasi literasi keuangan syariah di kalangan pelaku UMKM.'
                ]),
                'degree' => $stored['degree'] ?? ($dbProdi ? $dbProdi->degree : 'S1'),
                'graduate_degree' => $stored['graduate_degree'] ?? 'S.H. (Sarjana Hukum)',
                'accreditation' => $stored['accreditation'] ?? ($dbProdi ? $dbProdi->accreditation : 'Baik Sekali'),
                'office_address' => $stored['office_address'] ?? 'Gedung Fakultas Syari\'ah Lantai 2, Kampus IAI Darul Falah',
                'email' => $stored['email'] ?? 'hes@iaidafa.ac.id',
                'whatsapp' => $stored['whatsapp'] ?? '+62 812-3456-7891',
                'content' => $page ? $page->content : ''
            ],
            'ekos' => [
                'id' => 'ekos',
                'name' => $stored['name'] ?? ($dbProdi ? $dbProdi->name : 'Ekonomi Syariah (S1)'),
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $cleanStr($stored['head_name'] ?? ($dbProdi ? $dbProdi->head_of_program : null), 'Ustadz Fahmi Azis, M.E.'),
                'head_title' => $stored['head_title'] ?? 'Ketua Program Studi Ekonomi Syariah',
                'head_photo' => $stored['head_photo'] ?? ($dbProdi && $dbProdi->logo ? $dbProdi->logo : null),
                'head_quote' => $cleanStr($stored['head_quote'] ?? null, 'Fokus kami adalah membentuk sarjana ekonomi yang menguasai ekosistem perbankan, pasar modal syariah, serta pemberdayaan ziswaf.'),
                'secretary_name' => $cleanStr($stored['secretary_name'] ?? null, 'Ustadz Zainal Arifin, M.E.I.'),
                'secretary_photo' => $stored['secretary_photo'] ?? null,
                'color' => '#1d5a8c',
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'hero_image' => $page && $page->featured_image ? $page->featured_image : null,
                'tagline' => $stored['tagline'] ?? 'Pengembangan Ilmu Ekonomi Makro-Mikro Islam dan Pemberdayaan Finansial Inklusif Umat.',
                'sejarah' => $cleanStr($stored['description'] ?? ($dbProdi ? $dbProdi->description : null), 'Program Studi Ekonomi Syariah (S1) berfokus pada pencetakan wirausahawan dan profesional di bidang industri keuangan syariah.'),
                'sejarah_image' => $stored['history_image'] ?? null,
                'visi' => $cleanStr($stored['vision'] ?? ($dbProdi ? $dbProdi->vision : null), 'Menjadi Program Studi Ekonomi Syariah berorientasi kewirausahaan digital dan nilai Islam.'),
                'misi' => $cleanMission($stored['mission'] ?? ($dbProdi ? $dbProdi->mission : null), [
                    'Menyelenggarakan pendidikan ekonomi syariah berbasis pengembangan digital entrepreneurship.',
                    'Riset terapan inovatif di bidang ekonomi, manajemen, dan keuangan mikro syariah.',
                    'Pendampingan usaha mikro berbasis pemberdayaan zakat, infaq, sedekah, dan wakaf (Ziswaf).'
                ]),
                'degree' => $stored['degree'] ?? ($dbProdi ? $dbProdi->degree : 'S1'),
                'graduate_degree' => $stored['graduate_degree'] ?? 'S.E. (Sarjana Ekonomi)',
                'accreditation' => $stored['accreditation'] ?? ($dbProdi ? $dbProdi->accreditation : 'Baik'),
                'office_address' => $stored['office_address'] ?? 'Gedung FEBIT Lantai 2, Kampus IAI Darul Falah',
                'email' => $stored['email'] ?? 'ekos@iaidafa.ac.id',
                'whatsapp' => $stored['whatsapp'] ?? '+62 812-3456-7893',
                'content' => $page ? $page->content : ''
            ],
            'pai' => [
                'id' => 'pai',
                'name' => $stored['name'] ?? ($dbProdi ? $dbProdi->name : 'Pendidikan Agama Islam (S1)'),
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $cleanStr($stored['head_name'] ?? ($dbProdi ? $dbProdi->head_of_program : null), 'Dr. H. Mulyadi, M.Pd.'),
                'head_title' => $stored['head_title'] ?? 'Ketua Program Studi PAI',
                'head_photo' => $stored['head_photo'] ?? ($dbProdi && $dbProdi->logo ? $dbProdi->logo : null),
                'head_quote' => $cleanStr($stored['head_quote'] ?? null, 'Mendidik calon guru dan pendidik agama Islam yang berakhlak mulia, menguasai ilmu pedagogi modern, serta siap menjadi teladan bagi generasi bangsa.'),
                'secretary_name' => $cleanStr($stored['secretary_name'] ?? null, 'Ustadz M. Hasan Basri, M.Pd.I.'),
                'secretary_photo' => $stored['secretary_photo'] ?? null,
                'color' => '#0c6628',
                'bg_gradient' => 'linear-gradient(135deg, #0c6628, #053b15)',
                'hero_image' => $page && $page->featured_image ? $page->featured_image : null,
                'tagline' => $stored['tagline'] ?? 'Melahirkan Guru dan Pendidik PAI Profesional, Berkarakter Kepesantrenan, dan Adaptif Digital.',
                'sejarah' => $cleanStr($stored['description'] ?? ($dbProdi ? $dbProdi->description : null), 'Program Studi Pendidikan Agama Islam (S1) berkomitmen melahirkan pendidik PAI yang profesional dan berkarakter islami.'),
                'sejarah_image' => $stored['history_image'] ?? null,
                'visi' => $cleanStr($stored['vision'] ?? ($dbProdi ? $dbProdi->vision : null), 'Menghasilkan sarjana pendidikan agama Islam yang unggul dan inovatif.'),
                'misi' => $cleanMission($stored['mission'] ?? ($dbProdi ? $dbProdi->mission : null), [
                    'Menyelenggarakan pendidikan keguruan PAI berbasis pembelajaran digital interaktif.',
                    'Riset keilmuan pedagogi dan psikologi perkembangan pendidikan Islam.',
                    'Pemberdayaan guru-guru madrasah dan TPQ di lingkungan sekitar.'
                ]),
                'degree' => $stored['degree'] ?? ($dbProdi ? $dbProdi->degree : 'S1'),
                'graduate_degree' => $stored['graduate_degree'] ?? 'S.Pd. (Sarjana Pendidikan)',
                'accreditation' => $stored['accreditation'] ?? ($dbProdi ? $dbProdi->accreditation : 'B'),
                'office_address' => $stored['office_address'] ?? 'Gedung FEBIT Lantai 1, Kampus IAI Darul Falah',
                'email' => $stored['email'] ?? 'pai@iaidafa.ac.id',
                'whatsapp' => $stored['whatsapp'] ?? '+62 812-3456-7894',
                'content' => $page ? $page->content : ''
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

    public function dosen($prodi)
    {
        $data = $this->getProdiData($prodi);

        $slugs = [
            'hki' => 'hukum-keluarga-islam',
            'hes' => 'hukum-ekonomi-syariah',
            'mbs' => 'manajemen-bisnis-syariah',
            'ekos' => 'ekonomi-syariah',
            'pai' => 'pendidikan-agama'
        ];

        $slug = $slugs[$prodi] ?? $prodi;
        $dbProdi = StudyProgram::where('slug', $slug)->first();

        if ($dbProdi) {
            $lecturers = Lecturer::where('study_program_id', $dbProdi->id)
                                 ->where('is_active', 1)
                                 ->orderBy('name', 'asc')
                                 ->get();
        } else {
            $lecturers = collect();
        }

        return view('frontend.prodi.dosen', compact('data', 'lecturers'));
    }

    public function akademik($prodi, $page)
    {
        $data = $this->getProdiData($prodi);
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
