<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProblemType;

class ProblemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    ProblemType::create([
        'kode_problem' => 'IT001',
        'kategori' => 'Network',
        'nama_problem' => 'Internet Mati',
        'deskripsi' => 'Tidak ada koneksi ke internet.'
    ]);
}
}
