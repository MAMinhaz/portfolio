<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landview extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'name', 'profession_name', 'landview_image'];
}
