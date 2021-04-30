<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contactinfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'email',
        'cell_number',
        'address',
        'show_status',
        'created_at',
        'updated_at'
    ];
}
