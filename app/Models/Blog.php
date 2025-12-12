<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{
    use SoftDeletes;
    protected $fillable=['title' , 'content', 'image'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category', 'blog_id', 'category_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'blog_user', 'blog_id', 'user_id');
    }
}
