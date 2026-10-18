<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Pastikan identitas kampus di website_settings terisi IAI Darul Falah
        \App\Models\WebsiteSetting::where('id', 1)->orWhere('site_name', 'like', '%DARUL FALA%')->update(['site_name' => 'IAI Darul Falah']);

        // 1. Super Admin (Akses Penuh ke Seluruh Sistem)
        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@kampus.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'),
                'role' => 'Super Admin',
                'is_active' => true,
            ]
        );
        $superAdmin->syncRoles(['Super Admin']);

        // Lookups opsional jika data fakultas/prodi sudah ada di database
        $facultyFebit = Faculty::where('slug', 'febit')->orWhere('name', 'like', '%FEBIT%')->first();
        $facultySyariah = Faculty::where('slug', 'syariah')->orWhere('name', 'like', '%Syari%')->first();
        $prodiMbs = StudyProgram::where('slug', 'mbs')->orWhere('name', 'like', '%MBS%')->orWhere('name', 'like', '%Manajemen Bisnis Syariah%')->first();

        // 2. Dosen FEBIT Prodi MBS (Jobdesk khusus Prodi MBS & Portal FEBIT)
        $dosenMbs = User::updateOrCreate(
            ['email' => 'dosen.mbs@kampus.com'],
            [
                'name' => 'Ahmad Zaki, M.E.',
                'password' => Hash::make('password'),
                'role' => 'Dosen Prodi',
                'faculty_id' => $facultyFebit?->id,
                'faculty_code' => 'febit',
                'study_program_id' => $prodiMbs?->id,
                'prodi_code' => 'mbs',
                'allowed_portals' => ['febit'],
                'allowed_prodis' => ['mbs'],
                'phone' => '081234567891',
                'is_active' => true,
            ]
        );
        $dosenMbs->syncRoles(['Dosen Prodi']);

        // 3. Admin Fakultas FEBIT (Mengelola Portal FEBIT & seluruh prodi di bawah FEBIT)
        $adminFebit = User::updateOrCreate(
            ['email' => 'admin.febit@kampus.com'],
            [
                'name' => 'Siti Nurhaliza, M.Pd.',
                'password' => Hash::make('password'),
                'role' => 'Admin Fakultas',
                'faculty_id' => $facultyFebit?->id,
                'faculty_code' => 'febit',
                'allowed_portals' => ['febit'],
                'allowed_prodis' => ['mbs', 'ekos', 'pai'],
                'phone' => '081234567892',
                'is_active' => true,
            ]
        );
        $adminFebit->syncRoles(['Admin Fakultas']);

        // 4. Admin Fakultas Syari'ah (Mengelola Portal Syari'ah & prodi HKI, HES)
        $adminSyariah = User::updateOrCreate(
            ['email' => 'admin.syariah@kampus.com'],
            [
                'name' => 'Fathur Rahman, M.H.',
                'password' => Hash::make('password'),
                'role' => 'Admin Fakultas',
                'faculty_id' => $facultySyariah?->id,
                'faculty_code' => 'syariah',
                'allowed_portals' => ['syariah'],
                'allowed_prodis' => ['hki', 'hes'],
                'phone' => '081234567893',
                'is_active' => true,
            ]
        );
        $adminSyariah->syncRoles(['Admin Fakultas']);

        // 5. Admin Lembaga LPM (Mengelola Portal LPM)
        $adminLpm = User::updateOrCreate(
            ['email' => 'admin.lpm@kampus.com'],
            [
                'name' => 'Dr. Hendra Wijaya, M.Si.',
                'password' => Hash::make('password'),
                'role' => 'Admin Lembaga',
                'unit_code' => 'lpm',
                'allowed_portals' => ['lpm'],
                'phone' => '081234567894',
                'is_active' => true,
            ]
        );
        $adminLpm->syncRoles(['Admin Lembaga']);
    }
}
