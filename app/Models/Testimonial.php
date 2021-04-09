<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['testimonial_given', 'designation', 'testimonial', 'testimonial_image', 'addedby', 'show_status'];
}