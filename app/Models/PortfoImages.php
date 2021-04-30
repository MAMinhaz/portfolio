<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfoImages extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'thumbnail_image', 
        'portfo_image', 
        'created_at', 
        'updated_at'
    ];
}
