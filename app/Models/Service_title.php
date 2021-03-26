<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service_title extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['service_title', 'service_list_1', 'service_list_2', 'service_list_3', 'service_list_4', 'service_list_5', 'service_list_6', 'addedby', 'created_at', 'updated_at'];
}
