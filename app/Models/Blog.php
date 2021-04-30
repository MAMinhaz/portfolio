<?php


namespace App\Models;

use App\Models\Blog_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "category_id",
        "description",
        "blog_thumbnail_image",
        'created_at',
        'updated_at'
    ];


    /**
     * relationship with "blog category" model
     *
     * @return void
     */
    public function blog_category(){
        return $this->hasOne(Blog_category::class, 'id', 'category_id');
    }
}
