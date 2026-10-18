<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Konfigurasi metadata opsi peran dan unit
     */
    private function getAvailableOptions()
    {
        return [
            'roles' => [
                'Super Admin'    => 'Super Admin (Akses Penuh / Rektorat)',
                'Admin Fakultas' => 'Admin Fakultas (Pengelola Fakultas & Semua Prodi Terkait)',
                'Dosen Prodi'    => 'Dosen / Staf Prodi (Pengelola Program Studi Tertentu)',
                'Admin Lembaga'  => 'Admin Lembaga / Unit (LPM / LP2M)',
            ],
            'faculties' => [
                'syariah' => "Fakultas Syari'ah (FASYA)",
                'febit'   => 'Fakultas Ekonomi Bisnis dan Tarbiyah (FEBIT)',
            ],
            'prodis' => [
                'hki'  => "Prodi Hukum Keluarga Islam - HKI (Fakultas Syari'ah)",
                'hes'  => "Prodi Hukum Ekonomi Syariah - HES (Fakultas Syari'ah)",
                'mbs'  => 'Prodi Manajemen Bisnis Syariah - MBS (FEBIT)',
                'ekos' => 'Prodi Ekonomi Syariah - EKOS (FEBIT)',
                'pai'  => 'Prodi Pendidikan Agama Islam - PAI (FEBIT)',
            ],
            'units' => [
                'lpm'  => 'Lembaga Penjaminan Mutu (LPM)',
                'lp2m' => 'Lembaga Penelitian & Pengabdian Masyarakat (LP2M)',
            ],
        ];
    }

    /**
     * Menampilkan daftar semua pengguna dan hak akses
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter pencarian nama / email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter fakultas
        if ($request->filled('faculty')) {
            $query->where('faculty_code', $request->faculty);
        }

        // Filter prodi
        if ($request->filled('prodi')) {
            $query->where('prodi_code', $request->prodi);
        }

        $users = $query->latest()->paginate(10)->withQueryString();
        $options = $this->getAvailableOptions();

        return view('admin.users.index', array_merge(compact('users'), $options));
    }

    /**
     * Form tambah pengguna baru
     */
    public function create()
    {
        $options = $this->getAvailableOptions();
        return view('admin.users.create', $options);
    }

    /**
     * Simpan pengguna baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email|max:255',
            'password'     => 'required|string|min:6|confirmed',
            'role'         => 'required|string|in:Super Admin,Admin Fakultas,Dosen Prodi,Admin Lembaga',
            'faculty_code' => 'nullable|string|in:syariah,febit',
            'prodi_code'   => 'nullable|string|in:hki,hes,mbs,ekos,pai',
            'unit_code'    => 'nullable|string|in:lpm,lp2m',
            'phone'        => 'nullable|string|max:30',
            'is_active'    => 'nullable|boolean',
        ], [
            'name.required'     => 'Nama pengguna wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.unique'      => 'Email ini sudah terdaftar di sistem.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal terdiri dari 6 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
            'role.required'     => 'Silakan pilih peran (role) pengguna.',
        ]);

        $role = $request->role;
        $facultyCode = $request->faculty_code;
        $prodiCode = $request->prodi_code;
        $unitCode = $request->unit_code;

        // Tentukan hak akses portal & prodi otomatis
        $allowedPortals = [];
        $allowedProdis = [];

        if ($role === 'Super Admin') {
            $allowedPortals = ['*'];
            $allowedProdis = ['*'];
            $facultyCode = null;
            $prodiCode = null;
            $unitCode = null;
        } elseif ($role === 'Admin Fakultas') {
            if ($facultyCode) {
                $allowedPortals = [$facultyCode];
                if ($facultyCode === 'syariah') {
                    $allowedProdis = ['hki', 'hes'];
                } elseif ($facultyCode === 'febit') {
                    $allowedProdis = ['mbs', 'ekos', 'pai'];
                }
            }
            $unitCode = null;
        } elseif ($role === 'Dosen Prodi') {
            if ($prodiCode) {
                $allowedProdis = [$prodiCode];
            }
            // Jika dosen sekaligus staf fakultas (misal FEBIT + Prodi MBS)
            if ($facultyCode) {
                $allowedPortals = [$facultyCode];
            }
            $unitCode = null;
        } elseif ($role === 'Admin Lembaga') {
            if ($unitCode) {
                $allowedPortals = [$unitCode];
            }
            $allowedProdis = [];
            $facultyCode = null;
            $prodiCode = null;
        }

        // Cari ID fakultas / prodi jika ada di database
        $facultyId = null;
        if ($facultyCode) {
            $faculty = Faculty::where('slug', 'like', "%{$facultyCode}%")->first();
            $facultyId = $faculty?->id;
        }

        $studyProgramId = null;
        if ($prodiCode) {
            $prodiMap = [
                'hki'  => 'hukum-keluarga-islam',
                'hes'  => 'hukum-ekonomi-syariah',
                'mbs'  => 'manajemen-bisnis-syariah',
                'ekos' => 'ekonomi-syariah',
                'pai'  => 'pendidikan-agama',
            ];
            $prodiSlug = $prodiMap[$prodiCode] ?? $prodiCode;
            $sp = StudyProgram::where('slug', $prodiSlug)
                ->orWhere('slug', 'like', "%{$prodiCode}%")
                ->first();
            $studyProgramId = $sp?->id;
        }

        $user = User::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'role'             => $role,
            'faculty_id'       => $facultyId,
            'faculty_code'     => $facultyCode,
            'study_program_id' => $studyProgramId,
            'prodi_code'       => $prodiCode,
            'unit_code'        => $unitCode,
            'allowed_portals'  => $allowedPortals,
            'allowed_prodis'   => $allowedProdis,
            'phone'            => $request->phone,
            'is_active'        => $request->boolean('is_active', true),
        ]);

        // Berikan role Spatie jika memungkinkan
        try {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
            $user->assignRole($role);
        } catch (\Throwable $e) {
            // Lanjutkan jika tabel spatie belum termigrasi
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', "Pengguna baru '{$user->name}' dengan peran '{$user->getRoleDisplayName()}' berhasil ditambahkan.");
    }

    /**
     * Form edit data pengguna dan hak akses
     */
    public function edit(User $user)
    {
        $options = $this->getAvailableOptions();
        return view('admin.users.edit', array_merge(compact('user'), $options));
    }

    /**
     * Perbarui data pengguna
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:users,email,' . $user->id,
            'password'     => 'nullable|string|min:6|confirmed',
            'role'         => 'required|string|in:Super Admin,Admin Fakultas,Dosen Prodi,Admin Lembaga',
            'faculty_code' => 'nullable|string|in:syariah,febit',
            'prodi_code'   => 'nullable|string|in:hki,hes,mbs,ekos,pai',
            'unit_code'    => 'nullable|string|in:lpm,lp2m',
            'phone'        => 'nullable|string|max:30',
            'is_active'    => 'nullable|boolean',
        ], [
            'name.required'     => 'Nama pengguna wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.unique'      => 'Email ini sudah digunakan oleh akun lain.',
            'password.min'      => 'Password baru minimal 6 karakter.',
            'password.confirmed'=> 'Konfirmasi password baru tidak cocok.',
            'role.required'     => 'Silakan pilih peran (role) pengguna.',
        ]);

        $role = $request->role;
        $facultyCode = $request->faculty_code;
        $prodiCode = $request->prodi_code;
        $unitCode = $request->unit_code;

        // Tentukan hak akses portal & prodi otomatis
        $allowedPortals = [];
        $allowedProdis = [];

        if ($role === 'Super Admin') {
            $allowedPortals = ['*'];
            $allowedProdis = ['*'];
            $facultyCode = null;
            $prodiCode = null;
            $unitCode = null;
        } elseif ($role === 'Admin Fakultas') {
            if ($facultyCode) {
                $allowedPortals = [$facultyCode];
                if ($facultyCode === 'syariah') {
                    $allowedProdis = ['hki', 'hes'];
                } elseif ($facultyCode === 'febit') {
                    $allowedProdis = ['mbs', 'ekos', 'pai'];
                }
            }
            $unitCode = null;
        } elseif ($role === 'Dosen Prodi') {
            if ($prodiCode) {
                $allowedProdis = [$prodiCode];
            }
            if ($facultyCode) {
                $allowedPortals = [$facultyCode];
            }
            $unitCode = null;
        } elseif ($role === 'Admin Lembaga') {
            if ($unitCode) {
                $allowedPortals = [$unitCode];
            }
            $allowedProdis = [];
            $facultyCode = null;
            $prodiCode = null;
        }

        // Cari ID fakultas / prodi jika ada di database
        $facultyId = null;
        if ($facultyCode) {
            $faculty = Faculty::where('slug', 'like', "%{$facultyCode}%")->first();
            $facultyId = $faculty?->id;
        }

        $studyProgramId = null;
        if ($prodiCode) {
            $prodiMap = [
                'hki'  => 'hukum-keluarga-islam',
                'hes'  => 'hukum-ekonomi-syariah',
                'mbs'  => 'manajemen-bisnis-syariah',
                'ekos' => 'ekonomi-syariah',
                'pai'  => 'pendidikan-agama',
            ];
            $prodiSlug = $prodiMap[$prodiCode] ?? $prodiCode;
            $sp = StudyProgram::where('slug', $prodiSlug)
                ->orWhere('slug', 'like', "%{$prodiCode}%")
                ->first();
            $studyProgramId = $sp?->id;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $role;
        $user->faculty_id = $facultyId;
        $user->faculty_code = $facultyCode;
        $user->study_program_id = $studyProgramId;
        $user->prodi_code = $prodiCode;
        $user->unit_code = $unitCode;
        $user->allowed_portals = $allowedPortals;
        $user->allowed_prodis = $allowedProdis;
        $user->phone = $request->phone;

        // Jangan izinkan super admin menonaktifkan akun sendiri
        if ($user->id !== auth()->id()) {
            $user->is_active = $request->boolean('is_active', true);
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Update Spatie role
        try {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
            $user->syncRoles([$role]);
        } catch (\Throwable $e) {
            // Lanjutkan jika tabel spatie belum ada
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', "Data pengguna '{$user->name}' berhasil diperbarui.");
    }

    /**
     * Hapus pengguna
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()
                ->back()
                ->with('error', 'Tindakan Ditolak: Anda tidak dapat menghapus akun Anda yang sedang aktif digunakan.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', "Pengguna '{$userName}' berhasil dihapus dari sistem.");
    }

    /**
     * Toggle status aktif/nonaktif pengguna
     */
    public function toggleStatus(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()
                ->back()
                ->with('error', 'Tindakan Ditolak: Anda tidak dapat menonaktifkan akun Anda sendiri.');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $statusText = $user->is_active ? 'diaktifkan kembali' : 'dinonaktifkan';
        return redirect()
            ->back()
            ->with('success', "Status akun '{$user->name}' berhasil {$statusText}.");
    }
}
