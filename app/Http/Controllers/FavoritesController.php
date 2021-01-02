<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class FavoritesController extends Controller
{
    public function store($id)
    {
        \Auth::user()->favorite($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return back();
    }
    
    public function index()
    {
        $reviews = Review::withCount('favorite_users')->withCount('comment_users')->orderBy('favorite_users_count', "desc")->paginate(10);
        
        return view('favorites.ranking', [
            'reviews' => $reviews
        ]);
    }
}
