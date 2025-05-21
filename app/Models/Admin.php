<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'email', 'profile_picture'];
    
    protected $table = 'admins';

    protected $guarded = [];

    use HasFactory;
    public function reportedReports()
    {
        return $this->hasMany(Reports::class, 'report_by_id');
    }

    public function handledReports()
    {
        return $this->hasMany(Reports::class, 'handle_by_id');
    }
}
