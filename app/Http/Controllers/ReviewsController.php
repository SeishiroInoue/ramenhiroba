<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Comment;
use App\User;
use App\Tag;

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
        $review = $request->validate([
            'content' => 'required|max:150',
            'photo' => 'required|image|max:5120'
        ]);
        
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ一-龥]+)/u', $request->tags, $match);
        $tags = [];
        foreach ($match[1] as $tag) {
            $record = Tag::firstOrCreate(['name' => $tag]);
            array_push($tags, $record);
        }
        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag->id);
        }
        
        $file = $request->photo;
        $path = Storage::disk('s3')->putFile('/ramen', $file, 'public');
        $url = Storage::disk('s3')->url($path); 
        
        $review = new Review;
        $review->user_id = Auth::id();
        $review->content = $request->content;
        $review->photo = $url;
        $review->prefecture = $request->prefecture;
        $review->score = $request->score;
        $review->latitude = $request->latitude;
        $review->longitude = $request->longitude;
        $review->save();
        
        $review->tags()->attach($tags_id);

        return redirect('/');
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
    
    public function CreateForm()
    {
        return view('reviews.form', []);
    }
}
