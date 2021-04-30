<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'skill_id',
        'company_name',
        'company_phone',
        'company_email',
        'company_address',
        'company_website',
        'description',
    ];
}
