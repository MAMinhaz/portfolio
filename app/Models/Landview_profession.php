<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landview_profession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['landview_id', 'profession_name'];
}
