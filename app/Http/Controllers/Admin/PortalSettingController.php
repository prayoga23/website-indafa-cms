<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortalSettingController extends Controller
{
    /**
     * Konfigurasi metadata default untuk tiap unit portal
     */
    private function getPortalConfig($portal)
    {
        $configs = [
            'syariah' => [
                'name' => 'Fakultas Ilmu Syariah (FASYA)',
                'slug' => 'fakultas-syariah',
                'faculty_slug' => 'fakultas-ilmu-syariah',
                'leader_role' => 'Dekan Fakultas',
                'default_leader_name' => 'Dr. H. Abu Bakar, M.H.I.',
                'default_leader_title' => 'Dekan Fakultas Ilmu Syariah',
                'default_tagline' => 'Mencetak Praktisi Hukum Islam, Hakim Peradilan Agama, dan Pakar Regulasi Bisnis Syariah Berintegritas.',
                'default_vision' => 'Menjadi Fakultas Syariah yang unggul, kompetitif, dan bereputasi nasional dalam pengembangan keilmuan syariah dan hukum Islam kontemporer yang berlandaskan nilai-nilai kepesantrenan pada tahun 2030.',
                'default_mission' => "1. Menyelenggarakan pendidikan dan pengajaran di bidang syariah dan hukum Islam yang integratif berbasis nilai kepesantrenan.\n2. Melaksanakan penelitian ilmiah guna memecahkan masalah hukum keluarga kontemporer dan regulasi ekonomi syariah.\n3. Melaksanakan pengabdian kepada masyarakat melalui penyuluhan hukum, bimbingan keluarga sakinah, dan advokasi keagamaan.\n4. Membangun tata kelola fakultas yang akuntabel, transparan, profesional, dan berorientasi mutu berkelanjutan.",
                'default_description' => 'Fakultas Ilmu Syariah (FASYA) IAI Darul Falah didirikan dengan komitmen teguh untuk melahirkan cendekiawan dan praktisi hukum Islam yang profesional, berintegritas tinggi, serta responsif terhadap dinamika keumatan dan regulasi modern.',
                'default_message' => 'Selamat datang di Portal Resmi Fakultas Ilmu Syariah IAI Darul Falah. Kami berkomitmen menyelenggarakan pendidikan hukum Islam berkualitas, menggabungkan kajian turats kitab kuning dengan hukum positif kontemporer guna mencetak praktisi hukum yang amanah dan berdaya saing global.',
                'default_stats' => [
                    'label1' => 'Program Studi S1', 'val1' => '2 Prodi',
                    'label2' => 'Dosen Pengajar', 'val2' => '28+ Dosen',
                    'label3' => 'Akreditasi LAM/BAN', 'val3' => 'Baik Sekali',
                    'label4' => 'Serapan Kerja Alumni', 'val4' => '96%'
                ],
                'public_url' => route('frontend.fakultas.syariah'),
                'color' => '#8B0000'
            ],
            'febit' => [
                'name' => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
                'slug' => 'fakultas-ebit',
                'faculty_slug' => 'fakultas-tarbiyah',
                'leader_role' => 'Dekan Fakultas',
                'default_leader_name' => 'Dr. Hj. Siti Rahmah, M.E.I.',
                'default_leader_title' => 'Dekan Fakultas Ekonomi Bisnis dan Tarbiyah',
                'default_tagline' => 'Integrasi Keunggulan Bisnis Syariah, Manajemen Modern, dan Pedagogi Pendidikan Islam Berkualitas.',
                'default_vision' => 'Menjadi Fakultas Ekonomi Bisnis dan Tarbiyah terkemuka yang unggul dalam integrasi ilmu bisnis syariah dan kependidikan Islam berkarakter kepesantrenan pada tahun 2030.',
                'default_mission' => "1. Menyelenggarakan pendidikan ekonomi syariah dan pedagogi Islam yang adaptif terhadap revolusi industri dan teknologi.\n2. Mengembangkan riset inovatif di bidang bisnis Islam, keuangan syariah, dan metode pembelajaran pendidikan agama.\n3. Menerapkan iptek berbasis nilai Islam untuk pemberdayaan ekonomi masyarakat dan peningkatan mutu pendidikan madrasah.\n4. Menjalin kemitraan strategis dengan industri keuangan syariah, instansi pemerintah, dan lembaga pendidikan nasional.",
                'default_description' => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT) didirikan untuk menyatukan dua pilar kekuatan peradaban Islam: kemandirian ekonomi umat dan penguatan pendidikan karakter generasi muda.',
                'default_message' => 'Selamat datang di Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT). Kami mengintegrasikan profesionalitas perbankan dan bisnis syariah dengan kompetensi pedagogik kependidikan Islam, melahirkan alumni siap kerja, wirausahawan muslim tangguh, dan pendidik berkarakter.',
                'default_stats' => [
                    'label1' => 'Program Studi S1', 'val1' => '3 Prodi',
                    'label2' => 'Dosen Pengajar', 'val2' => '35+ Dosen',
                    'label3' => 'Mitra DUDI & Sekolah', 'val3' => '15+ Mitra',
                    'label4' => 'Kepuasan Mahasiswa', 'val4' => '98%'
                ],
                'public_url' => route('frontend.fakultas.ebit'),
                'color' => '#0f2b48'
            ],
            'lpm' => [
                'name' => 'Lembaga Penjaminan Mutu (LPM)',
                'slug' => 'lpm',
                'faculty_slug' => null,
                'leader_role' => 'Ketua Lembaga',
                'default_leader_name' => 'Dr. H. Ahmad Fauzi, M.Pd.I.',
                'default_leader_title' => 'Ketua Lembaga Penjaminan Mutu (LPM)',
                'default_tagline' => 'Pengawalan Mutu Berkelanjutan Berbasis Siklus PPEPP Menuju Akreditasi Unggul.',
                'default_vision' => 'Menjadi Lembaga Penjaminan Mutu yang profesional, terpercaya, dan bereputasi dalam mewujudkan budaya mutu akademik serta tata kelola perguruan tinggi yang unggul dan berkelanjutan.',
                'default_mission' => "1. Mengembangkan dan memutakhirkan dokumen Sistem Penjaminan Mutu Internal (SPMI) sesuai perkembangan regulasi nasional.\n2. Melaksanakan audit mutu internal (AMI) secara konsisten dan independen di seluruh unit akademik dan non-akademik.\n3. Memfasilitasi dan mengawal proses akreditasi program studi dan institusi menuju predikat Unggul.\n4. Membangun dan menanamkan budaya mutu berkelanjutan (continuous quality improvement) bagi seluruh civitas akademika.",
                'default_description' => 'Lembaga Penjaminan Mutu (LPM) IAI Darul Falah bertugas mengawal, mengendalikan, dan meningkatkan standar mutu akademik serta tata kelola tridharma perguruan tinggi sesuai siklus PPEPP.',
                'default_message' => 'Lembaga Penjaminan Mutu (LPM) berkomitmen memastikan setiap proses pendidikan, penelitian, dan pengabdian masyarakat berjalan sesuai standar mutu tertinggi demi menghasilkan lulusan berkompeten dan berdaya saing.',
                'default_stats' => [
                    'label1' => 'Siklus SPMI Aktif', 'val1' => '5 Tahap PPEPP',
                    'label2' => 'Akreditasi Program Studi', 'val2' => '100% Terakreditasi',
                    'label3' => 'Auditor Internal Tersertifikasi', 'val3' => '18 Auditor',
                    'label4' => 'Rata-rata Skor EDOM Dosen', 'val4' => '4.62 / 5.00'
                ],
                'public_url' => route('frontend.lpm.index'),
                'color' => '#059669'
            ],
            'lp2m' => [
                'name' => 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M)',
                'slug' => 'lp2m',
                'faculty_slug' => null,
                'leader_role' => 'Ketua Lembaga',
                'default_leader_name' => 'Dr. Muhammad Shodiq, M.Ag.',
                'default_leader_title' => 'Ketua LP2M IAI Darul Falah',
                'default_tagline' => 'Pusat Hilirisasi Riset Keislaman Terapan dan Pengabdian Transformatif Pesantren.',
                'default_vision' => 'Menjadi pusat riset keislaman dan pengabdian masyarakat yang transformatif, inovatif, dan berdaya guna tinggi bagi kemaslahatan umat dan peradaban pada tahun 2030.',
                'default_mission' => "1. Mendorong dan memfasilitasi penelitian dosen dan mahasiswa yang bereputasi nasional dan internasional.\n2. Menyelenggarakan pengabdian kepada masyarakat berbasis riset (PAR/ABCD) yang aplikatif dan memberdayakan potensi lokal.\n3. Mengelola dan mengembangkan jurnal-jurnal ilmiah kampus menuju akreditasi SINTA dan indeksasi bereputasi.\n4. Memfasilitasi perolehan Hak Kekayaan Intelektual (HKI) dan hilirisasi produk riset bagi kemaslahatan masyarakat.",
                'default_description' => 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M) merupakan wadah koordinasi pelaksanaan riset inovatif, hilirisasi keilmuan, KKN tematik, dan pengelolaan jurnal ilmiah OJS terakreditasi.',
                'default_message' => 'LP2M mendedikasikan seluruh daya riset dan pengabdian civitas akademika untuk menjawab persoalan riil umat, memberdayakan masyarakat pedesaan, serta memajukan khazanah ilmu pengetahuan Islam.',
                'default_stats' => [
                    'label1' => 'Riset Litapdimas & Mandiri', 'val1' => '65+ Judul Riset',
                    'label2' => 'Rumah Jurnal Ilmiah OJS', 'val2' => '4 Jurnal SINTA',
                    'label3' => 'Sertifikat Hak Cipta HKI', 'val3' => '42+ Sertifikat',
                    'label4' => 'Desa Kemitraan KKN Tematik', 'val4' => '25+ Desa Binaan'
                ],
                'public_url' => route('frontend.lp2m.index'),
                'color' => '#4f46e5'
            ]
        ];

        return $configs[$portal] ?? null;
    }

    /**
     * Tampilkan formulir edit konten portal
     */
    public function edit($portal)
    {
        $config = $this->getPortalConfig($portal);
        if (!$config) {
            abort(404, 'Portal tidak ditemukan.');
        }

        // Cari atau inisialisasi record page di database
        $page = Page::firstOrCreate(
            ['slug' => $config['slug']],
            [
                'title' => $config['name'],
                'content' => '',
                'status' => 'publish'
            ]
        );

        // Ambil data dari JSON excerpt jika sudah pernah disimpan
        $stored = [];
        if (!empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $stored = $decoded;
            }
        }

        // Hubungkan juga dengan data di tabel faculties jika ini adalah fakultas
        $dbFaculty = null;
        if (!empty($config['faculty_slug'])) {
            $dbFaculty = Faculty::where('slug', $config['faculty_slug'])->first();
        }

        // Susun data gabungan (stored DB > faculty DB > config default)
        $data = [
            'portal' => $portal,
            'config' => $config,
            'page' => $page,
            'title' => $page->title ?: $config['name'],
            'tagline' => $stored['tagline'] ?? $config['default_tagline'],
            'leader_name' => $stored['leader_name'] ?? ($dbFaculty->dean ?? $config['default_leader_name']),
            'leader_title' => $stored['leader_title'] ?? $config['default_leader_title'],
            'leader_image' => $stored['leader_image'] ?? ($dbFaculty && $dbFaculty->logo ? $dbFaculty->logo : null),
            'leader_message' => $stored['leader_message'] ?? $config['default_message'],
            'vision' => $stored['vision'] ?? $config['default_vision'],
            'mission' => $stored['mission'] ?? $config['default_mission'],
            'description' => $stored['description'] ?? ($dbFaculty->description ?? $config['default_description']),
            'stats' => $stored['stats'] ?? $config['default_stats'],
            'phone' => $stored['phone'] ?? '+62 812-3456-7890',
            'email' => $stored['email'] ?? strtolower($portal) . '@iaidatulfalah.ac.id',
            'address' => $stored['address'] ?? 'Kampus IAI Darul Falah, Jl. Raya Bondowoso, Jawa Timur',
            'featured_image' => $page->featured_image,
            'content' => $page->content,
        ];

        return view('admin.portals.edit', compact('data', 'portal', 'config'));
    }

    /**
     * Proses simpan perubahan konten portal
     */
    public function update(Request $request, $portal)
    {
        $config = $this->getPortalConfig($portal);
        if (!$config) {
            abort(404, 'Portal tidak ditemukan.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:500',
            'leader_name' => 'required|string|max:255',
            'leader_title' => 'required|string|max:255',
            'leader_message' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:100',
            'email' => 'nullable|string|max:150',
            'address' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'leader_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'content' => 'nullable|string',
        ]);

        $page = Page::firstOrCreate(['slug' => $config['slug']]);

        // Muat data lama untuk mempertahankan foto jika tidak diganti
        $oldStored = [];
        if (!empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $oldStored = $decoded;
            }
        }

        // Upload Featured Banner Image jika ada
        $featuredImagePath = $page->featured_image;
        if ($request->hasFile('featured_image')) {
            if ($featuredImagePath && Storage::disk('public')->exists($featuredImagePath)) {
                Storage::disk('public')->delete($featuredImagePath);
            }
            $featuredImagePath = $request->file('featured_image')->store('portals', 'public');
        }

        // Upload Foto Dekan / Ketua jika ada
        $leaderImagePath = $oldStored['leader_image'] ?? null;
        if ($request->hasFile('leader_image')) {
            if ($leaderImagePath && Storage::disk('public')->exists($leaderImagePath)) {
                Storage::disk('public')->delete($leaderImagePath);
            }
            $leaderImagePath = $request->file('leader_image')->store('portals', 'public');
        }

        // Struktur statistik
        $stats = [
            'label1' => $request->input('stat_label1', $config['default_stats']['label1']),
            'val1' => $request->input('stat_val1', $config['default_stats']['val1']),
            'label2' => $request->input('stat_label2', $config['default_stats']['label2']),
            'val2' => $request->input('stat_val2', $config['default_stats']['val2']),
            'label3' => $request->input('stat_label3', $config['default_stats']['label3']),
            'val3' => $request->input('stat_val3', $config['default_stats']['val3']),
            'label4' => $request->input('stat_label4', $config['default_stats']['label4']),
            'val4' => $request->input('stat_val4', $config['default_stats']['val4']),
        ];

        // Susun payload JSON untuk disimpan di kolom excerpt
        $payload = [
            'tagline' => $request->input('tagline', ''),
            'leader_name' => $request->input('leader_name', ''),
            'leader_title' => $request->input('leader_title', ''),
            'leader_image' => $leaderImagePath,
            'leader_message' => $request->input('leader_message', ''),
            'vision' => $request->input('vision', ''),
            'mission' => $request->input('mission', ''),
            'description' => $request->input('description', ''),
            'stats' => $stats,
            'phone' => $request->input('phone', ''),
            'email' => $request->input('email', ''),
            'address' => $request->input('address', ''),
            'updated_at' => now()->toDateTimeString()
        ];

        // Simpan ke model Page
        $page->title = $request->input('title');
        $page->featured_image = $featuredImagePath;
        $page->content = $request->input('content') ?? '';
        $page->excerpt = json_encode($payload, JSON_UNESCAPED_UNICODE);
        $page->status = 'publish';
        $page->save();

        // Sinkronkan ke tabel Faculty jika ini fakultas
        if (!empty($config['faculty_slug'])) {
            $dbFaculty = Faculty::where('slug', $config['faculty_slug'])->first();
            if ($dbFaculty) {
                $dbFaculty->dean = $request->input('leader_name');
                if ($request->input('description')) {
                    $dbFaculty->description = $request->input('description');
                }
                if ($leaderImagePath) {
                    $dbFaculty->logo = $leaderImagePath;
                }
                $dbFaculty->save();
            }
        }

        return redirect()
            ->route('admin.portal.edit', $portal)
            ->with('success', 'Konten portal ' . $config['name'] . ' berhasil diperbarui! Perubahan sudah langsung tayang pada halaman publik.');
    }
}
