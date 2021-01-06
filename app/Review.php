<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content', 'photo', 'prefecture', 'score'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'review_id', 'user_id')->withTimestamps();
    }
    
    public function comment_users()
    {
        return $this->belongsToMany(User::class, 'comments', 'review_id', 'user_id')->withTimestamps();
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'review_tag', 'review_id', 'tag_id')->withTimestamps(); 
    }
} 