<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ReviewsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reviews = $user->feed_reviews()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'reviews' => $reviews,
            ];
        }

        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'content' => 'required|max:150',
            'photo' => 'required|image|max:5120'
        ]);
        
        $file = $request['photo'];
        $path = Storage::disk('s3')->putFile('/ramen', $file, 'public');
        $url = Storage::disk('s3')->url($path);
        
        $scores = $_POST["score"];
        
        $request->user()->reviews()->create([
            'content' => $request->content,
            'photo' => $url,
            'score' => $scores,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $review = \App\Review::findOrFail($id);

        if (\Auth::id() === $review->user_id) {
            $review->delete();
        }

        return back();
    }
}
