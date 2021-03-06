<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile', 'icon', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['reviews', 'followings', 'followers', 'favorites']);
    }
    
    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function feed_reviews()
    {
        $userIds = $this->followings()->pluck('users.id')->toArray();
        $userIds[] = $this->id;
        
        return Review::whereIn('user_id', $userIds);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Review::class, 'favorites', 'user_id', 'review_id')->withTimestamps();
    }
    
    public function favorite($reviewstId)
    {
        $exist = $this->is_favoriting($reviewstId);
        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($reviewstId);
            return true;
        }
    }
    
    public function unfavorite($reviewstId)
    {
        $exist = $this->is_favoriting($reviewstId);
        if ($exist) {
            $this->favorites()->detach($reviewstId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_favoriting($reviewstId)
    {
        return $this->favorites()->where('review_id', $reviewstId)->exists();
    }
}
