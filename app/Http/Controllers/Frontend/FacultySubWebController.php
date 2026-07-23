<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;

class FacultySubWebController extends Controller
{
    private function getFacultyData($faculty)
    {
        $slug = $faculty === 'syariah' ? 'fakultas-ilmu-syariah' : 'fakultas-tarbiyah';
        $dbFaculty = Faculty::where('slug', $slug)->first();

        if ($faculty === 'syariah') {
            return [
                'id' => 'syariah',
                'name' => $dbFaculty ? $dbFaculty->name : 'Fakultas Syariah',
                'dean' => $dbFaculty ? ($dbFaculty->dean ?? 'Dr. H. Abu Bakar, M.H.I.') : 'Dr. H. Abu Bakar, M.H.I.',
                'dean_image' => ($dbFaculty && $dbFaculty->logo) ? 'storage/' . $dbFaculty->logo : 'assets/img/user.png',
                'short_name' => 'FSYAR',
                'color' => '#8c1d1d', // Dark red for Syariah
                'bg_gradient' => 'linear-gradient(135deg, #8c1d1d, #4a1010)',
                'prodies' => [
                    ['name' => 'Hukum Keluarga Islam (S1)', 'slug' => 'hki', 'desc' => 'Mencetak sarjana hukum Islam yang ahli di bidang hukum perkawinan, waris, dan peradilan agama.'],
                    ['name' => 'Hukum Ekonomi Syariah (S1)', 'slug' => 'hes', 'desc' => 'Menghasilkan praktisi dan konsultan hukum bisnis syariah, perbankan syariah, dan lembaga keuangan.']
                ],
                'sejarah' => $dbFaculty ? ($dbFaculty->description ?? 'Fakultas Syariah didirikan dengan komitmen untuk mencetak sarjana hukum Islam yang profesional, berintegritas tinggi...') : 'Fakultas Syariah didirikan dengan komitmen untuk mencetak sarjana hukum Islam yang profesional, berintegritas tinggi...',
                'visi' => 'Menjadi Fakultas Syariah yang unggul, kompetitif, dan bereputasi nasional dalam pengembangan ilmu syariah dan hukum Islam kontemporer yang berlandaskan nilai-nilai keislaman pada tahun 2030.',
                'misi' => [
                    'Menyelenggarakan pendidikan dan pengajaran di bidang syariah dan hukum Islam yang integratif.',
                    'Melaksanakan penelitian ilmiah guna memecahkan masalah hukum keluarga dan ekonomi syariah di masyarakat.',
                    'Melaksanakan pengabdian kepada masyarakat melalui penyuluhan hukum dan pendampingan advokasi keagamaan.',
                    'Membangun tata kelola fakultas yang akuntabel, transparan, dan profesional.'
                ]
            ];
        } else {
            return [
                'id' => 'ebit',
                'name' => $dbFaculty ? $dbFaculty->name : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah',
                'dean' => $dbFaculty ? ($dbFaculty->dean ?? 'Dr. Hj. Siti Rahmah, M.E.I.') : 'Dr. Hj. Siti Rahmah, M.E.I.',
                'dean_image' => ($dbFaculty && $dbFaculty->logo) ? 'storage/' . $dbFaculty->logo : 'assets/img/user.png',
                'short_name' => 'FEBIT',
                'color' => '#1d5a8c', // Deep blue for FEBIT
                'bg_gradient' => 'linear-gradient(135deg, #1d5a8c, #103454)',
                'prodies' => [
                    ['name' => 'Manajemen Bisnis Syariah (S1)', 'slug' => 'mbs', 'desc' => 'Mencetak manajer dan profesional bisnis yang menguasai tata kelola dan prinsip manajemen syariah.'],
                    ['name' => 'Ekonomi Syariah (S1)', 'slug' => 'ekos', 'desc' => 'Membentuk ekonom muda muslim yang andal, berjiwa wirausaha, dan menguasai prinsip-prinsip syariah.'],
                    ['name' => 'Pendidikan Agama Islam (S1)', 'slug' => 'pai', 'desc' => 'Menghasilkan tenaga pendidik agama Islam yang profesional, kreatif, dan berkarakter mulia.']
                ],
                'sejarah' => $dbFaculty ? ($dbFaculty->description ?? 'Fakultas Ekonomi Bisnis Islam & Tarbiyah (FEBIT) didirikan untuk menyatukan dua pilar kekuatan umat...') : 'Fakultas Ekonomi Bisnis Islam & Tarbiyah (FEBIT) didirikan untuk menyatukan dua pilar kekuatan umat...',
                'visi' => 'Menjadi Fakultas Ekonomi Bisnis Islam & Tarbiyah terkemuka di Jawa Timur dalam mengintegrasikan ilmu ekonomi syariah dan kependidikan Islam pada tahun 2030.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi syariah dan tarbiyah yang relevan dengan perkembangan zaman.',
                    'Mengembangkan riset inovatif di bidang bisnis Islam dan metodologi pembelajaran pendidikan Islam.',
                    'Menerapkan iptek berbasis nilai Islam untuk memberdayakan ekonomi umat dan dunia pendidikan.',
                    'Menjalin kerjasama strategis dengan instansi pemerintah, swasta, dan lembaga pendidikan.'
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
        return view('frontend.fakultas.beranda', compact('data'));
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
            'kkn' => 'Pendaftaran KKN',
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
