<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdiSubWebController extends Controller
{
    private function getProdiData($prodi)
    {
        $prodies = [
            'hki' => [
                'id' => 'hki',
                'name' => 'Hukum Keluarga Islam (S1)',
                'faculty_name' => 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => 'Ustadz Ahmad Rofiqi, M.H.I.',
                'color' => '#0b5345',
                'bg_gradient' => 'linear-gradient(135deg, #0b5345, #052620)',
                'sejarah' => 'Program Studi Hukum Keluarga Islam (S1) didirikan untuk menjawab kebutuhan masyarakat akan sarjana hukum Islam yang mendalam ilmu agamanya serta mahir hukum positifnya. Dengan kurikulum yang berfokus pada keahlian kepengacaraan peradilan agama, mediasi keluarga, dan kepenghuluan, HKI INDAFA terus berkontribusi mencetak praktisi hukum berkualitas.',
                'visi' => 'Menjadi program studi pelopor yang unggul dan integratif dalam bidang hukum keluarga Islam kontemporer secara nasional pada tahun 2030.',
                'misi' => [
                    'Menyelenggarakan pendidikan hukum keluarga Islam berbasis integrasi ilmu klasik dan hukum positif.',
                    'Melakukan riset kolaboratif dosen-mahasiswa untuk memecahkan problematika keluarga muslim modern.',
                    'Melakukan pengabdian hukum melalui penyuluhan keluarga sakinah dan konsultasi hukum gratis.'
                ]
            ],
            'hes' => [
                'id' => 'hes',
                'name' => 'Hukum Ekonomi Syariah (S1)',
                'faculty_name' => 'Fakultas Syariah',
                'faculty_url' => '/fakultas-syariah',
                'head' => 'Ustadz Wildan Baihaqi, M.E.',
                'color' => '#725114',
                'bg_gradient' => 'linear-gradient(135deg, #725114, #47320b)',
                'sejarah' => 'Program Studi Hukum Ekonomi Syariah (S1) membekali mahasiswa dengan keahlian regulasi hukum perbankan syariah, kontrak bisnis syariah, serta audit kepatuhan syariah (shariah compliance). Kami mempersiapkan lulusan untuk menjadi legal officer lembaga keuangan syariah, hakim peradilan niaga Islam, dan konsultan bisnis syariah.',
                'visi' => 'Menjadi pusat rujukan akademik hukum bisnis syariah yang berkualitas tinggi dan berdaya saing global pada tahun 2030.',
                'misi' => [
                    'Pendidikan hukum bisnis syariah yang profesional berlandaskan keilmuan fiqh muamalah kontemporer.',
                    'Mengembangkan kajian ilmiah kritis di bidang regulasi keuangan syariah.',
                    'Mengabdi untuk mengedukasi literasi keuangan syariah di kalangan pelaku UMKM.'
                ]
            ],
            'ekos' => [
                'id' => 'ekos',
                'name' => 'Ekonomi Syariah (S1)',
                'faculty_name' => 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => 'Ustadz Fahmi Azis, M.E.',
                'color' => '#1d5a8c',
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'sejarah' => 'Program Studi Ekonomi Syariah (S1) berfokus pada pencetakan entrepreneur muda muslim yang tangguh, analis ekonomi syariah, dan praktisi perbankan syariah. Mahasiswa dilatih dengan kombinasi teori ekonomi modern, kajian fatwa DSN-MUI, serta simulasi praktik bisnis ril.',
                'visi' => 'Menjadi Program Studi Ekonomi Syariah berorientasi kewirausahaan dan moralitas Islami terbaik di regional pada tahun 2030.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi syariah berbasis pengembangan digital entrepreneurship.',
                    'Riset terapan inovatif di bidang ekonomi, manajemen, dan keuangan mikro syariah.',
                    'Pendampingan usaha mikro berbasis pemberdayaan zakat, infaq, sedekah, dan wakaf (Ziswaf).'
                ]
            ],
            'pai' => [
                'id' => 'pai',
                'name' => 'Pendidikan Agama Islam (S1)',
                'faculty_name' => 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'faculty_url' => '/fakultas-ebit',
                'head' => 'Dr. H. Mulyadi, M.Pd.',
                'color' => '#0c6628',
                'bg_gradient' => 'linear-gradient(135deg, #0c6628, #053b15)',
                'sejarah' => 'Program Studi Pendidikan Agama Islam (S1) berkomitmen melahirkan guru PAI yang profesional, inovatif dalam teknologi pengajaran, dan memiliki akhlakul karimah. Lulusan dipersiapkan untuk mengajar di sekolah umum (SD/SMP/SMA) maupun madrasah (MI/MTs/MA).',
                'visi' => 'Menghasilkan sarjana pendidikan agama Islam yang unggul, inspiratif, dan kompeten secara profesional berbasis teknologi pembelajaran pada tahun 2030.',
                'misi' => [
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
