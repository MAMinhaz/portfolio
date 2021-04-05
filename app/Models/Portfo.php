<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'date', 'clients', 'category_id', 'addedby', 'thumbnail_image', 'created_at', 'updated_at'];

    public function portfolio_image(){
        return $this->hasMany(PortfoImages::class, 'portfo_id', 'id');
    }

    public function portfolio_cats(){
        return $this->hasOne(PortfoCategory::class, 'id', 'category_id');
    }

}
