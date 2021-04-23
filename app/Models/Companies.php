<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'company_name', 
        'company_logo', 
        'show_status'
    ];
}
