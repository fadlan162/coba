<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'email', 'profile_picture'];
    
    protected $table = 'admins';

    protected $guarded = [];
}
