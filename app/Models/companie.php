<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companie extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $guarded = [];

    public function reports()
    {
        return $this->hasMany(Reports::class, 'company_id');
    }
}
