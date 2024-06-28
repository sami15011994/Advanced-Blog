<?php

namespace App\Models;

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
public function  categories() 
{
	return $this->BlongsToMany(category::class);
}
public function comments() 
{
	return $this->BlongsToMany(Comment::class);
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
