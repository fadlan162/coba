<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // INI HARUS User
use App\Models\Role; // Masih diperlukan untuk mengambil ID role
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
       DB::table('users')->insert([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role_id' => 1, // harus sesuai id yang ada di roles
]);
    }
}
