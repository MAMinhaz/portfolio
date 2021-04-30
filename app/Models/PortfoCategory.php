<?php

namespace App\Models;

use App\Models\PortfoCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfoCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
    'category_name', 
    'created_at', 
    'updated_at'
    ];
}
