<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'Super Admin']);
        Role::firstOrCreate(['name' => 'Admin Fakultas']);
        Role::firstOrCreate(['name' => 'Dosen Prodi']);
        Role::firstOrCreate(['name' => 'Admin Lembaga']);
    }
}
