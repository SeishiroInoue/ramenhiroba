<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Tag;
use App\User;

class SearchController extends Controller
{
    public function getReviewsByWord(Request $request)
    {
        $keyword = $request->word;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('content', 'LIKE', "%{$keyword}%")
            ->orWhere('prefecture', 'LIKE', "%{$keyword}%")
            ->orWhereHas('tags', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            });
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('favorite_users_count', 'desc')->orderBy('comment_users_count', 'desc')->paginate(10);
        $counts = $query->count();
        
        return view('search.word', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
            'counts' => $counts,
        ]);
    }
    
    public function getReviewsByTag(Request $request)
    {
        $keyword = $request->tag;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->orWhereHas('tags', function ($query) use ($keyword) {
                $query->where('name', $keyword);
            });
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('favorite_users_count', 'desc')->orderBy('comment_users_count', 'desc')->paginate(10);
        $counts = $query->count();
        
        return view('search.tag', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
            'counts' => $counts,
        ]);
    }
    
    public function getReviewsByScore(Request $request)
    {
        $keyword = $request->score;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('score', $keyword);
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('favorite_users_count', 'desc')->orderBy('comment_users_count', 'desc')->paginate(10);
        $counts = $query->count();
        
        return view('search.score', [
            'keyword' => $keyword,
            'reviews' => $reviews,    
            'counts' => $counts,
        ]);
    }
    
    public function getReviewsByPrefecture(Request $request)
    {
        $keyword = $request->prefecture;
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('prefecture', $keyword);
        }
        
        $reviews = $query->withCount('favorite_users')->withCount('comment_users')->orderBy('favorite_users_count', 'desc')->orderBy('comment_users_count', 'desc')->paginate(10);
        $counts = $query->count();

        return view('search.prefecture', [
            'keyword' => $keyword,
            'reviews' => $reviews,
            'counts' => $counts,
        ]);
    }
}