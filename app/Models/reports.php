<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class reports extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $guarded = [];
  
    public function company()
    {
        return $this->belongsTo(Companie::class, 'company_id');
    }

    public function problemType()
    {
        return $this->belongsTo(ProblemType::class, 'problem_type_id');
    }

    public function reporter()
    {
        return $this->belongsTo(Admin::class, 'report_by_id');
    }

    public function handler()
    {
        return $this->belongsTo(Admin::class, 'handle_by_id');
    }
    
}
