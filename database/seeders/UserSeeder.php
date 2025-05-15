<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // INI HARUS User
use App\Models\Role; // Masih diperlukan untuk mengambil ID role

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID role 'Admin' dari tabel roles
        $adminRole = Role::where('name', 'Admin')->first();

        // Buat user baru di tabel users
        User::create([
            'name' => 'Admin FIXIT',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'approved',
            'role_id' => $adminRole->id,
        ]);
    }
}
