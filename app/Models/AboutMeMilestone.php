<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutMeMilestone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'milestone_name', 
        'milestone_digit', 
        'created_at',
        'updated_at'
    ];
}
