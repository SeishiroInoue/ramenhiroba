<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {   
        $request->validate([
            'content' => 'required|max:150',
            'photo' => 'image|max:5120'
        ]);
        
        if ($request->photo) {
            $file = $request->photo;
            $path = Storage::disk('s3')->putFile('/ramen', $file, 'public');
            $url = Storage::disk('s3')->url($path);

            $request->user()->comments()->create([
                'content' => $request->content,
                'photo' => $url,
                'review_id' => $request->review_id,
            ]); } else {
            $request->user()->comments()->create([
                'content' => $request->content,
                'review_id' => $request->review_id,
            ]);
        }
        
        Session::flash('flash_message', 'コメントを投稿しました！');
    
        return back();
    }
    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }
        
        Session::flash('flash_message', 'コメントを削除しました！');

        return back();
    }
}
