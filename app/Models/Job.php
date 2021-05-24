<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function skill()
    {
        return $this->hasMany(Skill::class, 'skill_id', 'id');
    }
}
