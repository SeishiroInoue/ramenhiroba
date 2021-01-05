<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;

class RankingsController extends Controller
{
    public function favorites()
    {
        $reviews = Review::withCount('favorite_users')->withCount('comment_users')->orderBy('favorite_users_count', "desc")->paginate(10);
        
        return view('rankings.favorites', [
            'reviews' => $reviews,
        ]);
    }
    
    public function comments()
    {
        $reviews = Review::withCount('favorite_users')->withCount('comment_users')->orderBy('comment_users_count', "desc")->paginate(10);
        
        return view('rankings.comments', [
            'reviews' => $reviews,
        ]);
    }
    
    public function reviews()
    {
        $users = User::withCount('reviews')->orderBy('reviews_count', "desc")->paginate(10);
        
        return view('rankings.reviews', [
            'users' => $users,
        ]);
    }  
}
