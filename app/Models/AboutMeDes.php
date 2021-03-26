<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutMeDes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['about_me_des', 'created_at', 'updated_at'];
}
