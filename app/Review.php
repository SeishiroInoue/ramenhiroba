<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content', 'photo', 'score'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 
