<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutMeSkill extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['skill_name', 'skill_percent', 'created_at', 'updated_at'];
}
