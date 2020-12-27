<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Review::query();
        
        if (!empty($keyword)) {
            $query->where('content', 'LIKE', "%{$keyword}%");
        }
        
        $reviews = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('search.index', [
            'reviews' => $reviews,    
        ]);
    }
}
