<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions or retrieve if they already exist
        Permission::firstOrCreate(['name' => 'tambah_aksi']);
        Permission::firstOrCreate(['name' => 'edit_aksi']);
        Permission::firstOrCreate(['name' => 'hapus']);
        Permission::firstOrCreate(['name' => 'dashboard']);

        // Create roles or retrieve if they already exist
        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleAlumni = Role::firstOrCreate(['name' => 'alumni', 'guard_name' => 'web']);

        // Assign permissions to roles
        $roleAdmin->syncPermissions(['tambah_aksi', 'edit_aksi', 'hapus', 'dashboard']);
        $roleAlumni->syncPermissions(['tambah_aksi', 'edit_aksi', 'hapus', 'dashboard']);
    }
}
