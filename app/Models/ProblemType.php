<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model
{
    use HasFactory;

    protected $table = 'problem_types';

    protected $guarded = [];
    
    // Sesuaikan jika kamu pakai $fillable
    protected $fillable = [
        'kode_problem',
        'kategori',
        'nama_problem',
        'deskripsi'
    ];
 public function reports()
    {
        return $this->hasMany(Reports::class, 'problem_type_id');

        
    }

}