<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Tag;
use App\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('content', 'LIKE', "%{$keyword}%")
            ->orWhereHas('tags', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            });
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);

        return view('search.index', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
        ]);
    }
}
