<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'faculty_id',
        'faculty_code',
        'study_program_id',
        'prodi_code',
        'unit_code',
        'allowed_portals',
        'allowed_prodis',
        'phone',
        'avatar',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'allowed_portals' => 'array',
            'allowed_prodis' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relasi ke Fakultas
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    /**
     * Relasi ke Program Studi
     */
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    /**
     * Cek apakah user adalah Super Admin (Rektorat / Administrator Utama)
     */
    public function isSuperAdmin(): bool
    {
        if ($this->role === 'Super Admin') {
            return true;
        }

        try {
            return $this->hasRole('Super Admin');
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * Cek apakah user adalah Admin Fakultas
     */
    public function isAdminFakultas(?string $faculty = null): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        $isFacultyRole = $this->role === 'Admin Fakultas' || $this->hasRoleSafe('Admin Fakultas');
        if (!$isFacultyRole) {
            return false;
        }

        if ($faculty === null) {
            return true;
        }

        return $this->canAccessPortal($faculty);
    }

    /**
     * Cek apakah user adalah Dosen / Staff Program Studi
     */
    public function isDosenProdi(?string $prodi = null): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        $isProdiRole = $this->role === 'Dosen Prodi' || $this->hasRoleSafe('Dosen Prodi');
        if (!$isProdiRole) {
            return false;
        }

        if ($prodi === null) {
            return true;
        }

        return $this->canAccessProdi($prodi);
    }

    /**
     * Cek apakah user adalah Admin Lembaga (LPM / LP2M)
     */
    public function isAdminLembaga(?string $unit = null): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        $isLembagaRole = $this->role === 'Admin Lembaga' || $this->hasRoleSafe('Admin Lembaga');
        if (!$isLembagaRole) {
            return false;
        }

        if ($unit === null) {
            return true;
        }

        return $this->canAccessPortal($unit);
    }

    /**
     * Helper aman untuk pengecekan role Spatie tanpa throw exception
     */
    private function hasRoleSafe(string $roleName): bool
    {
        try {
            return $this->hasRole($roleName);
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * Pengecekan izin akses ke Portal Fakultas / Lembaga
     * Portal keys: 'syariah', 'febit', 'lpm', 'lp2m'
     */
    public function canAccessPortal(string $portalKey): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Cek daftar izin eksplisit jika ada
        $allowed = $this->allowed_portals ?? [];
        if (in_array('*', $allowed, true) || in_array($portalKey, $allowed, true)) {
            return true;
        }

        // Cek berdasarkan kode fakultas langsung
        if (!empty($this->faculty_code) && $this->faculty_code === $portalKey) {
            return true;
        }

        // Cek berdasarkan kode unit lembaga langsung
        if (!empty($this->unit_code) && $this->unit_code === $portalKey) {
            return true;
        }

        return false;
    }

    /**
     * Pengecekan izin akses ke Website Program Studi (Prodi)
     * Prodi keys: 'hki', 'hes', 'mbs', 'ekos', 'pai'
     */
    public function canAccessProdi(string $prodiKey): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Cek daftar izin eksplisit jika ada
        $allowed = $this->allowed_prodis ?? [];
        if (in_array('*', $allowed, true) || in_array($prodiKey, $allowed, true)) {
            return true;
        }

        // Cek berdasarkan kode prodi penugasan user
        if (!empty($this->prodi_code) && $this->prodi_code === $prodiKey) {
            return true;
        }

        // Jika user adalah Admin Fakultas, mereka otomatis berhak mengakses seluruh prodi di bawah fakultasnya
        $facultyProdis = [
            'syariah' => ['hki', 'hes'],
            'febit'   => ['mbs', 'ekos', 'pai'],
        ];

        if ($this->role === 'Admin Fakultas' && !empty($this->faculty_code) && isset($facultyProdis[$this->faculty_code])) {
            return in_array($prodiKey, $facultyProdis[$this->faculty_code], true);
        }

        return false;
    }

    /**
     * Pengecekan izin akses dashboard
     * Scopes: 'syariah', 'febit', 'lpm', 'lp2m'
     */
    public function canAccessDashboard(string $scope): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        if (in_array($scope, ['syariah', 'febit', 'lpm', 'lp2m'], true)) {
            return $this->canAccessPortal($scope);
        }

        return false;
    }

    /**
     * Label teks nama peran yang rapi untuk ditampilkan pada navbar/profil
     */
    public function getRoleDisplayName(): string
    {
        if ($this->isSuperAdmin()) {
            return 'Super Admin (Rektorat)';
        }

        if ($this->role === 'Admin Fakultas') {
            $facultyName = match ($this->faculty_code) {
                'febit' => 'FEBIT',
                'syariah' => "Syari'ah",
                default => strtoupper($this->faculty_code ?? 'Fakultas')
            };
            return "Admin Fakultas {$facultyName}";
        }

        if ($this->role === 'Dosen Prodi') {
            $prodiName = match ($this->prodi_code) {
                'mbs' => 'MBS',
                'ekos' => 'EKOS',
                'pai' => 'PAI',
                'hki' => 'HKI',
                'hes' => 'HES',
                default => strtoupper($this->prodi_code ?? 'Prodi')
            };
            $facultyName = match ($this->faculty_code) {
                'febit' => 'FEBIT',
                'syariah' => "Syari'ah",
                default => null
            };
            return $facultyName
                ? "Dosen {$facultyName} (Prodi {$prodiName})"
                : "Dosen Prodi {$prodiName}";
        }

        if ($this->role === 'Admin Lembaga') {
            $unitName = strtoupper($this->unit_code ?? 'Lembaga');
            return "Admin {$unitName}";
        }

        return $this->role ?? 'Staf Kampus';
    }

    /**
     * Badge CSS class untuk role
     */
    public function getRoleBadgeClass(): string
    {
        return match ($this->role) {
            'Super Admin' => 'bg-gradient-primary text-white',
            'Admin Fakultas' => 'bg-gradient-success text-white',
            'Dosen Prodi' => 'bg-gradient-info text-white',
            'Admin Lembaga' => 'bg-gradient-warning text-dark',
            default => 'bg-gradient-secondary text-white'
        };
    }
}
