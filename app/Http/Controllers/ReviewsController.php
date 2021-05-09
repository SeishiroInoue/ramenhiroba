<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Review;
use App\Comment;
use App\User;
use App\Tag;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::withCount('favorite_users')->withCount('comment_users')->orderBy('created_at','desc')->paginate(10);
        $tags = Tag::withCount('reviews')->orderBy('reviews_count', 'desc')->paginate(30);
        
        return view('welcome', 
            [ 'reviews' => $reviews,
              'tags' => $tags,
         ]);
    }
    
    public function store(Request $request)
    {   
        $review = $request->validate([
            'content' => 'required|max:150',
            'photo' => 'required|image|max:5120'
        ]);
        
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶー一-龥]+)/u', $request->tags, $match);
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
        
        Session::flash('flash_message', 'レビューを投稿しました！');
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        
        if ($review->id == 8 || $review->id == 12 || $review->id == 16) {
            session()->flash('flashmessage','このレビューは削除できません。');
        }
        if (\Auth::id() === $review->user_id && $review->id != 8 && $review->id != 12 && $review->id != 16) {
            $review->comments()->delete();
            $review->tags()->delete();
            $review->delete();
        }
        
        Session::flash('flash_message', 'レビューを削除しました！');
        
        return back();
    }
    
    public function destroyAtShow($id)
    {
        $review = Review::findOrFail($id);
        
        if ($review->id == 8 || $review->id == 12 || $review->id == 16) {
            session()->flash('flashmessage','このレビューは削除できません。');
        }
        if (\Auth::id() === $review->user_id && $review->id != 8 && $review->id != 12 && $review->id != 16) {
            $review->comments()->delete();
            $review->tags()->delete();
            $review->delete();
        }
        
        Session::flash('flash_message', 'レビューを削除しました！');
        
        return redirect('/');
    }
    
    public function show($id)
    {
        $review = Review::findOrFail($id);
        $comments = Comment::where('review_id', $id)->orderBy('created_at','desc')->paginate(5);
        $same_reviews = Review::withCount('favorite_users')->withCount('comment_users')->where('latitude', $review->latitude)->where('longitude', $review->longitude)->where('id', '<>', $review->id)->orderBy('created_at','desc')->paginate(2);
        
        return view('reviews.show', 
        [ 'review' => $review,
          'comments' => $comments,
          'same_reviews' => $same_reviews,
        ]);
    }
    
    public function getReviewsByFollowings()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reviews = $user->feed_reviews()->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);
            $tags = Tag::withCount('reviews')->orderBy('reviews_count', 'desc')->paginate(30);
            
            $data = [
                'user' => $user,
                'reviews' => $reviews,
                'tags' => $tags,
            ];
            
            return view('reviews.timeline', $data);
        }
    }
}
