<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdiSettingController extends Controller
{
    /**
     * Daftar konfigurasi default untuk 5 Program Studi
     */
    private function getProdiConfigs()
    {
        return [
            'hki' => [
                'code' => 'hki',
                'name' => 'Hukum Keluarga Islam (Ahwal Syakhshiyyah)',
                'slug' => 'hukum-keluarga-islam',
                'degree' => 'S1',
                'graduate_degree' => 'S.H. (Sarjana Hukum)',
                'faculty_name' => 'Fakultas Syari\'ah',
                'faculty_slug' => 'fakultas-syariah',
                'color' => '#0b5345',
                'default_head_name' => 'Ustadz Ahmad Rofiqi, M.H.I.',
                'default_head_title' => 'Ketua Program Studi HKI',
                'default_secretary_name' => 'Ustadz Rahmat Hidayat, M.A.',
                'default_tagline' => 'Mencetak Sarjana Hukum Islam yang Profesional, Berintegritas, dan Siap Berkiprah di Lembaga Peradilan serta Masyarakat.',
                'default_quote' => 'Komitmen utama kami adalah mendidik dan mendampingi mahasiswa agar menjadi sarjana hukum keluarga Islam yang unggul, berakhlakul karimah, serta siap berkontribusi nyata bagi nusa, bangsa, dan agama.',
                'default_vision' => 'Menjadi Program Studi Hukum Keluarga Islam yang unggul, profesional, dan berdaya saing dalam pengembangan hukum keluarga Islam terintegrasi nilai-nilai keislaman dan kepesantrenan pada tingkat nasional.',
                'default_mission' => "Menyelenggarakan pendidikan dan pembelajaran di bidang Hukum Keluarga Islam yang berkualitas, berkarakter, dan berbasis teknologi.\nMelaksanakan penelitian dan kajian ilmiah yang inovatif dalam memecahkan masalah hukum keluarga Islam kontemporer.\nMelaksanakan pengabdian kepada masyarakat melalui layanan bantuan hukum dan penyuluhan keluarga sakinah.\nMenjalin kerja sama strategis dengan instansi pemerintah, lembaga peradilan agama, dan praktisi hukum.",
                'default_sejarah' => 'Program Studi Hukum Keluarga Islam (S1) didirikan untuk menyelenggarakan pendidikan tinggi yang berkualitas di bidang hukum keluarga, peradilan agama, dan keperdataan Islam. Melalui kurikulum yang terintegrasi antara keilmuan hukum Islam kontemporer, hukum positif Indonesia, serta nilai-nilai kepesantrenan, Prodi HKI mencetak sarjana hukum yang profesional, berintegritas, dan siap berkontribusi nyata bagi nusa, bangsa, dan agama.',
                'default_accreditation' => 'Baik Sekali',
                'default_office' => 'Gedung Fakultas Syari\'ah Lantai 2, Kampus IAI Darul Falah',
                'default_email' => 'hki@iaidafa.ac.id',
                'default_whatsapp' => '+62 812-3456-7890',
                'public_url' => route('frontend.prodi.index', 'hki'),
            ],
            'hes' => [
                'code' => 'hes',
                'name' => 'Hukum Ekonomi Syariah (Muamalah)',
                'slug' => 'hukum-ekonomi-syariah',
                'degree' => 'S1',
                'graduate_degree' => 'S.H. (Sarjana Hukum)',
                'faculty_name' => 'Fakultas Syari\'ah',
                'faculty_slug' => 'fakultas-syariah',
                'color' => '#725114',
                'default_head_name' => 'Ustadz Wildan Baihaqi, M.E.',
                'default_head_title' => 'Ketua Program Studi HES',
                'default_secretary_name' => 'Ustadz Ahmad Fauzan, M.E.',
                'default_tagline' => 'Integrasi Fiqh Muamalah Kontemporer dan Hukum Bisnis Modern Menjawab Tantangan Industri Finansial Syariah.',
                'default_quote' => 'Program Studi Hukum Ekonomi Syariah membekali mahasiswa dengan keahlian regulasi bisnis syariah, perbankan, dan arbitrase Islam yang aplikatif serta kredibel.',
                'default_vision' => 'Menjadi pusat rujukan akademik hukum bisnis syariah yang unggul, profesional, dan integratif berlandaskan etika ekonomi Islam pada tahun 2030.',
                'default_mission' => "Menyelenggarakan pendidikan hukum bisnis syariah yang profesional berlandaskan keilmuan fiqh muamalah kontemporer.\nMengembangkan kajian ilmiah kritis di bidang regulasi keuangan syariah dan kepatuhan syariah (sharia compliance).\nMengabdi untuk mengedukasi literasi keuangan syariah di kalangan pelaku UMKM dan industri halal.\nMemperluas sinergi dengan OJK, DSN-MUI, pengadilan niaga, dan lembaga keuangan syariah.",
                'default_sejarah' => 'Program Studi Hukum Ekonomi Syariah (S1) membekali mahasiswa dengan keahlian hukum bisnis syariah dan regulasi keuangan Islam. Mahasiswa dipersiapkan menjadi praktisi hukum bisnis syariah, dewan pengawas syariah (DPS), serta konsultan hukum ekonomi Islam yang mumpuni.',
                'default_accreditation' => 'Baik Sekali',
                'default_office' => 'Gedung Fakultas Syari\'ah Lantai 2, Kampus IAI Darul Falah',
                'default_email' => 'hes@iaidafa.ac.id',
                'default_whatsapp' => '+62 812-3456-7891',
                'public_url' => route('frontend.prodi.index', 'hes'),
            ],
            'mbs' => [
                'code' => 'mbs',
                'name' => 'Manajemen Bisnis Syariah',
                'slug' => 'manajemen-bisnis-syariah',
                'degree' => 'S1',
                'graduate_degree' => 'S.Bns. / S.E.',
                'faculty_name' => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
                'faculty_slug' => 'fakultas-ebit',
                'color' => '#1d5a8c',
                'default_head_name' => 'Ustadz Ahmad Fauzi, M.M.',
                'default_head_title' => 'Ketua Program Studi MBS',
                'default_secretary_name' => 'Ustadzah Nurul Hidayah, M.M.',
                'default_tagline' => 'Mencetak Wirausahawan Muslim, Manajer Profesional, dan Praktisi Bisnis Kreatif Berdaya Saing Global.',
                'default_quote' => 'Kami mendidik generasi pebisnis muslim yang cakap mengelola organisasi modern berbasis nilai integritas, keadilan, dan keberkahan syariah.',
                'default_vision' => 'Menjadi Program Studi Manajemen Bisnis Syariah unggulan di tingkat nasional yang menghasilkan praktisi bisnis dan wirausahawan berkarakter kepesantrenan.',
                'default_mission' => "Menyelenggarakan pendidikan manajemen bisnis berbasis tata kelola syariah dan pemanfaatan teknologi digital.\nPengembangan riset manajemen strategis, pemasaran syariah, dan kewirausahaan Islam berkelanjutan.\nPengabdian masyarakat berbasis pendampingan bisnis UMKM, inkubasi bisnis rintisan, dan industri halal.\nMembangun kemitraan dengan dunia usaha dan industri (DUDI) untuk percepatan karier lulusan.",
                'default_sejarah' => 'Program Studi Manajemen Bisnis Syariah (S1) mencetak lulusan profesional di bidang tata kelola bisnis berbasis syariah. Dengan memadukan kurikulum manajemen modern dengan etika bisnis Islam, mahasiswa dilatih menguasai manajemen keuangan, pemasaran, SDM, dan kewirausahaan praktis.',
                'default_accreditation' => 'Baik Sekali',
                'default_office' => 'Gedung FEBIT Lantai 2, Kampus IAI Darul Falah',
                'default_email' => 'mbs@iaidafa.ac.id',
                'default_whatsapp' => '+62 812-3456-7892',
                'public_url' => route('frontend.prodi.index', 'mbs'),
            ],
            'ekos' => [
                'code' => 'ekos',
                'name' => 'Ekonomi Syariah',
                'slug' => 'ekonomi-syariah',
                'degree' => 'S1',
                'graduate_degree' => 'S.E. (Sarjana Ekonomi)',
                'faculty_name' => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
                'faculty_slug' => 'fakultas-ebit',
                'color' => '#0e4a7b',
                'default_head_name' => 'Ustadz Fahmi Azis, M.E.',
                'default_head_title' => 'Ketua Program Studi Ekonomi Syariah',
                'default_secretary_name' => 'Ustadz Zainal Arifin, M.E.I.',
                'default_tagline' => 'Pengembangan Ilmu Ekonomi Makro-Mikro Islam dan Pemberdayaan Finansial Inklusif Umat.',
                'default_quote' => 'Fokus kami adalah membentuk sarjana ekonomi yang menguasai ekosistem perbankan, pasar modal syariah, serta pemberdayaan ziswaf berbasis teknologi.',
                'default_vision' => 'Menjadi Program Studi Ekonomi Syariah berorientasi kewirausahaan digital, penguatan filantropi Islam, dan keadilan sosial ekonomi umat.',
                'default_mission' => "Menyelenggarakan pendidikan ekonomi syariah berbasis kurikulum MBKM dan digital entrepreneurship.\nMelakukan riset terapan inovatif di bidang ekonomi publik Islam, perbankan syariah, dan keuangan mikro syariah.\nMenyelenggarakan pendampingan usaha mikro berbasis optimalisasi zakat, infaq, sedekah, dan wakaf produktif (Ziswaf).\nMenjalin relasi strategis dengan lembaga perbankan syariah, BMT, dan asosiasi ekonomi Islam.",
                'default_sejarah' => 'Program Studi Ekonomi Syariah (S1) berfokus pada pencetakan wirausahawan dan profesional di bidang industri keuangan syariah. Lulusan dipersiapkan berkarier di perbankan syariah, asuransi syariah, lembaga pengelola ziswaf, maupun menjadi akademisi dan peneliti ekonomi.',
                'default_accreditation' => 'Baik',
                'default_office' => 'Gedung FEBIT Lantai 2, Kampus IAI Darul Falah',
                'default_email' => 'ekos@iaidafa.ac.id',
                'default_whatsapp' => '+62 812-3456-7893',
                'public_url' => route('frontend.prodi.index', 'ekos'),
            ],
            'pai' => [
                'code' => 'pai',
                'name' => 'Pendidikan Agama Islam',
                'slug' => 'pendidikan-agama',
                'degree' => 'S1',
                'graduate_degree' => 'S.Pd. (Sarjana Pendidikan)',
                'faculty_name' => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
                'faculty_slug' => 'fakultas-ebit',
                'color' => '#0c6628',
                'default_head_name' => 'Dr. H. Mulyadi, M.Pd.',
                'default_head_title' => 'Ketua Program Studi PAI',
                'default_secretary_name' => 'Ustadz M. Hasan Basri, M.Pd.I.',
                'default_tagline' => 'Melahirkan Guru dan Pendidik PAI Profesional, Berkarakter Kepesantrenan, dan Adaptif Digital.',
                'default_quote' => 'Mendidik calon guru dan pendidik agama Islam yang berakhlak mulia, menguasai ilmu pedagogi modern, serta siap menjadi teladan bagi generasi bangsa.',
                'default_vision' => 'Menghasilkan sarjana pendidikan agama Islam yang unggul, inovatif, berdaya saing nasional, dan berkarakter kepesantrenan.',
                'default_mission' => "Menyelenggarakan pendidikan keguruan PAI berbasis pembelajaran digital interaktif dan penguatan ilmu turats.\nMelaksanakan riset keilmuan pedagogi Islam, kurikulum madrasah, dan psikologi perkembangan peserta didik.\nMelakukan pengabdian masyarakat melalui pemberdayaan guru-guru madrasah, TPQ, dan pondok pesantren.\nMembangun kerja sama dengan kementerian agama, dinas pendidikan, dan sekolah-sekolah unggulan.",
                'default_sejarah' => 'Program Studi Pendidikan Agama Islam (S1) berkomitmen melahirkan pendidik PAI yang profesional, berwawasan luas, dan berkarakter islami. Mahasiswa dibekali teori kependidikan terkini, metodologi pembelajaran inovatif, serta penguasaan materi keislaman mendalam.',
                'default_accreditation' => 'B',
                'default_office' => 'Gedung FEBIT Lantai 1, Kampus IAI Darul Falah',
                'default_email' => 'pai@iaidafa.ac.id',
                'default_whatsapp' => '+62 812-3456-7894',
                'public_url' => route('frontend.prodi.index', 'pai'),
            ],
        ];
    }

    /**
     * Dapatkan konfigurasi untuk satu prodi berdasarkan kode
     */
    private function getProdiConfig($prodi)
    {
        $configs = $this->getProdiConfigs();
        return $configs[$prodi] ?? null;
    }

    /**
     * Tampilkan halaman daftar prodi untuk diedit websitenya
     */
    public function index()
    {
        $configs = $this->getProdiConfigs();
        $prodis = [];

        foreach ($configs as $code => $cfg) {
            $page = Page::where('slug', 'portal-prodi-' . $code)->first();
            $stored = [];
            if ($page && !empty($page->excerpt)) {
                $decoded = json_decode($page->excerpt, true);
                if (is_array($decoded)) {
                    $stored = $decoded;
                }
            }

            $dbProdi = StudyProgram::where('slug', $cfg['slug'])->first();

            $prodis[] = [
                'code' => $code,
                'name' => $stored['name'] ?? ($dbProdi->name ?? $cfg['name']),
                'degree' => $stored['degree'] ?? ($dbProdi->degree ?? $cfg['degree']),
                'faculty_name' => $cfg['faculty_name'],
                'color' => $cfg['color'],
                'accreditation' => $stored['accreditation'] ?? ($dbProdi->accreditation ?? $cfg['default_accreditation']),
                'head_name' => $stored['head_name'] ?? ($dbProdi->head_of_program ?? $cfg['default_head_name']),
                'hero_image' => $page->featured_image ?? null,
                'public_url' => $cfg['public_url'],
                'last_updated' => $page ? $page->updated_at->diffForHumans() : 'Belum pernah diubah',
            ];
        }

        return view('admin.portals.prodi-index', compact('prodis'));
    }

    /**
     * Tampilkan formulir edit konten website prodi
     */
    public function edit($prodi)
    {
        $config = $this->getProdiConfig($prodi);
        if (!$config) {
            abort(404, 'Program studi tidak ditemukan.');
        }

        $allConfigs = $this->getProdiConfigs();

        // Cari atau buat page di DB
        $page = Page::firstOrCreate(
            ['slug' => 'portal-prodi-' . $prodi],
            [
                'title' => 'Website Prodi ' . $config['name'],
                'content' => '',
                'status' => 'publish'
            ]
        );

        $stored = [];
        if (!empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $stored = $decoded;
            }
        }

        // Ambil data master StudyProgram jika ada
        $dbProdi = StudyProgram::where('slug', $config['slug'])->first();

        $data = [
            'prodi' => $prodi,
            'config' => $config,
            'page' => $page,
            'name' => $stored['name'] ?? ($dbProdi->name ?? $config['name']),
            'degree' => $stored['degree'] ?? ($dbProdi->degree ?? $config['degree']),
            'graduate_degree' => $stored['graduate_degree'] ?? $config['graduate_degree'],
            'accreditation' => $stored['accreditation'] ?? ($dbProdi->accreditation ?? $config['default_accreditation']),
            'tagline' => $stored['tagline'] ?? $config['default_tagline'],
            
            // Pimpinan
            'head_name' => $stored['head_name'] ?? ($dbProdi->head_of_program ?? $config['default_head_name']),
            'head_title' => $stored['head_title'] ?? $config['default_head_title'],
            'head_photo' => $stored['head_photo'] ?? ($dbProdi && $dbProdi->logo ? $dbProdi->logo : null),
            'head_quote' => $stored['head_quote'] ?? $config['default_quote'],
            'secretary_name' => $stored['secretary_name'] ?? $config['default_secretary_name'],
            'secretary_photo' => $stored['secretary_photo'] ?? null,

            // Profil & Sejarah
            'description' => $stored['description'] ?? ($dbProdi->description ?? $config['default_sejarah']),
            'history_image' => $stored['history_image'] ?? null,

            // Visi & Misi
            'vision' => $stored['vision'] ?? ($dbProdi->vision ?? $config['default_vision']),
            'mission' => $stored['mission'] ?? ($dbProdi->mission ?? $config['default_mission']),

            // Kontak & Lokasi
            'office_address' => $stored['office_address'] ?? $config['default_office'],
            'email' => $stored['email'] ?? $config['default_email'],
            'whatsapp' => $stored['whatsapp'] ?? $config['default_whatsapp'],

            // Banner Hero & CKEditor Content
            'hero_image' => $page->featured_image ?? null,
            'content' => $page->content ?? '',
        ];

        return view('admin.portals.prodi-edit', compact('data', 'prodi', 'config', 'allConfigs'));
    }

    /**
     * Simpan pembaruan konten website prodi
     */
    public function update(Request $request, $prodi)
    {
        $config = $this->getProdiConfig($prodi);
        if (!$config) {
            abort(404, 'Program studi tidak ditemukan.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:20',
            'graduate_degree' => 'nullable|string|max:100',
            'accreditation' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:500',
            'head_name' => 'required|string|max:255',
            'head_title' => 'nullable|string|max:255',
            'head_quote' => 'nullable|string',
            'secretary_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'office_address' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:150',
            'whatsapp' => 'nullable|string|max:100',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'head_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'secretary_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'history_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'content' => 'nullable|string',
        ]);

        $page = Page::firstOrCreate(['slug' => 'portal-prodi-' . $prodi]);

        // Muat data lama dari excerpt
        $oldStored = [];
        if (!empty($page->excerpt)) {
            $decoded = json_decode($page->excerpt, true);
            if (is_array($decoded)) {
                $oldStored = $decoded;
            }
        }

        // Upload Foto Kaprodi
        $headPhotoPath = $oldStored['head_photo'] ?? null;
        if ($request->hasFile('head_photo')) {
            if ($headPhotoPath && Storage::disk('public')->exists($headPhotoPath)) {
                Storage::disk('public')->delete($headPhotoPath);
            }
            $headPhotoPath = $request->file('head_photo')->store('portals/prodi', 'public');
        }

        // Upload Foto Sekprodi
        $secPhotoPath = $oldStored['secretary_photo'] ?? null;
        if ($request->hasFile('secretary_photo')) {
            if ($secPhotoPath && Storage::disk('public')->exists($secPhotoPath)) {
                Storage::disk('public')->delete($secPhotoPath);
            }
            $secPhotoPath = $request->file('secretary_photo')->store('portals/prodi', 'public');
        }

        // Upload Foto Sejarah
        $historyImagePath = $oldStored['history_image'] ?? null;
        if ($request->hasFile('history_image')) {
            if ($historyImagePath && Storage::disk('public')->exists($historyImagePath)) {
                Storage::disk('public')->delete($historyImagePath);
            }
            $historyImagePath = $request->file('history_image')->store('portals/prodi', 'public');
        }

        // Upload Hero Banner
        $heroImagePath = $page->featured_image;
        if ($request->hasFile('hero_image')) {
            if ($heroImagePath && Storage::disk('public')->exists($heroImagePath)) {
                Storage::disk('public')->delete($heroImagePath);
            }
            $heroImagePath = $request->file('hero_image')->store('portals/prodi', 'public');
        }

        // Susun payload JSON excerpt
        $excerptData = [
            'name' => $request->name,
            'degree' => $request->degree,
            'graduate_degree' => $request->graduate_degree,
            'accreditation' => $request->accreditation,
            'tagline' => $request->tagline,
            'head_name' => $request->head_name,
            'head_title' => $request->head_title,
            'head_quote' => $request->head_quote,
            'head_photo' => $headPhotoPath,
            'secretary_name' => $request->secretary_name,
            'secretary_photo' => $secPhotoPath,
            'description' => $request->description,
            'history_image' => $historyImagePath,
            'vision' => $request->vision,
            'mission' => $request->mission,
            'office_address' => $request->office_address,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
        ];

        // Simpan ke tabel pages
        $page->title = 'Website Prodi ' . $request->name;
        $page->featured_image = $heroImagePath;
        $page->content = $request->content ?? '';
        $page->excerpt = json_encode($excerptData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $page->status = 'publish';

        // Hubungkan foreign key study_program_id jika record ada
        $dbProdi = StudyProgram::where('slug', $config['slug'])->first();
        if ($dbProdi) {
            $page->study_program_id = $dbProdi->id;
            $page->faculty_id = $dbProdi->faculty_id;

            // Sinkronkan data ke tabel master study_programs
            $dbProdi->update([
                'name' => $request->name,
                'degree' => $request->degree ?? $dbProdi->degree,
                'accreditation' => $request->accreditation ?? $dbProdi->accreditation,
                'head_of_program' => $request->head_name,
                'vision' => $request->vision ?? $dbProdi->vision,
                'mission' => $request->mission ?? $dbProdi->mission,
                'description' => $request->description ?? $dbProdi->description,
                'logo' => $headPhotoPath ?? $dbProdi->logo,
            ]);
        }

        $page->save();

        return redirect()
            ->route('admin.portal-prodi.edit', $prodi)
            ->with('success', 'Konten Website Program Studi ' . $request->name . ' berhasil disimpan dan langsung tayang!');
    }
}
