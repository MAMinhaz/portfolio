<?php

namespace App\Models;

use App\Models\Landview_profession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landview extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title', 
        'name', 
        'landview_image'
    ];

    public function heroProfessions(){
        return $this->hasMany(Landview_profession::class, 'landview_id', 'id');
    }
}
