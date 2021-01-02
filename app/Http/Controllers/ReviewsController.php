<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Review;
use App\Comment;
use App\User;

class ReviewsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reviews = $user->feed_reviews()->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'reviews' => $reviews,
            ];
            return view('welcome', $data);
        } else {
            $reviews = Review::orderBy('created_at','desc')->paginate(10);
            return view('welcome', 
            [ 'reviews' => $reviews,
            ]);
        }
        
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
        $review = Review::findOrFail($id);

        if (\Auth::id() === $review->user_id) {
            $review->comments()->delete();
            $review->delete();
        }

        return back();
    }
    
    public function show($id)
    {
        $review = Review::findOrFail($id);
        $comments = Comment::where('review_id', $id)->orderBy('created_at','desc')->paginate(10);
        
        return view('reviews.show', 
        [ 'review' => $review,
          'comments' => $comments,
        ]);
    }
}
