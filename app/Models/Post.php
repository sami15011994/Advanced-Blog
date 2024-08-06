<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Comment;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
protected $fillable = ['title','content','user_id' ];
public function user () 
{
	return $this->BelongsTo(user::class);
}
public function categories() 
{
	return $this->BelongsToMany(category::class ,'post_category', 'post_id', 'category_id');
}
//relation post comments one to many
public function comments() 
{
	return $this->hasMany(Comment::class);
}
public function image(){
	return $this->hasOne(Image::class);
}
public function toSearchableArray()
{
return [
	'title' => $this->title,
'content' => $this->content,
// ... other searchable attributes
];
}
}
