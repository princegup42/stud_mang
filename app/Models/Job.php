<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_skills',
        'company_name',
        'company_phone',
        'company_email',
        'company_address',
        'job_description',
    ];
}
