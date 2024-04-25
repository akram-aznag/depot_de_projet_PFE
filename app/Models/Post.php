<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'description',
        'meta_description',
        'meta_keywords',
        'photo',
        'is_published',
        'is_deleted'.
        'category_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
