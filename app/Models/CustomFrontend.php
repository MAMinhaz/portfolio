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
        'mockup_image',
        'hire_me_image',
        'testimonial_image',
        'get_in_touch_image',
    ];
}
