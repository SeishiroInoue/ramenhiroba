<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'review_tag', 'tag_id', 'review_id')->withTimestamps(); 
    }
}
