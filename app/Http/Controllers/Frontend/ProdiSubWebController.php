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
            'ekos' => 'ekonomi-syariah',
            'pai' => 'pendidikan-agama'
        ];

        $slug = $slugs[$prodi] ?? $prodi;
        $dbProdi = StudyProgram::where('slug', $slug)->first();

        $prodies = [
            'hki' => [
                'id' => 'hki',
                'name' => $dbProdi ? $dbProdi->name : 'Hukum Keluarga Islam (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => $dbProdi ? ($dbProdi->head_of_program ?? 'Ustadz Ahmad Rofiqi, M.H.I.') : 'Ustadz Ahmad Rofiqi, M.H.I.',
                'color' => '#0b5345',
                'bg_gradient' => 'linear-gradient(135deg, #0b5345, #052620)',
                'sejarah' => $dbProdi ? ($dbProdi->description ?? 'Program Studi Hukum Keluarga Islam (S1) didirikan untuk menjawab kebutuhan...') : 'Program Studi Hukum Keluarga Islam (S1) didirikan untuk menjawab kebutuhan...',
                'visi' => $dbProdi ? ($dbProdi->vision ?? 'Menjadi program studi pelopor yang unggul dan integratif...') : 'Menjadi program studi pelopor yang unggul dan integratif...',
                'misi' => $dbProdi && $dbProdi->mission ? explode("\n", $dbProdi->mission) : [
                    'Menyelenggarakan pendidikan hukum keluarga Islam berbasis integrasi ilmu klasik dan hukum positif.',
                    'Melakukan riset kolaboratif dosen-mahasiswa untuk memecahkan problematika keluarga muslim modern.',
                    'Melakukan pengabdian hukum melalui penyuluhan keluarga sakinah dan konsultasi hukum gratis.'
                ]
            ],
            'hes' => [
                'id' => 'hes',
                'name' => $dbProdi ? $dbProdi->name : 'Hukum Ekonomi Syariah (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => $dbProdi ? ($dbProdi->head_of_program ?? 'Ustadz Wildan Baihaqi, M.E.') : 'Ustadz Wildan Baihaqi, M.E.',
                'color' => '#725114',
                'bg_gradient' => 'linear-gradient(135deg, #725114, #47320b)',
                'sejarah' => $dbProdi ? ($dbProdi->description ?? 'Program Studi Hukum Ekonomi Syariah (S1) membekali mahasiswa dengan keahlian...') : 'Program Studi Hukum Ekonomi Syariah (S1) membekali mahasiswa dengan keahlian...',
                'visi' => $dbProdi ? ($dbProdi->vision ?? 'Menjadi pusat rujukan akademik hukum bisnis syariah...') : 'Menjadi pusat rujukan akademik hukum bisnis syariah...',
                'misi' => $dbProdi && $dbProdi->mission ? explode("\n", $dbProdi->mission) : [
                    'Pendidikan hukum bisnis syariah yang profesional berlandaskan keilmuan fiqh muamalah kontemporer.',
                    'Mengembangkan kajian ilmiah kritis di bidang regulasi keuangan syariah.',
                    'Mengabdi untuk mengedukasi literasi keuangan syariah di kalangan pelaku UMKM.'
                ]
            ],
            'ekos' => [
                'id' => 'ekos',
                'name' => $dbProdi ? $dbProdi->name : 'Ekonomi Syariah (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $dbProdi ? ($dbProdi->head_of_program ?? 'Ustadz Fahmi Azis, M.E.') : 'Ustadz Fahmi Azis, M.E.',
                'color' => '#1d5a8c',
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'sejarah' => $dbProdi ? ($dbProdi->description ?? 'Program Studi Ekonomi Syariah (S1) berfokus pada pencetakan entrepreneur...') : 'Program Studi Ekonomi Syariah (S1) berfokus pada pencetakan entrepreneur...',
                'visi' => $dbProdi ? ($dbProdi->vision ?? 'Menjadi Program Studi Ekonomi Syariah berorientasi kewirausahaan...') : 'Menjadi Program Studi Ekonomi Syariah berorientasi kewirausahaan...',
                'misi' => $dbProdi && $dbProdi->mission ? explode("\n", $dbProdi->mission) : [
                    'Menyelenggarakan pendidikan ekonomi syariah berbasis pengembangan digital entrepreneurship.',
                    'Riset terapan inovatif di bidang ekonomi, manajemen, dan keuangan mikro syariah.',
                    'Pendampingan usaha mikro berbasis pemberdayaan zakat, infaq, sedekah, dan wakaf (Ziswaf).'
                ]
            ],
            'pai' => [
                'id' => 'pai',
                'name' => $dbProdi ? $dbProdi->name : 'Pendidikan Agama Islam (S1)',
                'faculty_name' => $dbProdi && $dbProdi->faculty ? $dbProdi->faculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => $dbProdi ? ($dbProdi->head_of_program ?? 'Dr. H. Mulyadi, M.Pd.') : 'Dr. H. Mulyadi, M.Pd.',
                'color' => '#0c6628',
                'bg_gradient' => 'linear-gradient(135deg, #0c6628, #053b15)',
                'sejarah' => $dbProdi ? ($dbProdi->description ?? 'Program Studi Pendidikan Agama Islam (S1) berkomitmen melahirkan guru PAI...') : 'Program Studi Pendidikan Agama Islam (S1) berkomitmen melahirkan guru PAI...',
                'visi' => $dbProdi ? ($dbProdi->vision ?? 'Menghasikan sarjana pendidikan agama Islam yang unggul...') : 'Menghasilkan sarjana pendidikan agama Islam yang unggul...',
                'misi' => $dbProdi && $dbProdi->mission ? explode("\n", $dbProdi->mission) : [
                    'Menyelenggarakan pendidikan keguruan PAI berbasis pembelajaran digital interaktif.',
                    'Riset keilmuan pedagogi dan psikologi perkembangan pendidikan Islam.',
                    'Pemberdayaan guru-guru madrasah dan TPQ di lingkungan sekitar.'
                ]
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
        return view('frontend.prodi.beranda', compact('data'));
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
