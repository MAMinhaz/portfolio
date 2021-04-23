<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomFrontend extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'job_title',
        'portfolio_logo',
        'admin_logo',
        'site_name',
        'portfolio_theme',
        'cv',
        'mockup_image',
        'hire_me_image',
        'testimonial_image',
        'get_in_touch_image',
        'created_at',
        'updated_at'
    ];
}
