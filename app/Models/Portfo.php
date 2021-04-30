<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 
        'description', 
        'date', 
        'clients', 
        'category_id', 
        'thumbnail_image', 
        'created_at', 
        'updated_at'
    ];


    /**
     * relationship with "PortfoImages" model
     *
     * @return void
     */
    public function portfolio_image(){
        return $this->hasMany(PortfoImages::class, 'portfo_id', 'id');
    }


    /**
     * relationship with "PortfoCategory" model
     *
     * @return void
     */
    public function PortfolioCats(){
        return $this->hasOne(PortfoCategory::class, 'id', 'category_id');
    }
}
