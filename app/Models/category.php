<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class , 'post_category', 'category_id', 'post_id')->withPivot('is_primary');
    }
}
