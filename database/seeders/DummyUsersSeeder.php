<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Membuat user admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ]);
        $admin->assignRole('admin');  // Menugaskan role 'admin'

        // Membuat user alumni
        $alumni = User::create([
            'name' => 'Alumni',
            'email' => 'alumni@gmail.com',
            'password' => bcrypt('12345')
        ]);
        $alumni->assignRole('alumni');  // Menugaskan role 'alumni'
    }
}
