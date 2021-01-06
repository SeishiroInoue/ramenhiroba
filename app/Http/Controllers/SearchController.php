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
        $keyword = $request->search;
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
    
    public function getReviewsByTag(Request $request)
    {
        $keyword = $request->tag_name;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->orWhereHas('tags', function ($query) use ($keyword) {
                $query->where('name', $keyword);
            });
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);

        return view('search.index', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
        ]);
    }
    
    public function getReviewsByScore(Request $request)
    {
        $keyword = $request->score;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('score', $keyword);
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);

        return view('search.index', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
        ]);
    }
    
    public function getReviewsByPrefecture(Request $request)
    {
        $keyword = $request->prefecture;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('prefecture', $keyword);
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);

        return view('search.index', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
        ]);
    }
}
